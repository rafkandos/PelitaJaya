<?php
	include_once("../connection.php");
	 
	$id = $_GET['id'];
	 
	$result = mysqli_query($mysqli, "DELETE FROM guru WHERE id_guru = $id");
	 
	header("Location:data_guru.php");
?>