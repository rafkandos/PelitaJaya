<?php
    include_once("../connection.php");
    echo($_POST['jurusanUpdate']);
    if(isset($_POST['Submit'])) {
      $id_mapel = $_POST['idMapel'];
      $nama = $_POST['namaUpdate'];
          
      $result = mysqli_query($mysqli, "UPDATE mapel
                                        SET nama_mapel = '$nama'
                                        WHERE id_mapel = '$id_mapel'");
      
      //die($result);
      header("Location:data_mapel.php");
    }
  ?>