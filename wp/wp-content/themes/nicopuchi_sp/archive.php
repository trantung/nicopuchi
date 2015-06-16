<?php
/**
 * カスタム投稿
 */

get_header();



if (is_post_type_archive('puchinew'))
{
	include(STYLESHEETPATH . '/category/category-puchinew.php');
}
elseif (is_post_type_archive('nico_profile'))
{
	include(STYLESHEETPATH . '/category/category-nico_profile.php');
}
elseif (is_post_type_archive('nico_cover'))
{
	include(STYLESHEETPATH . '/category/category-nico_cover.php');
}



get_footer();