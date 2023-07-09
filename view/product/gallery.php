<div class="col-lg-10">
        <div class="card">
            <div class="card-header">
                ภาพสินค้า
            </div>
            <div class="card-body card-block">
<div class="row">
<?php
foreach($pictures as $pic){
?>
  <div class="col-md-4">
    <div class="thumbnail">
      <a href="<?php  print $pic; ?>">
        <img src="<?php  print $pic; ?>" alt="Lights" class="img-rounded" style="width:100%">
        <!-- <div class="caption">
          <p>Lorem ipsum...</p> 
        </div> -->
      </a>
    </div>
  </div>
<?php
}
?>
</div>
</div>
</div>
</div>