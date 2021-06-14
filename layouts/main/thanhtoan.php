<?php 
 	session_start();
	include('../../config/config.php');
  if (isset($_POST['dathang'])){
  $hoten = $_POST['ht'];
  $sdt = $_POST['sdt'];
  $email = $_POST['email'];
  $tencongty = $_POST['tct'];
  $diachi = $_POST['dc'];
  $temp2 ='';


  //xu li KH
  $sql_them_kh = "INSERT INTO khachhang(HoTenKH,TenCongTy,SoDienThoai,Email) VALUE('".$hoten."','".$tencongty."','".$sdt."','".$email."')";
  mysqli_query($mysqli,$sql_them_kh);


  $sql_find_kh = "SELECT MSKH FROM khachhang where SoDienThoai like '".$sdt."'";
   $temp = mysqli_query($mysqli,$sql_find_kh);
  while($row = mysqli_fetch_array($temp)){
    $temp2 = $row['MSKH'];
  }
  
  //DC kh
  $sql_them_kh = "INSERT INTO diachikh(DiaChi,MSKH) VALUE('".$diachi."','".$temp2."')";
  mysqli_query($mysqli,$sql_them_kh);


  //DatHang
  $today = date("Y/m/d");
  $sql_dathang = "INSERT INTO dathang(MSKH,NgayDH) VALUE('".$temp2."','".$today."')";
  mysqli_query($mysqli,$sql_dathang);

  //Lay Don Hang
  $sql_donhang = "SELECT SoDonDH  FROM dathang where MSKH ='".$temp2."'";
  $laydonhang = mysqli_query($mysqli,$sql_donhang);
  
  while($row = mysqli_fetch_array($laydonhang)){
    $temp3 = $row['SoDonDH'];
  }
  
  
  foreach($_SESSION['cart'] as $value){
  
    $id = $value['id'];
    $soluong = $value['soluong'];
    $giasp = $value['giasp'];
    $ctdt = "INSERT INTO chitietdathang (MSHH,SoDonDH,SoLuong,GiaDatHang ) VALUES('".$id."','".$temp3."','".$soluong."','".$giasp."')";
    
    mysqli_query($mysqli,$ctdt);
      } 


     unset($_SESSION['cart']);
   // session_destroy();
    header('Location:../../index.php');
  }
  ?>