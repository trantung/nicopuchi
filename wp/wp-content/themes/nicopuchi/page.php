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
    else
    {
        include(TEMPLATEPATH . '/page/page-base.php');
    }
    ?>



<?php get_footer(); ?>