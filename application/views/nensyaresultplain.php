<?php
/* @var $text string */
header("Content-type: text/plain; charset=utf-8");
echo str_replace(',', "\n", $text);