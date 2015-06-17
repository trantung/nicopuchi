<?php
/**
 * 固定ページ基本
 */
?>



<div id="contents">
    <?php my_breadcrumbs(); ?>
    <div class="module-type01 bg-type02 inner15">
        <?php if (have_posts()) : ?>
        <?php the_post(); ?>
        <div class="module-head">
            <h2 class="tx_c inner15"><img src="/common/img/pc/10/ttl.png" alt="お問い合わせ" width="164" height="18"></h2>
        </div>
        <div class="module-body">
            <?php the_content(); ?>
        </div>
        <!--/.module-type01--></div>
<?php endif; ?>
    <!--/#contents--></div>


