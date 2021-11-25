<?php include("includes/koneksi.php"); include("includes/logincheck.php");include("includes/admincheck.php");?>?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--BOOSTRAP CSS AND CKEDITOR-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <!--CSS KITA SENDIRI-->
    <link rel="stylesheet" href="css/akun.css">
    <link rel="stylesheet" href="css/cafee.css">
    <!--AJAX-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Riwayat Transaksi</title>
  </head>
  <body class="bg-light">
    <!--MODAL GANTI SATUS PESANAN-->
    <div class="modal" id="gantistatus" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="">Ganti status pesanan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="mb-3">
                <input hidden name="idtrnsks" type="text" class="form-control" id="idupdttrnsks"> <!-- ini id transaksi. ga ada php echo karena nilainya dari javascript yang dibawah -->
                <input class="" type="radio" name="statustrnsks" id="sudah" value="1">
                <label class="form-check-label" for="sudah">Sudah dibayar</label>
                <input class="" type="radio" name="statustrnsks" id="belum" value="0">
                <label class="form-check-label" for="belum">Belum dibayar</label>
              </div>
              <div class="mt-2">
                <button type="button" class="btn btn-outline-secondary float-start" data-bs-dismiss="modal">Batal</button>
                <button type="submit" name="btnUpdt" class="btn btn-primary float-end" data-bs-dismiss="modal">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal" id="hapustransaksi" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="">Hapus Pesanan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p class="h6">Yakin ingin menghapus transaksi ini?</p>
            <p>Transaksi ini tidak bisa dikembalikan</p>
            <form method="POST" action="">
              <div class="mb-3">
                <input name="idhapustrnsks" type="text" class="form-control" id="idhapustrnsks"> <!-- ini id transaksi. ga ada php echo karena nilainya dari javascript yang dibawah -->
              </div>
              <div class="mt-2">
                <button type="button" class="btn btn-outline-secondary float-start" data-bs-dismiss="modal">Batal</button>
                <button name="btnDel" class="btn btn-primary float-end" data-bs-dismiss="modal">Hapus</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!--END MODAL GANTI STATUS PESANAN-->
    <?php include("temp_sidebar.php");?>
    <div class="jumbotron p-3 h-100" style="height: 750px;">
      <div class="jumbotron bg-light shadow-lg mx-auto p-5">
        <div class="mx-auto text-center mb-2" style="margin-top:-25px;">
          <h2 class="text-dark">Riwayat Transaksi</h2>
          <!-- <a href="functionlogout.php"><button class="btn btn-info" type="button" name="btnLogout">Temporary Logout Button</button></a> -->
        </div>
        <div class="row">
          <div class="col-sm-2">
          </div>
          <div class="col-sm-10">
            <div class="card shadow">
              <div class="card-body">
                <a href="caritransaksi.php"><button type="button" class="btn btn-outline-primary my-2"><i class="bi bi-search"></i> Cari</button></a>
                <?php include('functionupdttrnsks.php'); ?>
                <!-- ^^fungsi untuk update transaksi -->
                <?php include('functionhapustrnsks.php'); ?>
                <!-- ^^fungsi untuk hapus transaksi -->
                <?php include('functiondaftartrnsks.php'); ?>
                <!-- ^^ fungsi tampilkan daftar transaksi-->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      jQuery(function($) {
        $('#divAlert').delay(3000).fadeOut(500);
      });
      var formodal = document.getElementById('gantistatus')
      formodal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var idforupdt = button.getAttribute('data-bs-whatever')
        var statusbayar = button.getAttribute('statusbayar')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = formodal.querySelector('.modal-title')
        var modalBodyInput = formodal.querySelector('.modal-body input')

        modalTitle.textContent = 'Ubah status transaksi :  ' + idforupdt
        modalBodyInput.value = idforupdt

        if (statusbayar ==1){
          document.getElementById("sudah").checked = true;
        }else if (statusbayar==0){
          document.getElementById("belum").checked = true;
        }
      })

    </script>
    <script>
      jQuery(function($) {
        $('#divAlertHapus').delay(3000).fadeOut(500);
      });
      var formodal = document.getElementById('hapustransaksi')
      formodal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var idforhapus = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = formodal.querySelector('.modal-title')
        var modalBodyInput = formodal.querySelector('.modal-body input')

        modalTitle.textContent = 'Hapus Transaksi :  ' + idforhapus
        modalBodyInput.value = idforhapus
      })
    </script>
    <script>
      $(document.ready(function(){
        $('#search_text').keyup(function(){
          var txt = $(this).val();
          if(txt != ''){
            $.ajax({
              url:"functioncari.php",
              method:"post",
              data:{search:txt},
              dataType:"text",
              success:function(data){
                $('#search_result').html(data);
              }
            });
          }
        });
      }));
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
