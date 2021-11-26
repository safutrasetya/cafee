<?php
  require_once("includes/koneksi.php");

  if(!isset($_GET['code'])){
    exit("Halaman tidak ditemukan.");
  }
  $code = $_GET['code'];

  $cekemail = "SELECT * FROM resetpassword WHERE codeunique = '{$code}'";
  $getemail = mysqli_query($koneksi, $cekemail);
  $count = mysqli_num_rows($getemail);
  if($count==0){
    exit("Token reset atau email tidak valid.");
  }

  if(isset($_POST['passbaru'])){
    $pw = $_POST['passbaru'];
    //$pw = md5($pw); PAKAI KALO MAU DI HASH ENTAR
    $row = mysqli_fetch_array($getemail);
    $email = $row['email'];

    $command = mysqli_query($koneksi,"UPDATE akun SET password='$pw' WHERE email='$email'");
    if($command){
      $delcode = mysqli_query($koneksi,"DELETE FROM resetpassword WHERE code='$code'");
      echo "<div id='divAlert' name='divAlert' class='alert alert-success m-2' role='alert'>Password telah direset! Login <a href='login.php'>DISINI</a></div>";
      echo "<script> window.setTimeout(function(){

                  // Move to a new location or you can do something else
                  window.location.href = 'login.php';

              }, 7000);</script>";
    }else{
      echo "<div id='divAlert' name='divAlert' class='alert alert-danger m-2' role='alert'>Terjadi kesalahan...</div>";
    }
  }
?>
