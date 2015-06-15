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
        'http://feedblog.ameba.jp/rss/ameblo/tsumori-nono/rss20.xml',
    );
    $group3 = array(
        'http://feedblog.ameba.jp/rss/ameblo/nicopuchi-staff/rss20.xml',
    );
    $item_group1 = returnArrayData($group1, 1);
    $item_group2 = returnArrayData($group2, 2);
    $item_group3 = returnArrayData($group3, 3);
    $item_group4 = getXMLData();
    $items = array_merge($item_group1, $item_group2, $item_group3, $item_group4);

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
                    $tmp['blog_image'] = 'ttl_blog04.png'; //chua biet
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

function getXMLData(){
  $note=<<<XML
<?xml version="1.0" encoding="UTF-8" standalone="no"?>
<data>
    <article>
        <title><![CDATA[記事タイトル1]]></title>
        <datetime><![CDATA[記事投稿日時1]]></datetime>
        <img><![CDATA[画像URL1]]></img>
        <name><![CDATA[投稿者の名前1]]></name>
        <body><![CDATA[記事本文1]]></body>
        <link><![CDATA[リンク先URL1]]></link>
    </article>
    <article>
        <title><![CDATA[記事タイトル2]]></title>
        <datetime><![CDATA[記事投稿日時2]]></datetime>
        <img><![CDATA[画像URL2]]></img>
        <name><![CDATA[投稿者の名前2]]></name>
        <body><![CDATA[記事本文2]]></body>
        <link><![CDATA[リンク先URL2]]></link>
    </article>
    <article>
        <title><![CDATA[記事タイトル3]]></title>
        <datetime><![CDATA[記事投稿日時3]]></datetime>
        <img><![CDATA[画像URL3]]></img>
        <name><![CDATA[投稿者の名前3]]></name>
        <body><![CDATA[記事本文3]]></body>
        <link><![CDATA[リンク先URL3]]></link>
    </article>
    <article>
        <title><![CDATA[記事タイトル4]]></title>
        <datetime><![CDATA[記事投稿日時4]]></datetime>
        <img><![CDATA[画像URL4]]></img>
        <name><![CDATA[投稿者の名前4]]></name>
        <body><![CDATA[記事本文4]]></body>
        <link><![CDATA[リンク先URL4]]></link>
    </article>
</data>
XML;

$xml=simplexml_load_string($note);
$item = array();
    foreach($xml->children() as $child) {
        $tmp['title']=$child->title.'';
        $tmp['title_link']=$child->link.'';
        $tmp['date']=$child->datetime.'';
        $tmp['desc']=$child->body.'';
        $tmp['image']=$child->img.'';
        $tmp['blog_image'] = 'ttl_blog03.png'; //chua biet
        $item[] = $tmp;
      }
    return $item;
}
