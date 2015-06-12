<?php
/**
 * 投稿ページ
 */

$cats = get_the_category();
$cat_current = $cats[0];
$cat_list_str = '|' . get_category_parents($cat_current->cat_ID, false, '|', true);



get_header();



if (stristr($cat_list_str, '|info|'))
{
    include(TEMPLATEPATH . '/single/single-info.php');
}
elseif (stristr($cat_list_str, '|interview|'))
{
    include(TEMPLATEPATH . '/single/single-interview.php');
}



get_footer();