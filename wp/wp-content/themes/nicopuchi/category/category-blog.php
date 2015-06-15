<?php
/**
 * プチモブログ
 */
?>



<div id="contents">
    <div id="main">
        <?php my_breadcrumbs(); ?>
        <div class="module-type01 bg-type03">
            <div class="module-head inner15">
                <h2 class="bdb-violet"><img src="<?php home(); ?>/common/img/pc/04/ttl01.png" alt="プチモ☆ブログ" width="794" height="162"></h2>
                <div class="tx_r">
                    <dl class="select-month">
                        <dt>月別ブログ記事</dt>
                        <dd>
                            <select class="design-select-box">
                                <option>2015年6月</option>
                                <option>2015年5月</option>
                                <option>2015年4月</option>
                                <option>2015年3月</option>
                            </select>
                        </dd>
                    </dl>
                </div>
            </div>
            <div class="module-body">
                <div class="masonry">
                    <?php if (have_posts()) : ?>
                        <ul class="masonry-inner">
                            <?php while (have_posts()) : the_post(); ?>
                                <li class="item">
                                    <?php
                                    $date_diff = (strtotime(date('Y-m-d')) - strtotime(get_the_date('Y-m-d'))) / (3600 * 24);
                                    $new_flag = ($date_diff <= 4) ? true : false;
                                    ?>
                                    <a href="<?php the_permalink(); ?>"<?php if ($new_flag) : ?> class="new"<?php endif; ?>>
                                        <?php $eyecatch = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail'); ?>
                                        <img src="<?php echo $eyecatch[0]; ?>" alt="" width="246">
                                        <div class="info">
                                            <?php $avatar = wp_get_attachment_image_src(get_the_author_meta('my_user_avatar01'), 'thumbnail'); ?>
                                            <span class="model-icon"><img src="<?php echo $avatar[0]; ?>" alt="" width="42"></span>
                                            <span class="model-name"><?php the_author_meta('nickname'); ?></span>
                                            <span class="update"><?php echo get_the_date('Y.m.d'); ?></span>
                                        </div>
                                        <span class="blog-ttl"><?php the_title(); ?></span>
                                        <span class="blog-desc"><?php echo mb_substr(str_replace(array("\r\n", "\r", "\n"), '', strip_tags(get_the_content())), 0, 50); ?></span>
                                        <img class="icn-new" src="<?php home(); ?>/common/img/pc/icn_new.png" alt="NEW" width="60" height="60">
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                    <p class="page">
                        <span class="page-numbers current">1</span>
                        <a class="page-numbers" href="">2</a>
                        <a class="page-numbers" href="">3</a>
                        <a class="page-numbers" href="">4</a>
                        <a class="page-numbers" href="">5</a>
                        <a class="page-numbers" href="">6</a>
                        <span class="page-numbers dots">…</span>
                        <a class="page-numbers" href="">35</a>
                        <a class="next page-numbers" href="">&gt;</a>
                    </p>
                    <!--/.masonry--></div>
            </div>
            <!--/.module-type01--></div>
        <!--/#main--></div>
    <div id="side">

        <ul class="bnr-area">
            <li><a href="" class="fdb"><img src="<?php home(); ?>/common/img/pc/index/img_w300h250.png" alt="" width="300" height="250"></a></li>
            <li><a href="" class="fdb"><img src="<?php home(); ?>/common/img/pc/index/img_w300h98.png" alt="" width="300" height="98"></a></li>
            <li><a href="" class="fdb"><img src="<?php home(); ?>/common/img/pc/index/img_w300h98.png" alt="" width="300" height="98"></a></li>
            <li><a href="" class="fdb"><img src="<?php home(); ?>/common/img/pc/index/img_w300h98.png" alt="" width="300" height="98"></a></li>
        </ul>

        <ul class="bnr-area">
            <li><a href="" class="fdb"><img src="<?php home(); ?>/common/img/pc/04/bnr_blogrule.png" alt="" width="300" height="97"></a></li>
        </ul>
        <div class="module-type01">
            <div class="module-head">
                <h2><img src="<?php home(); ?>/common/img/pc/04/ttl01_side.png" alt="スーパー読モブログ" width="300" height="50"></h2>
            </div>
            <div class="module-body bg-type03 inner15">
                <ul id="readersblog" class="index-list type-side01">
                    <li>
                        <a href="">
                            <img src="<?php home(); ?>/common/img/pc/index/img_sample01a.png" alt="ゆう" width="134" height="90">
                            <span class="blog-ttl pd10">ゆう..&copy;</span>
                            <img class="icn-new" src="<?php home(); ?>/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <!--/#readersblog--></ul>
            </div>
            <!--/.module-type01--></div>
        <div class="module-type01 bg-type03 inner15">
            <div class="module-head">
                <h2><img src="/common/img/pc/04/ttl_calendar.png" alt="カレンダー" width="270" height="50"></h2>
            </div>
            <div class="module-body">
                <img src="/common/img/pc/04/img_calendar.png" alt="">
            </div>
            <div class="module-head">
                <h2><img src="/common/img/pc/04/ttl_comment.png" alt="最近のコメント" width="270" height="50"></h2>
            </div>
            <div class="module-body">
                <?php
                $comments = get_comments(array('status' => 'approve', 'number' => 10));
                ?>
                <ul class="index-list-type03">
                    <?php foreach ($comments as $comment) : ?>
                        <?php $post = get_post($comment->comment_post_ID); ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>へのコメント
                            (<?php comment_author_link(); ?>より[<?php comment_date('m/d'); ?>])
                            <?php comment_text(); ?></li>

                        <li>
                            <a href="">
                                <span class="desc">まちにまったスズナちゃんのブログがきたーー（＾Ｏ＾☆♪プチコレ5お疲れ様です♪残念ながら私はプチコレ5出れませ…</span>
                                <span class="name">つきみ &copy;</span>
                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                            </a>
                        </li>


                    <?php endforeach; ?>
                    <!--/#readersblog--></ul>




            </div>
            <!--/.module-type01--></div>
        <!--/#side--></div>
    <!--/#contents--></div>


