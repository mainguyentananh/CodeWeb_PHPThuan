
<?php
	$sql_sua_sp = "SELECT * FROM hanghoa WHERE MSHH ='$_GET[idsanpham]'";
	$query_sua_sp = mysqli_query($mysqli,$sql_sua_sp);
?>
<div class="col text-center h3" style="margin-bottom:20px;">Sửa Hàng Hóa</div>
<table class="table">
<?php
ob_start();
while($row = mysqli_fetch_array($query_sua_sp)) {
?>
 <form method="POST"  enctype="multipart/form-data">
	  <tr>
	  	<td>MSHH</td>
	  	<td><input type="text" value="<?php echo $row['MSHH'] ?>" name="mshh"></td>
	  </tr>
	  <tr>
	  	<td>Tên sản phẩm</td>
	  	<td><input type="text" value="<?php echo $row['TenHH'] ?>" name="tensanpham"></td>
	  </tr>
	   <tr>
	  	<td>Quy Cách</td>
	  	<td><input type="text" value="<?php echo $row['QuyCach'] ?>" name="quycach"></td>
	  </tr>
	  <tr>
	  	<td>Giá sp</td>
	  	<td><input type="text" value="<?php echo $row['Gia'] ?>" name="giasp"></td>
	  </tr>
	  <tr>
	  	<td>Số lượng</td>
	  	<td><input type="text" value="<?php echo $row['SoLuongHang'] ?>" name="soluong"></td>
	  </tr>
	   <tr>
	  	<td>Hình ảnh</td>
	  	<td>
	  		<img src="main/quanlyhanghoa/<?php echo $row['Location']?>" width="150px"><br/>
	  		<input type="file" name="hinhanh">
	  		
	  	</td>
	  	<tr>
	  	<td>Ghi Chú</td>
	  	<td><textarea  name="ghichu" rows="10" cols="70" ><?php echo $row['GhiChu'] ?></textarea>
	  	</td>
	  </tr>
	  </tr>
	   <tr>
	    <td>Loại Hàng Hóa</td>
	    <td>    	
	    		<select name="loaihanghoa">
	    		<?php
	    		$sql_lietke_danhmucsp = "SELECT * FROM loaihanghoa";
				$query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);
	    		while($row_danhmuc = mysqli_fetch_array($query_lietke_danhmucsp)){
	    			if($row_danhmuc['MaLoaiHangHoa'] == $row['MaLoaiHang']){
	    		?>
	    		<option selected value="<?php echo $row_danhmuc['MaLoaiHangHoa'] ?>"><?php echo $row_danhmuc['TenLoaiHangHoa'] ?></option>
	    		<?php
	    			}else{
	    		?>
	    		<option value="<?php echo $row_danhmuc['MaLoaiHangHoa'] ?>"><?php echo $row_danhmuc['TenLoaiHangHoa'] ?></option>
	    		<?php
	    			}
	    		} 
	    		?>
	    	</select>	    	
	    </td>
	  	</tr>
	   <tr>
	    <td colspan="2">
	    	<button class="btn btn-primary" type="submit" name="suasanpham">Sửa Hàng Hóa</button>
	    </td>
	  </tr>
 </form>
 <?php
 } 
 ?>

</table>

<?php 
	
	//sua
	if (isset($_POST['suasanpham'])){
	$id = $_GET['idsanpham'];
	$mshh = $_POST['mshh'];
	$tenhanghoa = $_POST['tensanpham'];
	$quycach = $_POST['quycach'];
	$giasp = $_POST['giasp'];
	$soluong = $_POST['soluong'];
	$loaihanghoa = $_POST['loaihanghoa'];
	$ghichu = $_POST['ghichu'];

	//XU LY ANH
	$hinhanh = $_FILES['hinhanh']['name'];
	$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];


	if($hinhanh !=''){
	//XOA ANH
	move_uploaded_file($hinhanh_tmp,'images/'.$hinhanh);
	$sql = "SELECT * FROM hanghoa WHERE MSHH='".$id."'";
	$query = mysqli_query($mysqli,$sql);
	while($row = mysqli_fetch_array($query)){
			unlink($row['Location']);
	}
	

	$sql_update = "UPDATE hanghoa SET TenHH='".$tenhanghoa."',MSHH='".$mshh."',QuyCach='".$quycach."',Gia='".$giasp."',SoLuongHang='".$soluong."',MaLoaiHang='".$loaihanghoa."',Location='".'images/'.$hinhanh."',GhiChu='".$ghichu."' WHERE MSHH =".$id."";

	mysqli_query($mysqli,$sql_update);	
	header('Location: index.php?action=quanlyhanghoa&query=lietke');
	}
	else{
		$sql_update = "UPDATE hanghoa SET TenHH='".$tenhanghoa."',MSHH='".$mshh."',QuyCach='".$quycach."',Gia='".$giasp."',SoLuongHang='".$soluong."',MaLoaiHang='".$loaihanghoa."',GhiChu='".$ghichu."' WHERE MSHH =".$id."";
	mysqli_query($mysqli,$sql_update);
	}	

	header('Location: index.php?action=quanlyhanghoa&query=lietke');
	}
	 ob_end_flush();
 ?>
