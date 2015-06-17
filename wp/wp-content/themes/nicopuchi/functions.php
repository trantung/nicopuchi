<?php
/*
 * ---------------------------------------------------------------------
 * デバッグ関連
 * ---------------------------------------------------------------------
 */

// FirePHP
require_once(dirname(__FILE__) . '/_FirePHPCore/fb.php');

// 開発時はtrue、運用時はfalseにする
if (true)
{
    FB::setEnabled(true);
    ob_start(); // FirePHPデバッグ用
    error_reporting(E_ALL & ~E_NOTICE);
    ini_set('display_errors', 1);
}
else
{
    FB::setEnabled(false);
    ini_set('display_errors', 0);
}



/*
 * ---------------------------------------------------------------------
 * セキュリティ対策
 * ---------------------------------------------------------------------
 */

send_nosniff_header(); // XSS対策
header('X-FRAME-OPTIONS: DENY'); // クリックジャッキング対策

// ログインエラーの表示変更
add_filter('login_errors', 'login_error_control');
function login_error_control($error_msg)
{
    $error_msg = 'ユーザー名またはパスワードが間違っています。';
    return $error_msg;
}

// 投稿者アーカイブを非表示にする
add_action('parse_query', 'disable_author_archive');
function disable_author_archive($q)
{
    if ($q->is_admin)
    {
        return $q;
    }
    elseif ($q->is_author)
    {
        unset($_REQUEST['author']);
        $q->set('author', '');
        $q->set_404();
    }
}



/*
 * ---------------------------------------------------------------------
 * アクション・フィルター関連
 * ---------------------------------------------------------------------
 */

//remove_action('wp_head', 'wp_enqueue_scripts', 10);
remove_action('wp_head', 'feed_links_extra', 10);
remove_action('wp_head', 'rsd_link', 10);
remove_action('wp_head', 'wlwmanifest_link', 10);
//remove_action('wp_head', 'index_rel_link', 10);
//remove_action('wp_head', 'parent_post_rel_link', 10);
//remove_action('wp_head', 'start_post_rel_link', 10);
//remove_action('wp_head', 'adjacent_posts_rel_link', 10);
//remove_action('wp_head', 'locale_stylesheet', 10);
//remove_action('wp_head', 'wp_print_styles', 10);
//remove_action('wp_head', 'wp_print_head_scripts', 10);
remove_action('wp_head', 'wp_generator', 10);

//remove_filter( 'the_content', 'wptexturize' );  // コンテンツの自動整形を解除
//remove_filter ('the_content', 'wpautop');  // コンテンツの自動段落（auto paragraph)を解除
//remove_filter( 'comment_text', 'wptexturize' );  // コメントの自動整形を解除
//remove_filter('comment_text', 'wpautop');  // コメントの自動段落（auto paragraph)を解除
//remove_filter( 'the_excerpt', 'wptexturize' );  // 抜粋の自動整形を解除
//remove_filter('the_excerpt', 'wpautop');  // 抜粋の自動段落（auto paragraph)を解除



/*
 * ---------------------------------------------------------------------
 * その他もろもろ
 * ---------------------------------------------------------------------
 */

// ループの「偶数、奇数、最初、最後、余剰」を取得する
function is_loop_first()

{
    global $wp_query;
    return ($wp_query->current_post === 0);
}

function is_loop_last()

{
    global $wp_query;
    return ($wp_query->current_post + 1 === $wp_query->post_count);
}

function is_loop_odd()

{
    global $wp_query;
    return ((($wp_query->current_post + 1) % 2) === 1);
}

function is_loop_even()

{
    global $wp_query;
    return ((($wp_query->current_post + 1) % 2) === 0);
}

function is_loop_residue($base, $current)

{
    global $wp_query;
    return ((($wp_query->current_post + 1) % $base) === $current);
}

// 共通の変数
function home()
{
    echo home_url();
}



/*
 * ---------------------------------------------------------------------
 * 管理画面の設定
 * ---------------------------------------------------------------------
 */

