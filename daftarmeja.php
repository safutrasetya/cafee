<?php
include("includes/koneksi.php");
include("includes/logincheck.php");
include("includes/admincheck.php");
include 'functiontambahmeja.php';

// Menampilkan halaman daftar meja
$tampilmeja = query("SELECT*FROM meja");

?>
<!doctype html>
<html lang="en">
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
    <title>Daftar Meja</title>

    <style>
      .text-center{
        margin-top: 30px;
      }
    </style>
  </head>
  <body>
    <!--MODAL GANTI SATUS PESANAN-->
    <div class="modal" id="gantistatus" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="">Ganti status Meja</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="">
              <div class="mb-3">
                <input hidden name="idmeja" type="text" class="form-control" id="idupdttrnsks"> <!-- ini id transaksi. ga ada php echo karena nilainya dari javascript yang dibawah -->
                <input class="" type="radio" name="statusmeja" id="penuh" value="1">
                <label class="form-check-label" for="penuh">Penuh</label>
                <input class="" type="radio" name="statusmeja" id="kosong" value="0">
                <label class="form-check-label" for="kosong">Kosong</label>
                <input class="" type="radio" name="statusmeja" id="dibooking" value="2">
                <label class="form-check-label" for="dibooking">Telah Dibooking</label>
              </div>
              <div class="mt-2">
                <button type="button" class="btn btn-outline-secondary float-start" data-bs-dismiss="modal">Batal</button>
                <button type="submit" name="btnUpdate" class="btn btn-primary float-end" data-bs-dismiss="modal">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <div class="modal" id="hapusmeja" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="">Hapus Meja</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p class="h6">Yakin ingin menghapus Meja?</p>
            <p>Meja ini tidak bisa dikembalikan</p>
            <form method="POST" action="">
              <div class="mb-3">
                <input name="idhapusmeja" type="text" class="form-control" id="idhapusmeja"> <!-- ini id transaksi. ga ada php echo karena nilainya dari javascript yang dibawah -->
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
    <div class="jumbotron h-100" style="height: 750px;">
      <div class="row">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-11">
          <div class="mx-auto my-3" style="">
            <h2 class="text-dark text-center display-5">DAFTAR MEJA</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-11">
          <div class="jumbotron shadow p-3">
            <div class="">
              <a href="carimeja.php"><button type="button" class="btn btn-outline-primary float-end my-2"><i class="bi bi-search"></i> Cari</button></a>
              <?php include('functioneditmeja.php'); ?>
              <!-- ^^fungsi untuk update MEJA -->
              <?php include('functionhapusmeja.php'); ?>
              <!-- ^^fungsi untuk hapus transaksi -->
              <table class="table table-bordered table-info">
                <thead class="h6">
                    <tr>
                      <td>Id Meja</td>
                      <td>No Meja</td>
                      <td>Password</td>
                      <td>Reservasi</td>
                      <td>Action</td>
                     </tr>
                </thead>
                <tbody>
                    <?php foreach($tampilmeja as $tampil) { ?>
                  <tr>
                      <td><?php echo $tampil["id_meja"]; ?></td>
                      <td><?php echo $tampil["meja"]; ?></td>
                      <td><?php echo $tampil["pass_meja"]; ?></td>
                      <?php if($tampil["reservasi"] == 0){ ?>
                      <td>Kosong</td>
                      <?php }else if ($tampil["reservasi"] == 1){ ?>
                      <td>Penuh</td>
                      <?php }else{ ?>
                      <td>Telah Dibooking</td>
                      <?php } ?>
                      <td>
                        <button name="gantistatus" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#gantistatus" data-bs-whatever="<?php echo $tampil['id_meja'];?>" reservasi="<?php echo $tampil['reservasi']?>"><img src="img/edit-icon.png" style="height:20px; width:20px;">Edit</button>

                        <button name="hapusmeja" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusmeja" data-bs-hapus="<?php echo $tampil['id_meja'];?>"><i class="bi bi-trash"></i> Hapus</button>

                     </td>
                      </tr>
                     <?php }; ?>

                    </tbody>
                 </table>
              </div>
              <!-- ^^ fungsi tampilkan daftar transaksi-->
              <div class="col text-end me-3" style="">
                  <a href="tambahmeja.php"><button type="button" class="btn btn-success my-2"><img src="img/tambahmeja-ikon.png" style="height:30px; width:30px;">Tambah Meja</button></a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      jQuery(function($) {
        $('#divAlertHapus').delay(3000).fadeOut(500);
        $('#divAlert').delay(3000).fadeOut(500);
      });
      var formodalhapus = document.getElementById('hapusmeja')
      formodalhapus.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var idforhapus = button.getAttribute('data-bs-hapus')
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
        var statusmeja = button.getAttribute('statusmeja')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = formodal.querySelector('.modal-title')
        var modalBodyInput = formodal.querySelector('.modal-body input')

        modalTitle.textContent = 'Ubah status Meja :  ' + idforupdt
        modalBodyInput.value = idforupdt

        if (statusmeja ==1){
          document.getElementById("sudah").checked = true;
        }else if (statusmeja==0){
          document.getElementById("belum").checked = true;
        }
      });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
