<?php
  include("includes/koneksi.php"); include("includes/logincheck.php");
  include('functiontotalpesanan.php');
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
  <body class="bg-light">
    <?php

    ?>
    <!-- Modal tunggu transaksi-->
    <div class="modal" id="modalMenungguTransakasi" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="">Menunggu Konfirmasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
                <p class="h5">Transaksi sedang berlangsung <span class='spinner-border spinner-border-sm'></span></p>
                <p class='h5'>Total harga yang dibayar = Rp. <?php echo $_SESSION['totalharga'];?> ,-</p>
                <p class="h5 text-center">Struk Pembelian</p>
                <div class="overflow-auto mb-3" style="height: 400px;">
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
                          echo "<h5>Anda belumm memesan apapun</h5>";
                        }
                      ?>
                      <tr>
                        <td class="h6">Total harga</td>
                        <td>Rp. <?php echo $_SESSION['totalharga'];?> ,-</td>
                      </tr>
                      <!--END TABEL STRUK-->
                    </tbody>
                  </table>
                </div>

            </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batalkan Pesanan</button>
          </div>
        </div>
      </div>
    </div>
    <!-- END Modal tunggu transaksi-->
    <script type="text/javascript">
        $(window).on('load', function() {
            $('#modalMenungguTransakasi').modal('show');
        });

    //     function checkOrderStatus(){
    //  // Instantiate an new XHR Object
    //     const xhr = new XMLHttpRequest();
    //
    //     // we call the file responsible for checking the db
    //     xhr.open("GET","functioncheckorder.php", true);
    //
    //     // When response is ready
    //     xhr.onload = function () {
    //         if (this.status === 200) {
    //             // we check the data return
    //             if(this.responseText === 1){
    //                 // Getting the element where we will display our response message
    //             let feedback = getElementsByClassName("h5");
    //             feedback.innerHTML = "Payment Received";
    //             clearInterval(timer); // we stop checking the database
    //              } else {
    //                 console.log('Still waiting...');
    //            };
    //
    //         }
    //         else {
    //             console.log("Something went wrong!");
    //         }
    //     }
    //
    //     // At last send the request
    //     xhr.send();
    // }
}

// now we want call this function every 3 seconds
let timer = setInterval(() => checkOrderStatus(), 3000);
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
