
<!doctype html>
<meta charset="UTF-8" />
<title>時みくじ</title>
<link rel="stylesheet" charset="UTF-8" href="<?= base_url(PATH_LIB_BOOTSTRAP_CSS) ?>" media="screen" />
<link rel="stylesheet" charset="UTF-8" href="<?= base_url(PATH_STYLE . '/tokimikuji.css') ?>" media="screen" />

<div class="navbar navbar-default navbar-fixed-top">
	<div class="container">
		<div class="navbar-header">
			<a class="navbar-brand" href="<?= base_url() ?>"><?= SITE_NAME ?></a>
		</div>
	</div>
</div>

<div class="container" id="content-main">
	<div class="row">
		<div class="col-lg-12">
			<div class="container col-lg-12 top-div">
				<h1>時みくじ</h1>
				<p>あなたの2014年の運勢を「時」で試します</p>
			</div>

			<div class="row">
				<div class="container col-lg-5" id="button-div">
					<button type="button" typed="w" class="btn-draw btn-lg btn btn-success">健康運</button>
					<button type="button" typed="m" class="btn-draw btn-lg btn btn-warning">&nbsp;金運&nbsp;</button>
					<button type="button" typed="l" class="btn-draw btn-lg btn btn-danger">恋愛運</button>
				</div>
				<div class="container col-lg-4" id="timer-div">
					<span id="timer-span"></span><span id="timer-m-span"></span>
				</div>
			</div>
			<div class="row">
				<?php
				$mikujiw = new stdClass();
				$mikujiw->csstype = 'success';
				$mikujiw->type = 'w';
				$mikujiw->name = '健康運';

				$mikujim = new stdClass();
				$mikujim->csstype = 'warning';
				$mikujim->type = 'm';
				$mikujim->name = '金運';

				$mikujil = new stdClass();
				$mikujil->csstype = 'danger';
				$mikujil->type = 'l';
				$mikujil->name = '恋愛運';
				foreach (array($mikujiw, $mikujim, $mikujil) as $mikuji) {
					?>
					<div class="col-lg-3 panel panel-<?= $mikuji->csstype ?>" id="result-<?= $mikuji->type ?>-div">
						<div class="panel-heading">
							<h3 class="panel-title"><?= $mikuji->name ?></h3>
						</div>
						<div class="panel-body">
							<p>
								<span class="msec"></span> <br /> <span class="rank"></span> <br />
							</p>
						</div>
					</div>
					<?php
				}
				?>
			</div>
			<div class="container" id="tweet-button-div">
				<button type="button" id="tweet-button" class="btn-draw btn btn-primary">Tweetする</button>
			</div>
			<div class="container col-lg-7" id="rank-discription-div">
				<p>大大吉：00,01,8,99,77</p>
				<p>大吉：10,20,30,40,50,60,70,80,90</p>
				<p>中吉：残りの3の倍数</p>
				<p>小吉：残りの2の倍数</p>
				<p>末吉：残りの50以下</p>
				<p>末吉：その他</p>
			</div>
		</div>
	</div>
</div>

<!-- jQuery include -->
<script src="<?= URL_JQUERY ?>"></script>
<?= tag_script_js(base_url(PATH_JS . "/tokimikuji.js")); ?>