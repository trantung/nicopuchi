<?php
/*
Template Name: timeline
*/
include('BlogPagination.php');

$blogsObj = new BlogPagination();
$page     = ( isset( $_GET['page'] ) ) ? $_GET['page'] : 1;
$blogsData = $blogsObj->getData($page);
?>

<!DOCTYPE HTML>
<!--[if IE 7 ]><html class="ie7" lang="ja"><![endif]-->
<!--[if IE 8 ]><html class="ie8" lang="ja"><![endif]-->
<!--[if IE 9 ]><html class="ie9" lang="ja"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="ja">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="robots" content="index,noydir,noodp">
    <meta http-equiv="imagetoolbar" content="no">
    <meta name="description" content="*****">
    <meta name="keywords" content="*****">
    <meta name="copyright" content="*****">
    <meta name="format-detection" content="telephone=no">
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="*****">
    <meta property="og:url" content="http://www.**">
    <meta property="og:image" content="http://www.**">
    <meta property="og:title" content="****">
    <meta property="og:description" content="****">
    <meta name="viewport" content="width=1150">
    <title>*****</title>
    <link rel="stylesheet" href="/common/css/style.css">
    <link rel="stylesheet" href="/common/css/ie.css">
    <link rel="stylesheet" href="/common/css/slick.css">
    <link rel="stylesheet" media="print" href="/common/css/print.css">
</head>
<body id="pagetop">
<!--#include virtual="/common/inc/pc/header.html"-->
<div id="contents">
    <div id="main">
        <ul class="breadcrumbs">
            <li><a href="/">TOP</a></li>
            <li>ページタイトル</li>
        </ul>
        <div class="module-type01 bg-type02">
            <div class="module-head ml15 mr15 pt15">
                <h2><img src="/common/img/pc/11/ttl.png" alt="表紙コレクション" width="794" height="176"></h2>
            </div>
            <div class="module-body">
                <div id="timeline" class="masonry">
                    <ul class="masonry-inner mt10">
                        <?php
                            foreach($blogsData as $key => $blogData) {
                        ?>
                        <li class="item">
                            <a href="<?php echo $blogData->title_link ?>" class="new">
                                <img src="<?php echo get_stylesheet_directory_uri() . $blogData->image ?>" alt="" width="246" height="164">
                                <dl class="update">
                                    <dt><img src="/common/img/pc/ttl_blog01.png" alt="プチモ☆ブログ情報" width="123" height="28"></dt>
                                    <dd><?php echo $blogData->date ?></dd>
                                </dl>
                                <span class="blog-ttl"><?php echo $blogData->title ?></span>
                                <span class="blog-ttl"><?php echo $blogData->desc ?></span>
                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="60" height="60">
                            </a>
                        <?php } ?>
                    </ul>
