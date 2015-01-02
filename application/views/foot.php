<?php 
/* @var $meta Metaobj */
/* @var $jss string[] */
$fr_js = PATH_LIB_BOOTSTRAP_JS;
if (isset($is_foundationl)) {
    $fr_js = PATH_LIB_FOUNDATION_JS;
}
?>
</div>
</div>
<div id="footer">
<hr class="foot-hr">
	<div class="container">
		<div class="row">
			<!--TODO: create footer-->
			<div class="col-sm-4">
				<ul>
					<?php
					?>
					<?= sharebtn_twitter($meta->share_text, $meta->url)?>
					<li></li>
				</ul>
			</div>
			<div class="col-sm-4">
				<h3><a href="http://elzup.com">elzup.com</a></h3>
				<ul class="">
					<li><a href="http://areastress.cps.im.dendai.ac.jp/">東京エリアストレス</a>
					<li><a href="<?= base_url(MODE_PSYCHOPASS)?>"><?= NAME_PSYCHOPASS ?></a>
					<li><a href="http://ierukana.elzup.com">言えるかな？</a>
					<li><a href="<?= base_url(MODE_YOPPARATTER)?>"><?= NAME_YOPPARATTER ?></a>
					<li><a href="<?= base_url(MODE_NENSYATTER)?>"><?= NAME_NENSYATTER ?></a>
					<li><a href="<?= base_url(MODE_TOKIMIKUJI)?>"><?= NAME_TOKIMIKUJI ?></a>
				</ul>
			</div>
			<div class="col-sm-4">
				<ul>
					<li><a <?= attr_href('//twitter.com/arzzup', NULL, FALSE) ?>>作者 @Arzzup</a></li>
				</ul>
			</div>
		</div>
	</div>

</div>
<!-- jQuery include -->
<script src="<?= URL_JQUERY ?>"></script>
<!-- zClip jQuery plugins -->

<!-- LESS include -->
<?= tag_script_js(base_url(PATH_LIB_LESS)); ?> 
<!-- LESS Twitter bootstrap include -->
<?= tag_script_js(base_url($fr_js)); ?> 
<!-- Incliude Twitter share button widgets -->
<?= tag_script_js(URL_TWITTER_WIDGETS); ?> 

<!-- js of act on all page-->
<?= tag_script_js(base_url(PATH_JS.'/helper.js')); ?>

<?= tag_script_js(base_url(PATH_LIB. '/bootstrap/js/bootstrap-slider.js'))?>

<?php
if (!empty($jss))
{
	foreach ($jss as $js)
	{
		?>
		<?= tag_script_js(base_url(PATH_JS . "/{$js}.js")); ?>
		<?php
	}
}
?>
</body>
</html>
