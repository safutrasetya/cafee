<?php
  require_once("includes/koneksi.php"); require_once("includes/logincheck.php");
  if(isset($_SESSION['idpembelian'])){

    $idpembelian = $_SESSION['idpembelian'];
    $cekcommand="SELECT * FROM riwayat_pembelian WHERE  id_transaksi = '$idpembelian'";
    $cekdb = mysqli_query($koneksi, $cekcommand);
    if(mysqli_num_rows($cekdb)==1){
      foreach($cekdb as $data){
        if($data['status_bayar']==1){
          echo "<div id='divAlert' name='divAlert' class='alert alert-success m-2' role='alert'>Pembayaran telah dikonfirmasi!<br>Pesanan anda sedang dimasak...</div>";
          echo "<script> window.setTimeout(function(){

        // Move to a new location or you can do something else
        window.location.href = 'halamanmakanan.php';

    }, 5000);</script>";

        }else{

        }

      }

    }else{
      echo "TERDAPAT 2 TRANSAKSI DENGAN ID YANG SAMA";
    }

  }else{
    echo "ID ORDER TIDAK DITEMUKAN/BELUM DI SET";
  }




?>
