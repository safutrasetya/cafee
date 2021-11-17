<?php
  include("includes/koneksi.php"); include("includes/logincheck.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--BOOSTRAP CSS AND CKEDITOR-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--ini vv untuk tombol-tombol bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <!--END BOSTTSTRAP AND CKEDITOR-->
    <!--CSS KITA SENDIRI-->
    <link rel="stylesheet" href="css/cafee.css">
    <link rel="stylesheet" href="css/navbar.css">
    <!--end css kita sendiri-->
    <!--SCRRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--ENDD SCRIPT -->

    <title>Pesanan anda telah dibuat!</title>
  </head>
  <body class="bg-light">
    <?php

    $hargatotal= 0;
    $nomeja = (int)$_SESSION['meja'];
    $date = date('Y-m-d H:i:s');
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
    }else{
      header('Location:halamanmakanan.php');
    }

    //ADD KE TABEL RIWAYAT PESANAN
    $addriwtrnsks = "INSERT INTO riwayat_pembelian (id_meja,total_pembayaran,status_bayar,waktu_pembayaran) VALUES
    ('$nomeja', '$hargatotal', 1, '$date')";
    if($koneksi->query($addriwtrnsks)===TRUE){
      $_SESSION['idpembelian'] = $koneksi->insert_id;
    }else{
    }
    $koneksi->close();
    //END ADD KE TABEL RIWAYAT PESANAN
    //ADD KE TABEL DAFTAR Pesanan

    if(isset($_SESSION['keranjang'])){

      $arridsesi= array_column($_SESSION['keranjang'], 'menu_id');
      foreach($arridsesi as $key=>$value){



      }

    }


    //END ADD KE TABEL DAFTAR PESANAN

    header('Location:halpesananberhasil.php');
    ?>
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#modalMenungguTransakasi').modal('show');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
