<?php
class register{
    function index(){
        $systemModel=model('system');
        $systemCfg=$systemModel->get_config();
        $systemData=array();
        foreach($systemCfg as $row){
            $systemData[$row['id']]=$row['value'];
        }
        $content=view('register/form',array('action_url'=>site_url('register/check'),'system'=>$systemData));
        return view('template/authen',array('content'=>$content,'system'=>$systemData,'title'=>'ลงทะเบียน'));
    }
  }