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
// parse_rss();


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

    $item_group2 = build_data_for_json();

    $item_group3 = getXMLData(ROOT_URL . "/puchisna/xml/", USER_AUTH, PASSWORD_AUTH, ROOT_URL, 3);
    $item_group4 = getXMLData(ROOT_URL . "/support/xml/", USER_AUTH, PASSWORD_AUTH, ROOT_URL, 4);
    $data = array_merge($item_group2, $item_group3, $item_group4);

    $dataJsonFolder= get_stylesheet_directory()."/data";
    if (! file_exists($dataJsonFolder)) {
        mkdir($dataJsonFolder, 0766);
    }
    usort($data, "cmp");
    file_put_contents($dataJsonFolder."/data.json",json_encode($data));
}

// function returnImage ($text) {
//     $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
//     $arrText = null;
//     if($text != null){
//         $pattern = '/\bhttps?:[^)\'\'\"]+\/user_images\/[^\)\'\'\"]+\.(?:jpg|jpeg|png)/';
//         preg_match_all($pattern, $text, $matches);
//         if(isset($matches[0]))
//             $arrText = $matches[0];
//     }
//     return $arrText;
// }

// function returnText($text){

//     $text = html_entity_decode($text, ENT_QUOTES, 'UTF-8');
//     $text = preg_replace('/<img[^>]+src="[^"]+\.(?:png|jpg|jpeg)"[^>]+>/', "", $text);
//     $text = preg_replace('/CANDYからの投稿/', "", $text);
//     return $text;
// }
function cmp($a, $b)
{
    return $a['entry_date'] == $b['entry_date'] ? 0 : ( $a['entry_date'] < $b['entry_date'] ) ? 1 : -1;
}
// function returnArrayData($arrUrl,$group) {
//     foreach ($arrUrl as $key => $url) {
//         $urlexplode = explode("/", $url);
//         $folder = $urlexplode[5];

//         if($group == 4)
//                 $folder = "wp";
//         $feed = fetch_feed($url);
//         $items = $feed->get_items();
//         $imagesFolder = get_stylesheet_directory()."/images";
//         if (! file_exists($imagesFolder)) {
//             mkdir($imagesFolder, 0766);
//         }
//         $imgSavePath = $imagesFolder.'/'.$folder;
//         foreach ($items as $key => $item) {
//             $image = returnImage($item->get_content());
//             $tmp['title']  = $item->get_title();
//             $tmp['title_link'] = $item->get_link();

//             $tmp['date'] = strtotime($item->get_date('Y-m-d H:i:s'));
//             $tmp['desc'] = returnText($item->get_description());
//             if(!empty($image[0])){
//                 $contentImage = file_get_contents($image[0]);
//                 if (! file_exists($imgSavePath)) {
//                     mkdir($imgSavePath, 0766);
//                 }
//                 $imgName = $imgSavePath.'/img'.$key.'.png';
//                 file_put_contents($imgName, $contentImage);
//                 $name = 'img'.$key.'.png';

//                 $tmp['image'] = get_stylesheet_directory_uri()."/images/".$folder.'/'.$name;
//             }
//             switch ($group) {
//                 case 1:
//                     $tmp['blog_image'] = 'ttl_blog02.png';
//                     break;
//                 case 2:
//                     $tmp['blog_image'] = 'ttl_blog06.png';
//                     break;
//                 case 3:
//                     $tmp['blog_image'] = 'ttl_blog04.png';
//                     break;
//                 case 4:
//                     $tmp['blog_image'] = 'ttl_blog01.png';
//                 default:
//                     # code...
//                     break;
//             }
//             $arrItem[]=$tmp;
//         }
//     }

//     return $arrItem;
// }

