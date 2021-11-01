<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--BOOSTRAP CSS AND CKEDITOR-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <!--END BOSTTSTRAP AND CKEDITOR-->
    <!--CSS KITA SENDIRI-->
    <link rel="stylesheet" href="css/cafee.css">
    <!--end css kita sendiri-->
    <title>Daftar Menu</title>
  </head>
  <body class="bg-light">
    <?php include("includes/koneksi.php"); include("includes/logincheck.php"); ?>
    <!--MODAL HAPUS-->
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
  	<!--MODAL END-->
    <div class="jumbotron p-3 h-100" style="height: 750px;">
      <div class="jumbotron bg-light shadow-lg mx-auto p-5">
        <div class="mx-auto text-center mb-5" style="margin-top:-25px;">
          <h2 class="text-dark">Daftar Menu</h2>
        </div>
        <div class="my-4 ps-3 shadow">
          <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col-sm-10">
              <form>
                <div class="row">
                  <div class="col-sm-5">
                    <input type="text" class="form-control my-2" placeholder="Cari Menu...">
                  </div>
                  <div class="col-sm-3">
                    <button type="submit" class="btn btn-primary my-2">Search</button>
                  </div>
                  <div class="col text-end me-3" style="">
                    <a href="tambahmenu.php"><button type="button" class="btn btn-success my-2"><img src="img/tambahmenu-icon.png" style="height:30px; width:30px;"> Tambah Menu</button></a>
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
                <ul class="pagination pagination-sm justify-content-center">
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
                <table class="table table-bordered table-info">
                  <thead class="h6">
                    <tr>
                      <td>Id</td>
                      <td>Gambar</td>
                      <td>Nama Menu</td>
                      <td>Info Menu</td>
                      <td>Harga</td>
                      <td>Ketersediaan</td>
                      <td colspan="2">Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td><img src="img/imgtest1.jpg" class="gambarsize1"></td>
                      <td>T E S T</td>
                      <td>Sapi, Telur, Tortilla, Blah blah</td>
                      <td>Rp. 200.000,-</td>
                      <td></td>
                      <td>
                        <form action="#">
                          <input type="text" value="" hidden>
                          <button class="btn btn-success"><img src="img/edit-icon.png" style="height:20px; width:20px;"> Edit</button>
                        </form>
                      </td>
                      <td>
                        <form action="editmenu.php">
                          <input type="text" value="" hidden>
                          <button type="submit" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusmenu"><img src="img/trash-can.png" style="height:20px; width:15px;"> Hapus</button>
                        </form>
                      </td>
                    </tr>
                    <?php
                      for($i=0;$i<6;++$i){
                        echo "<tr>
                          <td>1</td>
                          <td><img src='img/imgtest1.jpg' class='gambarsize1'></td>
                          <td>T E S T</td>
                          <td>Sapi, Telur, Tortilla, Blah blah</td>
                          <td>Rp. 200.000,-</td>
                          <td>Ada</td>
                          <td>
                            <form action='#'>
                              <input type='text' value='' hidden>
                              <button class='btn btn-success'><img src='img/edit-icon.png' style='height:20px; width:20px;'> Edit</button>
                            </form>
                          </td>
                          <td>
                            <form action='editmenu.php'>
                              <input type='text' value='' hidden>
                              <button type='submit' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#hapusmenu'><img src='img/trash-can.png' style='height:20px; width:15px;'> Hapus</button>
                            </form>
                          </td>
                        </tr>";
                      }
                     ?>
                  </tbody>
                </table>
                <ul class="pagination pagination-sm justify-content-center">
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- SCRIPT modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- SCRIPT MODAL END -->
  </body>
</html>
