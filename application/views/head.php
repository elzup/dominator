<?php
/* @var $meta Metaobj */
/* @var $bootstrap_url string */
/* @var $main_css string */
?>

<!DOCTYPE HTML>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <title><?= $meta->get_title(TRUE) ?></title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href='<?= FONT_GOOGLE_ALDRICH ?>' rel='stylesheet' type='text/css'>

    <!-- Bootstrap -->
    <link rel="stylesheet" charset="UTF-8" href="<?= base_url(PATH_LIB_FOUNDATION_CSS) ?>" media="screen" />
    <link rel="stylesheet" charset="UTF-8" href="<?= base_url(PATH_STYLE . '/' . $main_css . '.css') ?>" media="screen" />
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
