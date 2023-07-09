<?php
class config{
    function index(){
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