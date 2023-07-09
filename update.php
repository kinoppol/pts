<?php
set_time_limit(0);
require_once "zip.php";
define('UPDATER_PATH', str_replace('\\','/',dirname(__FILE__)).'/');
print UPDATER_PATH;
//exit();
$url = "https://github.com/kinoppol/tp/archive/refs/heads/main.zip";
$zip_file = UPDATER_PATH."/update/tp.zip";

$zip_resource = fopen($zip_file, "w");

$ch_start = curl_init();
//curl_setopt($ch_start, CURLOPT_TIMEOUT, 300);
curl_setopt($ch_start, CURLOPT_URL, $url);
curl_setopt($ch_start, CURLOPT_FAILONERROR, true);
curl_setopt($ch_start, CURLOPT_HEADER, 0);
curl_setopt($ch_start, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch_start, CURLOPT_AUTOREFERER, true);
curl_setopt($ch_start, CURLOPT_BINARYTRANSFER,true);
curl_setopt($ch_start, CURLOPT_TIMEOUT, 300);
curl_setopt($ch_start, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch_start, CURLOPT_RETURNTRANSFER,true);
curl_setopt($ch_start, CURLOPT_SSL_VERIFYPEER, true);

curl_setopt($ch_start, CURLOPT_FILE, $zip_resource);
$page = curl_exec($ch_start);
if(!$page)
{
 echo "Error :- ".curl_error($ch_start);
 exit();
}
curl_close($ch_start);
//exit();
$zip = new my_ZipArchive();
$extractPath = UPDATER_PATH;
if($zip->open($zip_file) != "true")
{
 echo "Error :- Unable to open the Zip File";
 exit();
} 

$zip->extractSubdirTo($extractPath,'tp-main/');
$zip->close();
