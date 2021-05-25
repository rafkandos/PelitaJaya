<?php
	include_once("../connection.php");
	 
	$id = $_GET['id'];
	 
	$result = mysqli_query($mysqli, "DELETE FROM siswa WHERE id_siswa = $id");
	 
	header("Location:data_siswa.php");
?>