<?php
  session_start();
  include ('functiontotalpesanan.php');

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--BOOSTRAP CSS AND CKEDITOR-->
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--ini vv untuk tombol-tombol bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--END BOSTTSTRAP AND CKEDITOR-->
    <!--CSS KITA SENDIRI-->
    <link rel="stylesheet" href="css/cafee.css">
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/navbar.css">
    <!--end css kita sendiri-->
    <title>Pesanan Anda</title>
  </head>
  <body class="bg-light">
    <?php include("includes/koneksi.php"); include("includes/logincheck.php"); ?>
    <?php include('temp_sidebar.php'); ?>
    <div class="jumbotron pt-2 h-100" style="height: 675px;">
      <div class="jumbotron bg-light shadow-lg mx-auto" style="height: 675px;">
        <div class="mx-auto text-center mb-2" style="margin-top:-25px;">
          <h2 class="text-dark">Sudah yakin dengan pesanan anda?</h2>
        </div>
        <div class="ps-3 shadow mx-4">
          <div class="row my-3">
            <div class="col-md">
              <a href="halamanmakanan.php"><button class="btn btn-primary m-2" type="button">Kembali ke daftar menu</button></a>
              <button class="btn btn-primary m-2 float-end">Pesan!</button>
            </div>
          </div>
        </div>
        <?php  echo var_dump($_SESSION['keranjang']); ?>

        <div class="row m-2">
          <div class="col-md-8">
            <div class="overflow-auto" style="height: 450px;">
              <div class="card shadow my-2">
                <div class="card-body text-center">

<form action="functionupdatekuantitas.php" method="POST">

                  <!--DAFTAR PESANAN-->
                  <?php
                    $total = 0;

                    if(isset($_SESSION['keranjang'])){
                      $pesanan_id = array_column($_SESSION['keranjang'],'menu_id');
                      $pesanan_quantity_key = array_column($_SESSION['keranjang'],'menu_quantity');
                      $query2 = "SELECT * FROM menu";
                      $qresult = mysqli_query($koneksi, $query2);
                      $keyquantity = key($pesanan_quantity_key);
                      $idUpdate = 0;
                      while($row = mysqli_fetch_array($qresult)){

                        $keyquantity = key($pesanan_quantity_key);
                        foreach($pesanan_id as $pesanan_id2){

                          // $keyquantity = key($pesanan_quantity_key);
                          if($row['id_menu']== $pesanan_id2){

                            $keyint = (int)$keyquantity;
                            tampilttlpesanan($row['gambar'], $row['nama_menu'],$row['harga'], $row['id_menu'], $idUpdate, $idUpdate);
                            $total = $total + (int)$row['harga'];
                            $idUpdate++;
                          }
                          // next($pesanan_quantity_key);
                        }
                        next($pesanan_quantity_key);

                      }
                    }else{
                      echo "<h5>Anda belum memesan apapun</h5>";
                    }
                  ?>
                  <!--END DAFTAR PESANAN-->


                </div>
              </div>
              <!--BATAS ga gunaa sih tpi batasin aja-->
            </div>
          </div>
          <div class="col-md-4">
            <div class="row my-2 mx-1">
              <div class="col-md">
                <button name="btnUpdate" class="btn btn-outline-success my-2  float-start">Update</button>
</form>
                <!-- klo udh selesai taroh fungsi update disini -->
                <button class="btn btn-primary my-2 float-end">Pesan!</button>

              </div>
              <!-- klo udh selesai taroh fungsi update disini -->
            </div>
            <div class="overflow-auto" style="height: 375px;">
              <div class="card shadow">
                <div class="card-body">
                  <p class="text-center">Jumlah harga</p>
                  <table class="table text-left">
                    <thead>
                      <tr>
                        <td>Nama Makanan/Minuman</td>
                        <td>Harga</td>
                      </tr>
                    </thead>
                    <tbody>
                      <!--TABEL STRUK-->
                      <?php
                        if(isset($_SESSION['keranjang'])){
                          $pesanan_id2 = array_column($_SESSION['keranjang'],'menu_id');
                          $pesanan_quantity_key = array_column($_SESSION['keranjang'],'menu_quantity');
                          $keyquantity = key($pesanan_quantity_key);

                          $query3 = "SELECT * FROM menu";
                          $qresult2 = mysqli_query($koneksi, $query3);
                          $idUpdate=0;
                          while($row2 = mysqli_fetch_array($qresult2)){
                            foreach($pesanan_id2 as $pesanan_id3){
                              $keyquantity = key($pesanan_quantity_key);
                              if($row2['id_menu']== $pesanan_id3){
                                $keyint = (int)$keyquantity;
                                tampilttlharga($row2['gambar'], $row2['nama_menu'],$row2['harga'],$idUpdate);
                                $idUpdate++;
                              }
                              next($pesanan_quantity_key);
                            }

                          }
                        }else{
                          echo "<h5>Anda belumm memesan apapun</h5>";
                        }
                      ?>
                      <!--END TABEL STRUK-->
                    </tbody>
                  </table>
                  <!--INI TOTAL HARGA SAMA TOTAL PEMESANAN-->
                  <?php
                    require_once('functiontotalharga.php');
                  ?>
                  <!--END TOTAL HARGA DAN TOTAL PEMESANAN-->
                  <div class="row my-2">
                    <div class="col-md">
                      <a href="halamanmakanan.php"><button type="button" class="btn btn-danger m-2">Kembali</button></a>
                      <button class="btn btn-primary m-2 float-end">Pesan!</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
  </body>
</html>
