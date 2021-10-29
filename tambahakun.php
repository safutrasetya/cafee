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
  </head>
  <body class="bg-light">
    <div class="jumbotron p-3 h-100" style="height: 750px;">
      <div class="jumbotron bg-light shadow-lg mx-auto p-5">
        <div class="mx-auto text-center mb-5" style="margin-top:-25px;">
          <h2 class="text-dark">Tambah Akun</h2>
        </div>
        <div class="my-4 ps-3 pb-3 shadow">
          <div class="row">

              <div class="col-sm-3">
                <form>
                  <div class="mb-3 mt-3 me-3">
                    <label for="gambarmenu" class="form-label">Foto Profil</label>
                    <input type="file" class="form-control" name="gambarmenu">
                  </div>
                  <div class="mb-3 mt-5 me-3">
                    <label for="ketersediaanmenu" class="form-label">Level</label>
                    <input type="radio" id="admin" name="level" value="1">
                    <label for="admin" class="form-label">Admin</label>
                    <input type="radio" id="staff" name="level">
                    <label for="staff" class="form-label" value="0">Staff</label>
                  </div>
                </div>
                <div class="col-sm-9">
                  <div class="mb-3 mt-3 me-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan Nama">
                  </div>
                  <div class="mb-3 mt-3 me-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" placeholder="cth. contoh@test.om">
                  </div>
                  <div class="mb-3 mt-3 me-3">
                    <label for="nohp" class="form-label">No.Hp</label>
                    <input type="text" class="form-control" name="nohp" placeholder="cth. 081234567899">
                  </div>
                  <div class="mb-3 mt-3 me-3">
                    <label for="pass" class="form-label">Password</label>
                    <input type="pass" class="form-control" name="pass" placeholder="Masukkan password">
                  </div>
                  <div class="text-end me-3">
                    <a href="daftarmenu.php"><button type="button" class="btn btn-danger">Cancel</button></a>
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
