<?php
/**
 * プチニュー10
 */
?>

<article id="main">
	<?php my_breadcrumbs_sp() ?>

	<div class="module-type01">
		<div class="module-body bg-type04 inner10">
			<div class="module-head">
				<h2 class="module-head-ttl mb10"><img class="full" src="<?php home(); ?>/common/img/sp/03/ttl01.png" alt="プチニュー10"></h2>
			</div>
			<?php if (have_posts()) : the_post(); ?>
			<div id="puchinew10-detail">
				<p class="ttl"><?php the_title(); ?></p>
				<p class="date"><?php echo get_the_date('Y.m.d Ag:i'); ?></p>
				<hr class="line-pink">
				<?php the_content(); ?>
			</div>
			<?php endif; ?>

			<a href="<?php home(); ?>/puchinew" class="btn type02 tx_c mt10"><span class="tx12"><img src="<?php home(); ?>/common/img/sp/04/icn_arrow.jpg" width="32" height="22">プチニュー10一覧</span></a>
		</div>
	</div><!--/.module-type01-->
</article><!--/#main-->