// 購読者に管理画面を表示させない
add_action('auth_redirect', 'subscriber_go_to_home');
function subscriber_go_to_home($user_id)
{
    $user = get_userdata($user_id);
    if (! $user->has_cap('edit_posts'))
    {
        wp_redirect(get_home_url());
        exit();
    }
}

// 購読者にツールバー（admin bar）を表示させない
add_action('after_setup_theme', 'subscriber_hide_admin_bar');
function subscriber_hide_admin_bar()
{
    $user = wp_get_current_user();
    if (isset($user->data) && ! $user->has_cap('edit_posts'))
    {
        show_admin_bar(false);
    }
}



// ログイン画面のロゴを変更する
/*
add_action('login_enqueue_scripts', 'custom_login_logo');
function custom_login_logo()
{
    ?>
    <style>
        .login #login h1 a {
            width: 320px;
            height: 54px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.13);
            background: url(<?php echo get_stylesheet_directory_uri(); ?>/img/login_logo.png) no-repeat 0 0;
        }
    </style>
<?php
}
*/



// 不要なサイドバーメニューを非表示にする
add_action('admin_menu', 'remove_menu');
function remove_menu()
{
    /*
    if (current_user_can('editor'))
    {
        remove_menu_page('edit-comments.php');
        remove_menu_page('tools.php');
    }
    */
}



// 投稿画面のカテゴリーを並び替えない
add_filter('wp_terms_checklist_args', 'ps_wp_terms_checklist_args', 10, 2);
function ps_wp_terms_checklist_args($args, $post_id)
{
    if ($args['checked_ontop'] !== false)
    {
        $args['checked_ontop'] = false;
    }
    return $args;
}



// 投稿画面で特定のカテゴリを選択不可にする
add_action('admin_head-post-new.php', 'my_category_disabled');
add_action('admin_head-post.php', 'my_category_disabled');
function my_category_disabled()
{
    /*
    echo '<script>
        jQuery(document).ready(function ($) {
            $(".categorychecklist #in-category-1").attr("disabled", "disabled");
            $(".categorychecklist #in-category-2").attr("disabled", "disabled");
        });
    </script>';
    */
}



