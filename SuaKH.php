<?php
require_once 'config/db.php';
error_reporting(0);
$id = $_GET['id'];

$sql_up = "SELECT * FROM orrders WHERE id_kh = '$id'";
$query_up = mysqli_query($connect, $sql_up);
$row_up = mysqli_fetch_assoc($query_up);

if(isset($_POST['sbm'])){
    $hoten = $_POST['hoten'];

    $email = $_POST['email'];
    $sdt = $_POST['sdt'];
    $diachi = $_POST['diachi'];
    $tongtien = $_POST['tongtien'];
    $sql = "UPDATE orrders SET hoten = '$hoten', email = '$email', sdt = '$sdt', diachi = '$diachi', tongtien = '$tongtien' WHERE id_kh = '$id'";
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
                        <label for="">Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $row_up['email'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Số điện thoại</label>
                        <input type="number" name="sdt" class="form-control" value="<?php echo $row_up['sdt'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Địa chỉ</label>
                        <input type="text" name="diachi" class="form-control" value="<?php echo $row_up['diachi'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Tổng tiền</label>
                        <input type="number" name="tongtien" class="form-control" value="<?php echo $row_up['tongtien'] ?>">
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
