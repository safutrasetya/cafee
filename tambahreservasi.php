<?php   require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--BOOSTRAP CSS AND CKEDITOR-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <!--END BOSTTSTRAP AND CKEDITOR-->
    <!--CSS KITA SENDIRI-->
    <link rel="stylesheet" href="css/cafee.css">
    <!--end css kita sendiri-->
    <title>Tambah Menu</title>
    <script type="text/javascript">

    </script>
  </head>
  <body class="bg-light">
    <?php include("temp_sidebar.php");?>
    <div class="jumbotron p-3 h-100" style="height: 750px;">
      <div class="jumbotron bg-light shadow-lg mx-auto p-5">
        <div class="mx-auto text-center mb-5" style="margin-top:-25px;">
          <h2 class="text-dark">Tambah Reservasi</h2>
        </div>
        <div class="my-4 ps-3 pb-3 shadow">
          <?php include('functiontambahrsrvs.php'); ?>
          <form action="" method="post" enctype="multipart/form-data">
            <div class="row">
              <div class="col-sm-12">
                <div class="mb-3 mt-3 me-3">
                  <label for="nama" class="form-label">Nama</label>
                  <input type="text" class="form-control" name="nama" id="nama" pattern="[a-zA-Z\s]{2,}" title="Nama hanya boleh terdiri oleh huruf saja"
                  placeholder="Masukkan Nama" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-3">
                <div class="mb-3 mt-3 me-3">
                  <label for="notelp" class="form-label">No.Hp</label>
                  <input type="text" class="form-control" name="notelp" id="notelp" pattern="[0-9]{8,}" title="Nomor Hp/Telpon tidak valid"
                  placeholder="cth. 081234567899" required>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="mb-3 mt-3 me-3">
                  <label for="nomeja" class="form-label">Meja</label>
                  <select class="form-select" name="nomeja" id="nomeja" aria-label="" required title="Pilih meja">
                    <option label=" "></optio>
                    <?php include('functionMJrsrvs.php');?>
                  </select>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="mb-3 mt-3 me-3">
                  <label for="date" class="form-label">Tanggal</label>
                  <input type="date" name="date" id="date" class="form-control" required title="Pilih tanggal reservasi">
                </div>
              </div>
              <div class="col-sm-3">
                <div class="mb-3 mt-3 me-3">
                  <label for="time" class="form-label">Waktu</label>
                  <input type="time" id="time" name="time" class="form-control" required title="Pilih waktu reservasi">
                </div>
              </div>
              <div class="text-end">
                <a href="daftarreservasi.php" onclick="return confirm('Anda yakin ingin keluar?')"><button type="button" class="btn btn-danger">Cancel</button></a>
                <button type="submit" name="btnRsrvs" value="submit" class="btn me-3 btn-success">Tambah!</button>
              </div>

            </div>

          </div>
        </form>
      </div>
    </div>
    <!-- SCRIPT modal -->
  </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- SCRIPT MODAL END -->

</html>
