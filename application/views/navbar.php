<?php
/* @var $user Userobj */
$user;
if ($user == null)
{
	$user = false;
}

$is_pc = is_pc_viewport($this->input->server('HTTP_USER_AGENT'));

?>
<nav class="navbar navbar-default<?=($is_pc ? ' navbar-fixed-top' : '')?>" id="navbar">
	<div class="navbar-header">
		<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-categlyes">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

		<div class="navbar-brand"><a <?= attr_href('') ?>>投票メーカー</a></div>
		<!--<a href="" class="navbar-brand">投票メーカー</a>-->
	</div>
	<div class="navbar-collapse collapse navbar-categlyes">
		<ul class="nav navbar-nav navbar-right">
			<li> <a <?= attr_href(HREF_TYPE_MAKE) ?>><?= tag_icon(ICON_MAKE) ?>作成</a> </li>
			<li> <a <?= attr_href(HREF_TYPE_NEW) ?>><?= tag_icon(ICON_NEW) ?>新着</a> </li>
			<li> <a <?= attr_href(HREF_TYPE_HOT) ?>><?= tag_icon(ICON_HOT) ?>人気</a> </li>
			<?php
			if (!$user->is_guest)
			{
				?>
				<li>
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="login-info"><?= tag_icon(ICON_USER) ?>
						<span class="hidden-xs"><?= $user->screen_name ?> </span>
						<span class="caret"></span>
					</a>
					<ul class="dropdown-menu" aria-labelledby="login-info">
						<li><a <?= attr_href(HREF_TYPE_MYPAGE) ?>><?= tag_icon(ICON_HOME) ?>マイページ</a></li>
						<li><a <?= attr_href(HREF_TYPE_LOGOUT) ?>><?= tag_icon(ICON_LOGOUT) ?>ログアウト</a> </li>
					</ul>
				</li>
				<?php
			} else
			{
				?>
				<li>
					<a class="dropdown-toggle" data-toggle="dropdown" href="#" id="login-info"><!--<?= tag_icon(ICON_LOGIN) ?>-->ログイン<span class="caret"></span></a>
					<ul class="dropdown-menu" aria-labelledby="login-info">
						<li>
							<a <?= attr_href(HREF_TYPE_LOGIN) ?>><?= tag_icon(ICON_TWITTER) ?>Twitter</a>
						</li>
					</ul>
				</li>
			<?php } ?>

		</ul>
	</div>
</nav>

<div class="container">