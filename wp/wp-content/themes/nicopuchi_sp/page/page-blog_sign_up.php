<?php
/**
 * プチモブログマイページ
 */
?>
<article id="main">
	<?php my_breadcrumbs_sp(); ?>
	<div class="module-type01">
		<div class="module-body bg-type03 inner10">
			<div class="module-head">
				<h2 class="module-head-ttl mb10"><img class="full" src="<?php home(); ?>/common/img/sp/04/ttl01.png" alt="プチモ☆ブログ"></h2>
			</div>
			<?php if (have_posts()) : ?>
				<?php the_post(); ?>
				<?php the_title(); ?>
				<?php the_content(); ?>
			<?php endif; ?>
		</div>
		<!--/#main--></div>
</article><!--/#main-->


