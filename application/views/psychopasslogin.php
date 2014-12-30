<?php
/* @var $users Userinfoobj[] */

?>
    
<div class="small-4 small-centered columns">
    <img class="eyecatch" src="<?= base_url(PATH_IMG . '/wc.png')?>" alt="">
</div>
<div class="small-10 small-centered columns">
    <p>
        Twitterユーザのサイコパスを確認できます<br>
        Twitter認証によって勝手につぶやくことはありません
    </p>
    <a <?= attr_href(PATH_LOGIN . MODE_PSYCHOPASS) ?> class="button expand">Twitter認証</a>
</div>