<?php
class budget{
    function edu(){

        $content='Hello-PTS';
        helper('sneat/menu');
        $menu=view('menu/admin').view('menu/budget');
        return view('template/main',array('content'=>$content,'title'=>'งบการศึกษา','menu'=>$menu));
    }
    function buy(){

        $content='Hello-BUY';
        helper('sneat/menu');
        $menu=view('menu/admin').view('menu/budget');
        return view('template/main',array('content'=>$content,'title'=>'จัดซื้อจัดจ้าง','menu'=>$menu));
    }
}