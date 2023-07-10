<?php
class login{
    function index(){
        $systemModel=model('system');
        $systemCfg=$systemModel->get_config();
        $systemData=array();
        foreach($systemCfg as $row){
            $systemData[$row['id']]=$row['value'];
        }
        $content=view('login/form',array('action_url'=>site_url('login/check'),'system'=>$systemData));
        return view('template/authen',array('content'=>$content,'system'=>$systemData,'title'=>'ลงชื่อเข้าใช้'));
    }

    function check(){
        $username=trim($_POST['username']);
        $password=trim($_POST['password']);
        $store_id=trim($_POST['store_id']);
        if(!empty($_POST['remember'])){
            $llogin=array(
                'store_id'=>$store_id,
                'username'=>$_POST['username'],
            );
            $remember_data=json_encode($llogin);
            setcookie('last_login', $remember_data, time() + (86400 * 365), "/");
        }
        if(empty($username)||empty($password)){
            $_SESSION['err_message']='กรุณาระบุชื่อผู้ใช้และรหัสผ่าน';
            return redirect(site_url('login'));
        }else{
            $user=model('user');
            $data=array(
                'store_id'=>$store_id,
                'username'=>$username,
                'password'=>$password,
            );
            $u=$user->get_user($data);
            if(count($u)<1){
                $_SESSION['err_message']='ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง';
                return redirect(site_url('login'));
            }else{
                $_SESSION['user']=$u[0];
                return redirect(site_url('main'));
            }
        }
    }
}