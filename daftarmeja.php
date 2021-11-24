<?php
     // koneksi kefunction
   include 'functiontambahmeja.php';

     // Menampilkan halaman daftar meja
   $tampilmeja = query("SELECT*FROM meja");

 ?>
<!DOCTYPE html>
 <html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!--BOOSTRAP CSS AND CKEDITOR-->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
     	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <!--END BOSTTSTRAP AND CKEDITOR-->

    <!--CSS KITA SENDIRI-->
      <link rel="stylesheet" href="css/cafee.css">
    <!--end css kita sendiri-->
    <title>Daftar Meja</title>
  </head>
  <body class="bg-light">
      <!-- koneksi ke temp_sidebar -->
    <?php include("temp_sidebar.php");?>
    <!-- Modal hapus -->
    <div class="modal fade" id="hapusmenu" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  	  <div class="modal-dialog">
  	    <div class="modal-content">
  	      <div class="modal-header">
  	        <h5 class="modal-title" id="exampleModalLabel">Yakin delete menu ini?</h5>
  	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
  	      </div>
  	      <div class="modal-body">
  	      	Jika menekan tombol delete, menu tidak dapat dikembalikan!
  	        <div class="mb-3">
  	        </div>
  	      </div>
  	      <div class="modal-footer">
  	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
  	        <button type="button" class="btn btn-danger">Delete</button>
  	      </div>
  	    </div>
  	  </div>
  	</div>
      <!-- MODAL END -->
    <div class="jumbotron p-3 h-100" style="height: 750px;">
      <div class="jumbotron bg-light shadow-lg mx-auto p-5">
        <div class="mx-auto text-center mb-5" style="margin-top:-25px;">
          <h2 class="text-dark">Daftar Meja</h2>
          <a href="functionlogout.php"><button class="btn btn-info" type="button" name="btnLogout">Temporary Logout Button</button></a>
        </div>
        <div class="my-4 ps-3 shadow">
          <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-10">
              <form>
                <div class="row">
                  <div class="col-sm-5">
                    <input type="text" class="form-control my-2" placeholder="Cari Meja...">
                  </div>
                  <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary my-2">Search</button>
                  </div>
                  <div class="col text-end me-3" style="">
                    <a href="tambahmeja.php"><button type="button" class="btn btn-success my-2"><img src="img/tambahmeja-ikon.png" style="height:30px; width:30px;">Tambah Meja</button></a>
                  </div>
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
              <!--  <ul class="pagination pagination-sm justify-content-center">
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul> -->
              <table class="table table-bordered table-info">
                <thead class="h6">
                    <tr>
                      <td>Id Meja</td>
                      <td>No Meja</td>
                      <td>Password</td>
                      <td>Reservasi</td>
                     </tr>
                </thead>
                <tbody>
                    <?php foreach($tampilmeja as $tampil) { ?>
                  <tr>
                      <td><?php echo $tampil["id_meja"]; ?></td>
                      <td><?php echo $tampil["no_meja"]; ?></td>
                      <td><?php echo $tampil["pass_meja"]; ?></td>
                      <?php if($tampil["reservasi"] == 0){ ?>
                      <td>Kosong</td>
                      <?php }else if ($tampil["reservasi"] == 1){ ?>
                      <td>Penuh</td>
                      <?php }else{ ?>
                      <td>Telah Dibooking</td>
                      <?php } ?>
                      </tr>
                     <?php }; ?>

                    </tbody>
                 </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
     <!-- SCRIPT modal -->
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
       <!-- SCRIPT MODAL END -->
       <!-- WYSIWYG untuk editor sinopsis -->
  </body>
</html>
