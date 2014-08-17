<?php

class Auth extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	function Index()
	{
		$this->start();
	}

	function login()
	{
		$this->start();
	}

	function start($mode = 'no')
	{
 		$this->session->set_userdata(array('referer' => $this->input->server('HTTP_REFERER')));
		$tcp = $this->config->item('TWITTER_CONSUMER');
		$twitter_config = $tcp[$mode];
		$this->session->set_userdata(array(
				'consumer_key' => $twitter_config['key'],
				'consumer_secret' => $twitter_config['secret'],
		));
		$callback_uri = base_url(PATH_AUTH_END . $mode);

		$connection = new TwitterOAuth($twitter_config['key'], $twitter_config['secret']);
		$request_token = $connection->getRequestToken($callback_uri);
		$token = $request_token['oauth_token'];
		$this->session->set_userdata(array(
				'oauth_token' => $token,
				'oauth_token_secret' => $request_token['oauth_token_secret'],
		));
		$auth_url = $connection->getAuthorizeURL($token);

		jump($auth_url);
	}

	function end($mode = "")
	{
		// TODO: lookup referer and check is come from api.twitter.com
		$connection = new TwitterOAuth(
				$this->session->userdata('consumer_key'), $this->session->userdata('consumer_secret'), $this->session->userdata('oauth_token'), $this->session->userdata('oauth_token_secret')
		);
		$access_token = $connection->getAccessToken($this->input->get('oauth_verifier'));
		$this->session->unset_userdata('oauth_token');
		$this->session->unset_userdata('oauth_token_secret');
		$this->session->set_userdata(array ('access_token_' . $mode => $access_token));
		$ref = $this->session->userdata('referer');
		$this->session->unset_userdata('referer');
		jump($ref ? : base_url($mode));
	}

	function logout($mode = "")
	{
		$ref = filter_input(INPUT_SERVER, 'HTTP_REFERER');
		$this->session->sess_destroy();

		jump($ref ? : base_url($mode));
	}

}
