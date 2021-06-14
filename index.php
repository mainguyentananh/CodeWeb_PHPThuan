<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
		<script type="text/javascript" src="./js/jquery-3.4.1.min.js"></script>
        <script type="text/javascript" src="./js/jquery-ui.js"></script>
        <script type="text/javascript" src="./bootstrap/js/bootstrap.min.js"></script>
        <link rel="stylesheet" type="text/css" href="./bootstrap/css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="./style-3.css" />
        <link rel="stylesheet" type="text/css" href="./js/jquery-ui.css" />
        <link rel="stylesheet" type="text/css" href="./ft/css/all.css" />
        <link rel="stylesheet" type="text/css" href="./ft/css/fontawesome.css" />
	
	<title>Trang Chu</title>
	
</head>
<body>
	<?php
		session_start();
	  ?>
 <nav class="navbar navbar-expand-lg navbar-light bg-light ">
            <div class="container">
                
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Home </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?home=dangnhap">Đăng Nhập</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link " href="index.php?home=giohang"><i class="fas fa-shopping-cart"></i></a>
                        </li>
                       
                    </ul>
                    <form class="form-inline my-2 my-lg-0">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" />
                        <button class="btn btn-outline-dark my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div>
            </div>
</nav>
<div class="container">
  <div class="row ">
  	<div class="col-4">  		
  			
  			<a class="text-decoration-none font-weight-bold text-dark" href="index.php"><span class="h1">SunShop</span></a>
  	</div>
  	<div class="col-4">
  		
  	</div>

  	<div class="col-4">
  		
  	</div>

  </div>
  <hr />
</div>

	<div>

		<?php
			
			include("config/config.php");
			include("layouts/main.php");
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