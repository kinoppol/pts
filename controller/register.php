<?php
class register{
    function index(){
        $content=view('register/form',array('action_url'=>site_url('register/check')));
        return view('template/authen',array('content'=>$content,'title'=>'ลงทะเบียน'));
    }
  }