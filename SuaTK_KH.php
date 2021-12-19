<?php
require_once 'config/db.php';
error_reporting(0);
$id = $_GET['id'];

$sql_up = "SELECT * FROM orders_detail WHERE id_tkkh = '$id'";
$query_up = mysqli_query($connect, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);

if(isset($_POST['sbm'])){
    $hoten = $_POST['hoten'];

    $ten_sp = $_POST['ten_sp'];
    $gia_sp = $_POST['gia_sp'];
    $soluong = $_POST['quantity'];
    $sql = "UPDATE orders_detail SET hoten = '$hoten', ten_sp = '$ten_sp', gia_sp = '$gia_sp', quantity = '$soluong' WHERE id_tkkh = '$id'";
    $query = mysqli_query($connect, $sql);
}
?>

<style type="text/css">
        div.button{
            text-align: center;
        }
    </style>
    <!DOCTYPE html>
    <html>
    <head>
        <title></title>
        <link type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    </head>
    <body>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header"></div>
                <h2>Sửa Khách hàng</h2>
            </div>
            <div class="card-body">
                <form enctype="multipart/form-data" method="POST">
                    <div class="form-group">
                        <label for="">họ tên</label>
                        <input type="text" name="hoten" class="form-control" value="<?php echo $row_up['hoten'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Tên sản phẩm</label>
                        <input type="text" name="ten_sp" class="form-control" value="<?php echo $row_up['ten_sp'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Giá sản phẩm</label>
                        <input type="number" name="gia_sp" class="form-control" value="<?php echo $row_up['gia_sp'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Số lượng</label>
                        <input type="text" name="quantity" class="form-control" value="<?php echo $row_up['quantity'] ?>">
                    </div>

                    <div class="button">
                        <a href="Home.php"><button type="button" class="btn btn-primary">Trở lại</button></a>
                        <button name="sbm" class="btn btn-success" type="submit" name="sbm">Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </body>
    </html>
