<?php
  
    $sql_lietke_loai = "SELECT * FROM loaihanghoa";
    $query_lietke_loai = mysqli_query($mysqli,$sql_lietke_loai);
    
     $sql_lietke_sp_dm = "SELECT * FROM hanghoa,loaihanghoa WHERE hanghoa.MaLoaiHang=loaihanghoa.MaLoaiHangHoa AND hanghoa.MaLoaiHang= '$_GET[idloai]'";
    $query_chitiet = mysqli_query($mysqli,$sql_lietke_sp_dm);
?>
 
<div id="carouselExampleIndicators" class="carousel slide mt-1" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="images/1.jpg" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="images/2.jpg" class="d-block w-100" alt="..." />
                </div>
                <div class="carousel-item">
                    <img src="images/3.jpg" class="d-block w-100" alt="..." />
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
</div>
 <div class="col text-center" style="margin-top: 30px;">
        <?php
            while($row = mysqli_fetch_array($query_lietke_loai)){

                ?>
                   <a href="index.php?home=danhmuc&idloai=<?php echo $row['MaLoaiHangHoa'] ?>" class="btn btn-outline-info xct"><?php echo $row['TenLoaiHangHoa'] ?></a>  
                <?php
                } 
                ?>    
            </div>



 <div class="container">


            <div class="row mt-4">
                <h2 class="list-product-title">Products</h2>
         
             
            </div>
         
    <div class="group-product">
    <div class="row">
           <?php
             while($row = mysqli_fetch_array($query_chitiet)){
                 
                ?>
               
                   <div class="col-md-3 col-sm-6 col-12">
                        <div class="card product-card">
                            <img src="./admin/main/quanlyhanghoa/<?php echo $row['Location']?>" class="card-img-top" alt="..." width="280px" height="280px" />
                            <div class="card-body">
                                <h5 class="card-title"> <?php echo $row['TenHH'] ?></h5>
                                <div class="card-text product-price">
                                    <div class="nd-product">                            
                                        <span><?php echo  number_format($row['Gia'],0,',','.')?> VNĐ</span>
                                    </div>
                                   
                                 
                                    <a href="layouts/main/themgiohang.php?idsanpham=<?php echo $row['MSHH'] ?>" class="btn btn-info btn-add-to-card"><i class="fas fa-shopping-cart"></i></a>
                                     <a href="index.php?home=sanpham&idsanpham=<?php echo $row['MSHH'] ?>" class="btn btn-outline-info xct">Xem chi tiết</a>
                                </div>
                            </div>
                        </div>
                    </div>  
                
                <?php
                } 
                
                ?>    
            </div>   
             </div>

</div>
