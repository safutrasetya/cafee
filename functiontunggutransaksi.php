<?php
  require_once("includes/koneksi.php"); require_once("includes/logincheck.php");
  //UPDATE DULU
    //SELESAI UPDATE
  $hargatotal= 0;
  $nomeja = (int)$_SESSION['meja'];
  $date = date('Y-m-d');
  $timeadded = date('h:i:sa');
  $_SESSION['totalharga']=$hargatotal;
  if(isset($_SESSION['keranjang'])){
    //hitung total harga
    $arrquantitas = array_column($_SESSION['keranjang'], 'menu_id');

    $query2 = "SELECT * FROM menu";
    $qresult2 = mysqli_query($koneksi, $query2);
    $idloop=0;
    while($row2 = mysqli_fetch_array($qresult2)){
      foreach($arrquantitas as $arrquantitas2){

        if($row2['id_menu']== $arrquantitas2){

          $kuantitas = $_SESSION['keranjang'][$idloop]['menu_quantity'];
          $hargatotal = $hargatotal + ((int)$row2['harga'] * (int)$kuantitas);
          $idloop++;
        }
      }

    }
    //end hitung total harga
    if(!$query2){
        die("Query gagal" .mysqli_error($koneksi));
    }
    $arridsesi = array_column($_SESSION['keranjang'], 'menu_id');
    $_SESSION['totalharga']=$hargatotal;

    //ADD KE TABEL RIWAYAT PESANAN

    $addriwtrnsks = "INSERT INTO riwayat_pembelian (id_meja,total_pembayaran,status_bayar,tanggal_pembayaran,waktu_pembayaran) VALUES
    ('$nomeja', '$hargatotal', 0, '$date', '$timeadded')";
    if($koneksi->query($addriwtrnsks)===TRUE){
      $_SESSION['idpembelian'] = $koneksi->insert_id;

      ///ADD KE TABEL PESANAN

      foreach($arridsesi as $key=>$value){
        $searchid = "SELECT * FROM menu where id_menu = '{$value}'";
        $hasil = mysqli_query($koneksi, $searchid);
        foreach($hasil as $data){
          $id_meja = $_SESSION['meja'];
          $id_transaksi = $_SESSION['idpembelian'];
          $namamenu = $data['nama_menu'];
          $menuq = (int)$_SESSION['keranjang'][$key]['menu_quantity'];
          $hrg = $data['harga'] * $menuq;

          $insertpesan = "INSERT INTO pesanan (id_meja,id_transaksi,nama_pesanan,harga_pesanan,waktu_pesanan,banyak_psn)
          VALUES ('$id_meja', '$id_transaksi', '$namamenu',  '$hrg', '$timeadded', '$menuq')";
          if($koneksi->query($insertpesan)===TRUE){

          }else{
            header('Location:halerror.php');
          }
        }
      }
    }else{
    }
    $koneksi->close();
  }else{
    header('Location:halamanmakanan.php');
  }
  header('Location:halpesananberhasil.php');
?>
