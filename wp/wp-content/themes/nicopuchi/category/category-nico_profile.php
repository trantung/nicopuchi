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
                    <?php if (have_posts()) : ?>
                        <ul class="masonry-inner">
                            <?php while (have_posts()) : the_post(); ?>
                                <li class="item">
                                    <a href="<?php the_permalink(); ?>">
                                        <?php the_post_thumbnail(); ?>
                                        <span class="name"><?php the_title(); ?></span>
                                        <img class="icn-new" src="<?php home(); ?>/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
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
            <li><a href="" class="fdb"><img src="/common/img/pc/index/img_w300h250.png" alt="" width="300" height="250"></a></li>
            <li><a href="" class="fdb"><img src="/common/img/pc/index/img_w300h98.png" alt="" width="300" height="98"></a></li>
            <li><a href="" class="fdb"><img src="/common/img/pc/index/img_w300h98.png" alt="" width="300" height="98"></a></li>
            <li><a href="" class="fdb"><img src="/common/img/pc/index/img_w300h98.png" alt="" width="300" height="98"></a></li>
        </ul>


        <div class="module-type01">
            <div class="module-head">
                <h2><img src="/common/img/pc/index/ttl08.png" alt="女子小学生のファッション誌" width="300" height="80"></h2>
            </div>
            <div class="module-body bg-type02 inner15">
                <ul id="magazine" class="index-list-type02">
                    <li>
                        <span class="inner">
                            <dl>
                                <dt>
                                    <img src="/common/img/pc/index/img_sample08.png" alt="" width="108" height="154">
                                </dt>
                                <dd>
                                    <span class="ttl">ニコ☆プチ○月号<span class="price">（2015/00/00発売）590円</span></span>
                                    <a href="" class="btn fdb">立ち読み</a>
                                    <a href="" class="btn fdb">6月号の予告</a>
                                    <a href="" class="btn fdb">バックナンバー</a>
                                </dd>
                            </dl>
                        </span>
                    </li>
                </ul>
            </div>
            <!--/.module-type01--></div>


        <div class="module-type01">
            <div class="module-head">
                <h2 class="icn type07"><img src="/common/img/pc/index/ttl09.png" alt="ニコ☆プチステッカー" width="198" height="32"></h2>
            </div>
            <div class="module-body bg-type02 inner15">
                <ul id="sticker" class="index-list-type02">
                    <li>
                        <dl>
                            <dt><img src="/common/img/pc/index/img_sample09.png" alt="" width="93" height="147"></dt>
                            <dd>
                                <p class="desc">2ヶ月に1回、自動で画像が変わるよ☆ブログやホームページに貼ってね♪</p>
                                <span class="source">
                                    &lt;a href="http://www.nicopuchi.jp/"&gt;&lt;img src="http://www.nicopuchi.jp/images/sticker/sticker_cover_blog.jpg" alt="ニコ☆プチネット" width="138" height="219"&gt;&lt;/a&gt;
                                </span>
                            </dd>
                        </dl>
                    </li>
                </ul>
            </div>
            <!--/.module-type01--></div>

        <!--/#side--></div>
    <!--/#contents--></div>


