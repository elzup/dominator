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

<nav class="top-bar" data-topbar role="navigation">
    <ul class="title-area">
        <li class="name">
            <div class="navbar-brand">
                <h1><a href="<?= $meta->url ?>"><?= $meta->get_title() ?></a></h1>
            </div>
        </li>
        <!-- Remove the class "menu-icon" to get rid of menu icon. Take out "Menu" to just have icon alone -->
        <li class="toggle-topbar menu-icon">
            <a href="#"><span>Menu</span></a>
        </li> 
    </ul>
    <section class="top-bar-section">
        <!-- Right Nav Section -->
        <ul class="right">
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
    </section>
</nav>

<div class="container">