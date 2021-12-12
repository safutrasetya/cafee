<?php   require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");require_once("includes/akunmenumejacheckboxes.php"); require_once("includes/staffcheck.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--BOOSTRAP CSS AND CKEDITOR-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <!--END BOSTTSTRAP AND CKEDITOR-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--CSS KITA SENDIRI-->
    <!--end css kita sendiri-->
    <title>Tambah Menu</title>
    <script type="text/javascript">

    </script>
  </head>
  <body class="bg-light">
    <?php include("temp_sidebar.php");?>
    <div class="jumbotron p-3 h-100" style="height: 750px;">
      <div class="jumbotron bg-light shadow-lg mx-auto px-5 pb-5">
        <div class="mx-auto text-center mb-2 p-2" >
          <h2 class="text-dark">Tambah Menu</h2>
        </div>
        <div class="p-3 shadow">
          <div class="row">
            <div class="col-sm-auto">
              <p>Contoh file excel yang benar :</p>
              <img class="" src="img/inicontohimportmenu.jpg" style="width: 600px">
            </div>
            <div class="col-sm">
              <p class="h5 text-warning">Penggunaan Nomor kategori : </p>
              <table class="table table-striped table-danger">
                <tb>
                  <tr>
                    <td>Nomor Kategori</td>
                    <td>Kategori</td>
                  </tr>
                  <tr>
                    <td>1</td>
                    <td>Makanan</td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>Minuman</td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>Cemilan</td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>Paket</td>
                  </tr>
                </tb>
              </table>
            </div>

          </div>

          <div class="row">
            <span id="message"></span>
              <div class="col-sm-6">
                  <form action="functiontambahakun.php" id="import_excel_form" method="post" enctype="multipart/form-data">
                    <div class="mb-3 me-3">
                      <label for="import">Pilih File Excel : </label>
                      <input type="file" id="import" name="importmenuexcel">|
                      <button type="submit" name="submitImp" value="submitImp" class="btn btn-success">
                        <i class="bi bi-folder-plus"></i> Import
                      </button>
                      <a href="daftarmenu.php"><button type="button" class="btn btn-danger ms-4">Kembali</button></a>

                    </div>
                    <div class="text-start me-3">
                    </div>
                </form>
              </div>
              <div class="col-sm-2">
              </div>
              <p>Tabel anda akan muncul disini :</p>
              <div id="excel_area" class="pt-4"></div>
          </div>
        </div>
      </div>
    </div>
    <script>
      jQuery(function($) {
        $('#divAlert').delay(3000).fadeOut(500);
      });
    </script>
    <script>
      $(document).ready(function(){
        $('#import_excel_form').on('submit', function(event){
          event.preventDefault();
          $.ajax({
            url:"functionimportmenu.php",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            beforeSend:function(){
              $('#submitImp').attr('disabled', 'disabled');
              $('#submitImp').val('Importing..');
            },
            success:function(data){
              $('#message').html(data);
              $('#import_excel_form')[0].reset();
              $('#submitImp').attr('disabled', false);
              $('#submitImp').val('Tambah!');
            }
          })
        });
      });
      $(document).ready(function(){
        $('#import_excel_form').change(function(event){
          event.preventDefault();
          $.ajax({
            url:"functionimpshowmenu.php",
            method:"POST",
            data:new FormData(this),
            contentType:false,
            cache:false,
            processData:false,
            success:function(data){
              $('#excel_area').html(data);
            }
          })
        });
      });
    </script>
  </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- SCRIPT MODAL END -->

</html>
