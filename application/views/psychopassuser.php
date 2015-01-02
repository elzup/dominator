<?php
/* @var $user Userinfoobj */
?>
<div class="row">
    <div class="small-11 small-centered medium-10 medium-push-1">
        <h1>@<?= $user->screen_name ?>のサイコパス</h1>
        <div class="row user-on">
            <div class="small-4 medium-3 columns">
                <img src="<?= $user->img_path ?>" alt="">
                <p>
                    <a href="//twitter.com/<?= $user->screen_name ?>" target="_blank">@<?= $user->screen_name ?></a>
                </p>
            </div>
            <div class="small-4 medium-6 columns">
                <p>
                    犯罪係数<span class="point"><?= $user->score ?></span>
                </p>
                <p>
                    最高犯罪係数<?= $user->max_score ?>
                </p>
                <div class="color" style="background: url(<?= base_url("./images/color.png") ?>) <?= floor($user->score / 10) ?>% 0;"></div>
            </div>
            <div class="small-4 medium-3 columns">
                <!--TODO:-->
                <a href="<?= generate_share_url_twitter(current_url(), generate_dominator_text($user->score, $user->screen_name)) ?>" class="button large">執行する(ツイート)</a>
            </div>
        </div>
    </div>
</div>
<?php $this->load->view('psychopassform'); ?>