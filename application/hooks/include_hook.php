<?php

if (!defined('BASEPATH'))
	exit('No direct script access allowed');

class Include_hook
{

	function index()
	{
		define('LIBPATH', 'lib/');
		include_once(FCPATH . LIBPATH . 'twitteroauth.php');
		include_once(FCPATH . LIBPATH . 'TwistOAuth.php');
		include_once(FCPATH . LIBPATH . 'colors.inc.php');
		include_once(FCPATH . LIBPATH . 'Igo.php');
	}

}
