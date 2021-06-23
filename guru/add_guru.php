<?php
    include_once("../connection.php");
    if(isset($_POST['Submit'])) {
      $nama = $_POST['namaAdd'];
      $tempat = $_POST['tempatAdd'];
      $lahir = $_POST['dateAdd'];
      $jkel = $_POST['jkelAdd'];
      $agama = $_POST['agamaAdd'];
      $mapel = $_POST['mapelAdd'];
          
      $result = mysqli_query($mysqli, "INSERT INTO guru(nama_guru, tempat_lahir, tgl_lahir, jkel, agama, id_mapel) VALUES('$nama', '$tempat', '$lahir', '$jkel', '$agama', '$mapel')");

      //die($result);
      
      header("Location:data_guru.php");
    }
  ?>