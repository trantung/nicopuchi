<?php
/**
 * プチモブログマイページ
 */
?>
<article id="main">
	<?php my_breadcrumbs_sp(); ?>
	<div class="module-type01">
		<?php if (have_posts()) : ?>
			<?php the_post(); ?>
			<?php the_title(); ?>
			<?php the_content(); ?>
		<?php endif; ?>
	<!--/#main--></div>
</article><!--/#main-->


