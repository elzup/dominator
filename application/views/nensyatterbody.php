<?php
/* @var $user UserObj */
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
				<img src="<?= $nensya_url ?>" alt="">
				<div class="row nensyas">
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
				<div class="row">
					<div class="col-md-5">
						<label class="control-label">カスタム念写</label>
						１辺<input id="custom-nensya-num" type="number" max="30" min="1" value="20" />文字
						<input class="btn btn-success" type="button" id="custom-nensya" sn="<?= $nensya_sn ?>" value="念写">
					</div>
				</div>

				<div class="row btn-box">
					<div class="col-lg-10 col-lg-offset-1">
						<?php
						$text = "{text}念写った〜 " . URL_SHARE_URL . $nensya_sn;
						?>
						<a id="share-btn-main" class="btn btn-primary btn-lg btn-block" href="<?= generate_share_url_twitter(URL_SHARE_URL . $nensya_sn, $text) ?>" target="_blank" style="display:none">ツイートする</a>
					</div>
				</div>
			<?php } ?>
			<?php if ($user && (!isset($nensya_sn) || $user->screen_name != $nensya_sn)) { ?>
				<a class="btn btn-primary" href="<?= base_url(MODE_NENSYATTER . '/sn/' . $user->screen_name) ?>">自分のアイコンを念写する</a>
			<?php } ?>
			<form action="http:<?= base_url(MODE_NENSYATTER . "/sn") ?>" class="form-horizontal" method="POST">
				<div class="form-group">
					<div class="col-md-8">
						<label for="sn" class="control-label">念写するTwitterID</label>
						@<input id="twitter-id-box" type="text" name="sn" class="check-input" />
					</div>
					<div class="col-md-4">
						<button type="submit" class="btn btn-primary">念写する</button>
					</div>
				</div>
				<div class="form-group">
				</div>
			</form>

		<?php } ?>
	</div>
</div>
