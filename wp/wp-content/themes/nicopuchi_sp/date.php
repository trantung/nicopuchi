<?php
/**
 * カテゴリーページ
 */

$cat_info = get_category($cat);
$cat_list_str = '|' . get_category_parents($cat, false, '|', true);



get_header();



if (is_category('blog'))
{
	include(STYLESHEETPATH . '/category/category-blog.php');
}



get_footer();