<!--                        <li class="item">-->
<!--                            <a href="" class="new">-->
<!--                                <img src="/common/img/pc/index/img_sample02b.png" alt="" width="246" height="164">-->
<!--                                <dl class="update">-->
<!--                                    <dt><img src="/common/img/pc/ttl_blog02.png" alt="ス-パー読モブログ" width="123" height="28"></dt>-->
<!--                                    <dd>2014.08.14 PM8:00</dd>-->
<!--                                </dl>-->
<!--                                <span class="blog-ttl">タイトルが入ります</span>-->
<!--                                <span class="blog-desc">この文章はダミーです。</span>-->
<!--                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="60" height="60">-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="item">-->
<!--                            <a href="" class="new">-->
<!--                                <img src="/common/img/pc/index/img_sample02d.png" alt="" width="246" height="164">-->
<!--                                <dl class="update">-->
<!--                                    <dt><img src="/common/img/pc/ttl_blog03.png" alt="プチ撮影日記" width="123" height="28"></dt>-->
<!--                                    <dd>2014.08.14 PM8:00</dd>-->
<!--                                </dl>-->
<!--                                <span class="blog-ttl">タイトルが入りますタイトルが入ります</span>-->
<!--                                <span class="blog-desc">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れてます。</span>-->
<!--                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="60" height="60">-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="item">-->
<!--                            <a href="">-->
<!--                                <img src="/common/img/pc/index/img_sample02d.png" alt="" width="246" height="164">-->
<!--                                <dl class="update">-->
<!--                                    <dt><img src="/common/img/pc/ttl_blog03.png" alt="プチ撮影日記" width="123" height="28"></dt>-->
<!--                                    <dd>2014.08.14 PM8:00</dd>-->
<!--                                </dl>-->
<!--                                <span class="blog-ttl">タイトルが入りますタイトルが入ります</span>-->
<!--                                <span class="blog-desc">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れてます。</span>-->
<!--                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="60" height="60">-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="item">-->
<!--                            <a href="">-->
<!--                                <img src="/common/img/pc/index/img_sample02e.png" alt="" width="246" height="164">-->
<!--                                <dl class="update">-->
<!--                                    <dt><img src="/common/img/pc/ttl_blog04.png" alt="ニコ☆プチ編集部ブログ" width="123" height="28"></dt>-->
<!--                                    <dd>2014.08.14 PM8:00</dd>-->
<!--                                </dl>-->
<!--                                <span class="blog-ttl">タイトルが入りますタイトルが入ります</span>-->
<!--                                <span class="blog-desc">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れてます。</span>-->
<!--                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="60" height="60">-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="item">-->
<!--                            <a href="">-->
<!--                                <img src="/common/img/pc/index/img_sample02a.png" alt="" width="246" height="164">-->
<!--                                <dl class="update">-->
<!--                                    <dt><img src="/common/img/pc/ttl_blog01.png" alt="プチモ☆ブログ情報" width="123" height="28"></dt>-->
<!--                                    <dd>2014.08.14 PM8:00</dd>-->
<!--                                </dl>-->
<!--                                <span class="blog-ttl">タイトルが入りますタイトルが入ります</span>-->
<!--                                <span class="blog-desc">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れてます。</span>-->
<!--                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="60" height="60">-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="item">-->
<!--                            <a href="">-->
<!--                                <img src="/common/img/pc/index/img_sample02e.png" alt="" width="246" height="164">-->
<!--                                <dl class="update">-->
<!--                                    <dt><img src="/common/img/pc/ttl_blog04.png" alt="ニコ☆プチ編集部ブログ" width="123" height="28"></dt>-->
<!--                                    <dd>2014.08.14 PM8:00</dd>-->
<!--                                </dl>-->
<!--                                <span class="blog-ttl">タイトルが入ります</span>-->
<!--                                <span class="blog-desc">この文章はダミーです。</span>-->
<!--                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="60" height="60">-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="item">-->
<!--                            <a href="">-->
<!--                                <img src="/common/img/pc/index/img_sample02b.png" alt="" width="246" height="164">-->
<!--                                <dl class="update">-->
<!--                                    <dt><img src="/common/img/pc/ttl_blog02.png" alt="ス-パー読モブログ" width="123" height="28"></dt>-->
<!--                                    <dd>2014.08.14 PM8:00</dd>-->
<!--                                </dl>-->
<!--                                <span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</span>-->
<!--                                <span class="blog-desc">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れてます。</span>-->
<!--                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="60" height="60">-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="item">-->
<!--                            <a href="">-->
<!--                                <img src="/common/img/pc/index/img_sample02d.png" alt="" width="246" height="164">-->
<!--                                <dl class="update">-->
<!--                                    <dt><img src="/common/img/pc/ttl_blog03.png" alt="プチ撮影日記" width="123" height="28"></dt>-->
<!--                                    <dd>2014.08.14 PM8:00</dd>-->
<!--                                </dl>-->
<!--                                <span class="blog-ttl">タイトルが入りますタイトルが入ります</span>-->
<!--                                <span class="blog-desc">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れてます。</span>-->
<!--                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="60" height="60">-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="item">-->
<!--                            <a href="">-->
<!--                                <img src="/common/img/pc/index/img_sample02d.png" alt="" width="246" height="164">-->
<!--                                <dl class="update">-->
<!--                                    <dt><img src="/common/img/pc/ttl_blog03.png" alt="プチ撮影日記" width="123" height="28"></dt>-->
<!--                                    <dd>2014.08.14 PM8:00</dd>-->
<!--                                </dl>-->
<!--                                <span class="blog-ttl">タイトルが入りますタイトルが入ります</span>-->
<!--                                <span class="blog-desc">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れてます。</span>-->
<!--                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="60" height="60">-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="item">-->
<!--                            <a href="">-->
<!--                                <img src="/common/img/pc/index/img_sample02a.png" alt="" width="246" height="164">-->
<!--                                <dl class="update">-->
<!--                                    <dt><img src="/common/img/pc/ttl_blog01.png" alt="プチモ☆ブログ情報" width="123" height="28"></dt>-->
<!--                                    <dd>2014.08.14 PM8:00</dd>-->
<!--                                </dl>-->
<!--                                <span class="blog-ttl">タイトルが入りますタイトルが入ります</span>-->
<!--                                <span class="blog-desc">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れてます。</span>-->
<!--                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="60" height="60">-->
<!--                            </a>-->
<!--                        </li>-->
<!--                        <li class="item">-->
<!--                            <a href="">-->
<!--                                <img src="/common/img/pc/index/img_sample02e.png" alt="" width="246" height="164">-->
<!--                                <dl class="update">-->
<!--                                    <dt><img src="/common/img/pc/ttl_blog04.png" alt="ニコ☆プチ編集部ブログ" width="123" height="28"></dt>-->
<!--                                    <dd>2014.08.14 PM8:00</dd>-->
<!--                                </dl>-->
<!--                                <span class="blog-ttl">タイトルが入りますタイトルが入ります</span>-->
<!--                                <span class="blog-desc">この文章はダミーです。文字の大きさ、量、字間、行間等を確認するために入れてます。</span>-->
<!--                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="60" height="60">-->
<!--                            </a>-->
<!--                        </li>-->
<!--                    </ul>-->
<!--                    <p class="page mb40">-->
<!--                        <span class="page-numbers current">1</span>-->
<!--                        <a class="page-numbers" href="">2</a>-->
<!--                        <a class="page-numbers" href="">3</a>-->
<!--                        <a class="page-numbers" href="">4</a>-->
<!--                        <a class="page-numbers" href="">5</a>-->
<!--                        <a class="page-numbers" href="">6</a>-->
<!--                        <span class="page-numbers dots">…</span>-->
<!--                        <a class="page-numbers" href="">16</a>-->
<!--                        <a class="next page-numbers" href="">&gt;</a>-->
<!--                    </p>-->
                    <?php echo $blogsObj->createLinks(1) ?>
                    <!--/#timeline--></div>
            </div>
            <!--/.module-type01--></div>
        <!--/#main--></div>
    <div id="side">
        <!--#include virtual="/common/inc/pc/bnr-area01.html"-->
        <div class="module-type01">
            <div class="module-head">
                <h2 class="icn type14"><img src="/common/img/pc/index/ttl06.png" alt="プチニュー10" width="128" height="32"></h2>
                <div class="right">
                    <span class="update">12/28（火）<span class="red">UP！</span></span>
                </div>
            </div>
            <div class="module-body bg-type01 inner15">
                <ul class="index-list-type02 fl">
                    <li>
                        <a href="" class="new">
                            <dl>
                                <dt>
                                    <img src="/common/img/pc/03/img_sample01.png" alt="" width="88">
                                    <span class="date">2015.00.00</span>
                                </dt>
                                <dd>
                                    <span class="category">カテゴリー</span>
                                    <p class="desc mt10">
                                        テキストがはいりますテキストがはいりますテキストがはいります
                                    </p>
                                </dd>
                            </dl>
                        </a>
                    </li>
                    <li>
                        <a href="" class="new">
                            <dl>
                                <dt>
                                    <img src="/common/img/pc/03/img_sample02.png" alt="" width="88">
                                    <span class="date">2015.00.00</span>
                                </dt>
                                <dd>
                                    <span class="category">カテゴリー</span>
                                    <p class="desc mt10">
                                        テキストがはいりますテキストがはいりますテキストがはいります
                                    </p>
                                </dd>
                            </dl>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <dl>
                                <dt>
                                    <img src="/common/img/pc/03/img_sample01.png" alt="" width="88">
                                    <span class="date">2015.00.00</span>
                                </dt>
                                <dd>
                                    <span class="category">カテゴリー</span>
                                    <p class="desc mt10">
                                        テキストがはいりますテキストがはいりますテキストがはいります
                                    </p>
                                </dd>
                            </dl>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <dl>
                                <dt>
                                    <img src="/common/img/pc/03/img_sample02.png" alt="" width="88">
                                    <span class="date">2015.00.00</span>
                                </dt>
                                <dd>
                                    <span class="category">カテゴリー</span>
                                    <p class="desc mt10">
                                        テキストがはいりますテキストがはいりますテキストがはいります
                                    </p>
                                </dd>
                            </dl>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <dl>
                                <dt>
                                    <img src="/common/img/pc/03/img_sample01.png" alt="" width="88">
                                    <span class="date">2015.00.00</span>
                                </dt>
                                <dd>
                                    <span class="category">カテゴリー</span>
                                    <p class="desc mt10">
                                        テキストがはいりますテキストがはいりますテキストがはいります
                                    </p>
                                </dd>
                            </dl>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <dl>
                                <dt>
                                    <img src="/common/img/pc/03/img_sample02.png" alt="" width="88">
                                    <span class="date">2015.00.00</span>
                                </dt>
                                <dd>
                                    <span class="category">カテゴリー</span>
                                    <p class="desc mt10">
                                        テキストがはいりますテキストがはいりますテキストがはいります
                                    </p>
                                </dd>
                            </dl>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <dl>
                                <dt>
                                    <img src="/common/img/pc/03/img_sample01.png" alt="" width="88">
                                    <span class="date">2015.00.00</span>
                                </dt>
                                <dd>
                                    <span class="category">カテゴリー</span>
                                    <p class="desc mt10">
                                        テキストがはいりますテキストがはいりますテキストがはいります
                                    </p>
                                </dd>
                            </dl>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <dl>
                                <dt>
                                    <img src="/common/img/pc/03/img_sample02.png" alt="" width="88">
                                    <span class="date">2015.00.00</span>
                                </dt>
                                <dd>
                                    <span class="category">カテゴリー</span>
                                    <p class="desc mt10">
                                        テキストがはいりますテキストがはいりますテキストがはいります
                                    </p>
                                </dd>
                            </dl>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <dl>
                                <dt>
                                    <img src="/common/img/pc/03/img_sample01.png" alt="" width="88">
                                    <span class="date">2015.00.00</span>
                                </dt>
                                <dd>
                                    <span class="category">カテゴリー</span>
                                    <p class="desc mt10">
                                        テキストがはいりますテキストがはいりますテキストがはいります
                                    </p>
                                </dd>
                            </dl>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <dl>
                                <dt>
                                    <img src="/common/img/pc/03/img_sample02.png" alt="" width="88">
                                    <span class="date">2015.00.00</span>
                                </dt>
                                <dd>
                                    <span class="category">カテゴリー</span>
                                    <p class="desc mt10">
                                        テキストがはいりますテキストがはいりますテキストがはいります
                                    </p>
                                </dd>
                            </dl>
                        </a>
                    </li>
                </ul>
            </div>
            <!--/.module-type01--></div>
        <!--/#side--></div>
    <!--/#contents--></div>
<!--#include virtual="/common/inc/pc/puchicore5.html"-->
<!--#include virtual="/common/inc/pc/footer.html"-->
<script type="text/javascript" src="/common/js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="/common/js/selectivizr-min.js"></script>
<script type="text/javascript" src="/common/js/script.js"></script>
<script type="text/javascript" src="/common/js/jquery.heightLine.js"></script>
<script type="text/javascript" src="/common/js/masonry.pkgd.min.js"></script>
<script>
    $(function(){
        $('.masonry-inner').masonry();
    })
</script>
<script>
    // $("#blogsupporter li a,#blogsupporter li .no-link").heightLine(0);
    // $("#puchiblog li a").heightLine(1);
</script>
</body>
</html>