// カスタム投稿タイプ登録（プチニュー10）
add_action('init', 'register_cpt_puchinew');
function register_cpt_puchinew()
{
    $labels = array(
        'name' => 'プチニュー10',
        'singular_name' => 'プチニュー10',
        'add_new' => '新規追加',
        'add_new_item' => '新規追加',
        'edit_item' => '編集する',
        'new_item' => '新規',
        'all_items' => '一覧',
        'view_item' => '投稿を表示',
        'search_items' => '検索する',
        'not_found' => '投稿が見つかりませんでした。',
        'not_found_in_trash' => 'ゴミ箱内に投稿が見つかりませんでした。',
        'menu_name' => 'プチニュー10',
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => '',
        'supports' => array(
            'title',
            'author',
            'revisions',
            'editor',
            'thumbnail',
            //excerpt
            //comments
            //trackbacks
            //custom-fields
            //revisions
            //page-attributes ：属性（「hierarchical」を「true」に設定している場合のみ指定）
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        //'menu_icon' => '',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type('puchinew', $args);
}



// カスタム投稿タイプ登録（プチモプロフィール）
add_action('init', 'register_cpt_nico_profile');
function register_cpt_nico_profile()
{
    $labels = array(
        'name' => 'プチモプロフィール',
        'singular_name' => 'プチモプロフィール',
        'add_new' => '新規追加',
        'add_new_item' => '新規追加',
        'edit_item' => '編集する',
        'new_item' => '新規',
        'all_items' => '一覧',
        'view_item' => '投稿を表示',
        'search_items' => '検索する',
        'not_found' => '投稿が見つかりませんでした。',
        'not_found_in_trash' => 'ゴミ箱内に投稿が見つかりませんでした。',
        'menu_name' => 'プチモプロフィール',
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => '',
        'supports' => array(
            'title',
            'author',
            'revisions',
            'editor',
            'thumbnail',
            //excerpt
            //comments
            //trackbacks
            //custom-fields
            //revisions
            //page-attributes ：属性（「hierarchical」を「true」に設定している場合のみ指定）
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        //'menu_icon' => '',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type('nico_profile', $args);
}



// カスタム投稿タイプ登録（表紙コレクション）
add_action('init', 'register_cpt_nico_cover');
function register_cpt_nico_cover()
{
    $labels = array(
        'name' => '表紙コレクション',
        'singular_name' => '表紙コレクション',
        'add_new' => '新規追加',
        'add_new_item' => '新規追加',
        'edit_item' => '編集する',
        'new_item' => '新規',
        'all_items' => '一覧',
        'view_item' => '投稿を表示',
        'search_items' => '検索する',
        'not_found' => '投稿が見つかりませんでした。',
        'not_found_in_trash' => 'ゴミ箱内に投稿が見つかりませんでした。',
        'menu_name' => '表紙コレクション',
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => '',
        'supports' => array(
            'title',
            'author',
            'revisions',
            'thumbnail',
            //'editor',
            //excerpt
            //comments
            //trackbacks
            //custom-fields
            //revisions
            //page-attributes ：属性（「hierarchical」を「true」に設定している場合のみ指定）
        ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        //'menu_icon' => '',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type('nico_cover', $args);
}



// カスタム投稿タイプ登録（表紙コレクション）
add_action('init', 'register_cpt_top_mainimage');
function register_cpt_top_mainimage()
{
    $labels = array(
        'name' => 'トップメイン画像',
        'singular_name' => 'トップメイン画像',
        'add_new' => '新規追加',
        'add_new_item' => '新規追加',
        'edit_item' => '編集する',
        'new_item' => '新規',
        'all_items' => '一覧',
        'view_item' => '投稿を表示',
        'search_items' => '検索する',
        'not_found' => '投稿が見つかりませんでした。',
        'not_found_in_trash' => 'ゴミ箱内に投稿が見つかりませんでした。',
        'menu_name' => 'トップメイン画像',
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => false,
        'description' => '',
        'supports' => array(
            'title',
            'author',
            'revisions',
            //'thumbnail',
            //'editor',
            //excerpt
            //comments
            //trackbacks
            //custom-fields
            //revisions
            //page-attributes ：属性（「hierarchical」を「true」に設定している場合のみ指定）
        ),
        'public' => false,
        'show_ui' => true,
        'show_in_menu' => true,
        'menu_position' => 6,
        //'menu_icon' => '',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => true,
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );
    register_post_type('top_mainimage', $args);
}



// editor-style.cssの設定
add_editor_style('editor-style.css');


add_theme_support('post-thumbnails');



// ■■■フィードを独自のものに差し替え
remove_filter('do_feed_rss2', 'do_feed_rss2', 10);
add_action('do_feed_rss2', 'custom_feed_rss2', 10);
function custom_feed_rss2()
{
    $template_file = '/feed/feed-rss2.php';
    load_template(get_template_directory() . $template_file);
}



// tinymceのクリーンアップ無効化
add_filter('tiny_mce_before_init', 'tinymce_init');
function tinymce_init($init)
{
    $init['verify_html'] = false;
    return $init;
}







/*
 * ---------------------------------------------------------------------
 * 表示画面の設定
 * ---------------------------------------------------------------------
 */

// <body>classの出力
function my_body_class()
{
    $classes = implode(' ', get_body_class());
    $classes .= ' wp';

    if (is_category())
    {
        global $cat;
        global $cat_info;
        if ($cat_info->parent)
        {
            $cat_list_str = get_category_parents($cat, false, '|', true);
            $cat_list_str = explode('|', $cat_list_str);
            array_pop($cat_list_str);
            array_pop($cat_list_str);
            foreach ($cat_list_str as $item)
            {
                $classes .= ' category-' . $item;
            }
        }
    }
    elseif (is_single())
    {
        global $cat_list_str;
        $cat_list = explode('|', $cat_list_str);
        array_shift($cat_list);
        array_pop($cat_list);
        foreach ($cat_list as $item)
        {
            $classes .= ' category-' . $item;
        }
    }
    elseif (is_page())
    {
        global $post;
        $classes .= ' page-' . $post->post_name;
    }
    //echo $classes;
}



// パンくずの出力
function my_breadcrumbs()
{
    $eol = "\n";
    $val = '';
    if (! is_home())
    {
        $val .= '<nav class="breadcrumbs">' . $eol;
        $val .= '<ul>' . $eol;
        $val .= '<li><a href="' . home_url() . '/">TOP</a></li>' . $eol;

        if (is_search())
        {
            $val .= '<li>検索結果</li>' . $eol;
        }
        elseif (is_404())
        {
            $val .= '<li>お探しのページが見つかりませんでした</li>' . $eol;
        }
        elseif (is_category())
        {
            global $cat;
            global $cat_info;
            if ($cat_info->parent)
            {
                $cat_list_link = get_category_parents($cat, true, '|');
                $cat_list_link = explode('|', $cat_list_link);
                array_pop($cat_list_link);
                array_pop($cat_list_link);
                foreach ($cat_list_link as $item)
                {
                    $val .= '<li>' . $item . '</li>' . $eol;
                }
            }
            $val .= '<li>' . $cat_info->name . '</li>' . $eol;
        }
        elseif (is_post_type_archive())
        {
            global $post_type;
            $post_type_info = get_post_type_object($post_type);
            $val .= '<li>' . $post_type_info->label . '</li>' . $eol;
        }
        elseif (is_single())
        {
            global $cats;
            if ($cats)
            {
                global $cat_current;
                $cat_list_link = get_category_parents($cat_current->cat_ID, true, '|');
                $cat_list_link = explode('|', $cat_list_link);
                array_pop($cat_list_link);
                foreach ($cat_list_link as $item)
                {
                    $val .= '<li>' . $item . '</li>' . $eol;
                }
            }
            else
            {
                global $post_type;
                $post_type_info = get_post_type_object($post_type);
                $val .= '<li><a href="' . get_post_type_archive_link($post_type) . '">' . $post_type_info->label . '</a></li>' . $eol;
            }
            $val .= '<li>' . strip_tags(get_the_title()) . '</li>' . $eol;
        }
        elseif (is_page())
        {
            $val .= '<li>' . strip_tags(get_the_title()) . '</li>' . $eol;
        }
        $val .= '</ul>' . $eol;
        $val .= '</nav>' . $eol;
        echo $val;
    }
}

// パンくずの出力 SP
function my_breadcrumbs_sp()
{
    $eol = "\n";
    $val = '';
    if (! is_home())
    {
        $val .= '<ul class="dir-path cFix">' . $eol;
        $val .= '<li><a href="' . home_url() . '/">TOP</a>&gt;</li>' . $eol;

        if (is_search())
        {
            $val .= '<li>検索結果</li>' . $eol;
        }
        elseif (is_404())
        {
            $val .= '<li>お探しのページが見つかりませんでした</li>' . $eol;
        }
        elseif (is_category())
        {
            global $cat;
            global $cat_info;
            if ($cat_info->parent)
            {
                $cat_list_link = get_category_parents($cat, true, '|');
                $cat_list_link = explode('|', $cat_list_link);
                array_pop($cat_list_link);
                array_pop($cat_list_link);
                foreach ($cat_list_link as $item)
                {
                    $val .= '<li>' . $item . '&gt;</li>' . $eol;
                }
            }
            $val .= '<li>' . $cat_info->name . '</li>' . $eol;
        }
        elseif (is_post_type_archive())
        {
            global $post_type;
            $post_type_info = get_post_type_object($post_type);
            $val .= '<li>' . $post_type_info->label . '</li>' . $eol;
        }
        elseif (is_single())
        {
            global $cats;
            if ($cats)
            {
                global $cat_current;
                $cat_list_link = get_category_parents($cat_current->cat_ID, true, '|');
                $cat_list_link = explode('|', $cat_list_link);
                array_pop($cat_list_link);
                foreach ($cat_list_link as $item)
                {
                    $val .= '<li>' . $item . '&gt;</li>' . $eol;
                }
            }
            else
            {
                global $post_type;
                $post_type_info = get_post_type_object($post_type);
                $val .= '<li><a href="' . get_post_type_archive_link($post_type) . '">' . $post_type_info->label . '</a>&gt;</li>' . $eol;
            }
            $val .= '<li>' . strip_tags(get_the_title()) . '</li>' . $eol;
        }
        elseif (is_page())
        {
            $val .= '<li>' . strip_tags(get_the_title()) . '</li>' . $eol;
        }
        $val .= '</ul>' . $eol;
        echo $val;
    }
}


// ページネーションの出力
function my_pager($pages = '', $range = 2)
{
    $eol = "\n";
    $showitems = ($range * 1) + 1;

    global $paged;
    if (empty($paged))
    {
        $paged = 1;
    }

    if (! $pages)
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (! $pages)
        {
            $pages = 1;
        }
    }

    //if (1 != $pages)
    //{
    $html = '<p class="page">' . $eol;

    if ($paged > 1)
    {
        $html .= '<a class="prev page-numbers" href="' . get_pagenum_link($paged - 1) . '">&lt;</a>' . $eol;
    }

    for ($i = 1; $i <= $pages; $i ++)
    {
        //if (1 != $pages && (! ($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems))
        if ((! ($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems))
        {
            if ($paged == $i)
            {
                $html .= '<span class="page-numbers current">' . $i . '</span>' . $eol;
            }
            else
            {
                $html .= '<a class="page-numbers" href="' . get_pagenum_link($i) . '">' . $i . '</a>' . $eol;
            }
        }
    }

    if ($paged < $pages)
    {
        $html .= '<a class="next page-numbers" href="' . get_pagenum_link($paged + 1) . '">&gt;</a>' . $eol;
    }

    $html .= '</p>' . $eol;
    echo $html;
    //}
}

// ページネーションの出力
function my_pager_sp($pages = '', $range = 2)
{
    $eol = "\n";
    $showitems = ($range * 1) + 1;

    global $paged;
    if (empty($paged))
    {
        $paged = 1;
    }

    if (! $pages)
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (! $pages)
        {
            $pages = 1;
        }
    }

    //if (1 != $pages)
    //{
    $html = '<ul class="pageNav01 pt10">' . $eol;

    if ($paged > 1)
    {
        $html .= '<li><a href="' . get_pagenum_link($paged - 1) . '"><img src="/common/img/sp/arrow_L.jpg" width="12" height="12"></a>' . $eol;
    }

    for ($i = 1; $i <= $pages; $i ++)
    {
        //if (1 != $pages && (! ($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems))
        if ((! ($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems))
        {
            if ($paged == $i)
            {
                $html .= '<li><span>' . $i . '</span></li>' . $eol;
            }
            else
            {
                $html .= '<li><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>' . $eol;
            }
        }
    }

    if ($paged < $pages)
    {
        $html .= '<li><a href="' . get_pagenum_link($paged + 1) . '"><img src="/common/img/sp/arrow_R.jpg" width="12" height="12"></a></li>' . $eol;
    }

    $html .= '</p>' . $eol;
    echo $html;
    //}
}


//「続きを読む」のリンク先を変更（URLから「#」以降を削除）
add_filter('the_content_more_link', 'remove_more_jump_link');
function remove_more_jump_link($link)
{
    $offset = strpos($link, '#more-');
    if ($offset)
    {
        $end = strpos($link, '"', $offset);
    }
    if ($end)
    {
        $link = substr_replace($link, '', $offset, $end - $offset);
    }
    return $link;
}



// コメント
function my_comlist($comment, $args, $depth)
{
    $GLOBALS['comment'] = $comment; ?>
    <li>
        <div class="comment-desc">
            <?php comment_text(); ?>
        </div>
        <div class="comment-foot">
            <?php the_author_meta('nickname', $comment->user_id); ?> | <?php comment_date('Y年m月d日'); ?>
        </div>
    </li>
<?php
}

// コメント SP
function my_comlist_sp($comment, $args, $depth)
{
	$GLOBALS['comment'] = $comment; ?>
	<?php comment_text(); ?>
	<p class="comment_credit"><?php the_author_meta('nickname', $comment->user_id); ?> 　|　 <?php comment_date('Y年m月d日'); ?></p>
	<hr class="line">
<?php
}



// 月別アーカイブ関連
add_filter('getarchives_where', 'custom_archives_where', 10, 2);
add_filter('getarchives_join', 'custom_archives_join', 10, 2);
function custom_archives_join($x, $r)
{
    global $wpdb;
    $cat_ID = $r['cat'];
    if (isset($cat_ID))
    {
        return $x . " INNER JOIN $wpdb->term_relationships ON ($wpdb->posts.ID = $wpdb->term_relationships.object_id) INNER JOIN $wpdb->term_taxonomy ON ($wpdb->term_relationships.term_taxonomy_id = $wpdb->term_taxonomy.term_taxonomy_id)";
    }
    else
    {
        return $x;
    }
}

function custom_archives_where($x, $r)
{
    global $wpdb;
    $cat_ID = $r['cat'];
    if (isset($cat_ID))
    {
        return $x . " AND $wpdb->term_taxonomy.taxonomy = 'category' AND $wpdb->term_taxonomy.term_id IN ($cat_ID)";
    }
    else
    {
        $x;
    }
}

function wp_get_cat_archives($opts, $cat)
{
    $args = wp_parse_args($opts, array('echo' => '1')); // default echo is 1.
    $echo = $args['echo'] != '0'; // remember the original echo flag.
    $args['echo'] = 0;
    $args['cat'] = $cat;

    $tag = ($args['format'] === 'option') ? 'option' : 'li';
    $archives = wp_get_archives(build_query($args));
    $archs = explode('</' . $tag . '>', $archives);
    $links = array();

    $requested = "http://{$_SERVER['SERVER_NAME']}{$_SERVER['REQUEST_URI']}";
    $requested = str_replace('/', '\/', $requested);
    $requested = str_replace('?', '\?', $requested);
    $requested = str_replace('.', '\.', $requested);

    foreach ($archs as $archive)
    {
        $link = preg_replace("/='([^']+)'/", "='$1?cat={$cat}'", $archive);
        $pattern = '/' . $requested . '/';
        if (preg_match($pattern, $link))
        {
            $link = str_replace('<option', '<option selected="selected" ', $link);
        }
        array_push($links, $link);
    }
    $result = implode('</' . $tag . '>', $links);

    if ($echo)
    {
        echo $result;
    }
    else
    {
        return $result;
    }
}

function get_monthly_archive($cat)
{
    $html = '';
    $archives_year = strip_tags(wp_get_cat_archives('type=yearly&show_count=0&format=custom&echo=0', $cat));
    $archives_year_array = explode("\n", $archives_year);
    array_pop($archives_year_array);
    $archives = wp_get_cat_archives('type=monthly&show_post_count=0&format=custom&use_desc_for_title=0&echo=0', $cat);
    $archives_array = explode("\n", $archives);

    foreach ($archives_year_array as $key => $year_value)
    {
        $year = ltrim($year_value);
        /*
        $html .= '<li>';
        if ($key == 0)
        {
            $html .= '<dl class="nowyear">';
        }
        else
        {
            $html = '<dl>';
        }
        $html .= '<dt><span></span>' . $year . '年</dt>';
        */

        foreach ($archives_array as $archives_value)
        {
            if (intval(strip_tags($archives_value)) == intval($year_value))
            {
                $archives_value = ltrim($archives_value);
                $html .= '<li>' . $archives_value . '</li>';
            }
        }
        //$html .= '</dl></li>';
    }
    $html = '<ul>' . $html . '</ul>';
    return $html;
}

// カレンダー
function get_my_calendar_sp($cat_name) {

	$category_name = (!$cat_name) ? 'blog' : $cat_name;

	$cat_id = get_category_by_slug($category_name);
	$cat_id = $cat_id->cat_ID;

	$current_y = (get_query_var('year')) ? get_query_var('year') : date_i18n('Y');
	$current_m = (get_query_var('monthnum')) ? sprintf('%02d', get_query_var('monthnum')) : date_i18n('m');
	$current_d = date_i18n('d');

	$calendar_ym = $current_y.'-'.$current_m;

	$args = array(
		'category_name'	=> $category_name,
		'post_status' => 'publish',
		'posts_per_page' => -1, // 全件取得
		'year'	=> $current_y,
		'month'	=> $current_m,
        /*
		'meta_query' => array(
			array(
				'key' => 'event_date',
				'value' => $calendar_ym,
				'compare' => 'LIKE'
			)
		)
        */
	);

	$event_posts = get_posts( $args );
	$events = array();
	if ( $event_posts ) {
		foreach ( $event_posts as $post ) {
			$event_date = date_i18n('Y-m-d', strtotime($post->post_date));
			$events[$event_date] = 1;
		}
	}

	// 表示年月の日数を取得
	$calendar_t = date_i18n('t', strtotime($calendar_ym.'-01'));

	if ((int)$current_m == 1) {
		$prev_year = $current_y - 1;
		$prev_month = 12;
		$next_year = $current_y;
		$next_month = (int)$current_m + 1;
	} elseif ((int)$current_m == 12) {
		$prev_year = $current_y;
		$prev_month = (int)$current_m - 1;
		$next_year = $current_y + 1;
		$next_month = 1;
	} else {
		$prev_year = $current_y;
		$prev_month = (int)$current_m - 1;
		$next_year = $current_y;
		$next_month = (int)$current_m + 1;
	}

	$prev_link = '/date/'.$prev_year.'/'.$prev_month.'?cat='.$cat_id;
	$next_link = '/date/'.$next_year.'/'.$next_month.'?cat='.$cat_id;

	$calendar_html = <<<__EOF__
				<div class="calendar_header cFix">
					<ul class="pageNav03">
						<li class="fl_l"><a href="{$prev_link}"><img src="/common/img/sp/04/icn_cal_l.gif" width="22" height="22"></a></li>
						<li>{$current_m}月</li>
						<li class="fl_r"><a href="{$next_link}"><img src="/common/img/sp/04/icn_cal_r.gif" width="22" height="22"></a></li>
					</ul>
				</div>
				<table class="calendar_body">
					<tr>
						<th scope="col" class="sun">日</th>
						<th scope="col">月</th>
						<th scope="col">火</th>
						<th scope="col">水</th>
						<th scope="col">木</th>
						<th scope="col">金</th>
						<th scope="col" class="sat">土</th>
					</tr>
					<tr>
__EOF__;

	$index = 0;
	for ( $i = 1; $i <= $calendar_t; $i++ ) {
		$calendar_day = date_i18n('w', strtotime($calendar_ym . '-' . $i));
		$calendar_date = ( $i < 10 ) ? '0' . $i : $i;

		if ($i == 1 && $calendar_day != 0) {
			for ( $index = 0; $index < $calendar_day; $index++ ) {
				$calendar_html .= '<td class="gray">&nbsp;</td>';
			}
		}

		if ($calendar_day == 0) {
			$class = 'sun';
		} else {
			$class = '';
		}

		if ($events[$calendar_ym.'-'.$calendar_date] == '1') {
			$day_url = '/date/'.$current_y.'/'.$current_m.'/'.$i.'?cat='.$cat_id;
			$day_link_html = '<a href="'.$day_url.'">'.$i.'</a>';
		} else {
			$day_link_html = $i;
		}
		$calendar_html .= '<td class="'.$class.'">'.$day_link_html.'</td>';

		if ($calendar_day == 6) {
			$calendar_html .= '</tr>';
		}

		$index ++;

		if ( $i == $calendar_t && $index < 42 ) {
			for ( $index; $index < 42; $index++ ) {
				if ( $calendar_day == 6 ) {
					$calendar_day = 0;
					$calendar_html .= '</tr><tr>';
				} elseif ($calendar_day < 6) {
					$calendar_day ++;
					$calendar_html .= '<td>&nbsp;</td>';
				}
			}
		}
	}

	$calendar_html .= '</tr></table>';

	echo $calendar_html;

}

/**
 * BLOG画像のリストを返します。
 */
function get_blog_type_img_name_list () {
    return [
        BLOG_TYPE_PETIT_MO           => 'ttl_blog01.png',   //プチモブログ
        BLOG_TYPE_SUPER_DOKUMO       => 'ttl_blog02.png',   //スーパー読モブログ
        BLOG_TYPE_PETIT_MO_OFFICIAL  => 'ttl_blog03.png',   //プチモオフィシャルブログ
        BLOG_TYPE_NICOPETIT_ED       => 'ttl_blog04.png',    //ニコプチ編集部ブログ
        BLOG_TYPE_NICOPETIT_SUPPORT  => 'ttl_blog05.png',    //http://www.nicopuchi.jp/support/
        BLOG_TYPE_NICOPETIT_PUCHISNA => 'ttl_blog06.png',   //http://www.nicopuchi.jp/puchisna/
    ];
}

function getJsonData()
{
    $source = file_get_contents(TEMPLATEPATH . '/data/data.json');
    $jsonData = json_decode($source, true);
    $jsonData !== null ?: $jsonData = [];
    return $jsonData;
}
function commonRenderHTMLIndex($data,$alt,$width,$height, $description_height, $status)
{
    $html ='';
    if($status == 1 && $class_new !=NULL){
       $html.= '<a href="'.$data['entry_url'].' class="new" ">
        <img class="thumbsnail" src="'.$data['image_list'][0].'" alt="'.$alt.'" width="'.$width.'" height="'.$height.'">'; 
    }
    if($status == 1 && $class_new ==NULL){
       $html.= '<a href="'.$data['entry_url'].' ">
        <img class="thumbsnail" src="'.$data['image_list'][0].'" alt="'.$alt.'" width="'.$width.'" height="'.$height.'">'; 
    }

    if($status == 2){
        $html.= '<a href="'.$data['entry_url'].' " class="new">
                <img src="'.$data['image_list'][0].'" alt="'.$alt.'" width="'.$width.'" height="'.$height.'">';
    }

    if($status == 1){
        $html.='<span class="update">'.date('Y m d', $data['entry_date']).'</span>';
    }
    if($status == 2){
        $url = get_blog_type_img_name_list()[$data['blog_type']];
        $html.='
            <dl class="update">
            <dt><img src="/common/img/pc/'.$url.'" alt="プチモ☆ブログ情報" width="123" height="28"></dt>';
        $html.= '<dd>'.date('Y m d | g:i a', $data['entry_date']).'</dd>
                </dl>';
        
    }
    $html.= '<span class="blog-ttl">'.$data['title'].'</span>
    <span class="blog-theme" class="blog-theme" class="description" style="height: '.$description_height.'; overflow:hidden !important;">'.$data['description'].'</span>' ;
    if ($data['entry_date'] == strtotime(date('Y-m-d'))){ 
        if($status == 1){
            $html.= '<img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="36" height="36">' ;
        }
        if($status == 2){
            $html.= '<img class="icn-new" src="/common/img/pc/icn_new.png" alt="NEW" width="60" height="60">' ;
        }
    } 
    $html.='</a>' ;
    return $html;
                        
                        
}

