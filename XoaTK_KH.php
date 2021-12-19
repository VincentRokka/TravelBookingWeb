<?php
include 'config/db.php';
	$id = $_GET['id'];
	$sql = "delete from orders_detail where id_tkkh='$id'";
	$query = mysqli_query($connect,$sql);
	header('location: Home.php');
 ?>