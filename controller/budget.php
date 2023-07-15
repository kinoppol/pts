<?php
class budget{
    function edu(){
        $systemModel=model('system');
        $systemCfg=$systemModel->get_config();
        $systemData=array();
        foreach($systemCfg as $row){
            $systemData[$row['id']]=$row['value'];
        }
        $content='Hello-PTS';
        helper('sneat/menu');
        $menu=view('menu/admin').view('menu/budget');
        return view('template/main',array('content'=>$content,'system'=>$systemData,'title'=>'งบการศึกษา','menu'=>$menu));
    }
    function buy(){
        $systemModel=model('system');
        $systemCfg=$systemModel->get_config();
        $systemData=array();
        foreach($systemCfg as $row){
            $systemData[$row['id']]=$row['value'];
        }
        $content='Hello-BUY';
        helper('sneat/menu');
        $menu=view('menu/admin').view('menu/budget');
        return view('template/main',array('content'=>$content,'system'=>$systemData,'title'=>'จัดซื้อจัดจ้าง','menu'=>$menu));
    }
}