<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <!--BOOSTRAP CSS AND CKEDITOR-->
    <!--END BOSTTSTRAP AND CKEDITOR-->
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
        <div class="mx-auto text-center mb-5" style="margin-top:-25px;">
          <h2 class="text-dark">Orari Restaurant</h2>
          <h2 class="text-dark"> <?php include('functiontampilnomeja.php') ?> </h2>
          <a href="functionlogout.php"><button class="btn btn-info" type="button" name="btnLogout">Temporary Logout Button</button></a>
      <div class="my-4 ps-3 shadow">
        <div class="row">
          <form class="row">
            <div class="col-md-4">
              <input type="text" class="form-control my-2" placeholder"Search">
            </div>
            <div class="col-md-2">
              <button type="submit" class="form-control btn btn-primary my-2 float-start">Search</button>
            </div>
            <div class="col-md-6">
              <a href="halpesanan.php">
                <button type="button" class="btn btn-danger my-2 float-end">
                  <span class="badge bg-secondary">
                    <?php
                    if(isset($_SESSION['keranjang'])){
                      $count = count($_SESSION['keranjang']);
                      echo $count;
                    }else{
                      echo 0;
                    }
                    ?>
                  </span> Pesanan
                </button>
              </a>
            </div>
          </form>
        </div>
      </div>
  </div>

  <div class="tm-paging-links">
        <nav>
          <ul>
            <li class="tm-paging-item"><a href="halamanminuman.php" class="tm-paging-link ">Minuman</a></li>
            <li class="tm-paging-item"><a href="halamanmakanan.php" class="tm-paging-link active">Makanan</a></li>
            <li class="tm-paging-item"><a href="halamancemilan.php" class="tm-paging-link">Cemilan</a></li>
            <li class="tm-paging-item"><a href="halamanpaket.php" class="tm-paging-link">Paket</a></li>
          </ul>
        </nav>
  </div>

  <div class="container-fluid mb-4">
    <div class="row justify-content-center row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
      <div class="col mt-4">
        <div class="card" style="padding: 10px;">
          <img src='img/menu_makanan.jpg' class='card-img-top' alt='img/menu_makanan.jpg'>
            <h5 class='card-title'>$data[nama_menu]</h5>
            <p class='card-text'>$data[harga]</p>
            <form action='' method='get'>
              <input type='text' value='$data[id_menu]' hidden name='id_pesanan_baru'>
              <button class='btn btn-primary' type='submit' name='addMakanan'>+</button>
            </form>
        </div>
      </div>
      <div class="col mt-4">
        <div class="card" style="padding: 10px;">
          <img src='img/menu_makanan.jpg' class='card-img-top' alt='img/menu_makanan.jpg'>
            <h5 class='card-title'>$data[nama_menu]</h5>
            <p class='card-text'>$data[harga]</p>
            <form action='' method='get'>
              <input type='text' value='$data[id_menu]' hidden name='id_pesanan_baru'>
              <button class='btn btn-primary' type='submit' name='addMakanan'>+</button>
            </form>
        </div>
      </div>
      <div class="col mt-4">
        <div class="card" style="padding: 10px;">
          <img src='img/menu_makanan.jpg' class='card-img-top' alt='img/menu_makanan.jpg'>
            <h5 class='card-title'>$data[nama_menu]</h5>
            <p class='card-text'>$data[harga]</p>
            <form action='' method='get'>
              <input type='text' value='$data[id_menu]' hidden name='id_pesanan_baru'>
              <button class='btn btn-primary' type='submit' name='addMakanan'>+</button>
            </form>
        </div>
      </div>
      <div class="col mt-4">
        <div class="card" style="padding: 10px;">
          <img src='img/menu_makanan.jpg' class='card-img-top' alt='img/menu_makanan.jpg'>
            <h5 class='card-title'>$data[nama_menu]</h5>
            <p class='card-text'>$data[harga]</p>
            <form action='' method='get'>
              <input type='text' value='$data[id_menu]' hidden name='id_pesanan_baru'>
              <button class='btn btn-primary' type='submit' name='addMakanan'>+</button>
            </form>
        </div>
      </div>
      <div class="col mt-4">
        <div class="card" style="padding: 10px;">
          <img src='img/menu_makanan.jpg' class='card-img-top' alt='img/menu_makanan.jpg'>
            <h5 class='card-title'>$data[nama_menu]</h5>
            <p class='card-text'>$data[harga]</p>
            <form action='' method='get'>
              <input type='text' value='$data[id_menu]' hidden name='id_pesanan_baru'>
              <button class='btn btn-primary' type='submit' name='addMakanan'>+</button>
            </form>
        </div>
      </div>
      <div class="col mt-4">
        <div class="card" style="padding: 10px;">
          <img src='img/menu_makanan.jpg' class='card-img-top' alt='img/menu_makanan.jpg'>
            <h5 class='card-title'>$data[nama_menu]</h5>
            <p class='card-text'>$data[harga]</p>
            <form action='' method='get'>
              <input type='text' value='$data[id_menu]' hidden name='id_pesanan_baru'>
              <button class='btn btn-primary' type='submit' name='addMakanan'>+</button>
            </form>
        </div>
      </div>
      <div class="col mt-4">
        <div class="card" style="padding: 10px;">
          <img src='img/menu_makanan.jpg' class='card-img-top' alt='img/menu_makanan.jpg'>
            <h5 class='card-title'>$data[nama_menu]</h5>
            <p class='card-text'>$data[harga]</p>
            <form action='' method='get'>
              <input type='text' value='$data[id_menu]' hidden name='id_pesanan_baru'>
              <button class='btn btn-primary' type='submit' name='addMakanan'>+</button>
            </form>
        </div>
      </div>
      <div class="col mt-4">
        <div class="card" style="padding: 10px;">
          <img src='img/menu_makanan.jpg' class='card-img-top' alt='img/menu_makanan.jpg'>
            <h5 class='card-title'>$data[nama_menu]</h5>
            <p class='card-text'>$data[harga]</p>
            <form action='' method='get'>
              <input type='text' value='$data[id_menu]' hidden name='id_pesanan_baru'>
              <button class='btn btn-primary' type='submit' name='addMakanan'>+</button>
            </form>
        </div>
      </div>
      <div class="col mt-4">
        <div class="card" style="padding: 10px;">
          <img src='img/menu_makanan.jpg' class='card-img-top' alt='img/menu_makanan.jpg'>
            <h5 class='card-title'>$data[nama_menu]</h5>
            <p class='card-text'>$data[harga]</p>
            <form action='' method='get'>
              <input type='text' value='$data[id_menu]' hidden name='id_pesanan_baru'>
              <button class='btn btn-primary' type='submit' name='addMakanan'>+</button>
            </form>
        </div>
      </div>
      <div class="col mt-4">
        <div class="card" style="padding: 10px;">
          <img src='img/menu_makanan.jpg' class='card-img-top' alt='img/menu_makanan.jpg'>
            <h5 class='card-title'>$data[nama_menu]</h5>
            <p class='card-text'>$data[harga]</p>
            <form action='' method='get'>
              <input type='text' value='$data[id_menu]' hidden name='id_pesanan_baru'>
              <button class='btn btn-primary' type='submit' name='addMakanan'>+</button>
            </form>
        </div>
      </div>
    </div>
  </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
