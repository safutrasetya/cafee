<?php
require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");require_once("includes/akunmenumejacheckboxes.php");

   // menghubungkan dengan function
   include "functiontambahmeja.php";

  // mengecek apakah tombol submit ditekan
   if (isset($_POST["submit"])) {

  // Cek apakah data berhasil ditambahkan atau tidak
  if(tambahmeja($_POST) > 0){
     echo " <script>
             alert('Meja berhasil ditambahkan!');
             document.location.href='daftarmeja.php';
            </script>";
  }else{
      echo " <script>
              alert('Meja gagal ditambahkan');
              document.location.href='daftarmeja.php';
            </script> ";
       }
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <title>Tambah Meja</title>
  </head>
  <body>
    <?php include("temp_sidebar.php");?>
      <div class="jumbotron p-3 h-100" style="height: 750px;">
    <div class="jumbotron bg-light shadow-lg mx-auto p-5">
      <div class="mx-auto text-center mb-5" style="margin-top:-25px;">
        <h2 class="text-dark">Tambah Meja</h2>
      </div>
      <div class="my-4 ps-3 pb-3 shadow">
        <div class="row">
            <div class="col-sm-3">
              <form action="" method="post">
                <div class="mb-3 mt-3 me-3">
                  <label for="ketersediaanmenu" class="form-label">Status : </label>
                  <br>
                  <input type="radio" id="kosong" name="reservasi" value="0">
                  <label for="kosong" class="form-label">Kosong </label>
                  <br>
                  <input type="radio" id="penuh" name="reservasi" value="1">
                  <label for="penuh" class="form-label">Penuh </label>
                  <br>
                  <input type="radio" id="dibooking" name="reservasi" value="2">
                  <label for="dibooking" class="form-label">Telah dibooking </label>
                </div>
              </div>
              <div class="col-sm-9">
                <div class="mb-3 mt-3 me-3">
                  <label for="no_meja" class="form-label">Meja</label>
                  <input type="text" class="form-control" name="no_meja" pattern="[0-9]{1,}" title="Nama Meja hanya diisi dengan angka"
                  id="no_meja" required>
                </div>
                <div class="mb-3 mt-3 me-3">
                  <label for="pass_meja" class="form-label">Password</label>
                  <input type="password" class="form-control" name="pass_meja" pattern="[a-zA-Z0-9]{5,}"
                  title="Password minimal 5 digit diisi dengan huruf atau angka"
                  id="pass_meja" required>
                </div>
                <div class="text-end me-3">
                  <a href="daftarmeja.php"><button type="button" class="btn btn-danger">Cancel</button></a>
                  <button type="submit" name="submit"class="btn btn-success">Tambah!</button>
                </div>
              <form>
            </div>
              </div>
           </div>
                <!-- div penutup -->
        </div>
     </div>
  </body>
</html>
