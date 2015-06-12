<?php
/**
 * お知らせカテゴリ
 *
 */
?>



<div id="contents">

    <?php
    $args = array(
        'category_name' => $cat_info->slug,
        'posts_per_page' => 40,
        'paged' => get_query_var('paged')
    );
    query_posts($args);
    ?>

    <article>
        <div class="content">
            <div class="content_inner">
                <div class="content_body">
                    <h1><?php echo $cat_info->name; ?></h1>
                    <div class="info_list">
                        <ul>
                            <li><a href="<?php home(); ?>/info/kensyu/"><img src="<?php home(); ?>/common/img/contents_info_btn01.png" alt="研修"></a></li>
                            <li><a href="<?php home(); ?>/info/news/"><img src="<?php home(); ?>/common/img/contents_info_btn02.png" alt="NEWS"></a></li>
                            <li><a href="<?php home(); ?>/info/event/"><img src="<?php home(); ?>/common/img/contents_info_btn03.png" alt="イベント"></a></li>
                        </ul>
                        <?php if (have_posts()) : ?>
                            <?php while (have_posts()) : the_post(); ?>
                                <dl>
                                    <dt class="date"><?php echo get_the_date(); ?></dt>
                                    <dd class="category">
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
                                    </dd>
                                    <dd class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></dd>
                                </dl>
                            <?php endwhile; ?>
                        <?php else : ?>
                            <p>お知らせがありません。</p>
                        <?php endif; ?>
                    </div>
                    <?php my_pager($additional_loop->max_num_pages); ?>
                </div>
            </div>
        </div>
    </article>
</div>


