<?php
/**
 * プチモブログマイページ
 */
?>



<div id="contents">
    <div id="main">
        <?php my_breadcrumbs(); ?>
        <div class="module-type01 bg-type03 pb60">
            <?php if (have_posts()) : ?>
                <?php the_post(); ?>
                <?php the_title(); ?>
                <?php the_content(); ?>
            <?php endif; ?>
            <!--/.module-type01--></div>
        <!--/#main--></div>
    <!--/#contents--></div>


