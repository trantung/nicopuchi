<?php
/**
 * 投稿ページ
 */

//$cats = get_the_category();
//$cat_current = $cats[0];
//$cat_list_str = '|' . get_category_parents($cat_current->cat_ID, false, '|', true);

$cats = get_the_category();
if ($cats)
{
    $cat_current = $cats[0];
    $cat_list_str = '|' . get_category_parents($cat_current->cat_ID, false, '|', true);

    get_header();

    if (stristr($cat_list_str, '|blog|'))
    {
        include(TEMPLATEPATH . '/single/single-blog.php');
    }

    get_footer();
}
else
{
    get_header();

    if ($post_type === 'puchinew')
    {
        include(TEMPLATEPATH . '/single/single-puchinew.php');
    }
    elseif ($post_type === 'nico_profile')
    {
        include(TEMPLATEPATH . '/single/single-nico_profile.php');
    }
    elseif ($post_type === 'nico_cover')
    {
        include(TEMPLATEPATH . '/single/single-nico_cover.php');
    }

    get_footer();
}



get_footer();
