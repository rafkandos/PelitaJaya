<?php
	session_start();

    include 'connection.php';
    if(isset($_POST['Submit'])) {
      	$username = $_POST['username'];
	  	$password = $_POST['password'];
          
      $result = mysqli_query($mysqli,"SELECT * FROM user where username='$username' and password='$password'");
      $cek = mysqli_num_rows($result);
      var_dump($cek);

      if($cek > 0) {
		$data = mysqli_fetch_assoc($result);
		//menyimpan session user, nama, status dan id login
		$_SESSION['username'] = $username;
		$_SESSION['status'] = "sudah_login";
		header("location:index.php");
	} else {
		header("location:login.php?pesan=gagal login user tidak ditemukan.");
	}
    }
  ?>