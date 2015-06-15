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
                            <?php $mainimage = wp_get_attachment_image_src(get_field('mainimage'), 'medium'); ?>
                            <?php if ($mainimage) : ?>
                                <img class="profile-image" src="<?php echo $mainimage[0]; ?>" alt="" width="400">
                            <?php endif; ?>
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
                <h2 class="icn type03"><img src="<?php home(); ?>/common/img/pc/index/ttl05.png" alt="WE&hearts;プチモ" width="130" height="32"></h2>
            </div>
            <div class="module-body bg-type05 inner15">
                <?php
                $args = array(
                    'post_type' => 'nico_profile',
                    'post_per_page' => -1,
                );
                $the_query = new WP_Query($args);
                ?>
                <?php if ($the_query->have_posts()) : ?>
                    <ul id="readersblog" class="index-list type-side01">
                        <?php while ($the_query->have_posts()) : ?>
                            <?php $the_query->the_post(); ?>
                            <li>
                                <a href="<?php the_permalink(); ?>" class="fdb">
                                    <?php the_post_thumbnail(array(134,0)); ?>
                                    <span class="blog-ttl"><?php the_title(); ?></span>
                                    <img class="icn-new" src="<?php home(); ?>/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                </a>
                            </li>
                        <?php endwhile; ?>
                        <!--/#readersblog--></ul>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
            </div>
            <!--/.module-type01--></div>
        <!--/#side--></div>
    <!--/#contents--></div>


