<?php
include('../../../config/config.php');

$tensanpham = $_POST['tensanpham'];
$giasp = $_POST['giasp'];
$soluong = $_POST['soluong'];
$quycach = $_POST['quycach'];
$ghichu = $_POST['ghichu'];
$loaihanghoa = $_POST['loaihanghoa'];
//xuly hinh anh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];



if(isset($_POST['themsanpham'])){
	//them
	$sql_them = "INSERT INTO hanghoa(TenHH,QuyCach,Gia,SoLuongHang,MaLoaiHang,Location,GhiChu) VALUE('".$tensanpham."','".$quycach."','".$giasp."','".$soluong."','".$loaihanghoa."','".'images/'.$hinhanh."','".$ghichu."')";
	mysqli_query($mysqli,$sql_them);
	move_uploaded_file($hinhanh_tmp,'images/'.$hinhanh);
	header('Location:../../index.php?action=quanlyhanghoa&query=lietke');

}else{
	$id=$_GET['idsanpham'];
	$sql = "SELECT * FROM hanghoa WHERE MSHH='".$id."'";
	$query = mysqli_query($mysqli,$sql);
	while($row = mysqli_fetch_array($query)){
			unlink($row['Location']);
		}
	$sql_xoa = "DELETE FROM hanghoa WHERE MSHH='".$id."'";
	mysqli_query($mysqli,$sql_xoa);
	header('Location:../../index.php?action=quanlyhanghoa&query=lietke');
}

?>