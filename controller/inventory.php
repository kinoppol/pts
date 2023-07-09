<?php
class inventory{
    function index(){
    }
    function supplier(){
        

        $data['content']='ตัวแทนจำหน่าย';
        return view('template/main',$data);
    }
    function product(){
        $data=array();

        $product=model('product');
        $products=$product->get_product(array('store_id'=>$_SESSION['user']['store_id']));
        $data['content']=view('product/list',array('products'=>$products));
        return view('template/main',$data);
    }
    function form_product(){
        $result=array();
        if(!empty($_GET['product_id'])){
            $product=model('product');
            $product_data=array('product_id'=>$_GET['product_id'],'store_id'=>$_SESSION['user']['store_id']);
            $result=$product->get_product($product_data);
            $result=$result[0];
            $result['action']=site_url('inventory/update_product');
        }else{
            if(!empty($_GET['product_code'])){
                $result['product_code']=$_GET['product_code'];
            }
            $result['action']=site_url('inventory/add_product');
        }
        $data=array();
        $data['content']=view('product/form_product',$result);
        if($result['picture']!='NULL'){
            $data['content'].=view('product/gallery',array('pictures'=>json_decode($result['picture'],true)));
        }
        return view('template/main',$data);
    }
    function add_product(){
        $product_data=array(
            'store_id'=>$_SESSION['user']['store_id'],
            'product_code'=>$_POST['barcode'],
            'gen_name'=>$_POST['gen_name'],
            'product_name'=>$_POST['product_name'],
            'o_price'=>$_POST['o_price'],
            'price'=>$_POST['price'],
            'profit'=>$_POST['profit'],
            'supplier'=>$_POST['supplier'],
            'qty'=>$_POST['qty'],
            'expiry_date'=>$_POST['expiry_date'],
            'date_arrival'=>$_POST['date_arrival'],
        );

        if(!empty($_FILES['picture'])){
            helper('upload');
            helper('image');
            $store_id=$_SESSION['user']['store_id'];
            $path_pic="./images/product/".$store_id."/".date('Y/m/');
            $files=uploadtopath($_FILES['picture'],$path_pic);
            $pics=array();
            foreach($files as $f){
                $pics[]=converttojpg($path_pic.$f,$del_org=true);
            }
            $product_data['picture']=json_encode($pics);
        }

        $product=model('product');
        $result=$product->add_product($product_data);
        $data=array();
        $data['content']=redirect(site_url('inventory/product'));
        return view('template/authen',$data);
    }
    
    function update_product(){
        $where=array(
            'product_id'=>$_POST['product_id'],
        );
        
        $product=model('product');
        $old_data=$product->get_product(array('store_id'=>$_SESSION['user']['store_id'],'product_id'=>$_POST['product_id']));
        
        $pics=array();
        if($old_data[0]['picture']!='NULL'){
            $pics=json_decode($old_data[0]['picture'],true);
        }
        $product_data=array(
            'store_id'=>$_SESSION['user']['store_id'],
            'product_code'=>$_POST['barcode'],
            'gen_name'=>$_POST['gen_name'],
            'product_name'=>$_POST['product_name'],
            'o_price'=>$_POST['o_price'],
            'price'=>$_POST['price'],
            'profit'=>$_POST['profit'],
            'supplier'=>$_POST['supplier'],
            'qty'=>$_POST['qty'],
            'expiry_date'=>$_POST['expiry_date'],
            'date_arrival'=>$_POST['date_arrival'],
        );
        if(!empty($_FILES['picture'])){
            helper('upload');
            helper('image');
            $store_id=$_SESSION['user']['store_id'];
            $path_pic="./images/product/".$store_id."/".date('Y/m/');
            $files=uploadtopath($_FILES['picture'],$path_pic);
            foreach($files as $f){
                $pics[]=converttojpg($path_pic.$f,$del_org=true);
            }
            $product_data['picture']=json_encode($pics);
        }

        $result=$product->update_product($product_data,$where);
        $data=array();
        $data['content']=redirect(site_url('inventory/product'));
        return view('template/authen',$data);
    }
    function delProduct(){
        $where=array('product_id'=>$_GET['id'],'store_id'=>$_SESSION['user']['store_id']);
        $product=model('product');
        $result=$product->delete_product($where);
        if($result){
            return 'ok';
        }else{
            return 'error';
        }
    }

    function shelf(){
        $data['content']=555;
        return view('template/main',$data);
    }
}