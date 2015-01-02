<?php

class Yopparatter extends CI_Controller
{

	/** @var User_model */
	public $user;

	public function __construct()
	{
		parent::__construct();
		$this->load->model('User_model', 'user');
		$this->user->set_check_login(MODE_YOPPARATTER);
	}

	public function index()
	{
		$user = $this->user->get_user();
		$meta = new Metaobj();
		$meta->setup_yopparatter();
		$this->load->view('head', array('meta' => $meta, 'bootstrap_url' => PATH_LIB_BOOTSTRAP_CSS2));
		$messages = array();
		if (($err = $this->session->userdata('err')))
		{
			$this->session->unset_userdata('err');
			$messages[] = $err;
		}
		if (($posted = $this->session->userdata('posted')))
		{
			$this->session->unset_userdata('posted');
			$messages[] = $posted;
		}

		$this->load->view('navbar', array('meta' => $meta, 'user' => $user));
		$this->load->view('alert', array('messages' => $messages));
		$this->load->view('yopparatterform', array('token' => $this->_set_token(), 'is_login' => !!$user));
		$this->load->view('foot', array('meta' => $meta, 'jss' => array(MODE_YOPPARATTER . '_helper')));
	}

	public function post()
	{
		$this->user->set_check_login(MODE_YOPPARATTER);
		$user = $this->user->get_user();
		$text = $this->input->post('text');
		$level = $this->input->post('level');
		if ($level < 2)
		{
			$level = 50;
		}
		if (empty($text))
		{
			$this->session->set_userdata(array('err' => '本文が空です'));
			jump('./');
		}

		$isset_url = !!$this->input->post('set_url');
		$ycp = $this->config->item('YAHOO_APP');
        $yp_keys = $ycp[MODE_YOPPARATTER];
		$yopparai = new Yopparai($yp_keys, $text, $level);
		$tweet_text = $yopparai->get_text() . ' #yopparatter' . ($isset_url ? ' ' . substr(URL_YOPPARATTER, 2) : '');
		$res = $user->post($tweet_text);
		if (isset($res->errors))
		{
			$this->session->set_userdata(array('err' => 'エラーが出ました「' . $res->errors->message . '」'));
		} else
		{
			$this->session->set_userdata(array('posted' => 'ツイートしました！「' . $res->text . '」'));
		}
		jump('./');
	}

	private function _set_token()
	{
		$token = sha1(uniqid(mt_rand(), TRUE));
		$this->session->unset_userdata('token');
		$this->session->set_userdata(array('token' => $token));
		return $token;
	}

	private function _check_token($token = NULL)
	{
		$token = $token ? : filter_input(INPUT_POST, 'token');
		$token_c = $this->session->userdata('token');
		return !empty($token_c) && $token_c == $token;
	}

}
