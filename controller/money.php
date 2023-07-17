<?php
class money{
    function personal(){
       
        $content='Hello-Personal';
        helper('sneat/menu');
        $menu=view('menu/admin').view('menu/budget');
        return view('template/main',array('content'=>$content,,'title'=>'บุคลากร','menu'=>$menu));
    }
    function support(){
        
        $content='Hello-Support';
        helper('sneat/menu');
        $menu=view('menu/admin').view('menu/budget');
        return view('template/main',array('content'=>$content,,'title'=>'เงินสนับสนุน','menu'=>$menu));
    }
}