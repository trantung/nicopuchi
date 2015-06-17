<?php
/**
 * 表紙コレクション
 */
?>



<div id="contents">
    <div id="main">
        <?php my_breadcrumbs(); ?>
        <div class="module-type01 bg-type02 inner15">
            <div class="module-head">
                <h2><img src="<?php home(); ?>/common/img/pc/07/ttl.png" alt="表紙コレクション" width="794" height="176"></h2>
            </div>
            <div class="module-body bg-white inner15">
                <?php
                $args = array(
                    'post_type' => 'nico_cover',
                    'posts_per_page' => -1,
                );
                query_posts($args);
                ?>
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php if (is_loop_first()) : ?>
                            <?php
                            $eyecatch_id = get_post_thumbnail_id();
                            $eyecatch_s_img = wp_get_attachment_image_src($eyecatch_id, 'thumbnail');
                            $eyecatch_l_img = wp_get_attachment_image_src($eyecatch_id, 'full');
                            $img01_s = wp_get_attachment_image_src(get_field('image01'), 'thumbnail');
                            $img01_l = wp_get_attachment_image_src(get_field('image01'), 'full');
                            $img02_s = wp_get_attachment_image_src(get_field('image02'), 'thumbnail');
                            $img02_l = wp_get_attachment_image_src(get_field('image02'), 'full');
                            $img03_s = wp_get_attachment_image_src(get_field('image03'), 'thumbnail');
                            $img03_l = wp_get_attachment_image_src(get_field('image03'), 'full');
                            $img04_s = wp_get_attachment_image_src(get_field('image04'), 'thumbnail');
                            $img04_l = wp_get_attachment_image_src(get_field('image04'), 'full');
                            $img05_s = wp_get_attachment_image_src(get_field('image05'), 'thumbnail');
                            $img05_l = wp_get_attachment_image_src(get_field('image05'), 'full');
                            ?>
                            <div class="new-magazine">
                                <div class="new-magazine-left">
                                    <h3 class="new-magazine-ttl"><img src="<?php home(); ?>/common/img/pc/07/ttl_new.png" alt="最新号"></h3>
                                    <img class="bd-pink" src="<?php echo $eyecatch_s_img[0]; ?>" alt="" width="170">
                                    <div class="btn-area">
                                        <a href="<?php echo $eyecatch_l_img[0]; ?>" class="btn02"><span class="icn type16">大きい表紙を見る</span></a>
                                    </div>
                                </div>
                                <div class="new-magazine-right">
                                    <ul>
                                        <li>
                                            <div class="magazine-contents">
                                                <a href="<?php echo $img01_l[0]; ?>"><img class="bd-pink" src="<?php echo $img01_s[0]; ?>" alt="" width="211"></a>
                                                <?php the_field('image01_text'); ?>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="magazine-contents">
                                                <a href="<?php echo $img02_l[0]; ?>"><img class="bd-pink" src="<?php echo $img02_s[0]; ?>" alt="" width="127"></a>
                                                <?php the_field('image02_text'); ?>
                                            </div>
                                            <div class="magazine-contents">
                                                <a href="<?php echo $img03_l[0]; ?>"><img class="bd-pink" src="<?php echo $img03_s[0]; ?>" alt="" width="127"></a>
                                                <?php the_field('image03_text'); ?>
                                            </div>
                                        </li>
                                        <li>
                                            <a href="<?php echo $img04_l[0]; ?>"><img src="<?php echo $img04_s[0]; ?>" alt="" width="125"></a>
                                            <a href="<?php echo $img05_l[0]; ?>"><img src="<?php echo $img05_s[0]; ?>" alt="" width="125"></a>
                                        </li>
                                    </ul>
                                </div>
                                <!--/.new-magazine--></div>
                        <?php endif; ?>
                        <?php if (is_loop_first()) : ?>
                            <ul class="magazine-list" id="backNumber">
                        <?php endif; ?>
                        <li>
                            <?php
                            $eyecatch_id = get_post_thumbnail_id();
                            $eyecatch_s_img = wp_get_attachment_image_src($eyecatch_id, 'thumbnail');
                            $eyecatch_l_img = wp_get_attachment_image_src($eyecatch_id, 'full');
                            $img01 = wp_get_attachment_image_src(get_field('image01'), 'full');
                            $img02 = wp_get_attachment_image_src(get_field('image02'), 'full');
                            $img03 = wp_get_attachment_image_src(get_field('image03'), 'full');
                            $img04 = wp_get_attachment_image_src(get_field('image04'), 'full');
                            $img05 = wp_get_attachment_image_src(get_field('image05'), 'full');
                            ?>
                            <dl>
                                <dt><?php the_title(); ?></dt>
                                <dd><a href="<?php echo $eyecatch_l_img[0]; ?>"><img src="<?php echo $eyecatch_s_img[0]; ?>" alt="" width="140" height="195"></a></dd>
                            </dl>
                            <a href="<?php echo $img01[0]; ?>" class="btn type03 mt5">立ち読み</a>
                            <a href="<?php echo $img02[0]; ?>"></a>
                            <a href="<?php echo $img03[0]; ?>"></a>
                            <a href="<?php echo $img04[0]; ?>"></a>
                            <a href="<?php echo $img05[0]; ?>"></a>
                        </li>
                        <?php if (is_loop_last()) : ?>
                            </ul>
                        <?php endif; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
            <!--/.module-type01--></div>
        <!--/#main--></div>
    <div id="side">

        <?php include(dirname(__FILE__).'/../../../../../common/inc/pc/bnr-area01.html'); ?>

        <?php include(dirname(__FILE__).'/../../../../../common/inc/pc/sticker.html'); ?>

        <!--/#side--></div>
    <!--/#contents--></div>



