<?php

//require_once __DIR__.'/scripts/meekrodb.2.3.class.php';
require_once __DIR__.'/scripts/simple_html_dom.php';
//DB::$user = 'root';
//DB::$password = '';
//DB::$dbName = 'u713312557_kot';
//DB::$encoding = 'utf8';

//DB::$user = 'u713312557_kot';
//DB::$password = 'jokers12';
//DB::$dbName = 'u713312557_kot';

ini_set('max_execution_time', 60000);
ini_set('wait_timeout', 60000);
ini_set('memory_limit', '128M');
ini_set('default_charset', 'UTF-8');

$arrResult = [];
$arrResult2 = [];

$html = file_get_html('http://politrussia.com/news/');

foreach ($html->find('a.overlink') as $element) {
    echo '1';
    $arrResult[] = $element->href;
}
$i = 0;
foreach ($arrResult as $key => $link) {
    echo '2';
    $html = file_get_html('http://politrussia.com' . $link);
    $i++;
    $content = $html->find('div[class="news_text"]', 0)->plaintext;
    $title = $html->find('h1[itemprop="name"]', 0)->plaintext;

    foreach ($html->find('img[itemprop="contentUrl"]') as $element) {
        $img2 = 'http://politrussia.com' . $element->src;
    }

    $arrResult2[$key]['title'] = $title;
    $arrResult2[$key]['content'] = $content;
    $arrResult2[$key]['image'] = $img2;
}
$data = serialize($arrResult2);
$file = __DIR__. '/frontend/runtime/cron-import.json';
file_put_contents($file,  $data);
die();
?>
