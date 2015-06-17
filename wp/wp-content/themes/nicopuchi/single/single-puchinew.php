<?php
/**
 * プチニュー10詳細
 */
?>



<div id="contents">
    <div id="main">
        <?php my_breadcrumbs(); ?>
        <div class="module-type01 bg-type06 inner15">
            <div class="module-head mb15">
                <h2><img src="<?php home(); ?>/common/img/pc/03/ttl02.png" alt="プチメニュー10" width="794" height="162"></h2>
            </div>
            <?php if (have_posts()) : ?>
            <?php the_post(); ?>
            <div id="puchinew10-detail" class="module-body inner15 bg-white">
                <p class="date"><?php echo get_the_date('Y.m.d'); ?></p>
                <p class="ttl"><?php the_title(); ?></p>
                <?php the_content(); ?>
                <?php endif; ?>
            </div>
            <a class="btn type01 middle fdb" href="<?php home(); ?>/puchinew/"><span><img src="<?php home(); ?>/common/img/pc/icn10.png" alt="">プチニュー10一覧</span></a>
            <!--/.module-type01--></div>
        <!--/#main--></div>
    <div id="side">

        <?php include(dirname(__FILE__) . '/../../../../../common/inc/pc/bnr-area01.html'); ?>

        <?php include(dirname(__FILE__) . '/../../../../../common/inc/pc/magazine.html'); ?>

        <?php include(dirname(__FILE__) . '/../../../../../common/inc/pc/sticker.html'); ?>

        <!--/#side--></div>
    <!--/#contents--></div>


