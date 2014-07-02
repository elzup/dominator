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
		$this->load->view('head', array ('meta' => $meta));
		?>
<div class="wrapper" style="margin-top: 20px">準備中...</div>
		<?php
		$this->load->view('foot');
	}

}
