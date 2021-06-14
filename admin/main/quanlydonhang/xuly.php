
 <div class="col text-center h3">Thông Tin Nhân Viên</div>
<form method="POST" style="margin-bottom:20.5%;">

 <div class="form-row">
    <div class="form-group col-md-6">
      <label>Họ Tên Nhân Viên</label>
      <input type="text" class="form-control" name="ht" required>
    </div>
    <div class="form-group col-md-6">
      <label >Số Điện Thoại</label>
      <input type="text" class="form-control" name="sdt" required>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-4">
      <label >Chức Vụ</label>
      <input type="text" class="form-control" name="cv" required>
    </div>  

      <div class="form-group col-md-4">
      <label >Địa Chỉ</label>
      <input type="text" class="form-control" name="dc" required>
    </div>  

     <div class="form-group col-md-4">
      <label >Ngày Giao Hàng</label>
      <input type="date" class="form-control" name="ngh" required>
    </div> 
  </div>
   <button type="submit" name="xulydh" class="btn btn-primary col text-center h3">Xử Lý Đơn Hàng</button>
 </form>

 <?php
  if (isset($_POST['xulydh'])){
  $sodondh = $_GET['sodondh'];
  $ht = $_POST['ht'];
  $sdt = $_POST['sdt'];
  $cv = $_POST['cv'];
  $dc = $_POST['dc'];
  $ngh = $_POST['ngh'];
  $temp_f_nv = '';

  //them nv
  $sql_them_nv = "INSERT INTO nhanvien(HoTenNV,ChucVu,DiaChi,SoDienThoai) VALUES('".$ht."','".$cv."','".$dc."','".$sdt."')";
  mysqli_query($mysqli,$sql_them_nv);


  //tim nv
   $sql_find_nv = "SELECT MSNV FROM nhanvien where SoDienThoai like '".$sdt."'";
   $temp = mysqli_query($mysqli,$sql_find_nv);
  while($row = mysqli_fetch_array($temp)){
    $temp_f_nv = $row['MSNV'];
  }


  //xu ly don hang
  $sql_xulydh = "UPDATE dathang SET MSNV ='".$temp_f_nv."',NgayGH = '".$ngh."' WHERE SoDonDH = ".$sodondh."";
  mysqli_query($mysqli,$sql_xulydh);

  header('Location: index.php?action=quanlydonhang&query=lietke');

  }
?>