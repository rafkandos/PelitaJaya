<?php
    include_once("../connection.php");
    echo('halloooo');
    if(isset($_POST['Submit'])) {
      $id_siswa = $_POST['idSiswa'];
      $nama = $_POST['namaUpdate'];
      $tempat = $_POST['tempatUpdate'];
      $lahir = $_POST['dateUpdate'];
      $jkel = $_POST['jkelUpdate'];
      $agama = $_POST['agamaUpdate'];
      $kelas = $_POST['kelasUpdate'];
          
      $result = mysqli_query($mysqli, " UPDATE siswa
                                        SET nama_siswa = '$nama', tempat_lahir = '$tempat', jkel = '$jkel', tgl_lahir = '$lahir', agama = '$agama', id_kelas = '$kelas'
                                        WHERE id_siswa = '$id_siswa'");
      
      // die($result);
      
      header("Location:data_siswa.php");
    }
  ?>