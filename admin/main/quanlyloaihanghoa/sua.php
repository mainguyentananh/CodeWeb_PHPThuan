<?php
	
	$sql_sua_tenloaihanghoa = "SELECT * FROM loaihanghoa WHERE MaLoaiHangHoa='$_GET[idloaihanghoa]' ";
	$query_sua_tenloaihanghoa = mysqli_query($mysqli,$sql_sua_tenloaihanghoa);
?>
<div class="col text-center h3">Sửa Loại Hàng Hóa</div>
<table class="table" style="margin-bottom: 25.8%;">
 <form   method="POST">
 	<?php
 	while($row = mysqli_fetch_array($query_sua_tenloaihanghoa)) {
 	?>
 	 <tr>
	  	<td scope="col">ID danh mục</td>
	  	<td scope="col"><input type="text" value="<?php echo $row['MaLoaiHangHoa'] ?>" name="maloaihanghoa"></td>
	  </tr>

	  <tr>
	  	<td scope="col">Tên danh mục</td>
	  	<td scope="col"><input type="text" value="<?php echo $row['TenLoaiHangHoa'] ?>" name="tenhanghoa"></td>
	  </tr>
	
	   <tr>
	    <td colspan="2" scope="col"><input type="submit" class="btn btn-primary btn rounded-0" name="suatenloaihanghoa" value="Sửa Tên Loại Hàng Hóa"></td>
	  </tr>
	  <?php
	  } 
	  ?>

 </form>
</table>

<?php 
	//sua
	if (isset($_POST['suatenloaihanghoa'])){
	$id = $_GET['idloaihanghoa'];
	$tenhanghoa = $_POST['tenhanghoa'];
	$mamoi = $_POST['maloaihanghoa'];
	$sql_update = "UPDATE loaihanghoa SET TenLoaiHangHoa='".$tenhanghoa."',MaLoaiHangHoa='".$mamoi."' WHERE MaLoaiHangHoa=".$id."";
	mysqli_query($mysqli,$sql_update);
	header('Location:index.php?action=quanlyloaihanghoa&query=lietke');
	}
 ?>