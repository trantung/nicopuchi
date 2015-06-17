<?php
/**
 * プチモプロフィール
 */
?>



<div id="contents">
    <div id="main">
        <?php my_breadcrumbs(); ?>
        <div class="module-type01 bg-type05">
            <div class="module-head inner15">
                <h2><img src="<?php home(); ?>/common/img/pc/05/ttl01.png" alt="プチモ☆プロフィール" width="794" height="162"></h2>
            </div>
            <div class="module-body">
                <div class="masonry">
                    <?php
                    $args = array(
                        'post_type' => 'nico_profile',
                        'posts_per_page' => 10,
                    );
                    query_posts($args);
                    ?>
                    <?php if (have_posts()) : ?>
                        <ul class="masonry-inner">
                            <?php while (have_posts()) : the_post(); ?>
                                <li class="item">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php $eyecatch = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail'); ?>
                                        <img src="<?php echo $eyecatch[0]; ?>" alt="" width="246">
                                        <span class="name"><?php the_title(); ?></span>
                                        <img class="icn-new" src="<?php home(); ?>/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                    <?php my_pager($additional_loop->max_num_pages); ?>
                    <!--/.masonry--></div>
            </div>
            <!--/.module-type01--></div>
        <!--/#main--></div>
    <div id="side">

        <?php include(dirname(__FILE__) . '/../../../../../common/inc/pc/bnr-area01.html'); ?>

        <?php include(dirname(__FILE__) . '/../../../../../common/inc/pc/magazine.html'); ?>

        <?php include(dirname(__FILE__) . '/../../../../../common/inc/pc/sticker.html'); ?>

        <!--/#side--></div>
    <!--/#contents--></div>


