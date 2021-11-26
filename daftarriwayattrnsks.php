<?php include("includes/koneksi.php"); include("includes/logincheck.php");include("includes/admincheck.php");?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- File CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/scroll.css">

    <!-- Bootstrap CSS -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
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
    </style>
  </head>
  <body>
    <?php include("temp_sidebar.php");?>
    <div class="jumbotron h-100" style="height: 750px;">
      <div class="row">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-11">
          <div class="mx-auto my-3" style="">
            <h2 class="text-dark text-center display-5">Riwayat Transaksi</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-11">
          <div class="jumbotron shadow p-3">
            <div class="">
              <a href="caritransaksi.php"><button type="button" class="btn btn-outline-primary float-end my-2"><i class="bi bi-search"></i> Cari</button></a>
              <?php include('functionupdttrnsks.php'); ?>
              <!-- ^^fungsi untuk update transaksi -->
              <?php include('functionhapustrnsks.php'); ?>
              <!-- ^^fungsi untuk hapus transaksi -->
              <?php include('functiondaftartrnsks.php'); ?>
              <!-- ^^ fungsi tampilkan daftar transaksi-->
            </div>
          </div>
        </div>
      </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
