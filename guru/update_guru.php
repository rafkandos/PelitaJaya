<?php
    include_once("../connection.php");
    echo('halloooo');
    if(isset($_POST['Submit'])) {
      $id_guru = $_POST['idGuru'];
      $nama = $_POST['namaUpdate'];
      $tempat = $_POST['tempatUpdate'];
      $lahir = $_POST['dateUpdate'];
      $jkel = $_POST['jkelUpdate'];
      $agama = $_POST['agamaUpdate'];
      $mapel = $_POST['mapelUpdate'];
          
      $result = mysqli_query($mysqli, " UPDATE guru
                                        SET nama_guru = '$nama', tempat_lahir = '$tempat', jkel = '$jkel', tgl_lahir = '$lahir', agama = '$agama', id_mapel = '$mapel'
                                        WHERE id_guru = '$id_guru'");
      
      // die($result);
      
      header("Location:data_guru.php");
    }
  ?>