<?php

class Userobj
{

	public $twitter_connection;
	public $id_twitter;
	public $screen_name;
	public $img_url;

	function __construct($c = NULL, $id_twitter = NULL, $screen_name = NULL, $img = NULL)
	{
		$this->twitter_connection = $c;
		$this->id_twitter = $id_twitter;
		$this->screen_name = $screen_name;
		$this->img_url = $img;
	}

	public function post($text)
	{
		$data = array(
				'status' => $text,
		);
		
		return $this->twitter_connection->post('statuses/update', $data);
	}

	public function get_image($sn = '')
	{
		if (empty($sn)) {
			return $this->img_url;
		}
//		$data = array(
//				'status' => $text,
//		);
//		
//		return $this->twitter_connection->post('statuses/update', $data);
	}
}
