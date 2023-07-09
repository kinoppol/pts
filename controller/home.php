<?php
class home{
    function index(){
        //$store=model('store');
        //$stores=$store->get_store(array('status'=>'operated'));
        // $store_data=array();
        // foreach($stores as $row){
        //     $store_data[$row['id']]=$row['name'];
        // }
        $content=view('home/index');
        return view('template/authen',array('content'=>$content));
    }
}
?>