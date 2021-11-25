<?php include("includes/koneksi.php"); include("includes/logincheck.php");include("includes/admincheck.php");?>
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
    <?php include("temp_sidebar.php");?>
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
  	        <a href="functionhapusmenu.php"><button type="submit" name='btnHapus' class="btn btn-danger">Delete</button><a>
  	      </div>
  	    </div>
  	  </div>
  	</div>
  	<!--MODAL END-->
    <div class="jumbotron p-3 h-100" style="height: 750px;">
      <div class="jumbotron bg-light shadow-lg mx-auto p-5">
        <div class="mx-auto text-center mb-5" style="margin-top:-25px;">
          <h2 class="text-dark">Daftar Menu</h2>
          <!-- <a href="functionlogout.php"><button class="btn btn-info" type="button" name="btnLogout">Temporary Logout Button</button></a> -->
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
                      <td>Id</td>
                      <td>Gambar</td>
                      <td>Nama Menu</td>
                      <td>Info Menu</td>
                      <td>Harga</td>
                      <td>kategori</td>
                      <td>ketersidiaan</td>
                      <td>Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                      $perHalaman = 5;
                      $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman']  : 1;
                      $halamanAwal = ($halaman>1) ? ($halaman * $perHalaman) - $perHalaman : 0;

                      $prev = $halaman - 1;
                      $next = $halaman + 1;

                      $menu = mysqli_query($koneksi,"SELECT * FROM menu");
                      $jumlahMenu = mysqli_num_rows($menu);
                      $totalHalaman = ceil($jumlahMenu / $perHalaman);

                      $menus = mysqli_query($koneksi,"SELECT * FROM menu LIMIT $halamanAwal, $perHalaman");
                      while($d = mysqli_fetch_assoc($menus)){

                  /*$menu = mysqli_query($koneksi, "SELECT * FROM menu");
                       while ($d = mysqli_fetch_assoc($menu)){
                        */
                      ?>
                    <tr>
                      <td><?php echo $d['id_menu'];?></td>
                      <td><img src="img/<?php echo $d['gambar']?>" class="gambarsize1"></td>
                      <td><?php echo $d['nama_menu'];?></td>
                      <td><?php echo $d['info_menu'];?></td>
                      <td><?php echo $d['harga'];?></td>
                      <td><?php echo $d['kategori'] ?></td>
                      <td><?php  $d['ketersidiaan'];
                      if ($d >=  1) echo "Ada";
                      else if ($d < 1) echo "Habis";
                      ?></td>
                      <td colspan="2">
                        <form action="#">
                          <input type="text" value="" hidden>
                          <a href="editmenu.php?id=<?php echo $d['id_menu'];?>"class="btn btn-success"><img src="img/edit-icon.png" style="height:20px; width:20px;"> Edit</a>
                          <button type='submit' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#hapusmenu'><img src='img/trash-can.png' style='height:20px; width:15px;'> Hapus</button>
                        </form>
                      </td>
                    </tr>
                    <?php
                  }
                  ?>
                    <!--  for($i=0;$i<6;++$i){
                        echo "<tr>
                          <td>1</td>
                          <td><img src='img/imgtest1.jpg' class='gambarsize1'></td>
                          <td>T E S T</td>
                          <td>Sapi, Telur, Tortilla, Blah blah</td>
                          <td>Rp. 200.000,-</td>
                          <td>Ada</td>
                          <td>
                            <form action='editmenu.php'>
                              <input type='text' value='' hidden>
                              <button class='btn btn-success'><img src='img/edit-icon.png' style='height:20px; width:20px;'> Edit</button>
                            </form>
                          </td>
                          <td>
                            <form action='functionhapusmenu.php'>
                              <input type='text' value='' hidden>
                              <button type='submit' class='btn btn-danger' data-bs-toggle='modal' data-bs-target='#hapusmenu'><img src='img/trash-can.png' style='height:20px; width:15px;'> Hapus</button>
                            </form>
                          </td>
                        </tr>";
                      }
                     ?>
                   -->
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
                  <!--<li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                -->
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
