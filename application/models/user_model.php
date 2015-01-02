<?php

class User_model extends CI_Model {

	private $is_login;
	public $user = NULL;

	public function __construct() {
		parent::__construct();
	}

	public function set_check_login($mode) {
		$this->is_login = $this->check_login($mode);
	}

	public function is_login() {
		return $this->is_login;
	}

	/**
	 * 
	 * @return Userobj
	 */
	public function get_user() {
		return $this->is_login ? $this->user : NULL;
	}

	public function check_login($mode = 'no') {
		$tcp = $this->config->item('TWITTER_CONSUMER');
		$twitter_config = @$tcp[$mode];

		$access_token = @$this->session->userdata('access_token_' . $mode);
		if (empty($access_token['oauth_token'])) {
			return FALSE;
		}

		$connection = new TwitterOAuth($twitter_config['key'], $twitter_config['secret'], $access_token['oauth_token'], $access_token['oauth_token_secret']);
        $connection->host = "https://api.twitter.com/1.1/";
		$id_twitter = $access_token['user_id'];
		$screen_name = $access_token['screen_name'];
		$img_url = @$this->session->userdata('img_url');
		if (empty($img_url)) {
			$result = $connection->get('account/verify_credentials');
			$img_url = @$result->profile_image_url;
			$this->session->set_userdata('img_url', $img_url);
		}

		$this->user = new Userobj($connection, $id_twitter, $screen_name, $img_url);
		return TRUE;
	}

}
