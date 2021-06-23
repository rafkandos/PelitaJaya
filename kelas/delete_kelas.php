<?php
	include_once("../connection.php");
	 
	$id = $_GET['id'];
	 
	$result = mysqli_query($mysqli, "DELETE FROM kelas WHERE id_kelas = $id");
	 
	header("Location:data_kelas.php");
?>