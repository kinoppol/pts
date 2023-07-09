<?php
class setting{
    function index(){
    }
    function toggleMenu(){
        if(empty($_COOKIE['menu_display'])||$_COOKIE['menu_display']=='expand'){
            $display='collapse';
        }else{
            $display='expand';
        }
        setcookie('menu_display', $display, time() + (86400 * 365), "/");
        return 'ok';
    }
}