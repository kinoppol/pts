<?php

function gen_submenu($arr=array(),$expanded=false){ 
    global $c;
    global $f;   
    $ret='';
    $exp='false';
    $show='';
    $sactive='';
    if($expanded){
        $exp='true';
        $show=' show';
    }
    $current_function=$c.'/'.$f;
    if(mb_substr($arr['url'],0,mb_strlen(site_url($current_function)))==site_url($current_function)){
        $sactive=' active';
        $exp='true';
    }
    if(is_array($arr['item'])&&count($arr['item'])>0){
        $ret.='<a href="'.$arr['url'].'" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="'.$exp.'"> <i class="menu-icon '.$arr['bullet'].'"></i>'.$arr['label'].'</a>
                    <ul class="sub-menu children dropdown-menu'.$show.$sactive.'">';
            foreach($arr['item'] as $row){
                $ssactive='';
                if(mb_substr($row['url'],0,mb_strlen(site_url($current_function)))==site_url($current_function)){
                    $ssactive=' active';
                }
                $ret.='
                <li class="'.$ssactive.'">
                    <i class="menu-icon '.$row['bullet'].$sactive.'"></i><a href="'.$row['url'].'">'.$row['label'].'</a>
                </li>';
            }
        $ret.='</ul>';
    }else{
        $ret.='<li class="'.$sactive.'">
        <a href="'.$arr['url'].'"> <i class="menu-icon '.$arr['bullet'].'"></i>'.$arr['label'].'</a>
        </li>';
    }
    return $ret;
}
function gen_menu($arr=array()){
    global $c;
    $ret='';
    foreach($arr as $k=>$v){
        $ret='<h3 class="menu-title">'.$k.'</h3>';
        foreach($v as $key=>$row){
            $show='';
            if($key==$c) $show=' show';
            $ret.='<li class="menu-item-has-children dropdown'.$show.'">';
            $ret.=gen_submenu($row,$show);
            $ret.='</li>';
        }
    }
    return $ret;
}