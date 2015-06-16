<?php
/**
 * プチモブログマイページ
 */
?>
<article id="main">
	<?php my_breadcrumbs_sp(); ?>
	<div class="module-type01">
		<div class="module-body bg-type03 inner10">
			<?php if (have_posts()) : ?>
				<?php the_post(); ?>
				<?php the_title(); ?>
				<?php the_content(); ?>
			<?php endif; ?>
		</div>
		<!--/#main--></div>
</article><!--/#main-->


