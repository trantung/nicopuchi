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

define('WP_ROOT_DIR', dirname(dirname(dirname(__DIR__))));
define('DUP_EXEC_CHK_FILE_PATH', sprintf('%s/wp-content/themes/nicopuchi/dup_chk/dup_exec.chk', WP_ROOT_DIR));

require_once sprintf('%s/wp-config.php', WP_ROOT_DIR);

cron_exec();

function cron_exec() {
    //======================
    echoLog('RSS LOAD BATCH START!!');
    //======================

    echoLog('exsist dup file chk');
    if (canCronExec() !== false) {
        errorEndLog('cron is running!');
    }

    //======================
    echoLog('EXEC MAIN PROCCESS');
    //======================
    echoLog('set dup chk file');
    startCronExec();

    echoLog('fetch rss data');
    crawData();

    //======================
    echoLog('RSS LOAD BATCH END!!');
    //======================
    echoLog('remove dup chk file');
    endCronExec();

    echoLog('COMP RSS LOAD');
}

function echoLog () {
    $message = implode(', ', func_get_args());
    $mts_part = explode('.', microtime(true));
    printf('[%s.%-6s] %s%s', date('Y-m-d H:i:s', $mts_part[0]), $mts_part[1], $message, \PHP_EOL);
}

function errorEndLog () {
    $args = func_get_args();
    array_unshift($args, '!!ERROR!!');
    call_user_func_array('echoLog', $args);
    exit(1);
}

function canCronExec () {
    clearstatcache(DUP_EXEC_CHK_FILE_PATH, true);
    return file_exists(DUP_EXEC_CHK_FILE_PATH);
}

function startCronExec () {
    clearstatcache(DUP_EXEC_CHK_FILE_PATH, true);

    $parnet_dir =  dirname(DUP_EXEC_CHK_FILE_PATH);
    if (!file_exists($parnet_dir)) {
        if (!mkdir($parnet_dir, 0777)) {
            errorEndLog('dup chk file parent dir is not created!!', $parnet_dir);
        }
        chmod($parnet_dir, 0777);
    }
    if (!is_writable($parnet_dir)) {
        errorEndLog('dup chk file parent dir is not writable!!', $parnet_dir);
    }

    touch(DUP_EXEC_CHK_FILE_PATH);
    chmod(DUP_EXEC_CHK_FILE_PATH, 0666);
}

function endCronExec () {
    clearstatcache(DUP_EXEC_CHK_FILE_PATH, true);

    $parnet_dir =  dirname(DUP_EXEC_CHK_FILE_PATH);
    if (!file_exists($parnet_dir)) {
        errorEndLog('dup chk file parent dir is not exsist!!', $parnet_dir);
    }
    if (!is_writable($parnet_dir)) {
        errorEndLog('dup chk file parent dir is not writable!!', $parnet_dir);
    }

    if (!is_writable(DUP_EXEC_CHK_FILE_PATH)) {
        errorEndLog('dup chk file is not writable!!', DUP_EXEC_CHK_FILE_PATH);
    }

    unlink(DUP_EXEC_CHK_FILE_PATH);
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

    $item_group5 = getXMLData("http://52.68.157.55/puchisna/xml/", "guest", "nadia", 'http://52.68.157.55','ttl_blog05.png', NULL);
    $item_group6 = getXMLData("http://52.68.157.55/support/xml/", "guest", "nadia", 'http://52.68.157.55','ttl_blog06.png', NULL);
    $items = array_merge($item_group1, $item_group2, $item_group3, $item_group5, $item_group6);
    // $item_group4 = getXMLData("http://52.68.157.55/blog/feed/", "guest", "nadia", 'http://52.68.157.55','ttl_blog01.png',1);
    foreach ($item_group4 as $key => $itemxml) {
        $items = array_merge($items, $itemxml);
    }

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

function getXMLData($url, $username, $password, $domain, $bg_image,$status){
    $context = stream_context_create(array(
    'http' => array(
        'header'  => "Authorization: Basic " . base64_encode("$username:$password")
        )
    ));
    $data = file_get_contents($url, false, $context);
    $xml=simplexml_load_string($data);
    $item = array();
    $tmps = array();
    foreach($xml->children() as $child) {
        if($status == NULL){
            $tmp = getXMLDataCommon($child, $domain, $bg_image,'body',NULL);
            $item[] = $tmp; 
        }
        else{
            foreach ($child as $key => $value) {
                if($value->pubDate.'' != ''){
                    $tmp = getXMLDataCommon($value, $domain, $bg_image,'body',1);
                    $tmps[] = $tmp;
                }
            }
            $item[] = $tmps;
        }
    }

    return $item;
}

function getXMLDataCommon($child, $domain, $bg_image,$description,$status)
{
    $tmp = array();
    $tmp['title']=$child->title.'';
    $tmp['desc']=$child->$description.'';
    $tmp['blog_image'] = $bg_image; 
    $tmp['image']=$domain.$child->img.'';
    if($status == NULL){
        $tmp['title_link']=$domain.$child->link.'';
        $date = str_replace(".","-",$child->datetime.'');
        $tmp['date'] = strtotime($date);
    }
    else{
        $tmp['title_link']=$child->link.'';
        $date =date('Y-m-d H:i:s',strtotime($child->pubDate.''));
        $tmp['date'] = strtotime($date);
    }
    return $tmp;
}
