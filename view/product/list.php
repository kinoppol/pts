<div class="content mt-3">
            <div class="animated fadeIn">
                <div class="row">

                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header d-flex justify-content-between align-items-center">
                                <strong class="card-title">สินค้า</strong>
                                <!-- <button type="button" class="btn btn-success" data-toggle="modal" data-target="#product"> -->
                                <a href="<?php print site_url('inventory/form_product'); ?>" class="btn btn-success">
                                    <i class="fa fa-plus"></i> เพิ่มข้อมูลสินค้า
                                </a>
                            </div>
                            <div class="card-body">
                                <table id="bootstrap-data-table-export" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>ชื่อสินค้า</th>
                                            <th>รูป</th>
                                            <th>บาร์โค๊ด</th>
                                            <th>ทุน</th>
                                            <th>ราคาขาย</th>
                                            <th>กำไร</th>
                                            <th>ตัวแทน<br>จำหน่าย</th>
                                            <th>จำนวน<br>คงเหลือ</th>
                                            <th>จัดการ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        foreach($products as $row){
                                        ?>
                                        <tr>
                                            <td><?php print $row['gen_name']; ?></td>
                                            <td><?php print $row['picture']; ?></td>
                                            <td><?php print $row['product_code']; ?></td>
                                            <td><?php print $row['o_price']; ?></td>
                                            <td><?php print $row['price']; ?></td>
                                            <td><?php print $row['profit']; ?></td>
                                            <td><?php print $row['supplier']; ?></td>
                                            <td><?php print $row['qty']; ?></td>
                                            <td>
                                            <a href="<?php print site_url('inventory/form_product'); ?>&product_id=<?php print $row['product_id']; ?>" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>
                                            <a href="#" onClick="delProduct(<?php print $row['product_id'].',\''.$row['product_name'].'\''; ?>)" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a></td>
                                        </tr>
                                        <?php
                                        }
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div><!-- .animated -->
        </div><!-- .content -->
        
        <div class="modal fade" id="product" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">ข้อมูลสินค้า</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form id="addProduct" action="<?php print site_url("inventory/add_product"); ?>" method="post" enctype="multipart/form-data">
      <div class="modal-body">
          <div class="form-group">
            <label for="barcode" class="col-form-label">รหัสสินค้า/บาร์โค๊ด</label>
            <input type="text" id="barcode" name="barcode" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="gen_name" class="col-form-label">ชื่อสินค้า (ชื่อทั่วไป เช่น ผงซักฟอก)</label>
            <input type="text" id="gen_name" name="gen_name"  class="form-control" required>
          </div>
          <div class="form-group">
            <label for="product_name" class="col-form-label">ชื่อสินค้า (ชื่อทางการค้า เช่น แฟ๊บ)</label>
            <input type="text" id="product_name" name="product_name" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="o_price" class="col-form-label">ราคาทุน</label>
            <input type="number" min="0" id="o_price" name="o_price" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="price" class="col-form-label">ราคาขาย</label>
            <input type="number" min="0" id="price" name="price" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="profit" class="col-form-label">กำไร/หน่วย</label>
            <input type="text" id="profit" name="profit" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="supplier" class="col-form-label">ตัวแทนจำหน่าย</label>
            <input type="text" id="supplier" name="supplier" class="form-control" required>
          </div>
          <div class="form-group">
            <label for="date_arrival" class="col-form-label">วันที่ได้รับสินค้า</label>
            <input type="date" id="date_arrival" name="date_arrival" class="form-control" value="<?php print date('Y-m-d'); ?>" required>
          </div>
          <div class="form-group">
            <label for="expiry_date" class="col-form-label">วันหมดอายุ</label>
            <input type="date" id="expiry_date" name="expiry_date" class="form-control" value="<?php print date('Y-m-d',strtotime("+365 days")); ?>" required>
          </div>
          <div class="form-group">
            <label for="qty" class="col-form-label">จำนวน</label>
            <input type="number" id="qty" name="qty" class="form-control" value="1" min="1" required>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        <button type="submit" class="btn btn-primary">ตกลง</button>
      </div>      
      </form>
    </div>
  </div>
</div>

        <?php
        systemFoot("
        <script>
        jQuery(document).ready(function(){
            jQuery('#bootstrap-data-table-export').DataTable({
            lengthMenu: [[10, 25, 50, -1], [10, 25, 50, \"All\"]],
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print'],
            \"language\": {
                \"sProcessing\": \"กำลังดำเนินการ...\",
                \"sLengthMenu\": \"แสดง _MENU_ รายการต่อหน้า\",
                \"sZeroRecords\": \"ไม่พบข้อมูล\",
                \"sInfo\": \"แสดงรายการที่ _START_ ถึงรายการที่ _END_ จากทั้งหมด _TOTAL_ รายการ\",
                \"sInfoEmpty\": \"แสดงรายการที่ 0 ถึงรายการที่ 0 จากทั้งหมด 0 รายการ\",
                \"sInfoFiltered\": \"(กรองข้อมูล _MAX_ ทุกแถว)\",
                \"sInfoPostFix\": \"\",
                \"sSearch\": \"ค้นหา:\",
                \"sUrl\": \"\",
                \"oPaginate\": {
                              \"sFirst\": \"เิริ่มต้น\",
                              \"sPrevious\": \"ก่อนหน้า\",
                              \"sNext\": \"ถัดไป\",
                              \"sLast\": \"สุดท้าย\"
                }
       }
        });
        //alert(555);
        var table = jQuery('#bootstrap-data-table-export').DataTable();
        jQuery('#bootstrap-data-table-export tbody').on('click', 'tr', function () {
          if (jQuery(this).hasClass('selected')) {
              //jQuery(this).removeClass('selected');
          } else {
              jQuery('tr.selected').removeClass('selected');
              jQuery(this).addClass('selected');
          }
      });

        });
        jQuery(\"#product\").on('shown.bs.modal', function () {
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
     function delProduct(pid,pname){
      swal({
        title: \"ยืนยันการลบข้อมูลสินค้า \\n\\\"\"+pname+\"\\\"\",
        text: \"การดำเนินการนี้กู้คืนไม่ได้!\",
        type: \"warning\",
        showCancelButton: true,
        cancelButtonText: \"ยกเลิก\",
        confirmButtonColor: \"#DD6B55\",
        confirmButtonText: \"ใช่, ลบข้อมูลสินค้า!\",
        closeOnConfirm: false
      },
      function(){
        jQuery.ajax(\"".site_url('inventory/delProduct')."&id=\"+pid);
        var table=jQuery('#bootstrap-data-table-export').DataTable();
        

        var rows = table
    .rows('.selected')
    .remove()
    .draw();
        swal(\"Deleted!\", \"Your imaginary file has been deleted.\", \"success\");
      });
     }
        </script>");
        ?>