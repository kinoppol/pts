<?php
class sale_report{
    function index(){
    }
    function daily(){

        $data['content']='Dialy Report';
        return view('template/main',$data);
    }
    function monthly(){

        $data['content']='Monthly Report.';
        return view('template/main',$data);
    }
    function annual(){

        $data['content']='Annual Report.';
        return view('template/main',$data);
    }
    function custom(){

        $data['content']='Custom Report.';
        return view('template/main',$data);
    }
}