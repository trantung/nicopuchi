<?php
/**
 * プチモブログ詳細
 */
?>

<div id="contents">
    <div id="main">
        <?php my_breadcrumbs(); ?>
        <div class="module-type01 bg-type03 pb60">
            <?php if (have_posts()) : ?>
                <?php the_post(); ?>
                <div class="module-head">
                    <h2 class="inner15"><img src="<?php home(); ?>/common/img/pc/04/ttl01.png" alt="プチモ☆ブログ" width="794" height="162"></h2>
                    <dl class="blog-name">
                        <?php $avatar02 = wp_get_attachment_image_src(get_the_author_meta('my_user_avatar02'), 'thumbnail'); ?>
                        <dt><img src="<?php echo $avatar02[0]; ?>" alt=""></dt>
                        <dd>
                            <span class="name"><?php the_author(); ?></span>
                            <span class="name2">の<span class="pink">ブログ_</span><img src="<?php home(); ?>/common/img/pc/icn03b.png" alt=""></span>
                        </dd>
                    </dl>
                </div>
                <div class="module-body">
                    <div class="blog-area">
                        <div class="blog-inner">
                            <div class="blog-head">
                                <span class="date"><?php echo get_the_date('Y.m.d Ag:i'); ?></span>
                                <h3 class="ttl"><?php the_title(); ?></h3>
                                <dl class="blogger">
                                    <?php $avatar01 = wp_get_attachment_image_src(get_the_author_meta('my_user_avatar01'), 'thumbnail'); ?>
                                    <dt><img src="<?php echo $avatar01[0]; ?>" alt=""></dt>
                                    <dd><?php the_author(); ?></dd>
                                </dl>
                            </div>
                            <div class="blog-main">
                                <?php the_content(); ?>
                            </div>
                            <div class="blog-foot">
                                <ul class="pagenav">
                                    <?php
                                    $prev_post = get_previous_post();
                                    if ($prev_post)
                                    {
                                        echo '<li><a href="' . get_permalink($prev_post->ID) . '"><span>前の記事</span></a></li>';
                                    }
                                    ?>
                                    <li><a href="/blog/"><span>記事一覧</span></a></li>
                                    <?php
                                    $next_post = get_next_post();
                                    if ($next_post)
                                    {
                                        echo '<li><a href="' . get_permalink($next_post->ID) . '"><span>次の記事</span></a></li>';
                                    }
                                    ?>
                                </ul>
                            </div>


                            <div class="blog-comment">
                                <h3><img src="<?php home(); ?>/common/img/pc/04/ttl_comment2.png" alt="コメント ニコ☆プチに会員登録すると、コメント投稿できるよ"></h3>
                                <ul class="btn-list">
                                    <li><a href="/mypage/"><span>会員登録</span></a></li>
                                    <li><a href="/mypage/"><span>ログイン</span></a></li>
                                </ul>
                                <?php comments_template(); ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <!--/.module-type01--></div>

        <div class="module-type01">
            <div class="module-head">
                <h2 class="icn type03"><img src="/common/img/pc/index/ttl03.png" alt="プチモ☆ブログ" width="160" height="32"></h2>
                <a href="/blog/" class="right fdb"><img src="/common/img/pc/img_list.png" alt="一覧" width="70" height="22"></a>
            </div>
            <div class="module-body bg-type03">
                <div id="puchiblog" class="slider-area">
                    <?php
                    $args = array(
                        'category_name' => 'blog',
                        'post_per_page' => 8,
                    );
                    $the_query = new WP_Query($args);
                    ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <ul class="slider-type02 index-list">
                            <?php while ($the_query->have_posts()) : ?>
                                <?php $the_query->the_post(); ?>
                                <li>
                                    <?php
                                    $date_diff = (strtotime(date('Y-m-d')) - strtotime(get_the_date('Y-m-d'))) / (3600 * 24);
                                    $new_flag = ($date_diff <= 4) ? true : false;
                                    ?>
                                    <a href="<?php the_permalink(); ?>"<?php if ($new_flag) : ?> class="new"<?php endif; ?>>
                                        <?php the_post_thumbnail(array(140, 94)); ?>
                                        <span class="update"><?php echo get_the_date('Y.m.d'); ?></span>
                                        <span class="blog-ttl"><?php the_title(); ?></span>
                                        <span class="model-name type02"><?php the_author(); ?></span>
                                        <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                    <!--/#puchiblog--></div>

            </div>
            <!--/.module-type01--></div>

        <!--/#main--></div>
    <div id="side">

        <ul class="bnr-area">
            <li><a href="" class="fdb"><img src="/common/img/pc/index/img_w300h250.png" alt="" width="300" height="250"></a></li>
            <li><a href="" class="fdb"><img src="/common/img/pc/index/img_w300h98.png" alt="" width="300" height="98"></a></li>
            <li><a href="" class="fdb"><img src="/common/img/pc/index/img_w300h98.png" alt="" width="300" height="98"></a></li>
            <li><a href="" class="fdb"><img src="/common/img/pc/index/img_w300h98.png" alt="" width="300" height="98"></a></li>
        </ul>

        <div class="module-type01">
            <div class="module-head">
                <h2 class="icn type03"><span class="ttl-txt">ゆう..&copy;</span><img src="/common/img/pc/04/ttl_update.png" alt="最近の記事" width="103" height="32"></h2>
            </div>
            <div class="module-body bg-type03 inner15">
                <ul class="index-list type-side01">
                    <li>
                        <a href="">
                            <img src="/common/img/pc/index/img_sample01a.png" alt="ゆう" width="134" height="90">
                            <span class="update">2015.00.00</span>
                            <span class="blog-ttl">タイトルが入ります</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/common/img/pc/index/img_sample01b.png" alt="ぴよりん" width="134" height="90">
                            <span class="update">2015.00.00</span>
                            <span class="blog-ttl">タイトルが入ります</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/common/img/pc/index/img_sample01b.png" alt="ぴよりん" width="134" height="90">
                            <span class="update">2015.00.00</span>
                            <span class="blog-ttl">タイトルが入ります</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/common/img/pc/index/img_sample01a.png" alt="ゆう" width="134" height="90">
                            <span class="update">2015.00.00</span>
                            <span class="blog-ttl">タイトルが入ります</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <!--/#readersblog--></ul>
            </div>
            <!--/.module-type01--></div>
        <ul class="bnr-area">
            <li><a href="" class="fdb"><img src="/common/img/pc/04/bnr_blogrule.png" alt="" width="300" height="97"></a></li>
        </ul>
        <div class="module-type01">
            <div class="module-head">
                <h2><img src="/common/img/pc/04/ttl01_side.png" alt="スーパー読モブログ" width="300" height="50"></h2>
            </div>
            <div class="module-body bg-type03 inner15">
                <ul id="readersblog" class="index-list type-side01">
                    <li>
                        <a href="">
                            <img src="/common/img/pc/index/img_sample01a.png" alt="ゆう" width="134" height="90">
                            <span class="blog-ttl">ゆう..&copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/common/img/pc/index/img_sample01b.png" alt="ぴよりん" width="134" height="90">
                            <span class="blog-ttl">ぴよりん..&copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/common/img/pc/index/img_sample01b.png" alt="ぴよりん" width="134" height="90">
                            <span class="blog-ttl">ぴよりん..&copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/common/img/pc/index/img_sample01a.png" alt="ゆう" width="134" height="90">
                            <span class="blog-ttl">ゆう..&copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/common/img/pc/index/img_sample01a.png" alt="ゆう" width="134" height="90">
                            <span class="blog-ttl">ゆう..&copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/common/img/pc/index/img_sample01b.png" alt="ぴよりん" width="134" height="90">
                            <span class="blog-ttl">ぴよりん..&copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/common/img/pc/index/img_sample01b.png" alt="ぴよりん" width="134" height="90">
                            <span class="blog-ttl">ぴよりん..&copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/common/img/pc/index/img_sample01a.png" alt="ゆう" width="134" height="90">
                            <span class="blog-ttl">ゆう..&copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/common/img/pc/index/img_sample01a.png" alt="ゆう" width="134" height="90">
                            <span class="blog-ttl">ゆう..&copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/common/img/pc/index/img_sample01b.png" alt="ぴよりん" width="134" height="90">
                            <span class="blog-ttl">ぴよりん..&copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/common/img/pc/index/img_sample01b.png" alt="ぴよりん" width="134" height="90">
                            <span class="blog-ttl">ぴよりん..&copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/common/img/pc/index/img_sample01a.png" alt="ゆう" width="134" height="90">
                            <span class="blog-ttl">ゆう..&copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <img src="/common/img/pc/index/img_sample01a.png" alt="ゆう" width="134" height="90">

                            <span class="blog-ttl">ゆう..&copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <!--/#readersblog--></ul>
            </div>
            <!--/.module-type01--></div>
        <div class="module-type01 bg-type03 inner15">
            <div class="module-head">
                <h2><img src="/common/img/pc/04/ttl_calendar.png" alt="カレンダー" width="270" height="50"></h2>
                <?php get_calendar(); ?>
            </div>
            <div class="module-body">
                <img src="/common/img/pc/04/img_calendar.png" alt="">
            </div>
            <div class="module-head">
                <h2><img src="/common/img/pc/04/ttl_comment.png" alt="最近のコメント" width="270" height="50"></h2>
            </div>
            <div class="module-body">
                <?php $comments = get_comments(array('status' => 'approve', 'number' => 10)); ?>
                <ul class="index-list-type03">
                    <?php foreach ($comments as $comment) : ?>
                        <?php $post = get_post($comment->comment_post_ID); ?>
                        <li>
                            <a href="<?php the_permalink(); ?>">
                                <span class="desc"><?php echo mb_substr(str_replace(array("\r\n", "\r", "\n"), '', strip_tags($comment->comment_content)), 0, 50); ?></span>
                                <span class="name"><?php comment_author(); ?></span>
                                <img class="icn-new" src="<?php home(); ?>/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                            </a>
                        </li>
                    <?php endforeach; ?>
                    <!--/#readersblog--></ul>
            </div>
            <!--/.module-type01--></div>
        <!--/#side--></div>
    <!--/#contents--></div>


