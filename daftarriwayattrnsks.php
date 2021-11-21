<?php include("includes/koneksi.php"); include("includes/logincheck.php");
?>
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
            <form method="GET" action="">
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
    <!--END MODAL GANTI STATUS PESANAN-->
    <?php include("temp_sidebar.php");?>
    <div class="jumbotron p-3 h-100" style="height: 750px;">
      <div class="jumbotron bg-light shadow-lg mx-auto p-5">
        <div class="mx-auto text-center mb-5" style="margin-top:-25px;">
          <h2 class="text-dark">Riwayat Transaksi</h2>
          <a href="functionlogout.php"><button class="btn btn-info" type="button" name="btnLogout">Temporary Logout Button</button></a>
        </div>
        <div class="my-4 ps-3 shadow">
          <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-6">
              <form>
                <div class="row">
                  <div class="col">
                    <input type="text" class="form-control my-2" placeholder="Cari Akun...">
                  </div>
                  <div class="col">
                    <button type="submit" class="btn btn-primary my-2">Search</button>
                  </div>
                  <!-- <div class="col" style="margin-right: -750px">
                  <a href="tambahakun.php"><button type="button" class="btn btn-success my-2"><img src="img/tambahakun-icon2.png" style="height:30px; width:30px;"> Tambah akun</button></a>
                  </div> -->
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-2">
          </div>
          <div class="col-sm-10">
            <div class="card shadow">
              <div class="card-body">

                <?php include('functionupdttrnsks.php'); ?>

                <table class="table table-bordered table-info">
                  <thead class="h5">
                    <tr style="text-align:center">
                      <td>Id Transaksi</td>
                      <td>Id Meja</td>
                      <td>Total Pembayaran</td>
                      <td colspan="2">Status Pembayaran</td>
                      <td>Tanggal Pembayaran</td>
                      <td>Waktu Pembayaran</td>
                      <td>Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $perHalaman = 10;
                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman']  : 1;
                        $halamanAwal = ($halaman>1) ? ($halaman * $perHalaman) - $perHalaman : 0;

                        $prev = $halaman - 1;
                        $next = $halaman + 1;

                        $riwayat = mysqli_query($koneksi,"SELECT * FROM riwayat_pembelian");
                        $jumlahriwayat = mysqli_num_rows($riwayat);
                        $totalHalaman = ceil($jumlahriwayat / $perHalaman);

                        $riwayats = mysqli_query($koneksi,"SELECT * FROM riwayat_pembelian LIMIT $halamanAwal, $perHalaman");
                        while($d = mysqli_fetch_assoc($riwayats)){
                     ?>
                    <tr>
                      <td><?php echo $d['id_transaksi'] ?></td>
                      <td><?php echo $d['id_meja'] ?></td>
                      <td>Rp.<?php echo $d['total_pembayaran'];?>,-</td>
                      <td>
                        <?php
                        if ($d['status_bayar']==1){
                          echo "<p class='text-success'>Sudah dibayar</p>";
                        }elseif($d['status_bayar']==0){
                          echo "<p class='text-danger'>Belum dibayar</p>";
                        };
                        ?>
                      </td>
                      <td>
                          <button name="gantistatus" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#gantistatus" data-bs-whatever="<?php echo $d['id_transaksi'];?>" statusbayar="<?php echo $d['status_bayar']?>"><img src="img/edit-icon.png" style="height:20px; width:20px;"> Ubah status pembayaran</button>

                      </td>
                      <td><?php echo $d['tanggal_pembayaran'];?></td>
                      <td><?php echo $d['waktu_pembayaran'];?></td>
                      <td>
                        <form action="#">
                          <input type="text" value="" hidden>
                          <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this account?')" href="hapustransaksi.php?id=<?php echo $d['id_transaksi'];?>"><img src="img/trash-can.png" style="height:20px; width:15px;"> Hapus</a>
                        </form>
                      </td>
                    </tr>
                  <?php  } ?>

                  </tbody>
                </table>

                <ul class="pagination pagination-sm justify-content-center">
                  <li class="page-item">
                    <a class="page-link" <?php if($halaman > 1){echo "href = '?halaman=$prev'";} ?>>Previous</a>
                  </li>
                  <?php
                  for($x = 1;$x<=$totalHalaman;$x++){ ?>
                        <li class="page-item">
                          <a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a>
                          </li>
                    <?php
                    } ?>
                    <li class="page-item">
                      <a class="page-link" <?php if($halaman < $totalHalaman){ echo "href='?halaman=$next'";}?>>Next</a>
                    </li>
                </ul>

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
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
