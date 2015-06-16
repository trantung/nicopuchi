<?php
/**
 * 固定ページ
 */
?>
<?php get_header(); ?>



<?php
if (is_page('blog_sign_up'))
{
	include(STYLESHEETPATH . '/page/page-blog_sign_up.php');
}
elseif (is_page('blog_sign_in'))
{
	include(STYLESHEETPATH . '/page/page-blog_sign_in.php');
}
elseif (is_page('blog_mypage'))
{
	include(STYLESHEETPATH . '/page/page-blog_mypage.php');
}
else
{
	include(STYLESHEETPATH . '/page/page-base.php');
}
?>



<?php get_footer(); ?>