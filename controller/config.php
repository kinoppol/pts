<?php
class config{
    
    function index(){
       
        $content='ตั้งค่า-PTS';
        helper('sneat/menu');
        return view('_template/main',array('content'=>$content,'title'=>'ตั้งค่า'));
    }
    function store(){
        $data['content']='ตั้งค่าร้าน';
        return view('_template/main',$data);
    }
    function time(){
        $data['content']='ตั้งค่าเวลาการทำงาน.';
        return view('_template/main',$data);
    }
}