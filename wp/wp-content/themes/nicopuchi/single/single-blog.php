<?php
/**
 * プチモブログ詳細
 */
?>

<div id="contents">
    <div id="main">
        <?php my_breadcrumbs(); ?>
        <div class="module-type01 bg-type03 pb60">
            <div class="module-head">
                <h2 class="inner15"><img src="<?php home(); ?>/common/img/pc/04/ttl01.png" alt="プチモ☆ブログ" width="794" height="162"></h2>
                <dl class="blog-name">
                    <?php // TODO: ■■■編集者の画像が複数あるのでWPのユーザーに複数画像が設定できないと厳しい？ ?>
                    <dt><img src="<?php home(); ?>/common/img/pc/04/img_sample03.png" alt=""></dt>
                    <dd>
                        <span class="name">ゆう..&copy;</span>
                        <span class="name2">の<span class="pink">ブログ_</span><img src="<?php home(); ?>/common/img/pc/icn03b.png" alt=""></span>
                    </dd>
                </dl>
            </div>
            <?php if (have_posts()) : ?>
                <?php the_post(); ?>
                <div class="module-body">
                    <div class="blog-area">
                        <div class="blog-inner">
                            <div class="blog-head">
                                <span class="date"><?php echo get_the_date('Y.m.d Ag:i'); ?></span>
                                <h3 class="ttl"><?php the_title(); ?></h3>
                                <dl class="blogger">
                                    <dt><img src="<?php home(); ?>/common/img/pc/index/img_sample01a.png" alt=""></dt>
                                    <dd><?php the_author(); ?>..&copy;</dd>
                                </dl>
                            </div>
                            <div class="blog-main">
                                <?php the_content(); ?>
                            </div>
                            <div class="blog-foot">
                                <ul class="pagenav">
                                    <li><a href=""><span>前の記事</span></a></li>
                                    <li><a href="<?php home(); ?>">/blog/<span>記事一覧</span></a></li>
                                    <li><a href=""><span>次の記事</span></a></li>
                                </ul>
                            </div>
                            <div class="blog-comment">
                                <h3><img src="<?php home(); ?>/common/img/pc/04/ttl_comment2.png" alt="コメント ニコ☆プチに会員登録すると、コメント投稿できるよ"></h3>
                                <ul class="btn-list">
                                    <li><a href=""><span>会員登録</span></a></li>
                                    <li><a href=""><span>ログイン</span></a></li>
                                </ul>
                                <div class="inner">
                                    <h4 class="ttl-comment">コメント（6）</h4>
                                    <ul>
                                        <li>
                                            <div class="comment-desc">
                                                <p>
                                                    メルちゃん。<br>
                                                    ご卒業おめでとうございます＊<br><br>
                                                    これからもお仕事頑張ってください。<br><br><br>
                                                    大好きだよ
                                                </p>
                                            </div>
                                            <div class="comment-foot">
                                                れんか♪ &copy; | 2015年5月1日
                                            </div>
                                        </li>
                                        <li>
                                            <div class="comment-desc">
                                                <p>
                                                    めるｃへ。<br><br>
                                                    卒業おめでとう！<br>
                                                    とうとう最後のブログになっちゃったね。。。<br><br>
                                                    いつもコメント返しありがとうね。<br>
                                                    嬉しかったよ！<br><br>
                                                    毎回ニコプチを開くと、いつもそこに笑顔のめるｃがいた。<br>
                                                    その笑顔に何度励まされたかな。。。<br>
                                                    ありがとう。大好きだよ。<br>
                                                    めるｃの卒業は、ほんっっとに悲しいし寂しい。<br>
                                                    でも、めるｃや卒モのみんながいたからこそ<br>
                                                    ニコプチは輝いてた。<br>
                                                    めっちゃキラキラしてた☆彡<br><br>
                                                    めるｃは、絶対に夢をかなえられる！<br>
                                                    こえからも自分を信じて頑張ってね！<br><br>
                                                    大好き！<br>
                                                    ファンレ送ったから、お返事くれると嬉しいな♪<br>
                                                    頑張って絵もかいたよ～笑<br><br>
                                                    じゃあ。。。byebye♪<br><br>
                                                    　　　　　　　　　　　ーかのんー
                                                </p>
                                            </div>
                                            <div class="comment-foot">
                                                れんか♪ &copy; | 2015年5月1日
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
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
                <ul class="index-list-type03">
                    <li>
                        <a href="">
                            <span class="desc">まちにまったスズナちゃんのブログがきたーー（＾Ｏ＾☆♪プチコレ5お疲れ様です♪残念ながら私はプチコレ5出れませ…</span>
                            <span class="name">つきみ &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="desc">涼凪ちゃん、友達からの質問です！質問好きなキャラクターは？です！ぜひ、答えてね♡</span>
                            <span class="name">わわ &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="desc">まちにまったスズナちゃんのブログがきたーー（＾Ｏ＾☆♪プチコレ5お疲れ様です♪残念ながら私はプチコレ5出れませ…</span>
                            <span class="name">つきみ &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="desc">涼凪ちゃん、友達からの質問です！質問好きなキャラクターは？です！ぜひ、答えてね♡</span>
                            <span class="name">わわ &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="desc">まちにまったスズナちゃんのブログがきたーー（＾Ｏ＾☆♪プチコレ5お疲れ様です♪残念ながら私はプチコレ5出れませ…</span>
                            <span class="name">つきみ &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="desc">涼凪ちゃん、友達からの質問です！質問好きなキャラクターは？です！ぜひ、答えてね♡</span>
                            <span class="name">わわ &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="desc">まちにまったスズナちゃんのブログがきたーー（＾Ｏ＾☆♪プチコレ5お疲れ様です♪残念ながら私はプチコレ5出れませ…</span>
                            <span class="name">つきみ &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="desc">涼凪ちゃん、友達からの質問です！質問好きなキャラクターは？です！ぜひ、答えてね♡</span>
                            <span class="name">わわ &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="desc">まちにまったスズナちゃんのブログがきたーー（＾Ｏ＾☆♪プチコレ5お疲れ様です♪残念ながら私はプチコレ5出れませ…</span>
                            <span class="name">つきみ &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <span class="desc">涼凪ちゃん、友達からの質問です！質問好きなキャラクターは？です！ぜひ、答えてね♡</span>
                            <span class="name">わわ &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <!--/#readersblog--></ul>
            </div>
            <!--/.module-type01--></div>
        <!--/#side--></div>
    <!--/#contents--></div>


