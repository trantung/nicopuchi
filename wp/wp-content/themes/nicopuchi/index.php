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
                <?php
                $args = array(
                    'post_type' => 'top_mainimage',
                    'posts_per_page' => 1,
                );
                $the_query = new WP_Query($args);
                ?>
                <?php if ($the_query->have_posts()) : ?>
                    <?php $the_query->the_post(); ?>
                    <?php if (have_rows('mainimage')) : ?>
                        <ul>
                            <?php while (have_rows('mainimage')) : the_row(); ?>
                                <li>
                                    <?php if (get_sub_field('link')) : ?>
                                        <a href="<?php the_sub_field('link'); ?>" class="fdb" target="_<?php the_sub_field('window'); ?>">
                                    <?php endif; ?>
                                        <?php $image = wp_get_attachment_image_src(get_sub_field('image'), 'full'); ?>
                                        <img src="<?php echo $image[0]; ?>" alt="<?php the_sub_field('alt'); ?>" width="824" height="342">
                                    <?php if (get_sub_field('link')) : ?>
                                        </a>
                                    <?php endif; ?>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                <?php endif; ?>
                <?php wp_reset_postdata(); ?>
                <!--/#mainvisual--></div>

            <?php 
            // require_once('common/inc/pc/blogsupporter.php'); ?>

            <?php /* Comment for VN, Maker please check!
            <div class="module-type01">
				<div class="module-head">
					<h2 class="icn type02"><img src="/common/img/pc/index/ttl02.png" alt="ニコ☆プチタイムライン" width="221" height="32"></h2>
					<a href="" class="right fdb"><img src="/common/img/pc/img_list.png" alt="一覧" width="70" height="22"></a>
				</div>
				<div class="module-body bg-type02">
					<div id="timeline" class="masonry">
						<ul class="masonry-inner mt10">
							<?php foreach ($disp_time_line as $key => $value)
							{ ?>
								<li class="item">
									<a href="<?= $value['title_link'] ?>" class="new">
										<img src="<?= get_stylesheet_directory_uri() . $value['image'] ?>" alt="" width="246" height="164">
										<dl class="update">
											<dt><img src="/common/img/pc/<?= $value['blog_image'] ?>" alt="プチモ☆ブログ情報" width="123" height="28"></dt>
											<dd><?= date('Y m d | g:i a', $value['date']) ?></dd>
										</dl>
										<span class="blog-ttl"><?= $value['title'] ?></span>
										<span class="blog-desc" class="description" style="height: 50px; overflow: hidden;"><?= $value['desc'] ?></span>
										<?php if ($value['date'] == strtotime(date('Y-m-d')))
										{ ?>
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
            
			<?php if (0): // 一時的に処理停止 ?>
            */ ?>

            <div class="module-type01">
                <div class="module-head">
                    <h2 class="icn type02"><img src="/common/img/pc/index/ttl02.png" alt="ニコ☆プチタイムライン" width="221" height="32"></h2>
                    <a href="<?=home_url('timeline');?>" class="right fdb"><img src="/common/img/pc/img_list.png" alt="一覧" width="70" height="22"></a>
                </div>
                <div class="module-body bg-type02">
                    <div id="timeline" class="masonry">
                        <ul class="masonry-inner mt10">
                            <?php foreach ($jsonData as $key => $blogData)
                            { ?>
                                <?php if ($key < 24)
                            { ?>
                                <li class="item <?php if($key >11) echo 'more-item' ?> "
                                 <?php if($key >11) echo 'style="display:none"' ?> >
                                    <?php echo renderHtmlTimeline($blogData)?>
                                </li>
                            <?php }
                            else
                            { ?>
                            <?php break;} ?>

                            <?php } ?>
                        </ul>
                        <a href="" class="btn-more fdb">
                            <span><img src="/common/img/pc/btn_more.png" alt="もっと見る"></span>
                        </a>

                        <a href="" class="btn-timeline fdb" style="display:none">
                            <span><img src="/common/img/pc/viewlist.png" alt="一覧を見る"></span>
                        </a>
                        <!--/#timeline--></div>
                </div>
                <!--/.module-type01--></div>
            <?php //endif; ?>

            <div class="module-type01">
                <div class="module-head">
                    <h2 class="icn type03"><img src="/common/img/pc/index/ttl03.png" alt="プチモ☆ブログ" width="160" height="32"></h2>
                    <a href="/blog/" class="right fdb"><img src="/common/img/pc/img_list.png" alt="一覧" width="70" height="22"></a>
                </div>
                <div class="module-body bg-type03">
                    <div id="puchiblog" class="slider-area">
                        <?php
                        $args = array(
                            'category_name' => 'blog',
                            'posts_per_page' => 8,
                        );
                        $the_query = new WP_Query($args);
                        ?>
                        <?php if ($the_query->have_posts()) : ?>
                            <ul class="slider-type02 index-list">
                                <?php while ($the_query->have_posts()) : ?>
                                    <?php $the_query->the_post(); ?>
                                    <li>
                                        <?php
                                        $date_diff = (strtotime(date('Y-m-d')) - strtotime(get_the_date('Y-m-d'))) / (3600 * 24);
                                        $new_flag = ($date_diff <= 4) ? true : false;
                                        ?>
                                        <a href="<?php the_permalink(); ?>"<?php if ($new_flag) : ?> class="new"<?php endif; ?>>
                                            <?php the_post_thumbnail(array(140, 94)); ?>
                                            <span class="update"><?php echo get_the_date('Y.m.d'); ?></span>
                                            <span class="blog-ttl"><?php the_title(); ?></span>
                                            <span class="model-name type02"><?php the_author(); ?></span>
                                            <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                        </a>
                                    </li>
                                <?php endwhile; ?>
                            </ul>
                        <?php endif; ?>
                        <?php wp_reset_postdata(); ?>
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
                            <?php foreach ($jsonData as $key => $blogData) {?>
                            <?php if($blogData['blog_type'] == BLOG_TYPE_NICOPETIT_ED){ ?>
                            <li>
                                <?php echo commonRenderHTMLIndex($blogData,'' ,140,94,'25px', 1)?>

                            </li>
                            <?php } ?>
                            <?php } ?>

                            
                        </ul>
                        <!--/#staffblog--></div>
                </div>
                <!--/.module-type01--></div>

            <div class="module-type01">
                <div class="module-head">
                    <h2 class="icn type05"><img src="/common/img/pc/index/ttl05.png" alt="We&hearts;プチモ" width="130" height="32"></h2>
                    <a href="/nico_profile/" class="right fdb"><img src="/common/img/pc/img_list.png" alt="一覧" width="70" height="22"></a>
                </div>
                <div class="module-body bg-type05">
                    <?php
                    $args = array(
                        'post_type' => 'nico_profile',
                        'post_per_page' => 13,
                        'orderby' => 'rand',
                    );
                    $the_query = new WP_Query($args);
                    ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <ul id="welovepuchi" class="list-type-center"><!--
                            <?php while ($the_query->have_posts()) : ?>
                                <?php $the_query->the_post(); ?>
                                        --><li>
                                <a href="<?php the_permalink(); ?>" class="fdb">
                                    <?php $eyecatch = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail'); ?>
                                    <img src="<?php echo $eyecatch[0]; ?>" alt="<?php the_title(); ?>" width="110" height="73">
                                    <span class="name"><?php the_title(); ?></span>
                                </a>
                            </li><!--
                            <?php endwhile; ?>
                        --></ul>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <!--/.module-type01--></div>
            <!--/#main--></div>
        <div id="side" class="mt0">

            <?php include(dirname(__FILE__).'/../../../../common/inc/pc/bnr-area01.html'); ?>

            <div class="module-type01">
                <div class="module-head">
                    <h2 class="icn type06"><img src="/common/img/pc/index/ttl06.png" alt="プチニュー10" width="128" height="32"></h2>
                </div>
                <div class="module-body bg-type06 inner15">
                    <?php
                    $args = array(
                        'post_type' => 'puchinew',
                        'post_per_page' => 8,
                    );
                    $the_query = new WP_Query($args);
                    ?>
                    <?php if ($the_query->have_posts()) : ?>
                        <ul class="index-list-type02 fl">
                            <?php while ($the_query->have_posts()) : ?>
                                <?php $the_query->the_post(); ?>
                                <li>
                                    <?php
                                    $date_diff = (strtotime(date('Y-m-d')) - strtotime(get_the_date('Y-m-d'))) / (3600 * 24);
                                    $new_flag = ($date_diff <= 4) ? true : false;
                                    ?>
                                    <?php if (get_the_content()) : ?>
                                    <a href="<?php the_permalink(); ?>"<?php if ($new_flag) : ?> class="new"<?php endif; ?>>
                                        <?php elseif (get_field('link')) : ?>
                                        <a href="<?php the_field('link'); ?>" target="_<?php the_field('window'); ?>"<?php if ($new_flag) : ?> class="new"<?php endif; ?>>
                                            <?php else : ?>
                                            <a href="#"<?php if ($new_flag) : ?> class="new"<?php endif; ?>>
                                                <?php endif; ?>
                                                <dl>
                                                    <dt>
                                                        <?php the_post_thumbnail(array(88, 0)); ?>
                                                        <span class="date"><?php echo get_the_date('Y.m.d'); ?></span>
                                                    </dt>
                                                    <dd>
                                                        <p class="desc">
                                                            <?php the_title(); ?>
                                                        </p>
                                                    </dd>
                                                </dl>
                                                <img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
                                            </a>
                                </li>
                            <?php endwhile; ?>
                        </ul>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>
                </div>
                <!--/.module-type01--></div>

            <div class="module-type01">
                <div class="module-head">
                    <h2 class="icn type03"><img src="/common/img/pc/index/ttl07.png" alt="スーパー読モブログ" width="194" height="32"></h2>
                </div>
                <div class="module-body bg-type01 inner15">
                    <ul id="readersblog" class="index-list type-side01">
                        <?php echo getSixBlog($jsonData)?>
                        <!--/#readersblog--></ul>
                </div>
                <!--/.module-type01--></div>

            <?php //include(dirname(__FILE__).'/../../../../common/inc/pc/readersblog.html'); ?>

            <?php include(dirname(__FILE__).'/../../../../common/inc/pc/magazine.html'); ?>

            <?php include(dirname(__FILE__).'/../../../../common/inc/pc/sticker.html'); ?>

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

        $("document").ready(function() {
            $('#mainvisual ul').slick({
                infinite: true,
                autoplay: true,
                dots: true,
                slidesToShow: 1,
                slidesToScroll: 1
            });
            $('.slider-type01').slick({
                infinite: true,

                autoplay: true,
                dots: true,
                slidesToShow: 4,
                slidesToScroll: 1
            });
            $('.slider-type02').slick({
                infinite: true,
                autoplay: true,
                dots: true,

                slidesToShow: 5,
                slidesToScroll: 1
            });
        });
    </script>
    <script type="text/javascript" src="/common/js/masonry.pkgd.min.js"></script>
    <script>

        $(function() {
            $('.masonry-inner').masonry();
            $('.btn-more').click(function(e) {
                e.preventDefault();
                $(this).hide();
                $('.more-item').show();
                $('.btn-timeline').show();
                $('.masonry-inner').masonry();
            });
            $('.btn-timeline').click(function(e) {
                e.preventDefault();
                var url = "<?=home_url('timeline');?>" + "/#24";
                $(location).attr('href', url);
            });

        })
    </script>
    <script type="text/javascript" src="/common/js/jquery.heightLine.js"></script>
    <script>
        $("#blogsupporter li a,#blogsupporter li .no-link").heightLine(0);
        $("#puchiblog li a").heightLine(1);
    </script>

<?php get_footer(); ?>