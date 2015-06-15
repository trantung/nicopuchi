<?php
/**
 * プチモプロフィール詳細
 */
?>


<article id="main">
    <ul class="dir-path cFix">
        <li><a href="">TOP</a>></li>
        <li>ページタイトル</li>
    </ul>
    <div class="module-type01">
        <div class="module-body bg-type05 inner10">
            <div class="module-head">
                <h2 class="module-head-ttl mb10"><img class="full" src="<?php home(); ?>/common/img/sp/05/ttl01.png" alt="プチモプロフィール"></h2>
            </div>
            <?php if (have_posts()) : the_post(); ?>
                <div class="profile">
                    <?php $mainimage = wp_get_attachment_image_src(get_field('mainimage'), 'medium'); ?>
                    <?php if ($mainimage) : ?>
                        <p><img class="full" src="<?php echo $mainimage[0]; ?>" alt=""></p>
                    <?php endif; ?>
                    <p class="name"><?php the_title(); ?></p>
                    <table class="profile_detail">
                        <tr>
                            <th scope="row">氏名</th>
                            <td><?php the_title(); ?></td>
                        </tr>
                        <tr>
                            <th scope="row"> ふりがな</th>
                            <td><?php the_field('name_kana'); ?></td>
                        </tr>
                        <tr>
                            <th scope="row"> ニックネーム</th>
                            <td><?php the_field('nickname'); ?></td>
                        </tr>
                        <tr>
                            <th scope="row"> 学年</th>
                            <td><?php the_field('school_year'); ?></td>
                        </tr>
                        <tr>
                            <th scope="row"> 生年月日</th>
                            <td><?php the_field('date_of_birth'); ?></td>
                        </tr>
                        <tr>
                            <th scope="row"> 星座</th>
                            <td><?php the_field('constellation'); ?></td>
                        </tr>
                        <tr>
                            <th scope="row"> 血液型</th>
                            <td><?php the_field('blood_type'); ?></td>
                        </tr>
                        <tr>
                            <th scope="row"> 身長</th>
                            <td><?php the_field('height'); ?></td>
                        </tr>
                        <tr>
                            <th scope="row"> ブログ</th>
                            <td><a href="<?php the_field('blog'); ?>"><?php the_field('blog'); ?></a></td>
                        </tr>
                    </table>
                    <div class="adress_ttl">ファンレターの宛先</div>
                    <p class="tx11 pt10"><?php the_field('address'); ?></p>
                </div>
                <h2 class="module-head-ttl"><img class="full" src="<?php home(); ?>/common/img/sp/05/ttl02.png" alt="プチモにしつも〜ん"></h2>
                <div class="profile">
                    <?php the_content(); ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
    <ul class="bnr-area">
        <li><a href=""><img class="full" src="/common/img/sp/bnr_sample02.png" alt="" ></a></li>
        <li><a href=""><img class="full" src="/common/img/sp/bnr_sample02.png" alt="" ></a></li>
        <li><a href=""><img class="full" src="/common/img/sp/bnr_sample02.png" alt="" ></a></li>
    </ul>
    <h2 class="module-head-ttl"><img class="full" src="/common/img/sp/05/ttl03.png" alt="WE LOVE プチモ"></h2>
    <div class="module-type01">
        <div class="module-body bg-type05 inner10">
            <div class="module-body">
                <div id="timeline">
                    <?php
                    $args = array(
                        'post_type' => 'nico_profile',
                        'post_per_page' => -1,
                    );
                    $the_query = new WP_Query($args);
                    ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <ul class="timeline-inner">
                            <?php while ($the_query->have_posts()) : ?>
                                <?php $the_query->the_post(); ?>
                                <li class="item">
                                    <a href="<?php the_permalink(); ?>">
                                        <dl>
                                            <dt><?php the_post_thumbnail(array(134,0)); ?></dt>
                                            <dd class="name"><?php the_title(); ?></dd>
                                        </dl>
                                    </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
            </div>
        </div>
    <!--/.module-type01--></div>
<!--/#main--></article>
