<?php
/** @var $token string */
/** @var $is_login boolean */
$l = array('development' => '//localhost/elzup/htdocs/yopparatter/post', 'testing' => YOPPARATTER_URL_POST, 'production' => YOPPARATTER_URL_POST);
$post_url = $l[ENVIRONMENT];
?>

<div class="row">
	<div class="col-lg-offset-2 col-lg-8">
		<h1>ヨッパラッタ～</h1>
		<form action="<?= $post_url ?>" class="form-horizontal" method="POST">

			<div class="form-group slidebar-div">
				<div class="row">
					<div class="col-xs-2 col-img">
						<img src="<?= base_url(PATH_IMG . '/yo/yo2.png') ?>" alt="" />
					</div>
					<div class="col-xs-8">
						<input type="text" id="yoi-level" name="level" class="slider" value="50" data-slider-value="50" data-slider-max="100" data-slider-min="2" style="width: 100% !important;" />
					</div>
					<div class="col-xs-2 col-img">
						<img src="<?= base_url(PATH_IMG . '/yo/yo1.png') ?>" alt="" />
					</div>
				</div>
				<span class="help-block">酔っぱらい度:<span id="yoi-num">50</span></span>
			</div>
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-1">
					<label for="textArea" class="control-label">ひょんぶん</label>
					<textarea class="form-control" <?= $is_login ? '' : 'disabled' ?> name="text" rows="3" id="textArea"></textarea>
					<div class="row">
						<div class="col-sm-6">
							<span class="help-block">#yopparatterタグが付きます</span>
						</div>
						<div class="col-sm-6">
							<div class="checkbox">
								<label>
									<input type="checkbox" name="set_url" checked="">URLつける
								</label>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-1">
					<?php
					if ($is_login)
					{
						?>
						<input type="hidden" name="token" value="<?= $token ?>" />
						<button type="submit" class="btn btn-lg btn-primary btn-block">ツイートする</button>
					<?php
					} else
					{
						?>
						<button type="submit" class="btn btn-lg btn-primary btn-block" disabled="">ツイートする</button>
						<a <?= attr_href(PATH_LOGIN_Y) ?> class="btn btn-info btn-block btn-lg"><?= tag_icon(ICON_TWITTER) ?>Twitterでログイン</a>
<?php } ?>
				</div>
			</div>
		</form>

	</div>
</div>
