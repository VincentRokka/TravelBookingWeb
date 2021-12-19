<?php
include 'config/db.php';
if(isset($_GET['id_dm'])){
   $id_dm=$_GET['id_dm'];
}else{
    $id_dm='';
}
$sql_dm = "SELECT * FROM dmsanpham";
$query_dm = mysqli_query($connect,$sql_dm);

$sql_spnb = "SELECT * FROM sanpham limit 1";
$query_spnb = mysqli_query($connect,$sql_spnb);

$sql_spkm = "SELECT * FROM sanpham where khuyen_mai like 'có'";
$query_spkm = mysqli_query($connect,$sql_spkm);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>JSP Page</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
</head>
<body>
    <!--begin of menu-->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="home.php">Trang chủ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-end" id="navbarsExampleDefault">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="ManagerProduct.php">Quản lý sản phẩm</a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link" href="QuanLyKH.php">Quản lý khách hàng</a>
                   </li>
                   <li class="nav-item">
                    <a class="nav-link" href="thongke.php">Thống kê khách hàng</a>
                </li>
                </ul>

                <form action="Search.php?quanly=timkiem" method="post" class="form-inline my-2 my-lg-0">
                    <div class="input-group input-group-sm">
                        <input name="search_product" type="text" class="form-control" aria-label="Small" aria-describedby="inputGroup-sizing-sm" placeholder="Search...">
                        <div class="input-group-append">
                            <button type="submit" name="search_button" class="btn btn-secondary btn-number">
                                <i class="fa fa-search"></i>
                            </button>
                        </div>
                    </div>
                    <a class="btn btn-success btn-sm ml-3" href="Cart.php">
                        <i class="fa fa-shopping-cart"></i> Cart
                        <span class="badge badge-light">3</span>
                    </a>
                </form>
            </div>
        </div>
    </nav>
    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Hệ thống hỗ trợ đặt tour du lịch công ty VIETTOURIST</h1>
            <p class="lead text-muted mb-0">Trang web du lịch được yêu thích với lựa chọn hàng đầu của người Việt</p>
        </div>
    </section>
    <!--end of menu-->
    <div class="container">
        <div class="row">
            <!-- Left-->
            <div class="col-sm-3">
                <div class="card bg-light mb-3">
                    <div class="card-header bg-primary text-white text-uppercase"><i class="fa fa-list"></i> Categories</div>
                    <ul class="list-group category_block">
                        <?php while ($row_dm=mysqli_fetch_assoc($query_dm)) {?>
                            <li class="list-group-item text-white"><a href="Home_dm.php?id_dm=<?php echo $row_dm['id_dm'] ?>"><?php echo $row_dm['ten_dm'] ?></a></li>
                        <?php } ?>
                        <li class="list-group-item text-white"><a href="Home_km.php">Khuyến mại</a></li>

                    </ul>
                </div>
                <div class="card bg-light mb-3">
                    <div class="card-header bg-success text-white text-uppercase">Sản phẩm nổi bật</div>
                    <div class="card-body">
                        <?php while ($row_spnb = mysqli_fetch_assoc($query_spnb)){ ?>
                            <img class="img-fluid" src="img/<?php echo $row_spnb['anh_sp'] ?>" />
                            <h5 class="card-title"><?php echo $row_spnb['ten_sp'] ?></h5>
                            <p class="bloc_left_price"><?php echo number_format($row_spnb['gia_sp']) ?> VND</p>
                            <div class="col">
                                <a href="Cart.php?id_sp=<?php echo $row_sp['id_sp']; ?>" class="btn btn-success btn-block">ĐẶt hàng</a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!--End left-->
            <div class="col-sm-9">
                <div class="row">
                    <!--vong lap-->
                    <?php while ($row_sp=mysqli_fetch_assoc($query_spkm)){ ?>
                        <div class="col-12 col-md-6 col-lg-4">
                            <div class="card">
                                <img class="card-img-top" src="img/<?php echo $row_sp['anh_sp'] ?>" alt="Card image cap">
                                <div class="card-body">
                                    <h4 class="card-title show_txt"><a href="Detail.php?id_sp=<?php echo $row_sp['id_sp']; ?>" title="View Product"><?php echo $row_sp['ten_sp'] ?></a></h4>
                                    <p class="card-text show_txt"><?php echo $row_sp['chi_tiet_sp'] ?>
                                </p>
                                <div class="row">
                                    <div class="col">
                                        <p class="btn btn-danger btn-block"><?php echo number_format($row_sp['gia_sp']) ?> VND</p>
                                    </div>
                                    <div class="col">
                                        <a href="#" class="btn btn-success btn-block">Add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!--ket thuc vong lap-->
            </div>
        </div>

    </div>
</div>

<!-- Footer -->
<footer class="text-light">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-lg-4 col-xl-3">
                <h5>About</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <p class="mb-0">
                    Le Lorem Ipsum est simplement du faux texte employé dans la composition et la mise en page avant impression.
                </p>
            </div>

            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto">
                <h5>Informations</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="">Link 1</a></li>
                    <li><a href="">Link 2</a></li>
                    <li><a href="">Link 3</a></li>
                    <li><a href="">Link 4</a></li>
                </ul>
            </div>

            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto">
                <h5>Others links</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><a href="">Link 1</a></li>
                    <li><a href="">Link 2</a></li>
                    <li><a href="">Link 3</a></li>
                    <li><a href="">Link 4</a></li>
                </ul>
            </div>

            <div class="col-md-4 col-lg-3 col-xl-3">
                <h5>Contact</h5>
                <hr class="bg-white mb-2 mt-0 d-inline-block mx-auto w-25">
                <ul class="list-unstyled">
                    <li><i class="fa fa-home mr-2"></i> My company</li>
                    <li><i class="fa fa-envelope mr-2"></i> email@example.com</li>
                    <li><i class="fa fa-phone mr-2"></i> + 33 12 14 15 16</li>
                    <li><i class="fa fa-print mr-2"></i> + 33 12 14 15 16</li>
                </ul>
            </div>
            <div class="col-12 copyright mt-3">
                <p class="float-left">
                    <a href="#">Back to top</a>
                </p>
                <p class="text-right text-muted">created with <i class="fa fa-heart"></i> by <a href="https://t-php.fr/43-theme-ecommerce-bootstrap-4.html"><i>t-php</i></a> | <span>v. 1.0</span></p>
            </div>
        </div>
    </div>
</footer>
<!--End footer-->
</body>
</html>