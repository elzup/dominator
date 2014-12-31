<?php

class Index extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{

		$meta = new Metaobj();
		$meta->setup_top();
		$this->load->view('head', array('meta' => $meta, 'bootstrap_url' => PATH_LIB_BOOTSTRAP_CSS2));
		$this->load->view('toppage');
		$this->load->view('foot');
	}

}
