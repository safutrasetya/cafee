<?php
  include("includes/koneksi.php"); include("includes/logincheck.php");
  include ('functiontotalpesanan.php');include('includes/pesanancheck.php');
  include('includes/checkadminstaff.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--BOOSTRAP CSS AND CKEDITOR-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f6dcf461c1.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--ini vv untuk tombol-tombol bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
    <!--END BOSTTSTRAP AND CKEDITOR-->
    <!--CSS KITA SENDIRI-->
    <link rel="stylesheet" href="css/cafee.css">

    <!--end css kita sendiri-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Pesanan Anda</title>
  </head>
  <body class="bg-success">
    <div class="modal" id="myModal">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Hapus semua pesanan</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            Anda yakin ingin menghapus semua pesanan? (Pesanan tidak bisa dikembalikan)
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
            <form method="post" action="">
              <button name="btnBatalPesan" type="submit" class="btn btn-success">Ya, Hapus</button>
            </form>
          </div>

        </div>
      </div>
    </div>
    <!--  -->
    <?php include('functionbatalpesan.php');?>
    <?php include('temp_navbar.php'); ?>
    <div class="jumbotron pt-3 mt-5 h-100" >
      <div class="jumbotron mx-auto" style="background-color:MediumAquaMarine;">
        <div class="mx-auto text-center mb-2 mt-3">
          <h2 class="text-dark">Sudah yakin dengan pesanan anda?</h2>
        </div>
        <div class="jumbotron bg-light p-2 shadow mx-4">
          <div class="row">
            <div class="col-md">
              <form action="" method="POST" class="form-inline">
                <a href="halamanmakanan.php"><button class="btn btn-info m-2" type="button"><i class="bi bi-arrow-left-square"></i> Pesan lagi</button></a>
                <button data-bs-toggle="modal" data-bs-target="#myModal" type="button" class="btn btn-secondary"><i class="bi bi-x"></i> Hapus semua</button>
                <!-- <a href="halpesananyakin.php"> -->
                <!-- <form action="" method="POST"> -->
                  <button name="btnSelesai" class="btn btn-primary m-2 float-end" data-bs-toggle="modal" data-bs-target="#tampilstruk">
                    <i class="bi bi-check2"></i> Selesaikan pesanan
                  </button>
              </form>
              <!-- </a> -->

            </div>
          </div>
          <?php include('functionupdatekuantitas.php') ?>
          <?php
            if(isset($_POST['btnSelesai'])){
              if(isset($_SESSION['keranjang'])){
                $hitung = array_column($_SESSION['keranjang'], 'menu_id');
                if(isset($_SESSION['keranjang'])&&count($hitung)!=0){
                  echo "<script> window.setTimeout(function(){

                        // Move to a new location or you can do something else
                        window.location.href = 'halpesananyakin.php';

                      }, 0);</script>";
                }else{
                  echo "<div id='divAlert' name='divAlert' class='alert alert-info m-2' role='alert'>Anda belum memesan apapun. Pesan setidaknya satu menu sebelum melanjutkan</div>";
                }
              }else{
                echo "<div id='divAlert' name='divAlert' class='alert alert-info m-2' role='alert'>Anda belum memesan apapun. Pesan setidaknya satu menu sebelum melanjutkan</div>";

              }
            }else{
            }
          ?>
        </div>
        <div class="row mt-3 mx-2 pb-4">
          <div class="col-md-8">
            <div class="overflow-auto" style="height: 475px;">
              <div class="card shadow my-2">
                <div class="card-body text-center">

<form action="" method="GET">

                  <!--DAFTAR PESANAN-->
                  <?php
                    $total = 0;

                    if(isset($_SESSION['keranjang'])&&count($_SESSION['keranjang'])!=0){
                      $pesanan_id = array_column($_SESSION['keranjang'],'menu_id');
                      $query2 = "SELECT * FROM menu";
                      $qresult = mysqli_query($koneksi, $query2);
                      // $keyquantity = key($pesanan_quantity_key);
                      $idUpdate = 0;
                      while($row = mysqli_fetch_array($qresult)){

                        // $keyquantity = key($pesanan_quantity_key);
                        foreach($pesanan_id as $key => $pesanan_id2){


                          if($row['id_menu']== $pesanan_id2){

                            // $keyint = (int)$keyquantity;
                            tampilttlpesanan($row['gambar'], $row['nama_menu'],$row['harga'], $row['id_menu'], $pesanan_id2, $idUpdate);
                            $total = $total + (int)$row['harga'];
                            $idUpdate++;
                          }
                        }
                        // next($pesanan_quantity_key);

                      }
                    }else if(isset($_SESSION['keranjang'])&&count($_SESSION['keranjang'])==0){

                      echo "<h5>Anda belum memesan apapun</h5>";
                    }elseif(!isset($_SESSION['keranjang'])){
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
                <button name="btnUpdate" class="btn btn-warning my-2 float-end ">Update</button>
</form>
                <!-- klo udh selesai taroh fungsi update disini -->

              </div>

              <!-- klo udh selesai taroh fungsi update disini -->
            </div>
            <div class="overflow-auto mb-3" style="height: 400px;">
              <div class="card shadow">
                <div class="card-body">
                  <p class="text-center h6">STRUK PEMBELIAN</p>
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
                                tampilttlharga($row2['gambar'], $row2['nama_menu'],$row2['harga'],$row2['id_menu'],$idUpdate);
                                $idUpdate++;
                              }
                              next($pesanan_quantity_key);
                            }

                          }
                        }else{
                          // echo "<h5 class='text-center'>Anda belum memesan apapun</h5>";
                        }
                      ?>
                      <!--END TABEL STRUK-->
                    </tbody>
                  </table>
                  <!--INI TOTAL HARGA SAMA TOTAL PEMESANAN-->
                  <?php
                    include('functiontotalharga.php');
                  ?>
                  <!--END TOTAL HARGA DAN TOTAL PEMESANAN-->
                  <div class="row my-2">
                    <div class="col-md">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      jQuery(function($) {
        $('#divAlert').delay(4000).fadeOut(400);
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>
