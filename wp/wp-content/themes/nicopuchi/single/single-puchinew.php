<?php
/**
 * プチニュー10詳細
 */
?>



<div id="contents">
    <div id="main">
        <?php my_breadcrumbs(); ?>

        <?php if (have_posts()) : ?>
            <?php the_post(); ?>
            <?php echo get_the_date('Y.m.d'); ?>
            <?php the_title(); ?>
            <?php the_content(); ?>
        <?php endif; ?>
        <!--/#main--></div>
    <!--/#contents--></div>


