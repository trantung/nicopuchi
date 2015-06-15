<?php
/**
 * プチモプロフィール詳細
 */
?>



<div id="contents">
    <div id="main">
        <?php my_breadcrumbs(); ?>
        <div class="module-type01 bg-type05 ovf-h">
            <div class="module-head inner15">
                <h2><img src="<?php home(); ?>/common/img/pc/05/ttl01.png" alt="プチモ☆プロフィール" width="794" height="162"></h2>
            </div>
            <?php if (have_posts()) : ?>
                <?php the_post(); ?>
                <div class="module-body">
                    <div class="profile-area">
                        <div class="profile-table">
                            <img class="profile-image" src="<?php home(); ?>/common/img/pc/05/img_sample01.png" alt="" width="400" height="400">
                            <div class="profile-data">
                                <h3 class="ttl"><?php the_title(); ?></h3>
                                <dl class="data">
                                    <dt>氏名</dt>
                                    <dd><?php the_title(); ?></dd>
                                </dl>
                                <dl class="data">
                                    <dt>ふりがな</dt>
                                    <dd><?php the_field('name_kana'); ?></dd>
                                </dl>
                                <dl class="data">
                                    <dt>ニックネーム</dt>
                                    <dd><?php the_field('nickname'); ?></dd>
                                </dl>
                                <dl class="data">
                                    <dt>学年</dt>
                                    <dd><?php the_field('school_year'); ?></dd>
                                </dl>
                                <dl class="data">
                                    <dt>生年月日</dt>
                                    <dd><?php the_field('date_of_birth'); ?></dd>
                                </dl>
                                <dl class="data">
                                    <dt>星座</dt>
                                    <dd><?php the_field('constellation'); ?></dd>
                                </dl>
                                <dl class="data">
                                    <dt>血液型</dt>
                                    <dd><?php the_field('blood_type'); ?></dd>
                                </dl>
                                <dl class="data">
                                    <dt>身長</dt>
                                    <dd><?php the_field('height'); ?></dd>
                                </dl>
                                <dl class="data">
                                    <dt>ブログ</dt>
                                    <dd><a href="<?php the_field('blog'); ?>"><?php the_field('blog'); ?></a></dd>
                                </dl>
                                <h4 class="mb10"><span class="bg-black">ファンレターの宛先</span></h4>
                                <p class="address">
                                    <?php the_field('address'); ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="module-head inner15">
                    <h2 class="tx_c mb20"><img src="<?php home(); ?>/common/img/pc/05/ttl02.png" alt="プチモにしつもーん" width="266" height="24"></h2>
                </div>
                <div class="module-body">
                    <div class="profile-area">
                        <?php the_content(); ?>
                    </div>
                </div>
            <?php endif; ?>
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
                <h2 class="icn type03"><img src="/common/img/pc/index/ttl05.png" alt="WE&hearts;プチモ" width="130" height="32"></h2>
            </div>
            <div class="module-body bg-type05 inner15">
                <ul id="readersblog" class="index-list type-side01">
                    <li>
                        <a href="" class="fdb">
                            <img src="/common/img/pc/index/img_sample05a.png" alt="黒坂莉那" width="134" height="90">
                            <span class="blog-ttl">黒坂 莉那 &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="" class="fdb">
                            <img src="/common/img/pc/index/img_sample05b.png" alt="岩崎春果" width="134" height="90">
                            <span class="blog-ttl">岩崎 春果 &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="" class="fdb">
                            <img src="/common/img/pc/index/img_sample05c.png" alt="伊藤小春" width="134" height="90">
                            <span class="blog-ttl">伊藤 小春 &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="" class="fdb">
                            <img src="/common/img/pc/index/img_sample05d.png" alt="西川茉佑" width="134" height="90">
                            <span class="blog-ttl">西川 茉佑 &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="" class="fdb">
                            <img src="/common/img/pc/index/img_sample05e.png" alt="岡香鈴" width="134" height="90">
                            <span class="blog-ttl">岡 香鈴 &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="" class="fdb">
                            <img src="/common/img/pc/index/img_sample05f.png" alt="山田碧海" width="134" height="90">
                            <span class="blog-ttl">山田 碧海 &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="" class="fdb">
                            <img src="/common/img/pc/index/img_sample05g.png" alt="鈴木伶奈" width="134" height="90">
                            <span class="blog-ttl">鈴木 伶奈 &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="" class="fdb">
                            <img src="/common/img/pc/index/img_sample05h.png" alt="大野みさき" width="134" height="90">
                            <span class="blog-ttl">大野 みさき &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="" class="fdb">
                            <img src="/common/img/pc/index/img_sample05i.png" alt="千葉泉恋" width="134" height="90">
                            <span class="blog-ttl">千葉 泉恋 &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="" class="fdb">
                            <img src="/common/img/pc/index/img_sample05j.png" alt="乃亜" width="134" height="90">
                            <span class="blog-ttl">乃亜 &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="" class="fdb">
                            <img src="/common/img/pc/index/img_sample05k.png" alt="夏目璃乃" width="134" height="90">
                            <span class="blog-ttl">夏目 璃乃 &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="" class="fdb">
                            <img src="/common/img/pc/index/img_sample05l.png" alt="涼凪" width="134" height="90">
                            <span class="blog-ttl">涼凪 &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <li>
                        <a href="" class="fdb">
                            <img src="/common/img/pc/index/img_sample05m.png" alt="松田 望愛" width="134" height="90">
                            <span class="blog-ttl">松田 望愛 &copy;</span>
                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                        </a>
                    </li>
                    <!--/#readersblog--></ul>
            </div>
            <!--/.module-type01--></div>
        <!--/#side--></div>
    <!--/#contents--></div>


