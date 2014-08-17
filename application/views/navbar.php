<?php
/* @var $user Userobj */
/* @var $meta Metaobj */
$user;
if ($user == null)
{
	$user = false;
}

$is_pc = is_pc_viewport($this->input->server('HTTP_USER_AGENT'));

?>
<nav class="navbar navbar-default" id="navbar">
	<div class="navbar-header">
		<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-categlyes">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>

		<div class="navbar-brand"><a href="<?= $meta->url ?>"><?= $meta->get_title() ?></a></div>
		<!--<a href="" class="navbar-brand">投票メーカー</a>-->
	</div>
	<div class="navbar-collapse collapse navbar-categlyes">
		<ul class="nav navbar-nav navbar-right">
			<?php
			if (empty($user))
			{
				?>
				<li>
					<a <?= attr_href(PATH_LOGIN . $meta->mode) ?>><?= tag_icon(ICON_TWITTER) ?>Twitterでログイン</a>
				</li>
				<?php
			} else
			{
				?>
				<li>
					<img src="<?= $user->img_url ?>" alt="アイコン">
				</li>
				<li>
					<a <?= attr_href('//twitter.com/' . $user->screen_name, NULL, FALSE) ?>><?= $user->screen_name ?></a>
				</li>
				<li>
					<a <?= attr_href(PATH_LOGOUT . $meta->mode) ?>>ログアウトする</a>
				</li>
			<?php } ?>

		</ul>
	</div>
</nav>


<div class="container">