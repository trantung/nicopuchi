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

    // getXMLData();
    include_once(ABSPATH . WPINC . '/feed.php');
    $group1  = array(
        'http://feedblog.ameba.jp/rss/ameblo/sayaka1627/rss20.xml',
        'http://feedblog.ameba.jp/rss/ameblo/yurika-love-kiss/rss20.xml',
        'http://feedblog.ameba.jp/rss/ameblo/rin7282002/rss20.xml',
        'http://feedblog.ameba.jp/rss/ameblo/rion-nakamura/rss20.xml',
        'http://feedblog.ameba.jp/rss/ameblo/20141108hr/rss20.xml',
        'http://feedblog.ameba.jp/rss/ameblo/vanillanosora23/rss20.xml',
    );
    $group2 = array(
        'http://feedblog.ameba.jp/rss/ameblo/kanon-sd/rss20.xml',
        'http://feedblog.ameba.jp/rss/ameblo/tsumori-nono/rss20.xml',
        'http://www.diamondblog.jp/official/rion_seki/feed/',
        'http://feedblog.ameba.jp/rss/ameblo/syuri-kawanabe/rss20.xml'
    );
    $group3 = array(
        'http://feedblog.ameba.jp/rss/ameblo/nicopuchi-staff/rss20.xml',
    );

    $item_group1 = returnArrayData($group1, 1);
    $item_group2 = returnArrayData($group2, 2);
    $item_group3 = returnArrayData($group3, 3);
    $item_group4 = getXMLData("http://52.68.157.55/blog/?feed=rss2", "guest", "nadia", 'http://52.68.157.55','ttl_blog01.png');
    $item_group5 = getXMLData("http://52.68.157.55/puchisna/xml/", "guest", "nadia", 'http://52.68.157.55','ttl_blog05.png');
    $item_group6 = getXMLData("http://52.68.157.55/support/xml/", "guest", "nadia", 'http://52.68.157.55','ttl_blog06.png');
    $items = array_merge($item_group1, $item_group2, $item_group3, $item_group4, $item_group5, $item_group6);

    $dataJsonFolder= get_stylesheet_directory()."/data";
    if (! file_exists($dataJsonFolder)) {
        mkdir($dataJsonFolder, 0766);
    }
    usort($items, "cmp");
    file_put_contents($dataJsonFolder."/data.json",json_encode($items));
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

    $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
    $text = preg_replace('/<img[^>]+src="[^"]+\.(?:png|jpg|jpeg)"[^>]+>/', "", $text);
    $text = preg_replace('/CANDYからの投稿/', "", $text);
    return $text;
}
function cmp($a, $b)
{
    return $a['date'] == $b['date'] ? 0 : ( $a['date'] < $b['date'] ) ? 1 : -1;
}
function returnArrayData($arrUrl,$group) {
    foreach ($arrUrl as $key => $url) {
        $urlexplode = explode("/", $url);
        $folder = $urlexplode[5];

        if($group == 4)
                $folder = "wp";
        $feed = fetch_feed($url);
        $items = $feed->get_items();
        $imagesFolder = get_stylesheet_directory()."/images";
        if (! file_exists($imagesFolder)) {
            mkdir($imagesFolder, 0766);
        }
        $imgSavePath = $imagesFolder.'/'.$folder;
        foreach ($items as $key => $item) {
            $image = returnImage($item->get_content());
            $tmp['title']  = $item->get_title();
            $tmp['title_link'] = $item->get_link();

            $tmp['date'] = strtotime($item->get_date('Y-m-d H:i:s'));
            $tmp['desc'] = returnText($item->get_description());
            if(!empty($image[0])){
                $contentImage = file_get_contents($image[0]);
                if (! file_exists($imgSavePath)) {
                    mkdir($imgSavePath, 0766);
                }
                $imgName = $imgSavePath.'/img'.$key.'.png';
                file_put_contents($imgName, $contentImage);
                $name = 'img'.$key.'.png';

                $tmp['image'] = get_stylesheet_directory_uri()."/images/".$folder.'/'.$name;
            }
            switch ($group) {
                case 1:
                    $tmp['blog_image'] = 'ttl_blog02.png';
                    break;
                case 2:
                    $tmp['blog_image'] = 'ttl_blog06.png';
                    break;
                case 3:
                    $tmp['blog_image'] = 'ttl_blog04.png';
                    break;
                case 4:
                    $tmp['blog_image'] = 'ttl_blog01.png';
                default:
                    # code...
                    break;
            }
            $arrItem[]=$tmp;
        }
    }

    return $arrItem;
}

function getXMLData($url, $username, $password, $domain, $bg_image){
    $context = stream_context_create(array(
    'http' => array(
        'header'  => "Authorization: Basic " . base64_encode("$username:$password")
        )
    ));
    $data = file_get_contents($url, false, $context);
    $xml=simplexml_load_string($data);
    $item = array();
  foreach($xml->children() as $child) {
        $tmp['title']=$child->title.'';
        $tmp['title_link']=$domain.$child->link.'';
        $tmp['date'] = str_replace(".","-",$child->datetime.'');
        $tmp['desc']=$child->body.'';
        $tmp['image']=$domain.$child->img.'';
        $tmp['blog_image'] = $bg_image; 
        $item[] = $tmp;
      }
    return $item;
}
