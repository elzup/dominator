<?php
/* @var $meta Metaobj */

if (!$meta->no_meta)
{
	?>

	<meta name="keywords" content="<?= $meta->get_keywords_text() ?>">
	<meta name="description" content="<?= $meta->description ?>">

	<?php
	if (!$meta->no_og)
	{
		?>
	<meta property="og:title" content="<?= $meta->get_title(TRUE) ?>">
	<meta property="og:type" content="<?= $meta->get_type() ?>">
	<meta property="og:url" content="<?= $meta->url ?>">
	<!--meta property="og:image" content=""-->
	<meta property="og:site_name" content="<?= SITE_NAME ?>">
	<meta property="og:description" content="<?= $meta->description ?>">
	<meta property="og:locale" content="ja_JP">
		<?php
	}
}
