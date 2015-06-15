<?php
/**
 * トップページ
 */

$jsonData = getJsonData();

$disp_time_line = array_slice($jsonData, 0, ITEM_PER_TIMELINE * MORE_COUNT_PER_TIMELINE);

?>
<?php get_header(); ?>
    <div id="contents">
        <div id="main">
            <div id="mainvisual">
                <ul>
                    <li><a href="" class="fdb"><img src="/common/img/pc/index/img_mv0001.png" alt="" width="824" height="342"></a></li>
                    <li><a href="" class="fdb"><img src="/common/img/pc/index/img_mv0001.png" alt="" width="824" height="342"></a></li>
                    <li><a href="" class="fdb"><img src="/common/img/pc/index/img_mv0001.png" alt="" width="824" height="342"></a></li>
                    <li><a href="" class="fdb"><img src="/common/img/pc/index/img_mv0001.png" alt="" width="824" height="342"></a></li>
                    <li><a href="" class="fdb"><img src="/common/img/pc/index/img_mv0001.png" alt="" width="824" height="342"></a></li>
                    <li><a href="" class="fdb"><img src="/common/img/pc/index/img_mv0001.png" alt="" width="824" height="342"></a></li>
                    <li><a href="" class="fdb"><img src="/common/img/pc/index/img_mv0001.png" alt="" width="824" height="342"></a></li>
                    <li><a href="" class="fdb"><img src="/common/img/pc/index/img_mv0001.png" alt="" width="824" height="342"></a></li>
                </ul>
                <!--/#mainvisual--></div>

            <div class="module-type01">
                <div class="module-head">
                    <h2 class="icn type01"><img src="/common/img/pc/index/ttl01.png" alt="ニコ☆プチ読者ブログサポーター" width="300" height="32"></h2>
                    <a href="" class="right fdb"><img src="/common/img/pc/img_list.png" alt="一覧" width="70" height="22"></a>
                </div>
                <div class="module-body bg-type01">
                    <div id="blogsupporter" class="slider-area">
                        <span class="ttl"><img src="/common/img/pc/index/ttl01b.png" alt="" width="140" height="152"></span>
                        <ul class="slider-type01 index-list">
                            <li>
                                <a href="" class="new">
                                    <img src="/common/img/pc/index/img_sample01a.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="model-name">モデル名が入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="" class="new">
                                    <img src="/common/img/pc/index/img_sample01b.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="model-name">モデル名が入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/common/img/pc/index/img_sample01a.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="model-name">モデル名が入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/common/img/pc/index/img_sample01b.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="model-name">モデル名が入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/common/img/pc/index/img_sample01a.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="model-name">モデル名が入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/common/img/pc/index/img_sample01b.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="model-name">モデル名が入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/common/img/pc/index/img_sample01a.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="model-name">モデル名が入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/common/img/pc/index/img_sample01b.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="model-name">モデル名が入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                        </ul>
                        <!--/#blogSupporter--></div>
                </div>
                <!--/.module-type01--></div>


            <div class="module-type01">
                <div class="module-head">
                    <h2 class="icn type02"><img src="/common/img/pc/index/ttl02.png" alt="ニコ☆プチタイムライン" width="221" height="32"></h2>
                    <a href="" class="right fdb"><img src="/common/img/pc/img_list.png" alt="一覧" width="70" height="22"></a>
                </div>
                <div class="module-body bg-type02">
                    <div id="timeline" class="masonry">
                        <ul class="masonry-inner mt10">
                            <?php foreach ($disp_time_line as $key => $value) {?>
                                <li class="item">
                                    <a href="<?=$value['title_link']?>" class="new">
                                        <img src="<?=get_stylesheet_directory_uri().$value['image'] ?>" alt="" width="246" height="164">
                                        <dl class="update">
                                            <dt><img src="/common/img/pc/<?=$value['blog_image']?>" alt="プチモ☆ブログ情報" width="123" height="28"></dt>
                                            <dd><?=date('Y m d | g:i a', $value['date'])?></dd>
                                        </dl>
                                        <span class="blog-ttl"><?=$value['title']?></span>
                                        <span class="blog-desc" class="description" style="height: 50px; overflow: hidden;"><?=$value['desc']?></span>
                                        <?php if($value['date'] == strtotime(date('Y-m-d'))){ ?>
                                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="60" height="60">
                                        <?php } ?>
                                    </a>
                                </li>

                            <?php } ?>
                        </ul>
                        <a href="" class="btn-more fdb">
                            <span><img src="/common/img/pc/btn_more.png" alt="もっと見る"></span>
                        </a>
                        <!--/#timeline--></div>
                </div>
                <!--/.module-type01--></div>


            <div class="module-type01">
                <div class="module-head">
                    <h2 class="icn type03"><img src="/common/img/pc/index/ttl03.png" alt="プチモ☆ブログ" width="160" height="32"></h2>
                    <a href="" class="right fdb"><img src="/common/img/pc/img_list.png" alt="一覧" width="70" height="22"></a>
                </div>
                <div class="module-body bg-type03">
                    <div id="puchiblog" class="slider-area">
                        <ul class="slider-type02 index-list">
                            <li>
                                <a href="" class="new">
                                    <img class="thumbsnail" src="/common/img/pc/index/img_sample03a.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入ります</span>
                                    <span class="model-name type02">モデル名が入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="" class="new">
                                    <img src="/common/img/pc/index/img_sample03b.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="blog-ttl">タイトルが入ります</span>
                                    <span class="model-name type02">モデル名が入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/common/img/pc/index/img_sample03a.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="blog-ttl">タイトルが入りますタイトルが入ります</span>
                                    <span class="model-name type02">モデル名が入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/common/img/pc/index/img_sample03b.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入ります</span>
                                    <span class="model-name type02">モデル名が入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/common/img/pc/index/img_sample03a.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="blog-ttl">タイトルが入りますタイトルが入ります</span>
                                    <span class="model-name type02">モデル名が入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/common/img/pc/index/img_sample03b.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="blog-ttl">タイトルが入ります</span>
                                    <span class="model-name type02">モデル名が入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/common/img/pc/index/img_sample03a.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="blog-ttl">モデル名が入ります。</span>
                                    <span class="model-name type02">モデル名が入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/common/img/pc/index/img_sample03b.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</span>
                                    <span class="model-name type02">モデル名が入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                        </ul>
                        <!--/#puchiblog--></div>

                </div>
                <!--/.module-type01--></div>


            <div class="module-type01">
                <div class="module-head">
                    <h2 class="icn type04"><img src="/common/img/pc/index/ttl04.png" alt="ニコプチ☆編集部ブログ" width="224" height="32"></h2>
                    <a href="" class="right fdb"><img src="/common/img/pc/img_list.png" alt="一覧" width="70" height="22"></a>
                </div>
                <div class="module-body bg-type04">
                    <div id="staffblog" class="slider-area">
                        <ul class="slider-type02 index-list">
                            <li>
                                <a href="" class="new">
                                    <img class="thumbsnail" src="/common/img/pc/index/img_sample04a.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</span>
                                    <span class="blog-theme">テーマが入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="" class="new">
                                    <img src="/common/img/pc/index/img_sample04b.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</span>
                                    <span class="blog-theme">テーマが入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/common/img/pc/index/img_sample04a.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</span>
                                    <span class="blog-theme">テーマが入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/common/img/pc/index/img_sample04b.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</span>
                                    <span class="blog-theme">テーマが入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/common/img/pc/index/img_sample04a.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</span>
                                    <span class="blog-theme">テーマが入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/common/img/pc/index/img_sample04b.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</span>
                                    <span class="blog-theme">テーマが入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/common/img/pc/index/img_sample04a.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</span>
                                    <span class="blog-theme">テーマが入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <img src="/common/img/pc/index/img_sample04b.png" alt="" width="140" height="94">
                                    <span class="update">2014.08.14</span>
                                    <span class="blog-ttl">タイトルが入りますタイトルが入りますタイトルが入りますタイトルが入ります</span>
                                    <span class="blog-theme">テーマが入ります。</span>
                                    <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                        </ul>
                        <!--/#staffblog--></div>
                </div>
                <!--/.module-type01--></div>


            <div class="module-type01">
                <div class="module-head">
                    <h2 class="icn type05"><img src="/common/img/pc/index/ttl05.png" alt="We&hearts;プチモ" width="130" height="32"></h2>
                    <a href="" class="right fdb"><img src="/common/img/pc/img_list.png" alt="一覧" width="70" height="22"></a>
                </div>
                <div class="module-body bg-type05">
                    <ul id="welovepuchi" class="list-type-center"><!--
   						-->
                        <li>
                            <a href="" class="fdb">
                                <img src="/common/img/pc/index/img_sample05a.png" alt="黒坂莉那" width="110" height="73">
                                <span class="name">黒坂 莉那 &copy;</span>
                            </a>
                        </li>
                        <!--
                                                   -->
                        <li>
                            <a href="" class="fdb">
                                <img src="/common/img/pc/index/img_sample05b.png" alt="岩崎春果" width="110" height="73">
                                <span class="name">岩崎 春果 &copy;</span>
                            </a>
                        </li>
                        <!--
                                                   -->
                        <li>
                            <a href="" class="fdb">
                                <img src="/common/img/pc/index/img_sample05c.png" alt="伊藤小春" width="110" height="73">
                                <span class="name">伊藤 小春 &copy;</span>
                            </a>
                        </li>
                        <!--
                                                   -->
                        <li>
                            <a href="" class="fdb">
                                <img src="/common/img/pc/index/img_sample05d.png" alt="西川茉佑" width="110" height="73">
                                <span class="name">西川 茉佑 &copy;</span>
                            </a>
                        </li>
                        <!--
                                                   -->
                        <li>
                            <a href="" class="fdb">
                                <img src="/common/img/pc/index/img_sample05e.png" alt="岡香鈴" width="110" height="73">
                                <span class="name">岡 香鈴 &copy;</span>
                            </a>
                        </li>
                        <!--
                                                   -->
                        <li>
                            <a href="" class="fdb">
                                <img src="/common/img/pc/index/img_sample05f.png" alt="山田碧海" width="110" height="73">
                                <span class="name">山田 碧海 &copy;</span>
                            </a>
                        </li>
                        <!--
                                                   -->
                        <li>
                            <a href="" class="fdb">
                                <img src="/common/img/pc/index/img_sample05g.png" alt="鈴木伶奈" width="110" height="73">
                                <span class="name">鈴木 伶奈 &copy;</span>
                            </a>
                        </li>
                        <!--
                                                   -->
                        <li>
                            <a href="" class="fdb">
                                <img src="/common/img/pc/index/img_sample05h.png" alt="大野みさき" width="110" height="73">
                                <span class="name">大野 みさき &copy;</span>
                            </a>
                        </li>
                        <!--
                                                   -->
                        <li>
                            <a href="" class="fdb">
                                <img src="/common/img/pc/index/img_sample05i.png" alt="千葉泉恋" width="110" height="73">
                                <span class="name">千葉 泉恋 &copy;</span>
                            </a>
                        </li>
                        <!--
                                                   -->
                        <li>
                            <a href="" class="fdb">
                                <img src="/common/img/pc/index/img_sample05j.png" alt="乃亜" width="110" height="73">
                                <span class="name">乃亜 &copy;</span>
                            </a>
                        </li>
                        <!--
                                                   -->
                        <li>
                            <a href="" class="fdb">
                                <img src="/common/img/pc/index/img_sample05k.png" alt="夏目璃乃" width="110" height="73">
                                <span class="name">夏目 璃乃 &copy;</span>
                            </a>
                        </li>
                        <!--
                                                   -->
                        <li>
                            <a href="" class="fdb">
                                <img src="/common/img/pc/index/img_sample05l.png" alt="涼凪" width="110" height="73">
                                <span class="name">涼凪 &copy;</span>
                            </a>
                        </li>
                        <!--
                                                   -->
                        <li>
                            <a href="" class="fdb">
                                <img src="/common/img/pc/index/img_sample05m.png" alt="松田 望愛" width="110" height="73">
                                <span class="name">松田 望愛 &copy;</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <!--/.module-type01--></div>
            <!--/#main--></div>
        <div id="side" class="mt0">

            <ul class="bnr-area">
                <li><a href="" class="fdb"><img src="/common/img/pc/index/img_w300h250.png" alt="" width="300" height="250"></a></li>
                <li><a href="" class="fdb"><img src="/common/img/pc/index/img_w300h98.png" alt="" width="300" height="98"></a></li>
                <li><a href="" class="fdb"><img src="/common/img/pc/index/img_w300h98.png" alt="" width="300" height="98"></a></li>
                <li><a href="" class="fdb"><img src="/common/img/pc/index/img_w300h98.png" alt="" width="300" height="98"></a></li>
            </ul>


            <div class="module-type01">
                <div class="module-head">
                    <h2 class="icn type06"><img src="/common/img/pc/index/ttl06.png" alt="プチニュー10" width="128" height="32"></h2>
                </div>
                <div class="module-body bg-type06 inner15">
                    <ul class="index-list-type02 fl">
                        <li>
                            <a href="" class="new">
                                <dl>
                                    <dt>
                                        <img src="/common/img/pc/index/img_sample06a.png" alt="">
                                        <span class="date">2015.00.00</span>
                                    </dt>
                                    <dd>
                                        <p class="desc">
                                            テキストがはいりますテキストがはいりますテキストがはいります
                                        </p>
                                    </dd>
                                </dl>
                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                            </a>
                        </li>
                        <li>
                            <a href="" class="new">
                                <dl>
                                    <dt>
                                        <img src="/common/img/pc/index/img_sample06b.png" alt="">
                                        <span class="date">2015.00.00</span>
                                    </dt>
                                    <dd>
                                        <p class="desc">
                                            テキストがはいりますテキストがはいりますテキストがはいります
                                        </p>
                                    </dd>
                                </dl>
                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <dl>
                                    <dt>
                                        <img src="/common/img/pc/index/img_sample06c.png" alt="">
                                        <span class="date">2015.00.00</span>
                                    </dt>
                                    <dd>
                                        <p class="desc">
                                            テキストがはいりますテキストがはいりますテキストがはいります
                                        </p>
                                    </dd>
                                </dl>
                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <dl>
                                    <dt>
                                        <img src="/common/img/pc/index/img_sample06a.png" alt="">
                                        <span class="date">2015.00.00</span>
                                    </dt>
                                    <dd>
                                        <p class="desc">
                                            テキストがはいりますテキストがはいりますテキストがはいります
                                        </p>
                                    </dd>
                                </dl>
                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <dl>
                                    <dt>
                                        <img src="/common/img/pc/index/img_sample06b.png" alt="">
                                        <span class="date">2015.00.00</span>
                                    </dt>
                                    <dd>
                                        <p class="desc">
                                            テキストがはいりますテキストがはいりますテキストがはいります
                                        </p>
                                    </dd>
                                </dl>
                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <dl>
                                    <dt>
                                        <img src="/common/img/pc/index/img_sample06c.png" alt="">
                                        <span class="date">2015.00.00</span>
                                    </dt>
                                    <dd>
                                        <p class="desc">
                                            テキストがはいりますテキストがはいりますテキストがはいります
                                        </p>
                                    </dd>
                                </dl>
                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <dl>
                                    <dt>
                                        <img src="/common/img/pc/index/img_sample06a.png" alt="">
                                        <span class="date">2015.00.00</span>
                                    </dt>
                                    <dd>
                                        <p class="desc">
                                            テキストがはいりますテキストがはいりますテキストがはいります
                                        </p>
                                    </dd>
                                </dl>
                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <dl>
                                    <dt>
                                        <img src="/common/img/pc/index/img_sample06b.png" alt="">
                                        <span class="date">2015.00.00</span>
                                    </dt>
                                    <dd>
                                        <p class="desc">
                                            テキストがはいりますテキストがはいりますテキストがはいります
                                        </p>
                                    </dd>
                                </dl>
                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <dl>
                                    <dt>
                                        <img src="/common/img/pc/index/img_sample06c.png" alt="">
                                        <span class="date">2015.00.00</span>
                                    </dt>
                                    <dd>
                                        <p class="desc">
                                            テキストがはいりますテキストがはいりますテキストがはいります
                                        </p>
                                    </dd>
                                </dl>
                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <dl>
                                    <dt>
                                        <img src="/common/img/pc/index/img_sample06c.png" alt="">
                                        <span class="date">2015.00.00</span>
                                    </dt>
                                    <dd>
                                        <p class="desc">
                                            テキストがはいりますテキストがはいりますテキストがはいります
                                        </p>
                                    </dd>
                                </dl>
                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                            </a>
                        </li>
                    </ul>
                </div>
                <!--/.module-type01--></div>



            <div class="module-type01">
                <div class="module-head">
                    <h2 class="icn type03"><img src="/common/img/pc/index/ttl07.png" alt="スーパー読モブログ" width="194" height="32"></h2>
                </div>
                <div class="module-body bg-type01 inner15">
                    <ul id="readersblog" class="index-list type-side01">
                        <li>
                            <a href="">
                                <img src="/common/img/pc/index/img_sample07a.png" alt="上野沙耶香" width="134" height="90">
                                <span class="update">2015.00.00</span>
                                <span class="blog-ttl">タイトルが入ります</span>
                                <span class="blog-theme">上野 沙耶香 &copy;</span>
                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="/common/img/pc/index/img_sample07b.png" alt="斉藤梨鈴" width="134" height="90">
                                <span class="update">2015.00.00</span>
                                <span class="blog-ttl">タイトルが入ります</span>
                                <span class="blog-theme">斉藤 梨鈴 &copy;</span>
                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="/common/img/pc/index/img_sample07c.png" alt="大森汐莉" width="134" height="90">
                                <span class="update">2015.00.00</span>
                                <span class="blog-ttl">タイトルが入ります</span>
                                <span class="blog-theme">大森 汐莉 &copy;</span>
                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="/common/img/pc/index/img_sample07d.png" alt="石田結耶" width="134" height="90">
                                <span class="update">2015.00.00</span>
                                <span class="blog-ttl">タイトルが入ります</span>
                                <span class="blog-theme">石田 結耶 &copy;</span>
                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="/common/img/pc/index/img_sample07e.png" alt="角紫音" width="134" height="90">
                                <span class="update">2015.00.00</span>
                                <span class="blog-ttl">タイトルが入ります</span>
                                <span class="blog-theme">角 紫音 &copy;</span>
                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                            </a>
                        </li>
                        <li>
                            <a href="">
                                <img src="/common/img/pc/index/img_sample07f.png" alt="武内愛莉" width="134" height="90">
                                <span class="update">2015.00.00</span>
                                <span class="blog-ttl">タイトルが入ります</span>
                                <span class="blog-theme">武内 愛莉 &copy;</span>
                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                            </a>
                        </li>
                        <!--/#readersblog--></ul>
                </div>
                <!--/.module-type01--></div>


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

            <ul class="bnr-area">
                <li><a href="" class="fdb"><img src="/common/img/pc/index/bnr_nicolanet.png" alt="" width="300" height="144"></a></li>
            </ul>
            <!--/#side--></div>
        <!--/#contents--></div>
    <script type="text/javascript" src="/common/js/jquery-1.10.2.min.js"></script>
    <script type="text/javascript" src="/common/js/selectivizr-min.js"></script>
    <script type="text/javascript" src="/common/js/script.js"></script>
    <script type="text/javascript" src="/common/js/slick.js"></script>
    <script>
        $("document").ready(function(){
            $('#mainvisual ul').slick({
                infinite: true,
                autoplay:true,
                dots:true,
                slidesToShow: 1,
                slidesToScroll: 1
            });
            $('.slider-type01').slick({
                infinite: true,
                autoplay:true,
                dots:true,
                slidesToShow: 4,
                slidesToScroll: 1
            });
            $('.slider-type02').slick({
                infinite: true,
                autoplay:true,
                dots:true,
                slidesToShow: 5,
                slidesToScroll: 1
            });
        });
    </script>
    <script type="text/javascript" src="/common/js/masonry.pkgd.min.js"></script>
    <script>
        $(function(){
            $('.masonry-inner').masonry();
        })
    </script>
    <script type="text/javascript" src="/common/js/jquery.heightLine.js"></script>
    <script>
        $("#blogsupporter li a,#blogsupporter li .no-link").heightLine(0);
        $("#puchiblog li a").heightLine(1);
    </script>


<?php get_footer(); ?>