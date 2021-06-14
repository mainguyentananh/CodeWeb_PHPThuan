<?php
	if(isset($_POST['dangnhap'])){
		$tk = $_POST['username'];
		$matkhau = '';

		if($tk=='admin'){
			header("Location: admin/index.php?action=quanlydonhang&query=lietke");
		}
		else{
			echo '
						<div class="row justify-content-center" >
							<div class="text-danger">Sai Mật Khẩu.Tài khoản là admin. Không có pass </div>
						</div>';
			
		}
	} 
?>
<div class="col text-center h3">Đăng Nhập</div>
<div class="container" style="margin-bottom:15.4%;">
<form method="POST">
	<div class="form-row">
    <div class="form-group col">
      <label>Tài Khoản</label>
      <input type="text" class="form-control" name="username">
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col">
      <label>Mật Khẩu</label>
      <input type="password" class="form-control" >
    </div>
  </div>
  <button type="submit" name="dangnhap" class="btn btn-primary col text-center h3">Đăng Nhập</button>

</form>
</div>