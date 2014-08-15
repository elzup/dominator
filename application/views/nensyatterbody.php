<?php
/* @var $user UserObj */
/* @var $token string */
/* @var $nensya_result string */
?>

<div class="row">
	<div class="col-lg-offset-2 col-lg-8">
		<h1>念写った〜</h1>
		<form action="<?= base_url(MODE_YOPPARATTER . "/nensya") ?>" class="form-horizontal" method="POST">
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-1">
					<label for="screen_name" class="control-label">念写するTwitterID</label>
					@<input type="text" name="screen_name" />
				</div>
			</div>
			<div class="form-group">
				<div class="col-lg-10 col-lg-offset-1">
					<input type="hidden" name="token" value="<?= $token ?>" />
					<button type="submit" class="btn btn-lg btn-primary btn-block">念写する</button>
				</div>
			</div>
		</form>

		<?php if (!empty($nensya_result)) { ?>
			<form action="<?= base_url(MODE_YOPPARATTER . "/post") ?>" class="form-horizontal" method="POST">
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-1">
						<label for="textArea" class="control-label">念写結果</label>
						<textarea class="form-control" <?= $user ? '' : 'disabled' ?> name="text" rows="3" id="textArea"></textarea>
						<div class="row">
							<div class="col-sm-6">
								<span class="help-block">#nensyatterタグが付きます</span>
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
						if ($user) {
							?>
							<input type="hidden" name="token" value="<?= $token ?>" />
							<button type="submit" class="btn btn-lg btn-primary btn-block">ツイートする</button>
							<?php
						} else {
							?>
							<button type="submit" class="btn btn-lg btn-primary btn-block" disabled="">ツイートする</button>
							<a <?= attr_href(PATH_LOGIN . 'yp') ?> class="btn btn-info btn-block btn-lg"><?= tag_icon(ICON_TWITTER) ?>Twitterでログイン</a>
						<?php } ?>
					</div>
				</div>
			</form>
		<?php } ?>
	</div>
</div>
