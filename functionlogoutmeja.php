<?php

  include('includes/koneksi.php');

if(isset($_POST['btnLogoutM'])&&isset($_POST['passlogout'])){
  $qlog = "SELECT * FROM meja WHERE id_meja= '{$_SESSION['meja']}'";
  $hasil = mysqli_query($koneksi, $qlog);
  while($data=mysqli_fetch_array($hasil)){
    if($data['pass_meja']==$_POST['passlogout']){
      if (isset($_SESSION['keranjang'])){
        unset($_SESSION['keranjang']);
        $updtstatmeja = "UPDATE meja SET reservasi = 0 WHERE id_meja='{$_SESSION['meja']}'";
        if($koneksi->query($updtstatmeja) === TRUE){
          $akibat = $_SESSION['meja'];
          $nama2 = $_SESSION['meja'];
          $startdate = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
          $start_date = $startdate->format('Y-m-d H:i:s');
          $history = "INSERT INTO history (pelaku,aksi,akibat,waktu) VALUES ('$nama2','Logout Meja','$akibat','$start_date')";
          mysqli_query($koneksi, $history);
        }else{
          echo "Error: ".$updtstatmeja."<br>".$koneksi->error;
        }
      }
      if(session_destroy()){
          header("Location:loginmeja.php");
      }
    }else{
      echo "<div id='divAlert' name='divAlert' class='alert alert-warning m-2' role='alert'>Password meja salah</div>";
    }
  }
}


?>
