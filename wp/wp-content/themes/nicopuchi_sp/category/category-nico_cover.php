<?php
/**
 * 表紙コレクション
 */
?>

<article id="main">

	<?php my_breadcrumbs_sp() ?>


	<div class="module-type01">
		<div class="module-body bg-type02">
			<div class="module-head inner10">
				<h2 class="module-head-ttl pb10"><img class="full" src="/common/img/sp/07/ttl01.png" alt="表紙コレクション"></h2>
				<div id="cover">
					<?php
					$args = array(
						'post_type' => 'nico_cover',
						'posts_per_page' => -1,
					);
					query_posts($args);
					?>
					<?php if (have_posts()) : ?>
						<?php while (have_posts()) : the_post(); ?>
							<?php if (is_loop_first()) : ?>
								<?php
								$eyecatch_id = get_post_thumbnail_id();
								$eyecatch_s_img = wp_get_attachment_image_src($eyecatch_id, 'thumbnail');
								$eyecatch_l_img = wp_get_attachment_image_src($eyecatch_id, 'full');
								$img01_s = wp_get_attachment_image_src(get_field('image01'), 'thumbnail');
								$img01_l = wp_get_attachment_image_src(get_field('image01'), 'full');
								$img02_s = wp_get_attachment_image_src(get_field('image02'), 'thumbnail');
								$img02_l = wp_get_attachment_image_src(get_field('image02'), 'full');
								$img03_s = wp_get_attachment_image_src(get_field('image03'), 'thumbnail');
								$img03_l = wp_get_attachment_image_src(get_field('image03'), 'full');
								$img04_s = wp_get_attachment_image_src(get_field('image04'), 'thumbnail');
								$img04_l = wp_get_attachment_image_src(get_field('image04'), 'full');
								$img05_s = wp_get_attachment_image_src(get_field('image05'), 'thumbnail');
								$img05_l = wp_get_attachment_image_src(get_field('image05'), 'full');
								?>
								<div id="newest">
									<div id="newest_cover">
										<div id="icn_new"><img src="<?php home(); ?>/common/img/sp/07/icn_new.png" width="90" height="90" alt="最新号"></div>
										<a href="<?php echo $eyecatch_l_img[0]; ?>" class="modalLink">
											<div class="cover_ph"><img class="full" src="<?php echo $eyecatch_s_img[0]; ?>" alt=""></div>
											<div class="closeup"><img src="/common/img/sp/07/icn_zoom.png" width="20" height="20">大きい画像を見る</div>
										</a>
									</div>
									<div class="cover_ph_sub"><a href="<?php echo $img01_l[0]; ?>" class="modalLink"><img class="full" src="<?php echo $img01_s[0]; ?>"></a></div>
									<div class="txtbx">
										<?php the_field('image01_text'); ?>
									</div>
									<div class="cover_ph_sub"><a href="<?php echo $img02_l[0]; ?>" class="modalLink"><img class="full" src="<?php echo $img02_s[0]; ?>"></a></div>
									<div class="txtbx">
										<?php the_field('image02_text'); ?>
									</div>
									<div class="cover_ph_sub"><a href="<?php echo $img03_l[0]; ?>" class="modalLink"><img class="full" src="<?php echo $img03_s[0]; ?>"></a></div>
									<div class="txtbx">
										<?php the_field('image03_text'); ?>
									</div>
									<div class="txtbx">
										<p class="tx_c"><img src="<?php echo $img04_s[0]; ?>" width="132" height="285"></p>
									</div>
								</div>
							<?php endif; ?>
							<?php if (is_loop_first()) : ?>
								<div id="timeline_issue">
								<ul class="timeline-inner">
							<?php endif; ?>
							<li class="item">
								<?php
								$eyecatch_id = get_post_thumbnail_id();
								$eyecatch_s_img = wp_get_attachment_image_src($eyecatch_id, 'thumbnail');
								$eyecatch_l_img = wp_get_attachment_image_src($eyecatch_id, 'full');
								$img01 = wp_get_attachment_image_src(get_field('image01'), 'full');
								$img02 = wp_get_attachment_image_src(get_field('image02'), 'full');
								$img03 = wp_get_attachment_image_src(get_field('image03'), 'full');
								$img04 = wp_get_attachment_image_src(get_field('image04'), 'full');
								$img05 = wp_get_attachment_image_src(get_field('image05'), 'full');
								?>
								<dl>
									<dt class="date"><?php the_title(); ?></dt>
									<dd><img class="full" src="<?php echo $eyecatch_s_img[0]; ?>" alt=""></dd>
								</dl>
								<a href="<?php echo $img01[0]; ?>"><span class="read_btn">立ち読み</span></a>
								<a href="<?php echo $img02[0]; ?>"></a>
								<a href="<?php echo $img03[0]; ?>"></a>
								<a href="<?php echo $img04[0]; ?>"></a>
								<a href="<?php echo $img05[0]; ?>"></a>
							</li>
							<?php if (is_loop_last()) : ?>
							</ul>
						<?php endif; ?>
							<!--/#timeline--></div>
						<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<!--/.module-type01-->
	<!--/#main--></article>
