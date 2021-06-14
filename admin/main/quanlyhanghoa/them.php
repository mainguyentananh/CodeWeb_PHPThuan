<div class="col text-center h3" style="margin-bottom:20px;">Thêm Hàng Hóa</div>
<table class="table">
 <form method="POST" action="main/quanlyhanghoa/xuly.php" enctype="multipart/form-data">
	
	  <tr>
	  	<td>Tên sản phẩm</td>
	  	<td><input type="text" name="tensanpham"></td>
	  </tr>   
	  <tr>
	  	<td>Quy Cách</td>
	  	<td><input type="text" name="quycach"></td>
	  </tr>
	   <tr>
	  	<td>Giá Bán</td>
	  	<td><input type="text" name="giasp"></td>
	  </tr>
	  <tr>
	  	<td>Số lượng</td>
	  	<td><input type="text" name="soluong"></td>
	  </tr>
	   <tr>
	  	<td>Hình ảnh</td>
	  	<td><input type="file" name="hinhanh"></td>
	   </tr>
	  <tr>
	    <td>Loại Hàng Hóa</td>
	    <td>
	    	<select name="loaihanghoa">
	    		<?php
	    		$sql_lietke_danhmucsp = "SELECT * FROM loaihanghoa";
				$query_lietke_danhmucsp = mysqli_query($mysqli,$sql_lietke_danhmucsp);
	    		while($row = mysqli_fetch_array($query_lietke_danhmucsp)){
	    		?>
	    		<option  value="<?php echo $row['MaLoaiHangHoa'] ?>">
	    			<?php echo $row['TenLoaiHangHoa'] ?>	
	    			</option>
	    		<?php
	    		} 
	    		?>
	    	</select>
	    </td>
	  </tr>
	   <tr>
	  	<td>Ghi Chú</td>
	  	<td><textarea  name="ghichu" rows="10" cols="70"></textarea></td>
	  </tr>
	   <tr>
	    <td colspan="2">
	    	
	    	<button class="btn btn-primary" type="submit" name="themsanpham">Thêm Hàng Hóa</button>
	    </td>
	  </tr>
 </form>
</table>