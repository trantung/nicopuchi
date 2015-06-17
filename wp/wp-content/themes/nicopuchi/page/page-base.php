<?php
/**
 * 固定ページ基本
 */
?>



<div id="contents">
    <div id="main">
        <?php my_breadcrumbs(); ?>
        <div class="module-type01 bg-type02 inner15">
            <?php if (have_posts()) : ?>
                <?php the_post(); ?>
                <div class="module-head">
                    <h2 class="tx_c mb15"><?php the_title(); ?></h2>
                </div>
                <div class="module-body">
                    <div class="about-area inner15">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endif; ?>
            <!--/.module-type01--></div>
        <!--/#main--></div>
    <!--/#contents--></div>