function getXMLData($url, $username, $password, $domain, $blog_type){
    $context = stream_context_create(array(
    'http' => array(
        'header'  => "Authorization: Basic " . base64_encode("$username:$password")
        )
    ));
    $data = file_get_contents($url, false, $context);
    $xml = simplexml_load_string($data);
    $item = array();
    foreach($xml->children() as $child) {
        $tmp['title']=$child->title.'';
        $tmp['entry_url']=$domain.$child->link.'';
        $tmp['description']=$child->body.'';
        $date = str_replace(".","-",$child->datetime.'');
        $tmp['entry_date'] = strtotime($date);
        $tmp['image_list'][]=$domain.$child->img.'';
        $tmp['blog_type'] = $blog_type; 

        $item[] = $tmp;
        
    }
    return $item;
}


// GET RSS BY SENGOKU

//==================================
//RSS関連
//==================================
//一括設定
libxml_set_streams_context(get_steram_context());
libxml_use_internal_errors(true);

/**
 * 取得対象の全RSSデータを取得します。
 */
function fetch_all_rss_entrys () {
    $target_rss_list = get_rss_config_set();
    $result = [];
    foreach ($target_rss_list as $group_no => $rss_list) {
        foreach ($rss_list as $rss_url => $options) {
            $result[$rss_url] = parse_rss($rss_url, $options);
        }
    }
    return $result;
}

/**
 * fetch_all_rss_entrysで取得したデータを元に投稿日逆順のsort indexを作成します。
 */

function create_sort_index_from_rss ($result) {
    $sort_index = [];
    foreach ($result as $rss_url => $rss_data) {
        foreach ($rss_data as $entry_url => $entry_data) {
            $sort_index[$entry_data['entry_date']] = [$rss_url, $entry_url];
        }
    }
    krsort($sort_index);
    return $sort_index;
}

/**
 * JSONデータ構築用の配列を返します。
 */
function build_data_for_json () {
    $data = [];
    $ret = fetch_all_rss_entrys();
    foreach (create_sort_index_from_rss($ret) as $sort_keys) {
        $data[] =  $ret[$sort_keys[0]][$sort_keys[1]];
    }
    return $data;
}


/**
 * デフォルトで利用するsteram contextを返します。
 */
function get_steram_context () {
    return stream_context_create([
        'http'  => [
            'header' => implode("\r\n", [
                sprintf('Authorization: Basic %s',  base64_encode('guest:nadia')),
                sprintf('User-Agent: %s', 'Mozilla/5.0 (Windows NT 6.3; WOW64; Trident/7.0; Touch; rv:11.0) like Gecko'),
            ]),
        ],
    ]);
}

/**
 * description表示用の調整を行います。
 */
function adjust_description ($description) {
    $img_tags = [];
    $ret = preg_match_all("/<img[^>]*?>/", $description, $matches);
    if ($ret !== false && $ret !== 0) {
        $img_tags = $matches[0];
        foreach ($img_tags as $idx => $img_tag) {
            $description = str_replace($img_tag, '##__'. $idx .'__##', $description);
        }
    }

    $dom = new \DOMDocument;
    $dom->loadHTML(mb_convert_encoding(sprintf('<?xml version="1.0" encoding="%s"?><root>%s</root>', BLOG_CHAR_SET, $description), 'HTML-ENTITIES', BLOG_CHAR_SET));
    libxml_clear_errors();
    $description = $dom->textContent;

    $description = trim($description);
    $description = preg_replace("/[ \t\r\n]+/", ' ', $description);

    $description = mb_strimwidth($description, 0, BLOG_DESCRIPTION_ROUND_LENGTH, BLOG_DESCRIPTION_ROUND_CHAR, BLOG_CHAR_SET);
    if (empty($img_tags)) {
        return $description;
    }

    preg_match_all("/##__(\d+)__##/", $description, $matches, \PREG_SET_ORDER);
    foreach ($matches as $match) {
        $description = str_replace($match[0], $img_tags[$match[1]], $description);
    }
    $description = preg_replace("/(?:#{1,2}|##_{1,2}|##__\d+|##__\d+_{1,2}|##__\d+__#{1,2})(". BLOG_DESCRIPTION_ROUND_CHAR .")?$/", '$1', $description);
    return $description;
}

