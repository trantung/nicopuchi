<?php
/*
Template Name: timeline
*/
include('BlogPagination.php');
$blogsObj = new BlogPagination();
$page = get_query_var('page') != 0 ? get_query_var('page') : FIRST_PAGE ;
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
                        <?php foreach ($blogsData as $key => $blogData) {?>
                        <li class="item" id ="<?php echo $key ?>">
                            <a href="<?=$blogData['entry_url']?>" class="new">
                                <img src="<?=$blogData['image_list'][0] ?>" alt="" width="246" height="164">
                                <dl class="update">
                                    <dt><img src="/common/img/pc/<?=get_blog_type_img_name_list()[$blogData['blog_type']]?>" alt="プチモ☆ブログ情報" width="123" height="28"></dt>
                                    <dd><?=date('Y m d | g:i a', $blogData['entry_date'])?></dd>
                                </dl>
                                <span class="blog-ttl"><?=$blogData['title']?></span>
                                <div class="blog-desc" class="description" style="height: 50px; overflow:hidden !important;"><?=$blogData['description']?></div>
                                <?php if($blogData['entry_date'] == strtotime(date('Y-m-d'))){ ?>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="60" height="60">
                                <?php } ?>
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                    <?php echo $blogsObj->createLinks($page) ?>
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
        $( "#24" ).focus();
    })
</script>
<script>
    // $("#blogsupporter li a,#blogsupporter li .no-link").heightLine(0);
    // $("#puchiblog li a").heightLine(1);
</script>
</body>
</html>
