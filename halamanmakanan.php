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
    <title>Makanan</title>
  </head>

  <body>
    <?php include("includes/koneksi.php"); include("includes/logincheck.php"); ?>
    <?php include('temp_navbar.php'); ?>
    <div class="jumbotron p-3 h-100" style="height: 750px;">
      <div class="jumbotron p-3 h-100" style="height: 750px;">
        <div class="jumbotron bg-light shadow-lg mx-auto p-5">
          <div class="mx-auto text-center pt-1 mb-3" style="margin-top:-25px;">
            <h2 class="text-dark">Orari Restaurant</h2>
            <h2 class="text-dark"> <?php include('functiontampilnomeja.php') ?> </h2>
            <!-- <a href="functionlogout.php"><button class="btn btn-info" type="button" name="btnLogout">Temporary Logout Button</button></a> -->
          </div>
          <div class="tm-paging-links">
            <nav>
              <ul>
                <li class="tm-paging-item"><a href="halamancarimenu.php" class="tm-paging-link">Cari menu</a></li>
                <li class="tm-paging-item"><a href="halamanminuman.php" class="tm-paging-link ">Minuman</a></li>
                <li class="tm-paging-item"><a href="halamanmakanan.php" class="tm-paging-link active">Makanan</a></li>
                <li class="tm-paging-item"><a href="halamancemilan.php" class="tm-paging-link">Cemilan</a></li>
                <li class="tm-paging-item"><a href="halamanpaket.php" class="tm-paging-link">Paket</a></li>
              </ul>
            </nav>
          </div>
          <?php include('functionpesanmenu.php'); ?>
          <table>
            <tbody>
              <?php include('functiontampilmakanan.php'); ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
