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
    <link rel="stylesheet" href="css/sidebartest.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/scroll.css">
    <!--AJAX-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>Reservasi</title>
  </head>
  <body class="bg-light" onload="display_ct();">
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
    <div class="modal" id="hapusrsrvs" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="">Hapus Reservasi</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p class="h6">Yakin Menghapus reservasi ini?</p>
            <p class="text-danger">Reservasi ini tidak bisa dikembalikan</p>
            <form method="POST" action="">
              <div class="mb-3">
                <input hidden name="idhapusrsrvs" type="text" class="form-control" id="idhapusrsrvs"> <!-- ini id transaksi. ga ada php echo karena nilainya dari javascript yang dibawah -->
              </div>
              <div class="mt-2">
                <button type="button" class="btn btn-outline-secondary float-start" data-bs-dismiss="modal">Batal</button>
                <button name="btnDelRsrvs" class="btn btn-danger float-end" data-bs-dismiss="modal">Hapus</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php include("temp_sidebar.php");?>
    <div class="jumbotron h-100" style="height: 750px;">
      <div class="row">
        <div class="col-sm-6">
          <div class="mx-auto my-3" style="">
            <h2 class="text-dark text-center display-5">Reservasi</h2>
          </div>
        </div>
        <div class="col-sm-6">
          <p class="h3 mt-5">
            <span id='ct' ></span>
          </p>
        </div>
      </div>
      <div class="row pe-2">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-11">
          <div class="mb-3 ps-3 shadow">
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-sm-10">
                    <input name="search_box" id="search_box" type="text" class="form-control my-2" placeholder="Cari Reservasi (Id/Nama/No.Telp/No.meja/Waktu)...">
                  </div>
                  <div class="col-sm-2 pe-4">
                    <a href="tambahreservasi.php"><button type="button" class="btn btn-success my-2 form-control">Tambah reservasi</button></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row pe-2">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-11">
          <div class="jumbotron shadow">
            <div class="p-4">
              <?php include('functionhapusrsrvs.php'); ?>
              <div id="search_result"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      $(document).ready(function(){
        load_data(1);
        function load_data(page, query = ''){
          $.ajax({
            url:"functioncarireservasi.php",
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
    <script>
      jQuery(function($) {
        $('#divAlertHapus').delay(3000).fadeOut(500);
        $('#divAlert').delay(3000).fadeOut(500);
      });
      var formodalhapus = document.getElementById('hapusrsrvs')
      formodalhapus.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var idforhapus = button.getAttribute('data-bs-whatever')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = formodalhapus.querySelector('.modal-title')
        var modalBodyInput = formodalhapus.querySelector('.modal-body input')

        modalTitle.textContent = 'Hapus Transaksi :  ' + idforhapus
        modalBodyInput.value = idforhapus
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
      });
    </script>
    <script type="text/javascript">
function display_c(){
var refresh=1000; // Refresh rate in milli seconds
mytime=setTimeout('display_ct()',refresh)
}

function display_ct() {
var x = new Date()
document.getElementById('ct').innerHTML = x;
display_c();
 }
</script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
