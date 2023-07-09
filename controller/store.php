<?php
class store{
    function index(){
        $content=view('login/form',array('action_url'=>site_url('login/check')));
        return view('template/authen',array('content'=>$content));
    }

    function list(){
        $store=array(array('id'=>1,'value'=>'ยิ่งเจริญอะไหล่'));
        print json_encode($store);
    }
}