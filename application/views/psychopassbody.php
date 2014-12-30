<?php
/* @var $users Userinfoobj[] */

function user_box(Userinfoobj $user) {
    ?>
    <div class="user">
        <img src="<?= $user->img_path ?>" alt="">
        <ul>
            <li class="name"><?= $user->name ?></li>
            <li class="screenname">@<?= $user->screen_name ?></li>
            <li class="point">犯罪係数<?= $user->point ?></li>
        </ul>
    </div>
    <?php
}
?>

現在のあなたのTLにいるフレンド
<?php
foreach ($users as $user) {
    user_box($user);
}