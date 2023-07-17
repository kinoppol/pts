<?php

class project{
    function list(){
        $content=view('project/list');
        return view('_template/main',array('content'=>$content,'title'=>'รายชื่อโครงการ'));
    }
}