<?php
class config{
    
    function index(){
        $systemModel=model('system');
        $systemCfg=$systemModel->get_config();
        $systemData=array();
        foreach($systemCfg as $row){
            $systemData[$row['id']]=$row['value'];
        }
        $content='ตั้งค่า-PTS';
        helper('sneat/menu');
        $menu=view('menu/admin').view('menu/budget');
        return view('template/main',array('content'=>$content,'system'=>$systemData,'title'=>'ตั้งค่า','menu'=>$menu));
    }
    function store(){
        $data['content']='ตั้งค่าร้าน';
        return view('template/main',$data);
    }
    function time(){
        $data['content']='ตั้งค่าเวลาการทำงาน.';
        return view('template/main',$data);
    }
}