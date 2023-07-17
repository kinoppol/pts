<?php
class budget{
    function edu(){

        $content='Hello-PTS';
        return view('_template/main',array('content'=>$content,'title'=>'งบการศึกษา'));
    }
    function buy(){

        $content='Hello-BUY';
        return view('_template/main',array('content'=>$content,'title'=>'จัดซื้อจัดจ้าง'));
    }
}