<?php
    include_once("../connection.php");
    echo($_POST['jurusanUpdate']);
    if(isset($_POST['Submit'])) {
      $id_kelas = $_POST['idKelas'];
      $tingkat = $_POST['tingkatUpdate'];
      $jurusan = $_POST['jurusanUpdate'];
          
      $result = mysqli_query($mysqli, "UPDATE kelas
                                        SET tingkat = '$tingkat', jurusan = '$jurusan'
                                        WHERE id_kelas = '$id_kelas'");
      
      //die($result);
      header("Location:data_kelas.php");
    }
  ?>