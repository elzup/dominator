<?php
/* @var $user Userinfoobj */
?>
<div class="row">
    <div class="small-11 small-centered medium-10 medium-push-1">
        <h1>@<?= $user->screen_name ?>のサイコパス</h1>
        <div class="row user-on">
            <div class="small-6 medium-4 columns">
                <img src="<?= $user->img_path ?>" alt="">
            </div>
            <div class="small-6 medium-8 columns">
                <p>
                    <a href="//twitter.com/<?= $user->screen_name ?>" target="_blank">@<?= $user->screen_name ?></a>
                </p>
                <p>
                    犯罪係数<span class="point"><?= $user->point ?></span><span class="col">■</span>
                </p>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="small-11 small-centered medium-10 medium-push-1">
        <form mehtod="GET" action="<?= base_url(MODE_PSYCHOPASS . '/') ?>">
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