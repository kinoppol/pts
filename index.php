<?php
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
require_once('function.php');

function redirect_on_error(){
    if(!defined('EVERYTHING_WENT_OK')){
        ob_end_clean();
        //header('Location: error.php');
        print view('_error/error404');
    }
}


register_shutdown_function('redirect_on_error');

ob_start();
session_start();

    require_once('conf/db.php');
    
    if(!empty($_GET['p'])){
    $p=$_GET['p'];
    $seg=explode('/',$p);
    $controller=$seg[0];
    if(!empty($seg[1]))$function=$seg[1];
    }

    if(empty($controller)){
        $controller='login';
    }

    $controller_guest_allowed=array('login',
                                    'register',
                                    //'home'
                                 );
    
    if(empty($_SESSION['user'])&&!is_numeric(array_search($controller,$controller_guest_allowed))){
        print "Restrict access.";
        print redirect(site_url('login'),2);
        exit();
    }

    $inc_file='controller/'.$controller.'.php';
    
    require_once($inc_file);

    $page=new $controller();

    if(empty($function)){
        print $page->index();
    }else{
        print $page->$function();
    }
    define('EVERYTHING_WENT_OK', TRUE);
?>