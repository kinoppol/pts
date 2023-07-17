<?php
class config{
    
    function index(){
       
        $content='ตั้งค่า-PTS';
        helper('sneat/menu');
        $menu=view('menu/admin').view('menu/budget');
        return view('template/main',array('content'=>$content,'title'=>'ตั้งค่า','menu'=>$menu));
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