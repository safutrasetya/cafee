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
    <script type="text/javascript"></script>
  </head>
  <body class="bg-light">
    <div class="jumbotron p-3 h-100" style="height: 750px;">
      <div class="jumbotron bg-light shadow-lg mx-auto p-5">
        <div class="mx-auto text-center mb-5" style="margin-top:-25px;">
          <h2 class="text-dark">Tambah Menu</h2>
        </div>
        <div class="my-4 ps-3 pb-3 shadow">
          <div class="row">
              <div class="col-sm-3">
                <form action="functiontambahmenu.php" method="post">
                  <div class="mb-3 mt-3 me-3">
                    <label for="gambarmenu" class="form-label">Gambar Menu</label>
                    <input type="file" class="form-control" name="gambar" id="gambar" required>
                  </div>
                  <div class="mb-3 mt-5 me-3">
                    <label for="ketersediaanmenu" class="form-label">Ketersediaan</label>
                    <input type="radio" id="ada" name="ketersidiaan" value="1">
                    <label for="ada" class="form-label">Ada</label>
                    <input type="radio" id="habis" name="ketersidiaan">
                    <label for="habis" class="form-label" value="0">Habis</label>
                  </div>
                </div>
                <div class="col-sm-9">
                  <div class="mb-3 mt-3 me-3">
                    <label for="namamenu" class="form-label">Nama Menu</label>
                    <input type="text" class="form-control" name="nama_menu"  placeholder="cth. Nasi gorenng spesial" required>
                  </div>
                  <div class="row">
                    <div class="col-sm-6">
                      <div class="mb-3 me-3">
                        <label for="infomenu" class="form-label">Info Menu</label>
                        <input type="text" class="form-control" name="info_menu" id="info_menu" placeholder="Nasi, Ayam Penyet" required>
                      </div>
                    </div>
                    <div class="col-sm-6">
                      <div class="mb-3 me-3">
                        <label for="hargamenu" class="form-label">Harga</label>
                        <input type="text" class="form-control" name="harga" id="harga" placeholder="cth. 20000" required>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3 mt-5 me-3">
                    <label for="Tipmenu" class="form-label">Tipe Menu : </label>
                    <input type="radio" id="makanan" name="kategori" value="1">
                    <label for="menu" class="form-label">Makanan</label>
                    <input type="radio" id="minuman" name="kategori">
                    <label for="minuman" class="form-label" value="2">Minuman</label>
                    <input type="radio" id="cemilan" name="kategori">
                    <label for="cemilan" class="form-label" value="3">Cemilan</label>
                    <input type="radio" id="paket" name="kategori">
                    <label for="paket" class="form-label" value="4">Paket</label>
                  </div>
                  <div class="text-end me-3">
                    <a href="daftarmenu.php" onclick="return confirm('Anda yakin ingin keluar?')"><button type="button" class="btn btn-danger">Cancel</button></a>
                    <button type="submit" class="btn btn-success">Tambah!</button>
                  </div>
                <form>
              </div>

          </div>
        </div>
      </div>
    </div>
    <!-- SCRIPT modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- SCRIPT MODAL END -->
    <!-- WYSIWYG untuk editor sinopsis -->

  </body>
</html>
