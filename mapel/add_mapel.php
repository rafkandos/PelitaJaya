<?php
    include_once("../connection.php");
    if(isset($_POST['Submit'])) {
      $nama = $_POST['namaAdd'];
          
      $result = mysqli_query($mysqli, "INSERT INTO mapel(nama_mapel) VALUES('$nama')");

      //die($result);
      
      header("Location:data_mapel.php");
    }
  ?>