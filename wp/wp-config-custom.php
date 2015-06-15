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