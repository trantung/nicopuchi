<?php
/**
 * Define Pagination Area
 */
// number object of page
define('ITEM_PER_PAGE', 36);
// max display page link.
define('MAX_PAGE_LINK', 6);
// first of Page
define('FIRST_PAGE', 1);
// jump page
define('JUMP_PAGE', 1);
// NUM OF BEFORE CURRENT PAGE
define('BEFORE_CURRENT_PAGE', 2);
// NUM OF AFTER CURRENT PAGE
define('AFTER_CURRENT_PAGE', 3);
// SPECIAL SEGMENT PAGE
define('SPECIAL_SEGMENT_PAGE', 4);

define('DISABLE_WP_CRON', true);

//タイムラインでの1回ごとの表示最大数
define('ITEM_PER_TIMELINE', 12);

//もっと見るの最大回数（デフォルト表示は1回目とみなす）
define('MORE_COUNT_PER_TIMELINE', 2);

/**
 * Define URL RSS data
 */
define('ROOT_URL', 'http://52.68.157.55');
define('USER_AUTH', 'guest');
define('PASSWORD_AUTH', 'nadia');

define('BLOG_TYPE_PETIT_MO'           , '1');   //プチモブログ
define('BLOG_TYPE_SUPER_DOKUMO'       , '2');   //スーパー読モブログ
define('BLOG_TYPE_PETIT_MO_OFFICIAL'  , '3');   //プチモオフィシャルブログ
define('BLOG_TYPE_NICOPETIT_ED'       , '4');   //ニコプチ編集部ブログ
define('BLOG_TYPE_NICOPETIT_SUPPORT'  , '5');   // SUPPORT
define('BLOG_TYPE_NICOPETIT_PUCHISNA' , '6');   // PUCHISNA

//BLOGのデフォルトキャラクタセット
define('BLOG_CHAR_SET', 'UTF-8');

//概要の丸め文字数
define('BLOG_DESCRIPTION_ROUND_LENGTH', 210);

//概要の丸め後追加文字
define('BLOG_DESCRIPTION_ROUND_CHAR', '&#8230;');
