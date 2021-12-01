<?php
require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");

require 'functions.php';

  $id_trans= mysql_query("SELECT  id_pesanan FROM pesanan ");
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- File CSS -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="scroll.css">

    <!-- Bootstrap CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f6dcf461c1.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>

    <title></title>
    <style>
.text-center{
  margin-top: 30px;
}

.container-dua{
    max-width: 1500px;
    margin: 50px auto;
    box-sizing: border-box;
    flex-wrap: wrap;
    display: flex;
    justify-content: space-evenly;
    align-items: baseline;
}

.pesanan{
    width: 200px;
    padding: 20px;
    box-sizing: border-box;
    background-color: aquamarine;
    margin-top: 20px;
    margin: 20px;

}
.pesanan-selesai{
  width: 200px;
    padding: 20px;
    box-sizing: border-box;
    background-color: #f7d7da;
    margin-top: 20px;
    margin: 20px;
}

div.meja{
  margin-bottom: 8px;
  border-color: black;
  border-top-style: solid;
}
    </style>
  </head>
  <body>
    <?php include("temp_sidebar.php");?>

      <div class="header">
          <h3 class="text-center display-5">Daftar Pesanan</h3>
      </div>
    <div class="container-dua border border-white border-3">

<?php

// foreach($id_trans as $id_tran):

//   $pesanan = mysql_query("SELECT nama_pesanan, banyak_psn,id_meja FROM pesanan WHERE id_transaksi =  20");

$data = mysqli_query($connect, "SELECT  * FROM riwayat_pembelian WHERE status_pesanan=0  ");
while ($d = mysqli_fetch_array($data)){

?>

      <div class="pesanan-selesai">
          <h4 style="text-align: center" >

          <span class="border-bottom border-white border-3">Pesanan <?= $d['id_transaksi']?></span>
          </h4>
            <!-- <div class="ex1"> -->
         <!-- <p>id Transaksi : <?=$d['id_transaksi'] ?></p> -->
         <?php $id_kita=$d['id_transaksi'] ?>



        <!-- </div>   -->

        <h5>Nama Pesanan :</h5>
      <?php
      $data_pesanan = mysqli_query($connect, "SELECT * from pesanan where id_transaksi = $id_kita AND status_pesanan=0");
      while ($dp = mysqli_fetch_array($data_pesanan)){
          ?>
        <p><?= $dp['nama_pesanan'] ?> (<?= $dp['banyak_psn']?>)</p>

        <?php } ?>

<div class="meja">
  Meja : <?= $d["id_meja"]  ?>
</div>
            <div class="d-grid gap-2">
              <a href="funct_psn_update.php?id_kita=<?= $id_kita?>" class="btn btn-success" onclick="return confirm('Apakah pesanan ini sudah selesai?')"> Selesai</a>
            </div>
        </div>

        <?php
      //  endforeach
            }
       ?>
        </div>

    </div>


        <div class="header">
            <h3 class="text-center">Daftar Pesanan (Selesai)</h3>
        </div>
      <div class="container-dua border border-white border-3">

    <?php

    // foreach($id_trans as $id_tran):

    //   $pesanan = mysql_query("SELECT nama_pesanan, banyak_psn,id_meja FROM pesanan WHERE id_transaksi =  20");

    $data = mysqli_query($connect, "SELECT  * FROM riwayat_pembelian WHERE status_pesanan=1  ");
    while ($d = mysqli_fetch_array($data)){

    ?>

        <div class="pesanan">
            <h4 style="text-align: center" >

            <span class="border-bottom border-white border-3">Pesanan <?= $d['id_transaksi']?></span>
            </h4>
              <!-- <div class="ex1"> -->
           <!-- <p>id Transaksi : <?=$d['id_transaksi'] ?></p> -->
           <?php $id_kita=$d['id_transaksi'] ?>



          <!-- </div>   -->

          <h5>Nama Pesanan :</h5>
        <?php
        $data_pesanan = mysqli_query($connect, "SELECT * from pesanan where id_transaksi = $id_kita AND status_pesanan=0");
        while ($dp = mysqli_fetch_array($data_pesanan)){
            ?>
          <p><?= $dp['nama_pesanan'] ?> (<?= $dp['banyak_psn']?>)</p>

          <?php } ?>
          <div class="meja">
            Meja : <?= $d["id_meja"]  ?>
          </div>
          <div class="d-grid gap-2">
                <a href="funct_psn_kembali.php?id_kita=<?= $id_kita?>" class="btn btn-danger" onclick="return confirm('Kembalikan pesanan ini?')"> Kembalikan</a>
          </div>


          </div>

          <?php

              }
         ?>
          </div>

      </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
