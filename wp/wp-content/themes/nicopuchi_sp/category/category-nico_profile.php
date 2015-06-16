<?php
/**
 * プチモプロフィール
 **/
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
			<div class="module-body">
				<div class="masonry">
					<?php
					$args = array(
						'post_type' => 'nico_profile',
						'posts_per_page' => 10,
					);
					query_posts($args);
					?>
					<?php if (have_posts()) : ?>
						<ul class="masonry-inner">
							<?php while (have_posts()) : the_post(); ?>
								<li class="item">
									<a href="<?php the_permalink(); ?>">
										<?php $eyecatch = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail'); ?>
										<img src="<?php echo $eyecatch[0]; ?>" alt="<?php the_title(); ?>" width="246">
										<span class="name"><?php the_title(); ?></span>
										<img class="icn-new" src="<?php home(); ?>/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">
									</a>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
					<?php my_pager($additional_loop->max_num_pages); ?>
					<!--/.masonry--></div>
			</div>

		</div>
		<!--/.module-type01--></div>
	<!--/#main--></article>
