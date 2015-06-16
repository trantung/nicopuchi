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
				<div id="timeline">
					<?php
					$args = array(
						'post_type' => 'nico_profile',
						'posts_per_page' => -1,
					);
					query_posts($args);
					?>
					<?php if (have_posts()) : ?>
						<ul class="timeline-inner">
							<?php while (have_posts()) : the_post(); ?>
								<li class="item">
									<a href="<?php the_permalink(); ?>">
										<dl>
											<dt>
												<?php $eyecatch = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail'); ?>
												<img class="full" src="<?php echo $eyecatch[0]; ?>" alt="">
											</dt>
											<dd class="name"><?php the_title(); ?></dd>
										</dl>
									</a>
								</li>
							<?php endwhile; ?>
						</ul>
					<?php endif; ?>
					<!--/.masonry--></div>
			</div>

		</div>
		<!--/.module-type01--></div>
	<!--/#main--></article>
