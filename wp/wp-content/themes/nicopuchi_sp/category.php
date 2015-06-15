<?php
/**
 * カテゴリーページ
 */

$cat_info = get_category($cat);
$cat_list_str = '|' . get_category_parents($cat, false, '|', true);



get_header();



if (stristr($cat_list_str, '|interview|'))
{
    include(TEMPLATEPATH . '/category/category-interview.php');
}
else
{
    include(TEMPLATEPATH . '/category/category-info.php');
}



get_footer();
