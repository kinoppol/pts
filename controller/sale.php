<?php
class sale{
    function index(){
    }
    function pos(){

        $data['content']='POS';
        return view('template/main',$data);
    }
    function daily_report(){

        $data['content']='Dialy Report.';
        return view('template/main',$data);
    }
}