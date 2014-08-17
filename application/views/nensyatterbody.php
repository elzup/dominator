<?php
/* @var $user UserObj */
/* @var $icon_url string */
/* @var $nensya_url string */
/* @var $nensya_sn string */
?>

<div class="row">
	<div class="col-lg-offset-2 col-lg-8">
		<h1>念写った〜</h1>
		<?php if (!$user) { ?>
			<!--非ログインユーザ-->
			<a <?= attr_href(PATH_LOGIN . MODE_NENSYATTER) ?> class="btn btn-info btn-block btn-lg"><?= tag_icon(ICON_TWITTER) ?>Twitterでログイン</a>

		<?php } else { ?>
			<?php if (!empty($nensya_url)) { ?>
				<span>@<?= $nensya_sn ?></span>の念写
				<img src="<?= $icon_url ?>" alt="">
				<div class="row">
					<div class="col-md-5">
						<label for="result" class="control-label">念写中(small 100文字)</label>
						<div class="loading" for="result">
							<img src="<?= base_url(PATH_IMG_LOADING) ?>" alt="生成中...">
						</div>
						<div id="result" class="nensya" size="10" url="<?= $nensya_url ?>" style="display: none"> </div>
					</div>
					<div class="col-md-7">
						<label for="result-b" class="control-label">念写中(big 576文字)</label>
						<div class="loading" for="result-b">
							<img src="<?= base_url(PATH_IMG_LOADING) ?>" alt="生成中...">
						</div>
						<div id="result-b" class="nensya" size="24" url="<?= $nensya_url ?>" style="display: none"> </div>
					</div>
				</div>
				<form action="<?= base_url(MODE_NENSYATTER . "/post") ?>" class="form-horizontal" method="POST">
					<div class="form-group">
						<div class="col-lg-10 col-lg-offset-1">
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
					<div class="col-md-8">
						<label for="sn" class="control-label">念写するTwitterID</label>
						@<input type="text" name="sn" class="check-input" />
					</div>
					<div class="col-md-4">
						<button type="submit" class="btn btn-lg btn-primary btn-block">念写する</button>
					</div>
				</div>
				<div class="form-group">
				</div>
			</form>
			<?php if ($user && (!isset($nensya_sn) || $user->screen_name != $nensya_sn)) { ?>
				<a href="<?= base_url(MODE_NENSYATTER . '/sn/' . $user->screen_name) ?>">自分のアイコンを念写する</a>
			<?php } ?>

		<?php } ?>
	</div>
</div>
