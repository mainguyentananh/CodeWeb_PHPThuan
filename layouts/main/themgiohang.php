<?php
	session_start();
	include('../../config/config.php');

	//them sanpham vao gio hang
	if(isset($_POST['themvaogio'])){
		
		$id=($_POST['idsanpham']);
		
		
		if(isset($_SESSION['cart'][$id]))
		{

			$_SESSION['cart'][$id]['soluong']++;
		}else{
			$sql ="SELECT * FROM hanghoa WHERE MSHH={$id}";
			$query = mysqli_query($mysqli,$sql);
			$row_s = mysqli_fetch_array($query);
			$_SESSION['cart'][$row_s['MSHH']]=array( 
                        "soluong" => 1, 
                        "giasp" => $row_s['Gia'] ,
                        'tensanpham' => $row_s['TenHH'],
                        'id' => $row_s['MSHH'],
                        'hinhanh' => $row_s['Location']
                    ); 
		}



		header('Location:../../index.php?home=giohang');
		exit();
		
	}



	//xoa san pham
	if(isset($_SESSION['cart'])){
		unset($_SESSION['cart']);
		header('Location:../../index.php');
	}

	
?>