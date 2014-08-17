<?php 
/* @var $meta Metaobj */
?>
</div>
</div>
<div id="footer">
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
				<h3><a href="<?= base_url()?>">app.elzup.com</a></h3>
				<ul>
					<li><a href="<?= base_url(MODE_YOPPARATTER)?>">よっぱらった〜</a>
					<li><a href="<?= base_url(MODE_NENSYATTER)?>">念写った〜</a>
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
<?= tag_script_js(base_url(PATH_LIB_BOOTSTRAP_JS)); ?> 
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
		<script src="<?= base_url(PATH_JS . "/{$js}.js") ?>" type="text/javascript"></script>
		<?= tag_script_js(PATH_JS . 'hoge'); ?>
		<?php
	}
}
?>
</body>
</html>
