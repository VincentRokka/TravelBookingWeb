<?php
include 'config/db.php';
error_reporting(0);
$sql_dm = "SELECT * FROM dmsanpham";
$query_dm = mysqli_query($connect,$sql_dm);

$sql_sp = "SELECT * FROM sanpham";
$query_sp = mysqli_query($connect,$sql_sp);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap CRUD Data Table for Database with Modal Form</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link href="css/manager.css" rel="stylesheet" type="text/css"/>
    <style>
        img{
            width: 200px;
            height: 120px;
        }
    </style>
    <body>
        <div class="container">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Quản lý <b>sản phẩm Tour du lịch</b></h2>
                        </div>
                        <div class="col-sm-6">
                            <a href="ThemSP.php" class="btn btn-success"><i class="material-icons">&#xE147;</i> <span>Thêm 1 sản phẩm</span></a>
                            <a onclick="return confirm('Bạn có muốn xóa toàn bộ sản phẩm này?')" href="XoaAllSP.php" class="btn btn-danger"><i class="material-icons">&#xE15C;</i> <span>Xóa tất cả sản phẩm</span></a>                        
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>
                                <span class="custom-checkbox">
                                    <input type="checkbox" id="selectAll">
                                    <label for="selectAll"></label>
                                </span>
                            </th>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Ảnh sản phẩm</th>
                            <th>Giá</th>
                            <th>Khuyến mại</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--vòng lặp-->
                        <?php while($row_sp=mysqli_fetch_assoc($query_sp)){ ?>
                            <tr>
                                <td>
                                    <span class="custom-checkbox">
                                        <input type="checkbox" id="checkbox1" name="options[]" value="1">
                                        <label for="checkbox1"></label>
                                    </span>
                                </td>
                                <td><?php echo $row_sp['id_sp'] ?></td>
                                <td><?php echo $row_sp['ten_sp'] ?></td>
                                <td>
                                    <img src="img/<?php echo $row_sp['anh_sp'] ?>">
                                </td>
                                <td><?php echo number_format($row_sp['gia_sp']) ?> VND</td>
                                <td>
                                    <?php echo $row_sp['khuyen_mai'] ?>
                                </td>
                                <td>
                                    <a href="SuaSP.php?id=<?php echo $row_sp['id_sp'] ?>" class="edit"><i class="material-icons" data-toggle="tooltip" title="Edit">&#xE254;</i></a>
                                    <a href="XoaSP.php?id=<?php echo $row_sp['id_sp'] ?>" class="delete" onclick="return confirm('Bạn có muốn xóa sản phẩm này?')"><i class="material-icons" data-toggle="tooltip" title="Delete">&#xE872;</i></a>
                                </td>
                            </tr>
                        <?php } ?>
                        <!-- kết thúc vòng lặp-->
                    </tbody>
                </table>
                <a href="Home.php"><button type="button" class="btn btn-primary">Trở lại</button>

                </div>
        </a>
        <script src="js/manager.js" type="text/javascript"></script>
    </body>
    </html>