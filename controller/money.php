<?php
class money{
    function personal(){
       
        $content='Hello-Personal';
        return view('_template/main',array('content'=>$content,'title'=>'บุคลากร'));
    }
    function support(){
        
        $content='Hello-Support';
        return view('_template/main',array('content'=>$content,'title'=>'เงินสนับสนุน'));
    }
}