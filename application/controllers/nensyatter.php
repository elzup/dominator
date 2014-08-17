<?php

class Nensyatter extends CI_Controller {

	/** @var User_model */
	public $user;

	public function __construct() {
		parent::__construct();
		$this->load->model('User_model', 'user');
		$this->user->set_check_login(MODE_NENSYATTER);
	}

	public function index() {
		$user = $this->user->get_user(MODE_NENSYATTER);
		$meta = new Metaobj();
		$meta->setup_nensyatter();
		$messages = $this->_get_messages();

		$this->load->view('head', array('meta' => $meta, 'bootstrap_url' => PATH_LIB_BOOTSTRAP_CSS2));
		$this->load->view('navbar', array('meta' => $meta, 'user' => $user));
		$this->load->view('alert', array('messages' => $messages));
		$this->load->view('nensyatterbody', array('user' => $user));
		$this->load->view('foot');
	}

	public function sn($sn = NULL) {
		if (empty($sn) && ($sn = @$this->input->post('sn'))) {
			redirect('http://' . base_url(MODE_NENSYATTER . '/sn/' . $sn));
		}
		$user = $this->user->get_user(MODE_NENSYATTER);
		if (empty($sn)) {
			redirect('http://' . base_url(MODE_NENSYATTER));
		}
		$messages = array();
		if ($user) {
			$icon_url = $user->get_image($sn);
		} else {
			$messages[] = 'ログインしていません';
		}
		$meta = new Metaobj();
		$meta->setup_nensyatter();
		$messages = array_merge($messages, $this->_get_messages());


		$this->load->view('head', array('meta' => $meta, 'bootstrap_url' => PATH_LIB_BOOTSTRAP_CSS2));
		$this->load->view('navbar', array('meta' => $meta, 'user' => $user));
		$this->load->view('alert', array('messages' => $messages));
		$this->load->view('nensyatterbody', array('user' => $user, 'nensya_url' => $icon_url, 'icon_url' => $icon_url, 'nensya_sn' => $sn));
		$this->load->view('foot');
	}

	/**
	 * 
	 * @return FullChar[]
	 */
	private function _get_char_lib() {
		$clib = json_decode(file_get_contents('http:' . base_url('data/map.json')));
		foreach ($clib as &$c) {
			$c = new FullChar($c);
		}
		return $clib;
	}

	public function nensya() {
		$icon_url = $this->input->post('url');
		$id = $this->input->post('id');
		$img_char_num = $this->input->post('size') ? : IMG_CHAR_NUM;
		$size = $img_char_num * IMG_SPLIT;

		/* 縮小白黒画像の生成 */
		$img = imagecreatefromex($icon_url); // image生成
		$img_resize = imagecreatetruecolor($size, $size);

		$alpha = imagecolortransparent($img); // 透過色の取得
		imagefill($img_resize, 0, 0, $alpha);
		imagecolortransparent($img_resize, $alpha);
		imagecopyresampled($img_resize, $img, 0, 0, 0, 0, $size, $size, imagesx($img), imagesy($img));
		imagefilter($img_resize, IMG_FILTER_GRAYSCALE);

		/* 文字列マップ辞書の用意 */
		$clib = $this->_get_char_lib();

		$res = $this->_mapping_char($img_resize, $clib);
		$text = chars_to_text($res);
		$this->load->view('nensyaresultxml', array('text' => $text, 'id' => $id));
	}

	private function _get_match_char(array $map, array $clib) {
		$min = NULL;
		$res = NULL;
		$avg = floor(array_sum($map) / count($map));
		if ($avg < 114) {
			$avg = 114;
		}
		foreach ($clib as $c) {
			$val = $c->evalute_similarity($map, $avg);
			if ($val === TRUE) {
				break;
			} elseif ($val === FALSE) {
				continue;
			}
			if (!isset($min) || $min > $val) {
				$min = $val;
				$res = $c->char;
			}
		}
		return $res;
	}

	private function _mapping_char($img, $clib) {
		$res = array();
		for ($j = 0; $j < imagesy($img); $j+= IMG_SPLIT) {
			$res[$j] = array();
			for ($i = 0; $i < imagesx($img); $i+= IMG_SPLIT) {
				$map = array();
				for ($k = 0; $k < IMG_SPLIT; $k++) {
					for ($l = 0; $l < IMG_SPLIT; $l++) {
						$map[] = imagecolorat($img, $i + $l, $j + $k) >> 16;
					}
				}
// 前回と類似のmap
				if (!empty($map_pre) && calc_similarity($map, $map_pre) < 10) {
					$res[$j][$i] = $char_pre;
				} else {
					$char_pre = $res[$j][$i] = $this->_get_match_char($map, $clib);
				}
				$map_pre = $map;
			}
		}
		return $res;
	}

	private function _get_messages() {
		$messages = array();
		if (($err = $this->session->userdata('err'))) {
			$this->session->unset_userdata('err');
			$messages[] = $err;
		}
		if (($posted = $this->session->userdata('posted'))) {
			$this->session->unset_userdata('posted');
			$messages[] = $posted;
		}
		return $messages;
	}

}

class FullChar {

	public $char;
	public $map;
	public $avg;

	public function __construct(stdclass $obj) {
		$this->char = $obj->char;
		$this->map = $obj->map;
		$this->avg = $obj->avg;
	}

	public function get_char() {
		return $this->char;
	}

	public function evalute_similarity(array $map, $avg) {
		if (IMG_AVG_DIFF < abs($d = ($this->avg - $avg))) {
			return $d < 0;
		}
		return calc_similarity($map, $this->map);
	}

}
