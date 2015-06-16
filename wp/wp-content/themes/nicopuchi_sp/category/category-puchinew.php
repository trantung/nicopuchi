<?php
/**
 * プチニュー10
 **/
?>

<article id="main">
	<?php my_breadcrumbs_sp() ?>

	<div class="module-type01">
		<div class="module-type01 bg-type06 inner15">
			<div class="module-head">
				<h2 class="module-head-ttl mb10"><img class="full" src="<?php home(); ?>/common/img/sp/03/ttl01.png" alt="プチニュー10"></h2>
			</div>
			<?php if (have_posts()): ?>
				<ul id="puchinew10" class="index-list-type02">
					<?php while (have_posts()): the_post(); ?>
						<li>
							<?php
							$date_diff = (strtotime(date('Y-m-d')) - strtotime(get_the_date('Y-m-d'))) / (3600 * 24);
							$new_flag = ($date_diff <= 4) ? true : false;
							?>
							<?php if (get_the_content()): ?>
							<a href="<?php the_permalink(); ?>"<?php if ($new_flag) : ?> class="new"<?php endif; ?>>
								<?php elseif (get_field('link')) : ?>
								<a href="<?php the_field('link'); ?>" target="_<?php the_field('window'); ?>"<?php if ($new_flag) : ?> class="new"<?php endif; ?>>
									<?php else: ?>
									<a href="#"<?php if ($new_flag) : ?> class="new"<?php endif; ?>>
										<?php endif; ?>
										<dl>
											<dt>
												<?php $eyecatch = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail'); ?>
												<img class="full thum" src="<?php echo $eyecatch[0]; ?>" alt="">
											</dt>
											<dd>
												<p class="desc"><?php the_title(); ?></p>
												<span class="date"><?php echo get_the_date('Y.m.d'); ?></span>
											</dd>
										</dl>
										<img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36" title="NEW">
										<?php if (get_the_content() || get_field('link')) : ?>
									</a>
								<?php endif; ?>
						</li>
					<?php endwhile; ?>
					<!--/#puchinew10-->
				</ul>
			<?php endif; ?>
			<?php my_pager_sp($additional_loop->max_num_pages); ?>
		</div>
	</div><!--/.module-type01-->
</article><!--/#main-->
