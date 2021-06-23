<?php
	include_once("../connection.php");
	 
	$id = $_GET['id'];
	 
	$result = mysqli_query($mysqli, "DELETE FROM mapel WHERE id_mapel = $id");
	 
	header("Location:data_mapel.php");
?>