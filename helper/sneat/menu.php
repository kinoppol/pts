<?php

function gen_submenu($arr=array(),$expanded=false){ 
    global $controller;
    global $function;   
    $ret='';
    $sexp='';
    $exp='';
    $show='';
    $sactive='';
    if($expanded){
        $exp=' open';
        $show=' show';
    }
    $current_function=$controller.'/'.$function;
    if(mb_substr($current_function,(mb_strlen($current_function)-1),1)=='/'){
        $current_function=mb_substr($current_function,0,mb_strlen($current_function)-1);
    }
    // print $controller;
    // print 'U-'.$arr['url'];
    // print "--------<br>";
    if(mb_substr($arr['url'],0,mb_strlen(site_url($controller)))==site_url($controller)){
        // print "EQU";
        $sactive=' active';
        $exp=' open';
    }
    if(is_array($arr['item'])&&count($arr['item'])>0){
        $ret.='
        <li class="menu-item'.$sactive.$exp.'">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon '.$arr['bullet'].'"></i>
          <div data-i18n="'.$arr['label'].'">'.$arr['label'].'</div>
            </a>
            <ul class="menu-sub">';
            foreach($arr['item'] as $row){
                $ssactive='';
                $sexp='';
                    //print $current_function;
                    //print 'U-'.$row['url'].'<br>';
                if(mb_substr($row['url'],0,mb_strlen(site_url($current_function)))==site_url($current_function)){
                    $ssactive=' active';
                    $sexp=' open';
                }
                $ret.='
                <li class="menu-item'.$ssactive.'">
                <a href="'.$row['url'].'" class="menu-link">
                    <div data-i18n="'.$row['label'].'">'.$row['label'].'</div>
                  </a>
                </li>';
            }
        $ret.='</ul></li>';
    }else{
        $ret.='<li class="menu-item'.$sactive.'">        
        <a href="'.$arr['url'].'" class="menu-link">
        <i class="menu-icon '.$arr['bullet'].'"></i>        
        <div data-i18n="'.$arr['label'].'">'.$arr['label'].'</div></a>
        </li>';
    }
    return $ret;
}
function gen_menu($arr=array()){
    global $controller;
    $ret='';
    foreach($arr as $k=>$v){
        $ret.='<li class="menu-header small text-uppercase">
        <span class="menu-header-text">'.$k.'</span></li>';
        foreach($v as $key=>$row){
            $show='';
            if($key==$controller) $show=' show';
            $ret.='         ';
            $ret.=gen_submenu($row,$show);
            $ret.='';
        }
        $ret.='</li>';
    }
    $ret.='';
    return $ret;
}