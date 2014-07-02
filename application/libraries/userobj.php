<?php

class Userobj
{

	public $twitter_connection;
	public $id_twitter;
	public $screen_name;
	public $img;

	function __construct($c = NULL, $id_twitter = NULL, $screen_name = NULL, $img = NULL)
	{
		$this->twitter_connection = $c;
		$this->id_twitter = $id_twitter;
		$this->screen_name = $screen_name;
		$this->img = $img;
	}

	public function post($text)
	{
		$data = array(
				'status' => $text,
		);
		
		return $this->twitter_connection->post('statuses/update', $data);
	}

}
