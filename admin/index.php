<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
		<script type="text/javascript" src="../js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="../js/jquery-ui.js"></script>
        <script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="../style-3.css" />
        <link rel="stylesheet" type="text/css" href="../js/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="../ft/css/all.css" />
        <link rel="stylesheet" type="text/css" href="../ft/css/fontawesome.css" />
	
	<title>Trang Chu</title>
	
</head>
<body>
	 <?php
    if(isset($_GET['dangxuat'])){ 
        header("Location: ../index.php");    
    } 
?>
 <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php?action=quanlydonhang&query=lietke">Home </a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php?action=quanlydonhang&query=lietke">Quản Lý Đơn Hàng</a>
                        </li>
                        <li class="nav-item ">
                            <a class="nav-link" href="index.php?action=quanlyhanghoa&query=lietke">Quản Lý Hàng Hóa</a>
                        </li>
                        <li class="nav-item ">
                           <a class="nav-link" href="index.php?action=quanlyloaihanghoa&query=lietke">Quản Lý Loại Hàng Hóa</a>
                        </li>                               
                    </ul> 
                    <a href="index.php?dangxuat=dangxuat" style="margin-right: 25px;">Logout </a>           
                </div>
            <span class="text-dark">  ADMIN</span>
            </div>
</nav>

	<div class="container">
		<div class="container">
  <div class="row ">
  	<div class="col-4">  		
  			<hr width="45%" />
  			<a class="text-decoration-none font-weight-bold text-dark" href="index.php?action=quanlyhanghoa&query=lietke"><h1>SunShop</h1></a>
  	</div>
  	<div class="col-4">
  	</div>
  			<div class="col-4">
  		</div>
  	</div>
	</div>
		<?php
			session_start();
			include("../config/config.php");
			include("./main.php");
			
		?>
	</div>
	<footer class="sticky-footer bg-light text-dark">
					<div class="container my-auto" style="height: 120px;">
						<div class="copyright text-center my-auto " >
							<span class="text-primary">Nếu Quí Khách có bất kì thắc mắc nào về Sản Phẩm hãy liên hệ với chúng tôi</span>
							<br>
							<span>GMAIL: anhB1812326@student.ctu.edu.vn</span>
							<br>
							<span>SĐT: 0369344656</span>
							<br>
							<span>Copyright &copy; MNTA</span>
							<br>
							
						</div>
					</div>
	</footer>
</body>
</html>