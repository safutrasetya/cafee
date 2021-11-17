<?php
  include("includes/koneksi.php"); include("includes/logincheck.php");
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
            <p>Transaksi sedang berlangsung <span class='spinner-border spinner-border-sm'></span></p>
            <p class="h6">Id pembayaran : <?php echo $_SESSION['idpembelian']; ?></p>
            <br>
            <p class='h5'>Total harga yang dibayar = Rp. <?php echo $_SESSION['totalharga'];?> ,-</p>

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
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
