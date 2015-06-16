<?php
/**
 * 固定ページ
 */
?>
<?php get_header(); ?>



<?php
if (is_page('blog_mypage'))
{
	include(TEMPLATEPATH . '/page/page-blog_mypage.php');
}
?>



<?php get_footer(); ?>