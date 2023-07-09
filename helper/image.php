<?php
function converttojpg($filepath,$delete_org=false){
  if(!file_exists($filepath)) die('image not found.');
if (($img_info = @getimagesize($filepath)) === FALSE)
  die("Not an image".$filepath);

$width = $img_info[0];
$height = $img_info[1];

switch ($img_info[2]) {
  case IMAGETYPE_GIF  : $src = imagecreatefromgif($filepath);  break;
  case IMAGETYPE_JPEG : $src = imagecreatefromjpeg($filepath); break;
  case IMAGETYPE_PNG  : $src = imagecreatefrompng($filepath);  break;
  default : die("Unknown filetype");
}

$tmp = imagecreatetruecolor($width, $height);
imagecopyresampled($tmp, $src, 0, 0, 0, 0, $width, $height, $width, $height);
        $exp_file = explode('.',$filepath);
        $ext=end($exp_file);
        $dst=mb_substr($filepath,0,(mb_strlen($filepath)-mb_strlen($ext)));
        $dst_name=$dst."jpg";
imagejpeg($tmp, $dst_name);
if($delete_org){
  //unlink($filepath);
}
return $dst_name;
}