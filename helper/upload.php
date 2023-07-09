<?php
function uploadtopath($files,$dest_path,$dest_name=array()){
    if (!file_exists($dest_path)) {
        mkdir($dest_path, 0777, true);
    }
    $countfiles = count($files['name']);
    $upload_names=array();
   for($i=0;$i<$countfiles;$i++){
    if(count($dest_name)==0){
        $exp_file = explode('.',$files['name'][$i]);
        $ext=end($exp_file);
        $filename = time().'_'.$i.'.'.$ext;
    }else{
        $filename =$dest_name[$i];
    }
        $upload_names[]=$filename;
        move_uploaded_file($files['tmp_name'][$i],$dest_path.$filename);
    
   }
   return $upload_names;
}
