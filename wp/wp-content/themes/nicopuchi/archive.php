<?php
/**
 * カスタム投稿
 */

get_header();



if (is_post_type_archive('puchinew'))
{
    include(TEMPLATEPATH . '/category/category-puchinew.php');
}



get_footer();