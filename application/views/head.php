<?php
/* @var $meta Metaobj */
/* @var $bootstrap_url string */
if (empty($bootstrap_url))
{
	$bootstrap_url = PATH_LIB_BOOTSTRAP_CSS;
}
?>

<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <title><?= $meta->get_title(TRUE) ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='<?= FONT_GOOGLE_ALDRICH ?>' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?= URL_YAHOO_RESET_CSS ?>">

    <!-- Bootstrap -->
    <link rel="stylesheet" charset="UTF-8" href="<?= base_url($bootstrap_url) ?>" media="screen" />
    <link rel="stylesheet" charset="UTF-8" href="<?= base_url(PATH_LIB . '/bootstrap/css/font-awesome.min.css') ?>" media="screen" />
    <link rel="stylesheet" charset="UTF-8" href="<?= base_url(PATH_LIB . '/bootstrap/css/bootstrap-slider.css') ?>" media="screen" />
    <link rel="stylesheet/less" charset="UTF-8" type="text/css" href="<?= base_url(PATH_STYLE . '/main.less') ?>" media="screen">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]> <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script> <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script> <![endif]-->

		<?php $this->load->view('meta', array('meta' => $meta)) ?>

  </head>
	<body>
		<?php
		if (ENVIRONMENT !== 'development')
		{
			include_once(PATH_GOOGLE_ANALYTICS);
		}
		?>
    <div id="wrapper">
