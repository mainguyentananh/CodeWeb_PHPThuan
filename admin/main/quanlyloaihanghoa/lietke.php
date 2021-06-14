<?php
	$sql_lietke_danhmucsp = "SELECT * FROM loaihanghoa";
	$query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);
?>
<div class="col text-center h3">Danh Sách Loại Hàng Hóa</div>
<table class="table" >
  <thead>
  <tr>
  	<th scope="col">Id</th>
    <th scope="col">Tên danh mục</th>
  	<th scope="col">Quản lý</th>
  </tr>
  </thead>
  <?php
  $i = 0;
  while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
  	$i++;
  ?>
  <tbody>
  <tr>
  	<td scope="col"><?php echo $i ?></td>
    <td scope="col"><?php echo $row['TenLoaiHangHoa'] ?></td>
   	<td>
   		<a href="main/quanlyloaihanghoa/xuly.php?idloaihanghoa=<?php echo $row['MaLoaiHangHoa'] ?>">Xoá</a> /
      <a href="index.php?action=quanlyloaihanghoa&query=sua&idloaihanghoa=<?php echo $row['MaLoaiHangHoa'] ?>">Sửa</a> 
   	</td>
   
  </tr>
  <?php
  } 
  ?>
 </tbody>
</table>

  <div style="margin-bottom: 20%;">
  <a class="btn btn-primary btn rounded-0"  href="index.php?action=quanlyloaihanghoa&query=them">Thêm Loại Hàng Hóa</a>
  </div>
