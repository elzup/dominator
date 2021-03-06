<?php
/* @var $meta Metaobj */
/* @var $jss string[] */
/* @var $redirect_url string */
?>
</div>
<div class="row">
    <!--TODO: create footer-->
    <div class="small-10 small-push-1 medium-10 medium-push-1 lumns">
        0 〜 99 健全な人間です<br>
        100 〜 299 危険人物です制圧して下さい<br>
        300 〜 速やかに排除して下さい
    </div>
</div>
</div>
<div id="footer">
    <hr class="foot-hr">
    <div class="container">
        <div class="row">
            <!--TODO: create footer-->
            <div class="small-12 medium-4 columns">
                <ul>
                    <?php
                    ?>
                    <?= sharebtn_twitter($meta->share_text, $meta->url) ?>
                    <li></li>
                </ul>
            </div>
            <div class="small-12 medium-4 columns">
                <h3><a href="http://elzup.com">elzup.com</a></h3>
                <ul class="">
                    <li><a href="<?= base_url() ?>"><?= NAME_PSYCHOPASS ?></a>
                    <li><a href="http://ierukana.elzup.com">言えるかな？</a>
                    <li><a href="http://areastress.cps.im.dendai.ac.jp/">東京エリアストレス</a>
                    <li><a href="http://app.elzup.com/<?= MODE_YOPPARATTER ?>"><?= NAME_YOPPARATTER ?></a>
                    <li><a href="http://app.elzup.com/<?= MODE_NENSYATTER ?>"><?= NAME_NENSYATTER ?></a>
                    <li><a href="http://app.elzup.com/<?= MODE_TOKIMIKUJI ?>"><?= NAME_TOKIMIKUJI ?></a>
                </ul>
            </div>
            <div class="small-12 col-sm-4">
                <ul>
                    <li><a <?= attr_href('//twitter.com/arzzup', NULL, FALSE) ?>>作者 @Arzzup</a></li>
                </ul>
            </div>
        </div>
    </div>

</div>
<!-- jQuery include -->
<script src="<?= URL_JQUERY ?>"></script>
<!-- zClip jQuery plugins -->

<!-- LESS include -->
<?= tag_script_js(base_url(PATH_LIB_LESS)); ?> 
<!-- LESS Twitter foundation include -->
<?= tag_script_js(base_url(PATH_LIB_FOUNDATION_JS)); ?> 
<!-- Incliude Twitter share button widgets -->
<?= tag_script_js(URL_TWITTER_WIDGETS); ?> 

<!-- js of act on all page-->
<?= tag_script_js(base_url(PATH_JS . '/helper.js')); ?>

<?= tag_script_js(base_url(PATH_LIB . '/bootstrap/js/bootstrap-slider.js')) ?>
<?php if (isset($redirect_url)) { ?>
    <script>
        $(function () {
            window.location = "<?= $redirect_url ?>";
        });
    </script>
<?php } ?>


<?php
if (!empty($jss)) {
    foreach ($jss as $js) {
        ?>
        <?= tag_script_js(base_url(PATH_JS . "/{$js}.js")); ?>
        <?php
    }
}
?>
</body>
</html>