/**
 * RSSごとの詳細な設定を返します。
 */
function get_rss_config_set () {
    $template_super_dokumo = [
        'get_title'             => function ($entry_dom, $rss_node) {
            return $rss_node->getElementsByTagName('title')->item(0)->nodeValue;
        },
        'get_entry_field'       => function ($entry_dom, $rss_node) {
            return $rss_node->getElementsByTagName('description')->item(0);
        },
        'get_description'       => function ($entry_field, $entry_dom, $rss_node) {
            return adjust_description($entry_field->nodeValue);
        },
        'get_entry_date'        => function ($entry_field, $entry_dom, $rss_node) {
            return strtotime($rss_node->getElementsByTagName('pubDate')->item(0)->nodeValue);
        },
        'get_entry_img_list'    => function ($entry_field, $entry_dom, $rss_node, $entry_url) {
            $img_url_list = [];
            foreach ($entry_dom->getElementById('main')->getElementsByTagName('article')->item(0)->getElementsByTagName('img') as $img) {
                $src = $img->getAttribute('src');
                if (substr(parse_url($src, \PHP_URL_PATH), 0, 13) === '/user_images/') {
                    $img_url_list[] = $src;
                }
            }
            return $img_url_list;
        },
        'blog_type'             => BLOG_TYPE_SUPER_DOKUMO,
    ];

    return  [
        // BLOG_TYPE_PETIT_MO  => [
        //     'http://52.68.157.55/blog/?feed=rss2'   => [
        //         'get_title'             => function ($entry_dom, $rss_node) {
        //             return $rss_node->getElementsByTagName('title')->item(0)->nodeValue;
        //         },
        //         'get_entry_field'       => function ($entry_dom, $rss_node) {
        //             foreach ($entry_dom->getElementById('main')->getElementsByTagName('div') as $div) {
        //                 if ($div->getAttribute('class') === 'blog-main') {
        //                     return $div;
        //                 }
        //             }
        //             return null;
        //         },
        //         'get_description'       => function ($entry_field, $entry_dom, $rss_node) {
        //             return adjust_description($entry_field->C14N());
        //         },
        //         'get_entry_date'        => function ($entry_field, $entry_dom, $rss_node) {
        //             return strtotime($rss_node->getElementsByTagName('pubDate')->item(0)->nodeValue);
        //         },
        //         'get_entry_img_list'    => function ($entry_field, $entry_dom, $rss_node, $entry_url) {
        //             $img_url_list = [];
        //             foreach ($entry_field->getElementsByTagName('img') as $img) {
        //                 $src = $img->getAttribute('src');
        //                 if (substr(parse_url($src, \PHP_URL_PATH), 0, 8) === '/photos/') {
        //                     $img_url_list[] = $src;
        //                 }
        //             }
        //             return $img_url_list;
        //         },
        //         'blog_type'             => BLOG_TYPE_PETIT_MO,
        //     ],
        // ],
        BLOG_TYPE_SUPER_DOKUMO  => [
            'http://rssblog.ameba.jp/sayaka1627/rss20.xml'          => $template_super_dokumo,
            'http://rssblog.ameba.jp/yurika-love-kiss/rss20.xml'    => $template_super_dokumo,
            'http://rssblog.ameba.jp/rin7282002/rss20.xml'          => $template_super_dokumo,
            'http://rssblog.ameba.jp/rion-nakamura/rss20.xml'       => $template_super_dokumo,
            'http://rssblog.ameba.jp/20141108hr/rss20.xml'          => $template_super_dokumo,
            'http://rssblog.ameba.jp/vanillanosora23/rss20.xml'     => $template_super_dokumo,
        ],
        BLOG_TYPE_PETIT_MO_OFFICIAL => [
            'http://rssblog.ameba.jp/kanon-sd/rss20.xml'            => [
                'get_title'             => function ($entry_dom, $rss_node) {
                    return $rss_node->getElementsByTagName('title')->item(0)->nodeValue;
                },
                'get_entry_field'       => function ($entry_dom, $rss_node) {
                    foreach ($entry_dom->getElementById('sub_main')->getElementsByTagName('div') as $div) {
                        if ($div->getAttribute('class') === 'subContentsInner') {
                            return $div;
                        }
                    }
                    return null;
                },
                'get_description'       => function ($entry_field, $entry_dom, $rss_node) {
                    return adjust_description($entry_field->C14N());
                },
                'get_entry_date'        => function ($entry_field, $entry_dom, $rss_node) {
                    return strtotime($rss_node->getElementsByTagName('pubDate')->item(0)->nodeValue);
                },
                'get_entry_img_list'    => function ($entry_field, $entry_dom, $rss_node, $entry_url) {
                    $img_url_list = [];
                    foreach ($entry_field->getElementsByTagName('img') as $img) {
                        $src = $img->getAttribute('src');
                        if (substr(parse_url($src, \PHP_URL_PATH), 0, 13) === '/user_images/') {
                            $img_url_list[] = $src;
                        }
                    }
                    return $img_url_list;
                },
                'blog_type'             => BLOG_TYPE_PETIT_MO_OFFICIAL,
            ],
            'http://www.diamondblog.jp/official/rion_seki/feed/'    => [
                'get_title'             => function ($entry_dom, $rss_node) {
                    return $rss_node->getElementsByTagName('title')->item(0)->nodeValue;
                },
                'get_entry_field'       => function ($entry_dom, $rss_node) {
                    foreach ($entry_dom->getElementById('center')->getElementsByTagName('div') as $div) {
                        if ($div->getAttribute('class') === 'post') {
                            foreach ($div->getElementsByTagName('div') as $div) {
                                if ($div->getAttribute('class') === 'content') {
                                    return $div;
                                }
                            }
                        }
                    }
                    return null;
                },
                'get_description'       => function ($entry_field, $entry_dom, $rss_node) {
                    foreach ($entry_field->getElementsByTagName('div') as $div) {
                        if ($div->getAttribute('class') === 'story') {
                            return adjust_description(str_replace(base64_decode('wqA='), " ", $div->C14N()));
                        }
                    }
                    return null;
                },
                'get_entry_date'        => function ($entry_field, $entry_dom, $rss_node) {
                    return strtotime($rss_node->getElementsByTagName('pubDate')->item(0)->nodeValue);
                },
                'get_entry_img_list'    => function ($entry_field, $entry_dom, $rss_node, $entry_url) {
                    $base_url_info = parse_url($entry_url);
                    $domain = sprintf('%s://%s', $base_url_info['scheme'], $base_url_info['host']);

                    $img_url_list = [];
                    foreach ($entry_field->getElementsByTagName('img') as $img) {
                        $src = $img->getAttribute('src');
                        $path = parse_url($src, \PHP_URL_PATH);
                        if (substr($path, 0, 25) === '/contents/official/sites/' && in_array(strtolower(pathinfo($path, \PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png'])) {
                            $img_url_list[] = $domain . $src;
                        }
                    }
                    return $img_url_list;
                },
                'blog_type'             => BLOG_TYPE_PETIT_MO_OFFICIAL,
            ],
            'http://lineblog.me/syurikawanabe/index.rdf'    => [
                'get_title'             => function ($entry_dom, $rss_node) {
                    return $rss_node->getElementsByTagName('title')->item(0)->nodeValue;
                },
                'get_entry_field'       => function ($entry_dom, $rss_node) {
                    foreach ($entry_dom->getElementById('main')->getElementsByTagName('div') as $div) {
                        if ($div->getAttribute('class') === 'article-body') {
                            return $div;
                        }
                    }
                    return null;
                },
                'get_description'       => function ($entry_field, $entry_dom, $rss_node) {
                    return adjust_description(mb_convert_encoding($rss_node->getElementsByTagName('encoded')->item(0)->nodeValue, 'HTML-ENTITIES', BLOG_CHAR_SET));
                },
                'get_entry_date'        => function ($entry_field, $entry_dom, $rss_node) {
                    return strtotime($rss_node->getElementsByTagName('date')->item(0)->nodeValue);
                },
                'get_entry_img_list'    => function ($entry_field, $entry_dom, $rss_node, $entry_url) {
                    $img_url_list = [];
                    foreach ($entry_field->getElementsByTagName('img') as $img) {
                        $src = $img->getAttribute('src');
                        $path = parse_url($src, \PHP_URL_PATH);
                        if (substr(parse_url($src, \PHP_URL_PATH), 0, 15) === '/syurikawanabe/' && strtolower($img->parentNode->tagName) === 'a' && in_array(strtolower(pathinfo($path, \PATHINFO_EXTENSION)), ['jpg', 'jpeg', 'png'])) {
                            $img_url_list[] = $src;
                        }
                    }
                    return $img_url_list;
                },
                'blog_type'             => BLOG_TYPE_PETIT_MO_OFFICIAL,
            ],
            'http://rssblog.ameba.jp/tsumori-nono/rss20.xml'    => array_merge($template_super_dokumo, ['blog_type' => BLOG_TYPE_PETIT_MO_OFFICIAL]),
        ],
        BLOG_TYPE_NICOPETIT_ED  => [
            'http://rssblog.ameba.jp/nicopuchi-staff/rss20.xml' => array_merge($template_super_dokumo, ['blog_type' => BLOG_TYPE_NICOPETIT_ED]),
        ],
    ];
}

/**
 * RSSを解析し、配列として返します。
 */
function parse_rss ($rss_url, $options = []) {
    $rss_dom = new \DOMDocument;
    $rss_dom->load($rss_url);
    libxml_clear_errors();

    $entry_list = [];

    //rss
    $items = $rss_dom->getElementsByTagName('channel')->item(0)->getElementsByTagName('item');
    if ($items->length === 0) {
        $items = $rss_dom->getElementsByTagName('item');
    }
    foreach ($items as $item) {
        //entry
        foreach ($item->getElementsByTagName('link') as $link) {
            $entry_url = $link->nodeValue;
            if ($entry_url === '') {
                $entry_url = $link->getAttribute('href');
            }
            $entry_list[$entry_url] = parse_entry($entry_url, $item, $options);
        }
    }

    return $entry_list;
}

/**
 * エントリを解析し、配列として返します。
 */
function parse_entry ($entry_url, $rss_node, $options = []) {
    //init
    $entry_dom = new \DOMDocument;
    $entry_text = file_get_contents($entry_url, false, get_steram_context());
    $entry_text = str_replace(["\r\n", "\r\n", "\r", base64_decode('wqA=')], " ", $entry_text);

    $entry_text = mb_convert_encoding($entry_text, 'HTML-ENTITIES', BLOG_CHAR_SET);
    $entry_dom->loadHTML($entry_text);
    libxml_clear_errors();

    $entry_field = $options['get_entry_field']($entry_dom, $rss_node);

    return [
        'title'         => $options['get_title']($entry_dom, $rss_node),
        'entry_url'     => $entry_url,
        'description'   => $options['get_description']($entry_field, $entry_dom, $rss_node),
        'entry_date'    => $options['get_entry_date']($entry_field, $entry_dom, $rss_node),
        'image_list'    => $options['get_entry_img_list']($entry_field, $entry_dom, $rss_node, $entry_url),
        'blog_type'     => $options['blog_type'],
    ];
}

