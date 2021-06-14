<style type="text/css">
	.table{
		margin-bottom:100px ;
	}
</style>
<?php
	$sddh = $_GET['sodondh'];
	$mskh =	$_GET['mskh'];
	$msnv =	$_GET['msnv'];


	$sql_ttkh = "SELECT * FROM  dathang,khachhang where dathang.MSKH  = khachhang.MSKH and dathang.SoDonDH =".$sddh."";
	
	//thong tin nguoi dat
	$query_ttkh = mysqli_query($mysqli,$sql_ttkh);
	
	//ngay giao dat hang
	$query_ttdgh = mysqli_query($mysqli,$sql_ttkh);

	//dia chi
	$sql_dckh = "SELECT * FROM  khachhang,diachikh where khachhang.MSKH  = diachikh.MSKH and khachhang.MSKH =".$mskh."";
	$query_dckh = mysqli_query($mysqli,$sql_dckh);
	while($row = mysqli_fetch_array($query_dckh)){
    	$temp2 = $row['DiaChi'];
  	}

  	//nhan vien
  	$sql_ttnv = "SELECT * FROM  dathang,nhanvien where dathang.MSNV = nhanvien.MSNV  and dathang.MSNV=".$msnv."";
	$query_ttnv = mysqli_query($mysqli,$sql_ttnv);

	//chi tiet dat hang
	$sql_ctdt = "SELECT * FROM  dathang,chitietdathang where dathang.SoDonDH=chitietdathang.SoDonDH and dathang.SoDonDH =".$sddh."";
	$query_ctdt = mysqli_query($mysqli,$sql_ctdt);


?>
<div class="col text-center h3">Thông Tin Đặt Hàng Giao Hàng</div>
<table class="table">
  <thead>
  <tr>
  	<th scope="col">Ngày Đặt Hàng</th>
    <th scope="col">Ngày Giao Hàng</th>
  </tr>
</thead>
  <?php
  while($row = mysqli_fetch_array($query_ttdgh)){
  ?>
  <tbody>
  <tr>
  	<td scope="col"><?php echo $row['NgayDH'] ?></td>
    <td scope="col"><?php echo $row['NgayGH'] ?></td>
  </tr>
  <?php
  } 
  ?>
  </tbody>
</table>


<div class="col text-center h3">Thông Tin Khách Hàng</div>
<table class="table">
  <thead>
  <tr>
  	<th scope="col">Họ Tên Khách Hàng</th>
    <th scope="col">Tên Công Ty</th>
    <th scope="col">Số Điện Thoại</th>
    <th scope="col">Email</th>
    <th scope="col">Địa Chỉ</th>
  </tr>
</thead>
  <?php
  while($row = mysqli_fetch_array($query_ttkh)){
  ?>
  <tbody>
  <tr>
  	<td scope="col"><?php echo $row['HoTenKH'] ?></td>
    <td scope="col"><?php echo $row['TenCongTy'] ?></td>
    <td scope="col"><?php echo $row['SoDienThoai'] ?></td>
    <td scope="col"><?php echo $row['Email'] ?></td>
    <td scope="col"><?php echo $temp2 ?></td>
  </tr>
  <?php
  } 
  ?>
  </tbody>
</table>

<div class="col text-center h3">Thông Tin Nhân Viên</div>
<table class="table">
  <thead>
  <tr>
  	<th scope="col">Họ Tên Nhân Viên </th>
    <th scope="col">Chức Vụ</th>
    <th scope="col">Số Điện Thoại</th>
    <th scope="col">Địa Chỉ</th>
  </tr>
</thead>
  
  <?php
  	if($msnv!=null){
  while($row = mysqli_fetch_array($query_ttnv)){
  ?>
  <tbody>
  <tr>
  	<td scope="col"><?php echo $row['HoTenNV'] ?></td>
    <td scope="col"><?php echo $row['ChucVu'] ?></td>
    <td scope="col"><?php echo $row['SoDienThoai'] ?></td>
    <td scope="col"><?php echo $row['DiaChi'] ?></td>
  </tr>

  <?php
   }
  } 
  ?>
  </tbody>
</table>


<div class="col text-center h3">Chi Tiết Đặt Hàng</div>
<table class="table">
  <thead>
  <tr>
  	<th scope="col">Tên Hàng Hóa</th>
  	<th scope="col">Ảnh</th>
  	<th scope="col">Số Lượng</th>
    <th scope="col">Giá</th>
  </tr>
</thead>
  
  <?php
  	$sum_price = 0;
  while($row = mysqli_fetch_array($query_ctdt)){
  	$sum_price+= $row['SoLuong'] * $row['GiaDatHang'];
  ?>
  <tbody>
  <tr>
  	<td><?php 
  		$sql_r = "SELECT * FROM hanghoa where MSHH = ".$row['MSHH']."";
  		$query_r = mysqli_query($mysqli,$sql_r);
  		while($row2 = mysqli_fetch_array($query_r)){	
  			echo $row2['TenHH'];
  		}


  	?></td>
  	<td scope="col"><?php
  		$sql_r = "SELECT * FROM hanghoa where MSHH = ".$row['MSHH']."";
  		$query_r = mysqli_query($mysqli,$sql_r);
  		while($row2 = mysqli_fetch_array($query_r)){	
  			$temp = $row2['Location'] ;
  		}

  	 ?>
  	 	<img  src="../admin/main/quanlyhanghoa/<?php echo $temp?>">
  	</td>
  	<td scope="col"><?php echo $row['SoLuong'] ?></td>
    <td scope="col"><?php echo number_format($row['GiaDatHang'],0,',','.').'vnđ'  ?></td>

  </tr>

  <?php
  } 
  ?>
  </tbody>

</table>
<div class="col">
<p  class="h4 col-6">Tổng tiền: <?php echo number_format($sum_price,0,',','.').'vnđ' ?></p>
</div>
