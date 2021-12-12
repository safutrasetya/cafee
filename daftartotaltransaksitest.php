<?php include("includes/koneksi.php");
 include("includes/logincheck.php");
 include("includes/admincheck.php");require_once("includes/akunmenumejacheckboxes.php");
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--BOOSTRAP CSS AND CKEDITOR-->
    <script src="https://kit.fontawesome.com/f6dcf461c1.js" crossorigin="anonymous"></script>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <!--CSS KITA SENDIRI-->
    <link rel="stylesheet" href="css/akun.css">
    <link rel="stylesheet" href="css/cafee.css">
    <link rel="stylesheet" href="css/style.css">
    <!--AJAX-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Riwayat Penjualan</title>
  </head>
  <body class="bg-light">
    <!--MODAL GANTI SATUS PESANAN-->
    <?php include("temp_sidebar.php");?>
    <div class="jumbotron h-100">
      <div class="row">
        <div class="col-sm-12">
          <div class="mx-auto my-3" style="">
            <h2 class="text-dark text-center h2">Riwayat Penjualan</h2>
            <ul class="nav justify-content-center nav-tabs bg-info">
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#harian">Harian</a>
              </li>
              <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="tab" href="#bulanan">Bulanan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" data-bs-toggle="tab" href="#tahunan">Tahunan</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <!-- <div class="row justify-content-center pe-2">
        <div class="col-sm-8">
          <div class="mb-3 ps-3">
            <div class="row justify-content-center">
              <div class="col-sm-8">
                <input name="search_box" id="search_box" type="text" class="form-control my-2" placeholder="Cari...">
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row justify-content-center pe-2">
        <div class="col-sm-auto">
          <div class="jumbotron shadow">
            <div class="p-4 float-center">
              <div id="search_result">
              </div>
            </div>
          </div>
        </div>
      </div> -->
    </div>

    <div class="tab-content" id="nav-tabContent">
      <div class="tab-pane fade" id="harian" role="tabpanel" aria-labelledby="nav-home-tab">
      </div>
      <div class="tab-pane fade show active" id="bulanan" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div class="row justify-content-center pe-2">
          <div class="col-sm-8">
            <div class="mb-3 ps-3">
              <div class="row justify-content-center">
                <div class="col-sm-8">
                  <input name="search_box3" id="search_box3" type="text" class="form-control my-2" placeholder="Cari...">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center pe-2">
          <div class="col-sm-auto">
            <div class="jumbotron shadow">
              <div class="p-4 float-center">
                <div id="search_result3">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="tahunan" role="tabpanel" aria-labelledby="nav-contact-tab">...</div>
    </div>



    <script>
      $(document).ready(function(){
        load_data(1);
        function load_data(page, query = ''){
          $.ajax({
            url:"functioncaritahunan.php",
            method:"POST",
            data:{page:page, query:query},
            success:function(data){
              $('#search_result3').html(data);
            }
          });
        }

        $(document).on('click', '.page-link', function(){
          var page = $(this).data('page_number');
          var query = $('#search_box3').val();
          load_data(page, query);
        });

        $('#search_box3').keyup(function(){
          var query = $('#search_box3').val();
          load_data(1, query);
        });
      });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
