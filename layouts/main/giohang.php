<div class="container" style="margin-bottom:20px;">
<div class="col text-center h3">Giỏ Hàng</div>
<?php
 
	if(!isset($_SESSION['cart'])){
		header('Location: index.php');
	}

?>
<table class="table table-bordered text-center">
  <tr>
    <th scope="col">Tên Sản Phẩm</th>
    <th scope="col">Hình ảnh</th>
    <th scope="col">Số lượng</th>
    <th scope="col">Giá sản phẩm</th>
    <th scope="col">Thành tiền</th>
  </tr>
  <form method="POST" action="layouts/main/thanhtoan.php">
  <?php
  if(isset($_SESSION['cart'])){
  	$i = 0;
  	$tongtien = 0;
  	foreach($_SESSION['cart'] as $cart_item){
  		$thanhtien = $cart_item['soluong']*$cart_item['giasp'];
  		$tongtien+=$thanhtien;
  		$i++;
  ?>
  <tr>
    <td scope="col"><?php echo $cart_item['tensanpham']; ?></td>
    <td scope="col"><img src="admin/main/quanlyhanghoa/<?php echo $cart_item['hinhanh']; ?>" width="150px"></td>
    <td scope="col">  	
    	<?php echo $cart_item['soluong']; ?>  	
    </td>
    <td scope="col"><?php echo number_format($cart_item['giasp'],0,',','.').'vnđ'; ?></td>
    <td scope="col"><?php echo number_format($thanhtien,0,',','.').'vnđ' ?></td>
  </tr>
  <?php
  	}
  ?>
   <tr>
    <td colspan="5" scope="col">
    	<div class="row">
          
          <p  class="h4 col-6">Tổng tiền: <?php echo number_format($tongtien,0,',','.').'vnđ' ?></p><br/>
          <p class="col-6"><a href="layouts/main/themgiohang.php?xoa=" class="btn btn-danger">Hủy Giỏ Hàng </a></p>
 
      </div>
      </td>   
  </tr>

</table>
<br>
<hr>
   <div class="col text-center h3">Thông Tin Khách Hàng</div>
    <div class="form-row">
    <div class="form-group col-md-6">
      <label>Họ Tên Khách Hàng</label>
      <input type="text" class="form-control" name="ht" required>
    </div>
    <div class="form-group col-md-6">
      <label >Số Điện Thoại</label>
      <input type="text" class="form-control" name="sdt" required>
    </div>
  </div>
 
 
  <div class="form-row">
    <div class="form-group col-md-4">
      <label >Email</label>
      <input type="email" class="form-control" name="email" required>
    </div>  

      <div class="form-group col-md-4">
      <label >Tên Công Ty</label>
      <input type="text" class="form-control" name="tct" required>
    </div>  

     <div class="form-group col-md-4">
      <label >Địa Chỉ</label>
      <input type="text" class="form-control" name="dc" required>
    </div> 
  </div>
   



  <button type="submit" name="dathang" class="btn btn-primary col text-center h3">Tiến Hành Đặt Hàng</button>
</form>
<?php
        }
      ?>
</div>