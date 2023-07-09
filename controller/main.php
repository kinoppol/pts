<?php
class main{
    function index(){
        $data['content']='Hello';
        return view('template/main',$data);
    }
    function dashboard(){
        $store=model('store');
        $stores=$store->get_store(array('id'=>$_SESSION['user']['store_id'],'status'=>'operated'));
        $data['title']=$stores[0]['name'];
        $data['store_name']=$stores[0]['name'];
        $data['sub_name']=$stores[0]['sub_name'];

        $data['content']='Hello';
        return view('template/main',$data);
    }
}