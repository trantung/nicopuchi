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
    echo $classes;
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
        $html = '<div class="pagination">' . $eol;
        $html .= '<ul>' . $eol;

        if ($paged > 1)
        {
            $html .= '<li><a href="' . get_pagenum_link($paged - 1) . '">&lt;</a></li>' . $eol;
        }

        for ($i = 1; $i <= $pages; $i ++)
        {
            if (1 != $pages && (! ($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems))
            {
                if ($paged == $i)
                {
                    $html .= '<li><span class="current">' . $i . '</span></li>' . $eol;
                }
                else
                {
                    $html .= '<li><a href="' . get_pagenum_link($i) . '">' . $i . '</a></li>' . $eol;
                }
            }
        }

        if ($paged < $pages)
        {
            $html .= '<li><a href="' . get_pagenum_link($paged + 1) . '">&gt;</a></li>' . $eol;
        }

        $html .= '</ul>' . $eol;
        $html .= '</div>' . $eol;
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


function getJsonData(){
//    $str = file_get_contents(get_stylesheet_directory_uri().'/data/data.json');

    $str = file_get_contents('/var/www/src/public_html/wp/wp-content/themes/nicopuchi/data/data.json');

    $jsonData = json_decode($str, true);

    if ($jsonData === null) {
    	$json_decode = [];
    }

    return $jsonData;
}


