<?php
include 'config/db.php';
    $sql_dm="select * from dmsanpham";
    $query_dm=mysqli_query($connect,$sql_dm); 

    if(isset($_POST['sbm'])){
        $ten_sp = $_POST['ten_sp'];

        $anh_sp = $_FILES['anh_sp']['name'];
        $anh_sp_tmp=$_FILES['anh_sp']['tmp_name'];

        $gia_sp = $_POST['gia_sp'];
        $khuyen_mai = $_POST['khuyen_mai'];
        $chi_tiet_sp = $_POST['chi_tiet_sp'];
        $id_dm = $_POST['id_dm'];

        $sql="insert into sanpham(id_dm ,ten_sp, anh_sp, gia_sp, khuyen_mai, chi_tiet_sp)values('$id_dm','$ten_sp', '$anh_sp', '$gia_sp', '$khuyen_mai', '$chi_tiet_sp')";

        $query=mysqli_query($connect,$sql);
        move_uploaded_file($anh_sp_tmp, 'img/'.$anh_sp);
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
        <h2>Thêm sản phẩm</h2>
    </div>
    <div class="card-body">
        <form enctype="multipart/form-data" method="POST">
            <div class="form-group">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="ten_sp" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Hình ảnh</label>
                <input type="file" name="anh_sp">
            </div>
            <div class="form-group">
                <label for="">Giá</label>
                <input type="number" name="gia_sp" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Khuyến mại</label>
                <select class="form-control" name="khuyen_mai">
                    <option>Có</option>
                    <option>Không</option>
                </select>
            </div>
            <div class="form-group">
                <label for="">Mô tả</label>
                <input type="text" name="chi_tiet_sp" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Danh mục</label>
                <select class="form-control" name="id_dm">
                    <?php
                        while ($row_dm = mysqli_fetch_assoc($query_dm)) {?>
                            <option value="<?php echo $row_dm['id_dm']; ?>">
                                <?php echo $row_dm['ten_dm']; ?></option>
                        <?php }?>
                </select>
            </div>
            <div class="button">
                <a href="ManagerProduct.php"><button type="button" class="btn btn-primary">Trở lại</button></a>
                <button name="sbm" class="btn btn-success" type="submit">Thêm</button>
            </div>
        </form>
    </div>
</div>
</body>
</html>