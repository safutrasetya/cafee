<?php
  include("includes/koneksi.php"); include("includes/logincheck.php");
  include('functiontotalpesanan.php');include('includes/checkadminstaff.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--BOOSTRAP CSS AND CKEDITOR-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--ini vv untuk tombol-tombol bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <!--END BOSTTSTRAP AND CKEDITOR-->
    <!--CSS KITA SENDIRI-->
    <link rel="stylesheet" href="css/cafee.css">
    <link rel="stylesheet" href="css/navbar.css">
    <!--end css kita sendiri-->
    <!--SCRRIPT -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <!--ENDD SCRIPT -->

    <title>Pesanan anda telah dibuat!</title>
  </head>
  <body style="background-color:MediumAquaMarine;">
    <div class="jumbotron">
      <div class="card text-center my-4 mx-5 shadow-lg">
        <div class="card-body">
          <p class="display-5">Menunggu Konfirmasi <span class='spinner-border spinner-border-md'></span></h5>
          <p class="text-danger">Silahkan lanjutkan pembayaran dengan staff restoran.</p>
          <p class="h3">Meja <?php echo $_SESSION['meja']; ?></p>
          <p class="h5">Struk Pembelian <?php echo $_SESSION['idpembelian']; ?></p>
          <?php include("functioncheckorder.php");?>
          <div class="d-flex justify-content-center">
            <div class="card" style="width: 400px;">
              <div class="card-body">
                <!--TABEL STRUK-->
                <div class="overflow-auto mb-3" style="height: 400px;">
                  <table class="table text-left">
                    <thead>
                      <tr>
                        <td>Nama Makanan/Minuman</td>
                        <td>Harga</td>
                      </tr>
                    </thead>
                    <tbody class="text-start">
                      <!--PHP TABEL STRUK-->
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
                          echo "<h5>Anda belum memesan apapun</h5>";
                        }
                      ?>
                      <tr>
                        <td class="h6">Total harga yang dibayar</td>
                        <td>Rp. <?php echo $_SESSION['totalharga'];?> ,-</td>
                      </tr>
                      <!--END PHP TABEL STRUK-->
                    </tbody>
                  </table>
                </div>
                <!--END TABEL STRUK-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <meta http-equiv="refresh" content="7" />

    <script type="text/javascript">
      jQuery(function($) {
        $('#divAlert').delay(5000).fadeOut(400);

      });


    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
