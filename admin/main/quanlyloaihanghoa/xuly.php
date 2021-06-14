<?php
include('../../../config/config.php');


$tenloaisp = $_POST['tenloaihanghoa'];
if(isset($_POST['loaihanghoa'])){
	//them
	$sql_them = "INSERT INTO loaihanghoa(TenLoaiHangHoa) VALUES('".$tenloaisp."')";
	mysqli_query($mysqli,$sql_them);
	header('Location:../../index.php?action=quanlyloaihanghoa&query=lietke');
}
else{
	//xoa
	$id=$_GET['idloaihanghoa'];
	$sql_xoa = "DELETE FROM loaihanghoa WHERE MaLoaiHangHoa ='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlyloaihanghoa&query=lietke');
}

?>