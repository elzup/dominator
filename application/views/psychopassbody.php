<?php
/* @var $users Userinfoobj[] */

function user_box(Userinfoobj $user) {
    ?>
    <div class="user level-<?= $user->get_point_level() ?>">
        <a href="<?= base_url(MODE_PSYCHOPASS . '/' . $user->screen_name) ?>">
            <img src="<?= $user->img_path ?>" alt="">
            <span class="button small right">執行</span>
        </a>
        <ul>
            <!--<li class="name"><?= h($user->name) ?></li>-->
            <li class="screenname"><a href="//twitter.com/<?= $user->screen_name ?>" target="_blank">@<?= $user->screen_name ?></a></li>
            <li class="point">犯罪係数<span class="point" data-sync-point="<?= $user->user_id ?>"><img class="loading" src="<?= base_url(PATH_IMG . '/loading.gif') ?>" alt=""></span></li>
        </ul>
    </div>

    <?php
}
?>
<div class="row">
    <div class="small-11 small-centered medium-10 medium-push-1">
        <form mehtod="GET" action="<?= base_url(MODE_PSYCHOPASS . '/' . PATH_P) ?>">
            <div class="row">
                <div class="medium-8 columns">
                    <label>ユーザID
                        <input type="text" placeholder="@arzzup" name="sn">
                    </label>
                </div>
                <div class="medium-4 columns">
                    <input class="button small" type="submit" value="ドミネーターを向ける">
                </div>
            </div>
        </form>
    </div>
</div>
<div class="row">
    <div class="small-11 small-centered medium-10 medium-push-1">
        <h3>現在のあなたのTLにいるフレンド</h3>
        <ul class="small-block-grid-2 medium-block-grid-4">
            <?php
            foreach ($users as $user) {
                echo '<li>';
                user_box($user);
                echo '</li>';
            }
            ?>
    </div>
</div>