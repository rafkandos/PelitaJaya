<?php
    include_once("../connection.php");
    if(isset($_POST['Submit'])) {
      $tingkat = $_POST['tingkatAdd'];
      $jurusan = $_POST['jurusanAdd'];
          
      $result = mysqli_query($mysqli, "INSERT INTO kelas(tingkat, jurusan) VALUES('$tingkat', '$jurusan')");

      //die($result);
      
      header("Location:data_kelas.php");
    }
  ?>