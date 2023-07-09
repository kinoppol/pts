<?php
helper('sufee/form');
$input=array(
    array(
        'id'=>'barcode',
        'type'=>'text',
        'label'=>'รหัสสินค้า/บาร์โค๊ด',
        'required'=>true,
        'def'=>empty($product_code)?'':$product_code,
    ),
    array(
        'id'=>'gen_name',
        'type'=>'text',
        'label'=>'ชื่อสินค้า (ชื่อทั่วไป เช่น ผงซักฝอก)',
        'required'=>true,
        'def'=>empty($gen_name)?'':$gen_name,
    ),
    array(
        'id'=>'product_name',
        'type'=>'text',
        'label'=>'ชื่อสินค้า (ชื่อทางการค้า เช่น แฟ๊บ)',
        'required'=>true,
        'def'=>empty($product_name)?'':$product_name,
    ),
    array(
        'id'=>'picture[]',
        'type'=>'file',
        'label'=>'รูปสินค้า',
        'attr'=>array('multiple'=>'','accept'=>'image/*'),
        'required'=>false,
        'def'=>NULL,
    ),
    array(
        'id'=>'supplier',
        'type'=>'select',
        'label'=>'ตัวแทนจำหน่าย',
        'item'=>array(
            '1'=>'ไม่ระบุ',
            '2'=>'7-11',
            '3'=>'Big-C',
        ),
        'required'=>true,
        'def'=>empty($supplier)?'':$supplier,
    ),
    array(
        'id'=>'date_arrival',
        'type'=>'date',
        'label'=>'วันที่ได้รับ',
        'required'=>true,
        'def'=>empty($arrival_date)?date('Y-m-d'):$arrival_date,
    ),
    array(
        'id'=>'expiry_date',
        'type'=>'date',
        'label'=>'วันหมดอายุ',
        'required'=>true,
        'def'=>empty($expiry_date)?date('Y-m-d',strtotime('+365 days')):$expiry_date,
    ),
    array(
        'id'=>'o_price',
        'type'=>'number',
        'attr'=>array('min'=>0),
        'label'=>'ราคาทุน',
        'required'=>true,
        'def'=>empty($o_price)?'0':$o_price,
    ),
    array(
        'id'=>'price',
        'type'=>'number',
        'attr'=>array('min'=>0),
        'label'=>'ราคาขาย',
        'required'=>true,
        'def'=>empty($price)?'0':$price,
    ),
    array(
        'id'=>'show_profit',
        'type'=>'text',
        'attr'=>array('disabled'=>'disabled'),
        'label'=>'กำไร',
        'required'=>true,
        'def'=>empty($profit)?0:$profit,
    ),
    array(
        'id'=>'qty',
        'type'=>'number',
        'attr'=>array('min'=>1),
        'label'=>'จำนวนที่มี/ที่ได้รับ',
        'required'=>true,
        'def'=>empty($qty)?'1':$qty,
    ),
    array(
        'id'=>'btn',
        'type'=>'submit',
        'label'=>'ตกลง',
        'required'=>true,
        //'color'=>'success'
    ),
    array(
        'id'=>'profit',
        'type'=>'hidden',
        'def'=>empty($profit)?0:$profit,
    ),
    array(
        'id'=>'product_id',
        'type'=>'hidden',
        'def'=>empty($product_id)?0:$product_id,
    )
);

print '<form action="'.$action.'" method="post" enctype="multipart/form-data">';
print '<div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                ข้อมูลสินค้า
            </div>
            <div class="card-body card-block">';
print gen_input($input);
print '</div>
    </div>
</div>
</form>';

systemFoot("<script>
    jQuery(document).ready(function(){
        jQuery(\"#barcode\").focus();
    });
    jQuery(\"#barcode\").on(\"keypress\",function (event) {    
    if ((event.keyCode < 48 || event.keyCode > 57)&&event.keyCode != 13) {
      event.preventDefault();
      if(event.keyCode == 3592){
       jQuery(this).val(jQuery(this).val()+'0');
      }else if(event.keyCode == 3653){
       jQuery(this).val(jQuery(this).val()+'1');
      }else if(event.keyCode == 47){
       jQuery(this).val(jQuery(this).val()+'2');
      }else if(event.keyCode == 45||event.keyCode == 95){
       jQuery(this).val(jQuery(this).val()+'3');
      }else if(event.keyCode == 3616){
       jQuery(this).val(jQuery(this).val()+'4');
      }else if(event.keyCode == 3606){
       jQuery(this).val(jQuery(this).val()+'5');
      }else if(event.keyCode == 3640){
       jQuery(this).val(jQuery(this).val()+'6');
      }else if(event.keyCode == 3638){
       jQuery(this).val(jQuery(this).val()+'7');
      }else if(event.keyCode == 3588){
       jQuery(this).val(jQuery(this).val()+'8');
      }else if(event.keyCode == 3605){
       jQuery(this).val(jQuery(this).val()+'9');
      }

    }
    });
    jQuery(\"#o_price\").change(function(){
        cal_profit();
    });
    jQuery(\"#price\").change(function(){
        cal_profit();
    });
    function cal_profit(){
        var o=jQuery('#o_price').val();
        var p=jQuery('#price').val();
        var profit=p-o;
        var percentage=profit/o*100;
        var show_profit=profit+' ('+parseFloat(percentage).toFixed(2)+'%)';
        jQuery('#show_profit').val(show_profit);
        jQuery('#profit').val(profit);
    }
   </script>");