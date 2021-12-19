<?php
require_once 'config/db.php';

$sql_dm = "SELECT * FROM dmsanpham";
$query_dm = mysqli_query($connect,$sql_dm);

$sql_spnb = "SELECT * FROM sanpham limit 1";
$query_spnb = mysqli_query($connect,$sql_spnb);

if(isset($_GET['id_sp'])){
    $id_sp=$_GET['id_sp'];
}else{
    $id_sp='';
}
$sql_chitietSP = "SELECT * FROM sanpham where id_sp='$id_sp'";
$query_chitietSP = mysqli_query($connect,$sql_chitietSP);
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>JSP Page</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="css/style.css" rel="stylesheet" type="text/css"/>
    <style>
        .gallery-wrap .img-big-wrap img {
            height: 450px;
            width: auto;
            display: inline-block;
            cursor: zoom-in;
        }


        .gallery-wrap .img-small-wrap .item-gallery {
            width: 60px;
            height: 60px;
            border: 1px solid #ddd;
            margin: 7px 2px;
            display: inline-block;
            overflow: hidden;
        }

        .gallery-wrap .img-small-wrap {
            text-align: center;
        }
        .gallery-wrap .img-small-wrap img {
            max-width: 100%;
            max-height: 100%;
            object-fit: cover;
            border-radius: 4px;
            cursor: zoom-in;
        }
        .img-big-wrap img{
            width: 100% !important;
            height: auto !important;
        }
    </style>
</head>
<body>
    <!--begin of menu-->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark">
        <div class="container">
            <a class="navbar-brand" href="Home.php">Trang chủ</a>
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
                    <?php
                    while($row_dm = mysqli_fetch_assoc($query_dm)) {?>
                        <li class="list-group-item text-white"><a href="Home_dm.php?id_dm=<?php echo $row_dm['id_dm'] ?>"><?php echo $row_dm['ten_dm'] ?></a></li>
                    <?php } ?>
                    <li class="list-group-item text-white"><a href="Home_km.php ?>">Khuyến mại</a></li>
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
                            <a href="Cart.php?id_sp=<?php echo $row_sp['id_sp']; ?>" class="btn btn-success btn-block">Đặt hàng</a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <!--End left-->
        <div class="col-sm-9">
            <div class="container">
                <div class="card">
                    <div class="row">
                        <?php while($row_chitietSP = mysqli_fetch_assoc($query_chitietSP)) { ?>
                            <aside class="col-sm-5 border-right">
                                <article class="gallery-wrap"> 
                                    <div class="img-big-wrap">
                                        <div> <a href="#"><img src="img/<?php echo $row_chitietSP['anh_sp'] ?>"></a></div>
                                    </div> <!-- slider-product.// -->
                                    <div class="img-small-wrap">
                                    </div> <!-- slider-nav.// -->
                                </article> <!-- gallery-wrap .end// -->
                            </aside>
                            <aside class="col-sm-7">
                                <article class="card-body p-5">
                                    <h3 class="title mb-3"><?php echo $row_chitietSP['ten_sp'] ?></h3>

                                    <p class="price-detail-wrap"> 
                                        <span class="price h3 text-warning"> 
                                            <span class="currency">Giá </span><span class="num"><?php echo number_format($row_chitietSP['gia_sp']) ?> VND</span>
                                        </span> 
                                    </p> <!-- price-detail-wrap .// -->
                                    <dl class="item-property">
                                        <dt>Mô tả</dt>
                                        <dd><p><?php echo $row_chitietSP['chi_tiet_sp'] ?></p></dd>
                                    </dl>

                                    <hr>
                                </div> <!-- row.// -->
                                <hr>
                                <a href="Cart.php?id_sp=<?php echo $row_chitietSP['id_sp']; ?>" class="btn btn-lg btn-success btn-block text-uppercase"> Đặt hàng </a>
                            </article> <!-- card-body.// -->
                        </aside> <!-- col.// -->
                    </div> <!-- row.// -->
                </div> <!-- card.// -->
            <?php } ?>

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
