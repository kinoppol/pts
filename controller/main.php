<?php
class main{
    function index(){
        $systemModel=model('system');
        $systemCfg=$systemModel->get_config();
        $systemData=array();
        foreach($systemCfg as $row){
            $systemData[$row['id']]=$row['value'];
        }
        $content='Hello-PTS';
        helper('sneat/menu');
        $menu=view('menu/budget');
        return view('template/main',array('content'=>$content,'system'=>$systemData,'title'=>'หน้าหลัก','menu'=>$menu));
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