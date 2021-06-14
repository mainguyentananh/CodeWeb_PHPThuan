
				<?php

				if (isset($_GET['home']) == NULL ) {
					include("main/home.php");
					$temp = '';
				}
				else if(isset($_GET['home'])){		
					$temp = $_GET['home'];
				}
				if($temp=='dangnhap'){
					include("main/dangnhap.php");
				
				}
				elseif($temp=='sanpham'){
					include("main/sanpham.php");
				}elseif($temp=='giohang'){
					include("main/giohang.php");
				
				}elseif($temp=='danhmuc'){
					include("main/danhmuc.php");
				}

				?>
		