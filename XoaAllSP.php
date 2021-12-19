<?php
include 'config/db.php';
	$sql = "delete from sanpham";
	$query = mysqli_query($connect,$sql);
	header('location: ManagerProduct.php');
 ?>