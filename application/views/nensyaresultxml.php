<?php
/* @var $text string */
/* @var $id string */
header("Content-type: application/xml");
echo '<?xml version="1.0" encoding="UTF-8" ?> ' . "\n";
?><rss>
	<item>
		<text><?= str_replace("\n", ",", $text) ?></text>
		<id><?= $id ?></id>
	</item>
</rss>