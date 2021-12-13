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
    <title>Edit Menu</title>
  </head>
  <body class="bg-light">1
    <?php include("includes/koneksi.php"); include("includes/logincheck.php"); ?>>
    <?php include("temp_sidebar.php");?>
    <?php
    $id_menu = $_GET['id'];
    $sql = mysqli_query($koneksi,"SELECT * FROM menu WHERE id_menu='$id_menu'");
    $data = mysqli_fetch_assoc($sql);
    ?>
    <div class="container-fluid">
      <div class="container text-center header ">
        <h1>Edit Menu</h1>
      </div>
      <div class="container shadow p-3 mb-5 bg-body rounded isi">
        <?php include('functioneditmenuduplicate.php');?>
        <form method="POST" action="" class="needs-validation" novalidate enctype="multipart/form-data">
          <div class="row">
            <div class="col-sm-3">
              <div class="my-4">
                <img id="preview" src="img/<?php echo $data['gambar']; ?>" class="img-thumbnail">
                <label for="gambar" class="form-label">Gambar : </label>
                <input type="file" class="form-control" id="" name="gambar" id="gambar" onchange="loadfile(event)" >

                <script type="text/javascript">
                  function loadfile(event){
                    var output = document.getElementById('preview');
                    output.src=URL.createObjectURL(event.target.files[0]);
                  }
                 </script>


                <input hidden value="<?php echo $data['id_menu']; ?>" type="text" class="form-control" id="" name="id_menu">
              </div>
              <div class="my-4">
                <label class="form-check-label" for="ketersediaan">Ketersediaan : </label>
                <?php
                  if($data['ketersidiaan']>0){
                    echo '
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="ketersediaan" id="ada" value="1" checked>
                        <label class="form-check-label" for="ada">Ada</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="ketersediaan" id="habis" value="0">
                        <label class="form-check-label" for="habis">Habis</label>
                      </div>
                    ';
                  }elseif($data['ketersidiaan']==0){
                    echo '
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="ketersediaan" id="ada" value="1">
                        <label class="form-check-label" for="ada">Ada</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="ketersediaan" id="habis" value="0" checked>
                        <label class="form-check-label" for="habis">Habis</label>
                      </div>
                    ';
                  }
                ?>
                <!-- <div class="form-check">
                  <input type="radio" class="form-check-input" name="ketersediaan" id="ada" value="1">
                  <label class="form-check-label" for="ada">Ada</label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" name="ketersediaan" id="habis" value="0">
                  <label class="form-check-label" for="habis">Habis</label>
                </div> -->
              </div>
            </div>
            <div class="col-sm-9">
              <div class="my-4">
                <label class="form-check-label" for="namamenu">Nama menu : </label>
                <input required type="text" value="<?php echo $data['nama_menu']; ?>" class="form-control" name="namamenu" id="namamaenu" placeholder="Masukkan nama makanan">
                <div class="invalid-feedback">Masukan nama menu!</div>
              </div>
              <div class="my-4">
                <label class="form-check-label" for="infomenu">Info menu : </label>
                <input type="text" value="<?php echo $data['info_menu']; ?>" class="form-control" name="infomenu" id="infomenu" placeholder="Cth. 'Nasi putih, telor dadar, acar'">
              </div>
              <div class="my-4">
                <label class="form-check-label" for="harga">Harga : </label>
                <input required type="text" value="<?php echo $data['harga']; ?>" class="form-control" name="harga" id="harga" placeholder="Cth. 20000">
                <div class="invalid-feedback">Masukkan harga!</div>
              </div>
              <div class="my-4">
                <label required class="form-check-label" for="kategori">Kategori : </label>
                <?php
                  if($data['kategori']==1){
                    echo '
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="kategori" value="1" checked id="makanan">
                        <label class="form-check-label" for="makanan">Makanan</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="kategori" value="2" id="minuman">
                        <label class="form-check-label" for="minuman">Minuman</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="kategori" value="3" id="cemilan">
                        <label class="form-check-label" for="cemilan">Cemilan</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="kategori" value="4" id="paket">
                        <label class="form-check-label" for="paket">Paket</label>
                      </div>
                    ';
                  }elseif($data['kategori']==2){
                    echo '
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="kategori" value="1" id="makanan">
                        <label class="form-check-label" for="makanan">Makanan</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="kategori" value="2" checked id="minuman">
                        <label class="form-check-label" for="minuman">Minuman</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="kategori" value="3" id="cemilan">
                        <label class="form-check-label" for="cemilan">Cemilan</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="kategori" value="4" id="paket">
                        <label class="form-check-label" for="paket">Paket</label>
                      </div>
                    ';
                  }elseif($data['kategori']==3){
                    echo '
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="kategori" value="1" id="makanan">
                        <label class="form-check-label" for="makanan">Makanan</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="kategori" value="2" id="minuman">
                        <label class="form-check-label" for="minuman">Minuman</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="kategori" value="3" checked id="cemilan">
                        <label class="form-check-label" for="cemilan">Cemilan</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="kategori" value="4" id="paket">
                        <label class="form-check-label" for="paket">Paket</label>
                      </div>
                    ';
                  }elseif($data['kategori']==4){
                    echo '
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="kategori" value="1" id="makanan">
                        <label class="form-check-label" for="makanan">Makanan</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="kategori" value="2" id="minuman">
                        <label class="form-check-label" for="minuman">Minuman</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="kategori" value="3" id="cemilan">
                        <label class="form-check-label" for="cemilan">Cemilan</label>
                      </div>
                      <div class="form-check">
                        <input type="radio" class="form-check-input" name="kategori" value="4" checked id="paket">
                        <label class="form-check-label" for="paket">Paket</label>
                      </div>
                    ';
                  }
                ?>
                <!-- <div class="form-check">
                  <input type="radio" class="form-check-input" name="kategori" value="1" id="makanan">
                  <label class="form-check-label" for="makanan">Makanan</label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" name="kategori" value="2" id="minuman">
                  <label class="form-check-label" for="minuman">Minuman</label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" name="kategori" value="3" id="cemilan">
                  <label class="form-check-label" for="cemilan">Cemilan</label>
                </div>
                <div class="form-check">
                  <input type="radio" class="form-check-input" name="kategori" value="4" id="paket">
                  <label class="form-check-label" for="paket">Paket</label>
                </div> -->
                <div class="invalid-feedback">Pilih salah satu kategori!</div>
              </div>
              <div class="row my-4">
                <div class="col-sm text-end">
                <a href="daftarmenu.php"><button onclick="return confirm('Batalkan perubahan?')" name="btnCancel" type="button"  class="btn btn-danger">Cancel</button></a>
                <button onclick="return confirm('Yakin dengan perubahan ini?')" name="btnEdit" type="submit" class="btn btn-success">Simpan</button>
              </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>

    <script>
      (function () {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.prototype.slice.call(forms)
          .forEach(function (form) {
            form.addEventListener('submit', function (event) {
              if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
              }

              form.classList.add('was-validated')
            }, false)
          })
        })()

    </script>

    <!-- SCRIPT modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- SCRIPT MODAL END -->
    <!-- WYSIWYG untuk editor sinopsis -->

  </body>
</html>
