<?php
include 'config/db.php';
	$id = $_GET['id'];
	$sql = "delete from orrders where id_kh='$id'";
	$query = mysqli_query($connect,$sql);
	header('location: Home.php');
 ?>