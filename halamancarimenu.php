<?php include("includes/koneksi.php"); include("includes/logincheck.php");
include('includes/pesanancheck.php'); include('includes/checkadminstaff.php');?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <!--CSS KITA SENDIRI-->
    <link rel="stylesheet" href="css/cafee.css">
    <!--end css kita sendiri-->
    <!-- css kita -->
    <link href = "css/halmakanan.css" rel = "stylesheet">
    <!--AJAX--->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Makanan</title>
  </head>

  <body style="background-color:MediumAquaMarine;">
    <?php include('temp_navbar.php'); ?>
    <div class="jumbotron p-3 h-100" style="height: 750px;">
      <div class="jumbotron p-3 h-100" style="height: 750px;">
        <div class="jumbotron bg-light shadow-lg mx-auto p-5">
          <div class="mx-auto text-center pt-1 mb-3" style="margin-top:-25px;">

            <h2 class="text-dark"> <?php include('functiontampilnomeja.php') ?> </h2>
            <!-- <a href="functionlogout.php"><button class="btn btn-info" type="button" name="btnLogout">Temporary Logout Button</button></a> -->
          </div>
          <div class="tm-paging-links mb-2">
            <nav>
              <ul>
                <li class="tm-paging-item"><a href="halamancarimenu.php" class="tm-paging-link active">Cari menu</a></li>
                <li class="tm-paging-item"><a href="halamanminuman.php" class="tm-paging-link ">Minuman</a></li>
                <li class="tm-paging-item"><a href="halamanmakanan.php" class="tm-paging-link">Makanan</a></li>
                <li class="tm-paging-item"><a href="halamancemilan.php" class="tm-paging-link">Cemilan</a></li>
                <li class="tm-paging-item"><a href="halamanpaket.php" class="tm-paging-link">Paket</a></li>
              </ul>
            </nav>
          </div>
          <input name="search_box" id="search_box" type="text" class="form-control mb-1" placeholder="Cari menu...">
          <?php include('functionpesanmenu.php'); ?>
          <div id="search_result"></div>

        </div>
      </div>
    </div>

    <script>
      $(document).ready(function(){
        load_data(1);
        function load_data(page, query = ''){
          $.ajax({
            url:"functionsearchmenu.php",
            method:"POST",
            data:{page:page, query:query},
            success:function(data){
              $('#search_result').html(data);
            }
          });
        }

        $(document).on('click', '.page-link', function(){
          var page = $(this).data('page_number');
          var query = $('#search_box').val();
          load_data(page, query);
        });

        $('#search_box').keyup(function(){
          var query = $('#search_box').val();
          load_data(1, query);
        });
      });

    </script>
    <script type="text/javascript">
      jQuery(function($) {
        $('#divAlert').delay(4000).fadeOut(400);
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
