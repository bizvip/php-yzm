<?php

error_reporting(0);
define('SELF', pathinfo(preg_replace("@\\(.*\\(.*\$@", "", __FILE__), PATHINFO_BASENAME));
define('FCPATH', str_replace('\\', DIRECTORY_SEPARATOR, dirname(preg_replace("@\\(.*\\(.*\$@", "", __FILE__)).DIRECTORY_SEPARATOR));
require_once(FCPATH.'libraries/config.php');
$url = "http://".Web_Url.Web_Path."index.php/ting/transcode";
$did = file_get_contents($url);
echo '视频id：'.$did."存在未转码的视频<br>";
if (0 < (int)$did) {
    $zmurl   = "http://".Web_Domain.Web_Path."index.php/video/transcode?id=".$did;
    $context = stream_context_create(["http" => ["method" => "GET", "timeout" => 3]]);
    echo file_get_contents($zmurl, 0, $context);
}



