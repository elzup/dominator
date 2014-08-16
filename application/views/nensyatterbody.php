<?php
/* @var $user UserObj */
/* @var $icon_url string */
/* @var $nensya_result string */
?>

<div class="row">
	<div class="col-lg-offset-2 col-lg-8">
		<h1>念写った〜</h1>
		<?php if (!$user) { ?>
		<!--非ログインユーザ-->
		<a <?= attr_href(PATH_LOGIN . MODE_NENSYATTER) ?> class="btn btn-info btn-block btn-lg"><?= tag_icon(ICON_TWITTER) ?>Twitterでログイン</a>
		TODO: remove 非ログインユーザです

		<?php } else { ?>
			<?php if (!empty($nensya_result)) { ?>
		<img src="<?= $icon_url ?>" alt="">
				<form action="<?= base_url(MODE_NENSYATTER . "/post") ?>" class="form-horizontal" method="POST">
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-1">
							<div class="result">
								<?= str_replace("\n", '<br />', $nensya_result) ?>
							</div>
							<label for="textArea" class="control-label">念写結果</label>
							<textarea class="form-control" <?= $user ? '' : 'disabled' ?> name="text" rows="3" id="textArea"><?= $nensya_result ?>
							</textarea>
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
							<!-- TODO: to tweet button -->

							<button type="submit" class="btn btn-lg btn-primary btn-block">ツイートする</button>
						</div>
					</div>
				</form>
			<?php } ?>
			<form action="<?= base_url(MODE_NENSYATTER . "/sn") ?>" class="form-horizontal" method="POST">
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-1">
						<label for="sn" class="control-label">念写するTwitterID</label>
						@<input type="text" name="sn" class="check-input" />
					</div>
				</div>
				<div class="form-group">
					<div class="col-lg-10 col-lg-offset-1">
						<button type="submit" class="btn btn-lg btn-primary btn-block">念写する</button>
					</div>
				</div>
			</form>

		<?php } ?>
	</div>
</div>
