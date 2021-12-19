<?php
include 'config/db.php';
	$id = $_GET['id'];
	$sql = "delete from sanpham where id_sp='$id'";
	$query = mysqli_query($connect,$sql);
	header('location: ManagerProduct.php');
 ?>