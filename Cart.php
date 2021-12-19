<?php
require_once 'code-cart.php';
$cart=(isset($_SESSION['cart'])) ? $_SESSION['cart'] : [];
?>
<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>JSP Page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

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
                    <a class="nav-link" href="#">Manager Product</a>
                </li>
            </ul>
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
<div class="shopping-cart">
    <div class="px-4 px-lg-0">
        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                        <!-- Shopping cart table -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Sản Phẩm</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Đơn Giá</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Số Lượng</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Xóa</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!--vong lap--> 
                                    <?php $tongtien = 0; ?>
                                    <?php foreach ($cart as $key => $value):
                                        $tongtien += $value['gia_sp']*$value['quantity'];
                                        ?>
                                        <tr>
                                            <td scope="row">
                                                <div class="p-2">
                                                    <img src="img/<?php echo $value['anh_sp'] ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                    <div class="ml-3 d-inline-block align-middle">
                                                        <h5 class="mb-0"> <a href="#" class="text-dark d-inline-block"><?php echo $value['ten_sp'] ?></a></h5><span class="text-muted font-weight-normal font-italic"></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle"><?php echo number_format($value['gia_sp']*$value['quantity']) ?> VND</td>
                                            <td class="align-middle">
                                                <form action="Cart.php">
                                                    <!--gọi 2 input để gọi id_sp và action=update -->
                                                    <input type="hidden" name="action" value="update">
                                                    <input type="hidden" name="id_sp" value="<?php echo $value['id_sp'] ?>">
                                                    <input type="number" name="quantity" value="<?php echo $value['quantity'] ?>">
                                                    <button type="btn" class="btn btn-success">Cập nhật</button>
                                                </form>
                                            </td>
                                            <td class="align-middle"><a href="Cart.php?id_sp=<?php echo $value['id_sp'] ?>&action=delete" class="text-dark" onclick="return confirm('Bạn có muốn xóa sản phẩm này?')">
                                                <button type="button" class="btn btn-danger">Delete</button>
                                            </a>
                                        </td>
                                    </tr>
                                <?php endforeach ?> 
                                <!--ket thuc vong lap--> 
                            </tbody>
                        </table>
                    </div>
                    <!-- End -->
                </div>
            </div>
            <!--Lưu vào csdl-->
            <?php 
            if(isset($_POST['sbm'])){
                $hoten = $_POST["hoten"];
                $email = $_POST["email"];
                $sdt = $_POST["sdt"];
                $diachi = $_POST["diachi"];

                $sql = "INSERT INTO orrders(hoten,email,sdt,diachi,tongtien) values('$hoten','$email','$sdt','$diachi','$tongtien')";
                $query = mysqli_query($connect,$sql);

                if($query){
                 //   $id = mysqli_insert_id($connect);
                    foreach ($cart as $value) {
                        mysqli_query($connect,"INSERT INTO orders_detail(hoten,ten_sp,gia_sp,quantity) values('$hoten','$value[ten_sp]','$value[gia_sp]','$value[quantity]')");
                    }
                }
                echo 'cảm ơn bạn đã mua hàng!';
                unset($_SESSION['cart']);
            }
            ?>
            <div class="row py-5 p-4 bg-white rounded shadow-sm">
                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Thông tin khách hàng</div>
                    <form method="post">
                        <div class="p-4">

                            <div class="input-group mb-4 border rounded-pill p-2">
                                <input type="text" name="hoten" placeholder="Họ tên khách hàng" aria-describedby="button-addon3" class="form-control border-0">
                            </div>

                            <div class="input-group mb-4 border rounded-pill p-2">
                                <input type="text" name="email" placeholder="Email" aria-describedby="button-addon3" class="form-control border-0">
                            </div>

                            <div class="input-group mb-4 border rounded-pill p-2">
                                <input type="number"v name="sdt" placeholder="Số điện thoại" aria-describedby="button-addon3" class="form-control border-0">
                            </div>

                            <div class="input-group mb-4 border rounded-pill p-2">
                                <input type="text" name="diachi" placeholder="Địa chỉ" aria-describedby="button-addon3" class="form-control border-0">
                            </div>
                            <div class="input-group mb-4 border rounded-pill p-2">
                                <input type="submit" name="sbm" class="btn btn-dark rounded-pill py-2 btn-block" value="Mua hàng">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-6">
                    <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Thành tiền</div>
                    <div class="p-4">
                        <ul class="list-unstyled mb-4">
                            <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tổng thanh toán</strong>
                                <h5 class="font-weight-bold"><?php echo number_format($tongtien) ?> VND</h5>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>