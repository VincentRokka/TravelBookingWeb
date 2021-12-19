<?php
	$connect = mysqli_connect('localhost','root','','tourdulich'); 
	if($connect){
		mysqli_query($connect,"SET NAMES 'UTF8'");
	}
?>