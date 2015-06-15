<?php
/*
Plugin Name: cron
Plugin URI: http://nicopuchi
Description: create data for site
Version: 1.0
Author: thaihv
Author URI: http://nicopuchi
License: free licence
.
Any other notes about the plugin go here
.
*/

add_filter( 'cron_schedules', 'add_cron_intervals' );

function add_cron_intervals( $schedules ) {

    $schedules['5seconds'] = array(
        // Provide the programmatic name to be used in code
        'interval' => 5, // Intervals are listed in seconds
        'display' => __('Every 5 Seconds') // Easy to read display name
    );
    return $schedules; // Do not forget to give back the list of schedules!
}

add_action( 'cron_hook', 'cron_exec' );
if( !wp_next_scheduled( 'cron_hook' ) ) {
    wp_schedule_event( time(), '5seconds', 'cron_hook' );
}

function cron_exec() {
    crawData();
    echo "cront is running!";
}

register_deactivation_hook( __FILE__, 'bl_deactivate' );

function bl_deactivate() {
    $timestamp = wp_next_scheduled( 'cron_hook' );
    wp_unschedule_event($timestamp, 'cron_hook' );
}

function crawData(){
    ///common/img/
    include_once(ABSPATH . WPINC . '/feed.php');
    $group1  = array(
        'http://feedblog.ameba.jp/rss/ameblo/sayaka1627/rss20.xml',
        // 'http://feedblog.ameba.jp/rss/ameblo/yurika-love-kiss/rss20.xml',
        'http://feedblog.ameba.jp/rss/ameblo/rin7282002/rss20.xml',
        // 'http://feedblog.ameba.jp/rss/ameblo/rion-nakamura/rss20.xml',
        'http://feedblog.ameba.jp/rss/ameblo/20141108hr/rss20.xml',
        // 'http://feedblog.ameba.jp/rss/ameblo/vanillanosora23/rss20.xml',
    );
    $group2 = array(
        'http://feedblog.ameba.jp/rss/ameblo/tsumori-nono/rss20.xml',
    );
    $group3 = array(
        'http://feedblog.ameba.jp/rss/ameblo/nicopuchi-staff/rss20.xml',
    );
    $arrItem = returnArrayData($group1, 1);
    array_merge($arrItem, returnArrayData($group2, 2));
    array_merge($arrItem, returnArrayData($group3, 3));
    file_put_contents(get_stylesheet_directory()."/data/data.json",json_encode($arrItem));
}

function returnImage ($text) {
    $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
    $arrText = null;
    if($text != null){
        $pattern = '/\bhttps?:[^)\'\'\"]+\/user_images\/[^\)\'\'\"]+\.(?:jpg|jpeg|png)/';
        preg_match_all($pattern, $text, $matches);
        if(isset($matches[0]))
            $arrText = $matches[0];
    }
    return $arrText;
}

function returnText($text){
    // var_dump($text);
    // die;
    $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
    $text = preg_replace('<img\s+src="[\d\w:\/\.]+.(?:png|jpg)"\s+(?:width="\d+")?\s+(?:height="\d+")?\s*>', '', $text);
    return $text;
}

function returnArrayData($arrUrl,$group) {
    foreach ($arrUrl as $key => $url) {
        $urlexplode = explode("/", $url);
        $folder = $urlexplode[5];
        $feed = fetch_feed($url);
        $items = $feed->get_items();
        $imgSavePath = get_stylesheet_directory().'/images/'.$folder;
        foreach ($items as $key => $item) {
            $image = returnImage($item->get_content());
            $tmp['title']  = $item->get_title();
            $tmp['title_link'] = $item->get_link();
            $tmp['date'] = strtotime($item->get_date());
            $tmp['desc'] = returnText($item->get_description());
            if(!empty($image[0])){
                $contentImage = file_get_contents($image[0]);
                if (! file_exists($imgSavePath)) {
                    mkdir($imgSavePath, 0766);
                }
                $imgName = $imgSavePath.'/img'.$key.'.png';
                file_put_contents($imgName, $contentImage);
                $name = 'img'.$key.'.png';
                $tmp['image'] = "/images/".$folder.'/'.$name;
            }
            switch ($group) {
                case 1:
                    $tmp['blog_image'] = 'ttl_blog02.png';
                    break;
                case 2:
                    $tmp['blog_image'] = 'ttl_blog04.png';
                    break;
                case 3:
                    $tmp['blog_image'] = 'ttl_blog04.png';
                    break;
                default:
                    # code...
                    break;
            }
            $arrItem[]=$tmp;
        }
    }

    return $arrItem;
}
