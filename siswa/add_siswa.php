<?php
    include_once("../connection.php");
    if(isset($_POST['Submit'])) {
      $nama = $_POST['namaAdd'];
      $tempat = $_POST['tempatAdd'];
      $lahir = $_POST['dateAdd'];
      $jkel = $_POST['jkelAdd'];
      $agama = $_POST['agamaAdd'];
      $kelas = $_POST['kelasAdd'];
          
      $result = mysqli_query($mysqli, "INSERT INTO siswa(nama_siswa, tempat_lahir, tgl_lahir, jkel, agama, id_kelas) VALUES('$nama', '$tempat', '$lahir', '$jkel', '$agama', '$kelas')");

      //die($result);
      
      header("Location:data_siswa.php");
    }
  ?>