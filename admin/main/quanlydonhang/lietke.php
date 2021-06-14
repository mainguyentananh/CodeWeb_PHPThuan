<?php
	$sql_lietke_donhang = "SELECT * FROM  dathang";
	$query_lietke_donhang = mysqli_query($mysqli,$sql_lietke_donhang);
?>

<div class="col text-center h3">Quản Lý Đơn Hàng</div>


<table class="table text-center" style="margin-bottom:17.8%;">
  <thead>
  <tr>
  	<th scope="col">Số Đơn</th>
    <th scope="col">Mã Số Khách Hàng</th>
    <th scope="col">Mã Số Nhân Viên</th>
    <th scope="col">Ngày Đặt Hàng </th>
    <th scope="col">Ngày Giao Hàng</th>
    <th scope="col">Tình Trạng</th>
    <th scope="col">Chi Tiết Đơn Hàng</th>
  </tr>
</thead>
  <?php
  while($row = mysqli_fetch_array($query_lietke_donhang)){
  ?>
  <tbody>
  <tr>
  	<td scope="col"><?php echo $row['SoDonDH'] ?></td>
    <td scope="col"><?php echo $row['MSKH'] ?></td>
    <td scope="col"><?php echo $row['MSNV'] ?></td>
    <td scope="col"><?php echo $row['NgayDH'] ?></td>
    <td scope="col"><?php echo $row['NgayGH'] ?></td>
    <td scope="col"><?php if(($row['MSNV'] && $row['NgayGH']) == NULL){
    	echo "Chưa Xử Lý";
    }else echo "Đã Xử Lý" ;
    ?>	
    </td>
    <td scope="col">
    	<a href="index.php?action=quanlydonhang&query=chitiet&sodondh=<?php echo $row['SoDonDH'] ?>&mskh=<?php echo $row['MSKH'] ?>&msnv=<?php echo $row['MSNV'] ?>">Xem</a>/
    	<a href="index.php?action=quanlydonhang&query=xuly&sodondh=<?php echo $row['SoDonDH'] ?>">Xử Lý</a>
  	</td>
  </tr>
  <?php
  } 
  ?>
  </tbody>
</table>