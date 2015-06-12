<?php
/**
 * お知らせ詳細ページ
 */
?>



<div id="contents">
    <?php if (have_posts()) : ?>
        <?php the_post(); ?>
        <article>
            <div class="content">
                <div class="content_inner">
                    <div class="content_body">
                        <h1><?php the_title(); ?></h1>
                        <p class="date">
                            <?php echo get_the_date(); ?>
                            <?php
                            $post_cat = get_the_category();
                            $post_cat = $post_cat[0];
                            ?>
                            <?php if ($post_cat->slug === 'kensyu') : ?>
                                <a href="<?php home(); ?>/info/kensyu/"><img src="<?php home(); ?>/common/img/contents_info_btn01.png" alt="研修"></a>
                            <?php elseif ($post_cat->slug === 'news') : ?>
                                <a href="<?php home(); ?>/info/news/"><img src="<?php home(); ?>/common/img/contents_info_btn02.png" alt="NEWS"></a>
                            <?php elseif ($post_cat->slug === 'event') : ?>
                                <a href="<?php home(); ?>/info/event/"><img src="<?php home(); ?>/common/img/contents_info_btn03.png" alt="イベント"></a>
                            <?php endif; ?>
                        </p>
                        <div class="edit clearfix"><?php the_content(); ?></div>
                    </div>
                </div>
            </div>
        </article>
    <?php endif; ?>
</div>


