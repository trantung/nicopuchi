<?php
/**
 * プチニュー10
 */
?>



<div id="contents">
    <div id="main">
        <?php my_breadcrumbs(); ?>
        <div class="module-type01 bg-type06 inner15">
            <div class="module-head mb15">
                <h2><img src="<?php home(); ?>/common/img/pc/03/ttl01.png" alt="プチメニュー10" width="794" height="162"></h2>
            </div>
            <div class="module-body inner15 bg-white">
                <?php
                $args = array(
                    'post_type' => 'puchinew',
                    'posts_per_page' => 10,
                );
                query_posts($args);
                ?>
                <?php if (have_posts()) : ?>
                    <ul class="index-list-type02 fl">
                        <?php while (have_posts()) : the_post(); ?>
                            <li>
                                <?php
                                $date_diff = (strtotime(date('Y-m-d')) - strtotime(get_the_date('Y-m-d'))) / (3600 * 24);
                                $new_flag = ($date_diff <= 4) ? true : false;
                                ?>
                                <?php if (get_the_content()) : ?>
                                <a href="<?php the_permalink(); ?>"<?php if ($new_flag) : ?> class="new"<?php endif; ?>>
                                    <?php elseif (get_field('link')) : ?>
                                    <a href="<?php the_field('link'); ?>" target="_<?php the_field('window'); ?>"<?php if ($new_flag) : ?> class="new"<?php endif; ?>>
                                        <?php else : ?>
                                        <a href="#"<?php if ($new_flag) : ?> class="new"<?php endif; ?>>
                                            <?php endif; ?>
                                            <dl>
                                                <dt>
                                                    <?php $eyecatch = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail'); ?>
                                                    <img src="<?php echo $eyecatch[0]; ?>" alt="">
                                                </dt>
                                                <dd>
                                                    <p class="desc"><?php the_title(); ?></p>
                                                    <span class="date"><?php echo get_the_date('Y.m.d'); ?></span>
                                                </dd>
                                            </dl>
                                            <img class="icn-new" src="<?php home(); ?>/common/img/pc/icn_new.png" alt="NEW" width="36" height="36" title="NEW">
                                            <?php if (get_the_content() || get_field('link')) : ?>
                                        </a>
                                    <?php endif; ?>
                            </li>
                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>
            </div>
            <?php my_pager($additional_loop->max_num_pages); ?>
            <!--/.module-type01--></div>
        <!--/#main--></div>
    <div id="side">

        <?php include(dirname(__FILE__) . '/../../../../../common/inc/pc/bnr-area01.html'); ?>

        <?php include(dirname(__FILE__) . '/../../../../../common/inc/pc/magazine.html'); ?>

        <?php include(dirname(__FILE__) . '/../../../../../common/inc/pc/sticker.html'); ?>

        <!--/#side--></div>
    <!--/#contents--></div>


