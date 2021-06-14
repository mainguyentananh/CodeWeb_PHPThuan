
<?php
	$sql_lietke_sp = "SELECT * FROM hanghoa,loaihanghoa WHERE hanghoa.MaLoaiHang=loaihanghoa.MaLoaiHangHoa AND hanghoa.MSHH= '$_GET[idsanpham]'";
	$query_chitiet = mysqli_query($mysqli,$sql_lietke_sp);
?>
 <?php
  while($row = mysqli_fetch_array($query_chitiet)){
  	
  ?>
<div class="col text-center h3" style="margin-bottom:20px;">Chi Tiết Sản Phẩm</div>
  <div class="container" style="margin-bottom:10.7%;">
  	
<form method="POST" action="layouts/main/themgiohang.php">  
<div class="card">
  <div class="row no-gutters">
    <div class="col-md-4 text-center">
      <img src="admin/main/quanlyhanghoa/<?php echo $row['Location']?>" width="150px">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row['TenHH'] ?></h5>
        <p class="card-text">Ghi Chú: <?php echo $row['QuyCach'] ?></p>
        <p class="card-text">Loại Hàng Hóa: <?php echo $row['TenLoaiHangHoa'] ?></p>
        <p class="card-text">Mô Tả: <?php echo $row['GhiChu'] ?></p>
        <p class="card-text">Giá: <?php echo number_format($row['Gia'],0,',','.')?> VNĐ</p>
      	<input type="hidden" name="idsanpham" value="<?php echo $row['MSHH'] ?>">
        <input class="btn btn-primary" type="submit" name="themvaogio" value="Thêm Vào Giỏ Hàng">
      </div>
    </div>

  </div>

</div>

</form>

 <?php
  } 
  ?>
  
</div> 