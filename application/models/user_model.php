<?php

class User_model extends CI_Model
{

	private $is_login;
	public $user = NULL;

	public function __construct()
	{
		parent::__construct();
	}

	public function set_check_login($mode) {
		$this->is_login = $this->check_login($mode);
	}

	public function is_login()
	{
		return $this->is_login;
	}

	/**
	 * 
	 * @return Userobj
	 */
	public function get_user()
	{
		return $this->is_login ? $this->user : NULL;
	}

	public function check_login($mode = 'no')
	{
		echo '<pre>';
		$tcp = $this->config->item('TWITTER_CONSUMER');
		$twitter_config = $tcp[$mode];

		var_dump($this->session->all_userdata());
		echo $serial = @$this->session->userdata('userserial');
		if (!empty($serial))
		{
			$this->user = unserialize($serial);
			return TRUE;
		}

		$access_token = @$this->session->userdata('access_token');
		if (empty($access_token['oauth_token']))
		{
			return FALSE;
		}
		$connection = new TwitterOAuth($twitter_config['key'], $twitter_config['secret'], $access_token['oauth_token'], $access_token['oauth_token_secret']);
		$id_twitter = $access_token['user_id'];
		$screen_name = $access_token['screen_name'];
		$result = $connection->get('account/verify_credentials');
		var_dump($result);
		$img_url = $result->profile_image_url;
		echo 'image_get';
		$this->user = new Userobj($connection, $id_twitter, $screen_name, $img_url);
//		$this->session->set_userdata('userserial', serialize($this->user));
		$this->session->set_userdata(array('hogehoge' => "this is test hoge."));
		var_dump($this->session->all_userdata());
		return TRUE;
	}

}
