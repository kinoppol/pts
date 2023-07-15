<?php
class money{
    function personal(){
        $systemModel=model('system');
        $systemCfg=$systemModel->get_config();
        $systemData=array();
        foreach($systemCfg as $row){
            $systemData[$row['id']]=$row['value'];
        }
        $content='Hello-Personal';
        helper('sneat/menu');
        $menu=view('menu/admin').view('menu/budget');
        return view('template/main',array('content'=>$content,'system'=>$systemData,'title'=>'บุคลากร','menu'=>$menu));
    }
    function support(){
        $systemModel=model('system');
        $systemCfg=$systemModel->get_config();
        $systemData=array();
        foreach($systemCfg as $row){
            $systemData[$row['id']]=$row['value'];
        }
        $content='Hello-Support';
        helper('sneat/menu');
        $menu=view('menu/admin').view('menu/budget');
        return view('template/main',array('content'=>$content,'system'=>$systemData,'title'=>'เงินสนับสนุน','menu'=>$menu));
    }
}