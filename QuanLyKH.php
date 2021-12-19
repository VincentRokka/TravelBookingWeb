<?php
require_once 'config/db.php';
$sql = "SELECT * FROM orrders";
$query = mysqli_query($connect,$sql);

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>JSP Page</title>
	<link type="text/css" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="card">
			<div class="card-header">
				<h2>Quản lý khách hàng</h2>
			</div>
			<div class="card-body">
				<table class="table">
					<thead class="dark-thead">
						<tr>
							<th>Họ tên</th>
							<th>email</th>
							<th>Số điện thoại</th>
							<th>Địa chỉ</th>
							<th>Tổng tiền</th>
							<th>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php while($row_od = mysqli_fetch_assoc($query)){ ?>
							<tr>
								<th><?php echo $row_od['hoten'] ?></th>
								<th><?php echo $row_od['email'] ?></th>
								<th><?php echo $row_od['sdt'] ?></th>
								<th><?php echo $row_od['diachi'] ?></th>
								<th><?php echo $row_od['tongtien'] ?></th>
								<th>
									<a href="SuaKH.php?id=<?php echo $row_od['id_kh'] ?>"><button class="btn btn-primary" type="submit" name="sbm">Sửa</button></a>
									<a href="XoaKH.php?id=<?php echo $row_od['id_kh'] ?>"><button class="btn btn-danger" type="submit" name="sbm">Xóa</button></a>
								</th>
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>