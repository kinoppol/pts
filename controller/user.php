<?php
class user{
    function index(){
    }

    function logout(){
        unset($_SESSION['user']);
        $content=redirect(site_url('login'),2);
        $content.='กรุณารอสักครู่..';
        return $content;//view('template/authen',array('content'=>$content));
    }

    function view(){

        $data['content']='รายชื่อผู้ใช้';
        return view('template/main',$data);
    }
}