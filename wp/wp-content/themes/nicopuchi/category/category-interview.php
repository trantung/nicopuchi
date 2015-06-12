<?php
/**
 * インタビューカテゴリ
 */
?>



<div id="contents">
    <?php
    $args = array(
        'category_name' => $cat_info->slug,
        'posts_per_page' => 40,
        'paged' => get_query_var('paged')
    );
    query_posts($args);
    ?>
    <?php if (have_posts()) : ?>
        <?php while (have_posts()) : the_post(); ?>
            <article>
                <div class="content">
                    <div class="content_inner">
                        <div class="intro">
                            <p class="category">
                                <?php echo $cat_info->name; ?>
                                <?php if ($cat_info->slug === 'keamane') : ?>
                                    <br>
                                    <span class="sub">（介護支援専門員）</span>
                                <?php elseif ($cat_info->slug === 'helper') : ?>
                                    <br>
                                    <span class="sub">（訪問介護員）</span>
                                <?php endif; ?>
                            </p>
                            <?php if (get_field('title')) : ?>
                                <h1 class="title"><?php the_field('title'); ?></h1>
                            <?php endif; ?>
                            <?php $main_img = wp_get_attachment_image_src(get_field('main_img'), 'medium'); ?>
                            <?php if ($main_img) : ?>
                                <img class="pict" src="<?php echo $main_img[0]; ?>" alt="">
                            <?php endif; ?>
                            <?php if (get_field('office')) : ?>
                                <p class="office"><?php the_field('office'); ?></p>
                            <?php endif; ?>
                            <?php if (get_field('job')) : ?>
                                <p class="job"><?php the_field('job'); ?></p>
                            <?php endif; ?>
                            <?php if (get_field('name') || get_field('name_roman')) : ?>
                                <p class="name">
                                    <?php if (get_field('name')) : ?>
                                        <?php the_field('name'); ?><span class="name_aid">さん</span>
                                    <?php endif; ?>
                                    <?php if (get_field('name_roman')) : ?>
                                        <span class="name_roman"><?php the_field('name_roman'); ?></span>
                                    <?php endif; ?>
                                </p>
                            <?php endif; ?>
                            <?php if (get_field('age') || get_field('prefecture')) : ?>
                                <p class="age">(
                                    <?php the_field('age'); ?>
                                    <?php if (get_field('age') && get_field('prefecture')) : ?>
                                        /
                                    <?php endif; ?>
                                    <?php the_field('prefecture'); ?>
                                    )
                                </p>
                            <?php endif; ?>
                            <ul>
                                <?php if (get_field('etc01')) : ?>
                                    <li><?php the_field('etc01'); ?></li>
                                <?php endif; ?>
                                <?php if (get_field('etc02')) : ?>
                                    <li><?php the_field('etc02'); ?></li>
                                <?php endif; ?>
                                <?php if (get_field('etc03')) : ?>
                                    <li><?php the_field('etc03'); ?></li>
                                <?php endif; ?>
                                <?php if (get_field('etc04')) : ?>
                                    <li><?php the_field('etc04'); ?></li>
                                <?php endif; ?>
                                <?php if (get_field('etc05')) : ?>
                                    <li><?php the_field('etc05'); ?></li>
                                <?php endif; ?>
                            </ul>
                            <?php if ($cat_info->slug === 'helper') : ?>
                                <div class="coming_soon">Coming Soon</div>
                            <?php endif; ?>
                        </div>
                        <div class="content_body">
                            <?php if (get_field('lead')) : ?>
                                <p class="interview_lead"><?php the_field('lead'); ?></p>
                            <?php endif; ?>
                            <div class="edit clearfix">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="induction">
                    <div class="induction_inner">
                        <p class="title"><img src="<?php home(); ?>/common/img/contents_induction_title01.png" alt="あなたの再就職をしっかりとサポート"></p>
                        <ul class="point">
                            <li><img src="<?php home(); ?>/common/img/contents_induction_text01_01.png" alt="Point1 全国最大規模の福祉人材専門求人サイト"></li>
                            <li><img src="<?php home(); ?>/common/img/contents_induction_text01_02.png" alt="Point2 全国の福祉人材センター・バンクのイベント情報にアクセス"></li>
                            <li><img src="<?php home(); ?>/common/img/contents_induction_text01_03.png" alt="Point3 職種や地域などを絞って地元の求人情報を検索可能"></li>
                        </ul>
                        <dl>
                            <dt><img src="<?php home(); ?>/common/img/contents_induction_box01_text01.png" alt="福祉分野で全国最大規模のデータバンク"></dt>
                            <?php
                            if ($cat_info->slug === 'kaigo')
                            {
                                $url = 'http://www1.fukushi-work.jp/cool/oubo/findOfferPub.do?cmd=find&data.limit=20&data.offset=0&data.mode=1&data.newGraduateFlg=0&data.newFlg=0&data.event1Flg=-1&data.event2Flg=-1&data.event3Flg=-1&data.event4Flg=-1&data.event5Flg=-1&data.orderBy=runFmDtm_desc&from=top&data.prefCd=&data.fieldCd=&data.jobTypeCd=0100&data.empStyleCd=&x=102&y=22';
                            }
                            elseif ($cat_info->slug === 'hoiku')
                            {
                                $url = 'http://www1.fukushi-work.jp/cool/oubo/findOfferPub.do?cmd=find&data.limit=20&data.offset=0&data.mode=1&data.newGraduateFlg=0&data.newFlg=0&data.event1Flg=-1&data.event2Flg=-1&data.event3Flg=-1&data.event4Flg=-1&data.event5Flg=-1&data.orderBy=runFmDtm_desc&from=top&data.prefCd=&data.fieldCd=&data.jobTypeCd=0500&data.empStyleCd=&x=132&y=16';
                            }
                            elseif ($cat_info->slug === 'keamane')
                            {
                                $url = 'http://www1.fukushi-work.jp/cool/oubo/findOfferPub.do?cmd=find&data.limit=20&data.offset=0&data.mode=1&data.newGraduateFlg=0&data.newFlg=0&data.event1Flg=-1&data.event2Flg=-1&data.event3Flg=-1&data.event4Flg=-1&data.event5Flg=-1&data.orderBy=runFmDtm_desc&from=top&data.prefCd=&data.fieldCd=&data.jobTypeCd=0200&data.empStyleCd=&x=101&y=13';
                            }
                            elseif ($cat_info->slug === 'helper')
                            {
                                $url = 'http://www1.fukushi-work.jp/cool/oubo/findOfferPub.do?cmd=find&data.limit=20&data.offset=0&data.mode=1&data.newGraduateFlg=0&data.newFlg=0&data.event1Flg=-1&data.event2Flg=-1&data.event3Flg=-1&data.event4Flg=-1&data.event5Flg=-1&data.orderBy=runFmDtm_desc&from=top&data.prefCd=&data.fieldCd=&data.jobTypeCd=0400&data.empStyleCd=&x=114&y=19';
                            }
                            ?>
                            <dd><a href="<?php echo $url; ?>" target="_blank"><img src="<?php home(); ?>/common/img/contents_induction_box01_btn01.png" alt="福祉のお仕事"></a></dd>
                        </dl>
                    </div>
                </div>
            </article>
        <?php endwhile; ?>
    <?php endif; ?>
</div>


