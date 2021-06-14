
<?php
	$sql_lietke_sp = "SELECT * FROM hanghoa,loaihanghoa WHERE hanghoa.MaLoaiHang=loaihanghoa.MaLoaiHangHoa ";
	$query_lietke_sp = mysqli_query($mysqli,$sql_lietke_sp);
?>
<div class="col text-center h3">Danh Sách Hàng Hóa</div>

<a class="btn btn-primary btn rounded-0"  href="index.php?action=quanlyhanghoa&query=them" style="margin-bottom:10px;">Thêm Hàng Hóa</a>
<table class="table">
  <thead>
  <tr>
  	<th scope="col">MSHH</th>
    <th scope="col">Tên Hàng Hóa</th>
    <th scope="col">Quy Cách</th>
    <th scope="col">Giá </th>
    <th scope="col">Số lượng</th>
    <th scope="col">Tên Loại Hàng</th>
    <th scope="col">Ghi Chú</th>
    <th scope="col">Ảnh</th>
    <th scope="col"></th>
    <th scope="col"></th>
  </tr>
</thead>
  <?php
  while($row = mysqli_fetch_array($query_lietke_sp)){
  ?>
  <tbody>
  <tr>
  	<td scope="col"><?php echo $row['MSHH'] ?></td>
    <td scope="col"><?php echo $row['TenHH'] ?></td>
    <td scope="col"><?php echo $row['QuyCach'] ?></td>
    <td scope="col"><?php echo number_format($row['Gia'],0,',','.')?> VNĐ</td>
    <td scope="col"><?php echo $row['SoLuongHang'] ?></td>
    <td scope="col"><?php echo $row['TenLoaiHangHoa'] ?></td>
    <td style="width: 300px;" scope="col"><?php echo $row['GhiChu'] ?>
    </td>
    <td scope="col"><img src="main/quanlyhanghoa/<?php echo $row['Location']?>" width="150px"></td>
   	<td scope="col">
   		<a href="main/quanlyhanghoa/xuly.php?idsanpham=<?php echo $row['MSHH'] ?>">Xoá</a>
   	</td>
    <td scope="col">
      <a href="index.php?action=quanlyhanghoa&query=sua&idsanpham=<?php echo $row['MSHH'] ?>">Sữa</a>
    </td>
  </tr>
  <?php
  } 
  ?>
  </tbody>
</table>