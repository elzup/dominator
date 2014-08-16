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
		if (empty($sn) || !$user) {
			redirect('http://' . base_url(MODE_NENSYATTER));
		}
		$icon_url = $user->get_image($sn);
		$meta = new Metaobj();
		$meta->setup_nensyatter();
		$messages = $this->_get_messages();

		$nensya_result = '結果あり';
		$this->_nensya($icon_url);

		$this->load->view('head', array('meta' => $meta, 'bootstrap_url' => PATH_LIB_BOOTSTRAP_CSS2));
		$this->load->view('navbar', array('meta' => $meta, 'user' => $user));
		$this->load->view('alert', array('messages' => $messages));
		$this->load->view('nensyatterbody', array('user' => $user, 'nensya_result' => $nensya_result, 'icon_url' => $icon_url));
		$this->load->view('foot');
	}

	private function _nensya($icon_url) {
		$colors = $this->_get_colormaps($icon_url);
		var_dump($colors);
		count($colors);
	}

	private function _get_colormaps($icon_url) {
		$pal = new GetMostCommonColors();
		$pal->image = $icon_url;
		return $pal->Get_Color();
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
