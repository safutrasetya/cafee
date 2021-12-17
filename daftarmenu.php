<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--BOOSTRAP CSS AND CKEDITOR-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--END BOSTTSTRAP AND CKEDITOR-->
    <!--CSS KITA SENDIRI-->
    <link rel="stylesheet" href="css/cafee.css">
    <!--end css kita sendiri-->
    <title>Daftar Menu</title>
  </head>
  <body class="bg-light">
    <div class="modal" id="gantiketersediaan" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="">Ubah Ketersediaan</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p class="text-danger">Ubah ketersediaan?</p>
            <form method="POST" action="">
              <div class="mb-3">
                <input hidden name="idupdtketersediaan" type="text" class="form-control" id="idupdtketersediaan">
                <input class="" type="radio" name="ketersediaan" id="ada" value="1">
                <label class="form-check-label" for="ada">Ada</label>
                <input class="" type="radio" name="ketersediaan" id="habis" value="0">
                <label class="form-check-label" for="habis">Habis</label>
              </div>
              <div class="mt-2">
                <button type="button" class="btn btn-outline-secondary float-start" data-bs-dismiss="modal">Batal</button>
                <button type="submit" name="btnUpdtKetersediaan" class="btn btn-primary float-end" data-bs-dismiss="modal">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <?php include("includes/koneksi.php"); include("includes/logincheck.php");include("includes/admincheck.php");require_once("includes/akunmenumejacheckboxes.php");?>
    <?php include("temp_sidebar.php");?>
    <div class="jumbotron pe-2 h-100" style="height: 750px;">
      <div class="row">
        <div class="col-sm-12">
          <div class="mx-auto mb-3" style="">
            <h2 class="text-dark text-center display-5">Daftar Menu</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-11">

          <?php
            if($_SESSION['level']==3){
              ?>
              <form method="POST">
                <div class="row">
                  <div class="col-sm-11">
                    <input type="text" class="form-control my-2" name="keyword" id="keyword" placeholder="Cari id_menu/nama_menu..." autofocus autocomplete="off">
                  </div>
                  <div class="col-sm-auto" style="margin-left:;">
                    <a href="exportmenu.php">
                      <button type="button" class="btn btn-info my-2">
                        <i class="bi bi-folder-symlink"></i> Export
                      </button>
                    </a>
                  </div>
                </div>
              </form>
              <?php
            }else{
              ?>
              <form method="POST">
                <div class="row">
                  <div class="col-sm-7">
                    <input type="text" class="form-control my-2" name="keyword" id="keyword" placeholder="Cari id_menu/nama_menu..." autofocus autocomplete="off">
                  </div>
                  <div class="col-sm-auto" style="margin-left: -10px;">
                    <a href="tambahmenuimport.php">
                      <button type="button" class="btn btn-success my-2">
                        <i class="bi bi-folder-plus"></i> Import
                      </button>
                    </a>
                  </div>
                  <div class="col-sm-auto" style="margin-left: -20px;">
                    <a href="tambahmenu.php">
                      <button type="button" class="btn btn-success my-2">
                        <i class="bi bi-clipboard-plus"></i> Tambah Menu
                      </button>
                    </a>
                  </div>
                  <div class="col-sm-auto" style="margin-left: -20px;">
                    <a href="exportmenu.php">
                      <button type="button" class="btn btn-info my-2">
                        <i class="bi bi-folder-symlink"></i> Export
                      </button>
                    </a>
                  </div>
                  <div class="col-sm-auto" style="margin-left: 10px;">
                    <a href="daftarmenuhapus.php">
                      <button type="button" class="btn btn-danger my-2">
                        <i class="bi bi-trash-fill"></i> Hapus banyak menu
                      </button>
                    </a>
                  </div>
                </div>
              </form>
              <?php
            }
          ?>

        </div>
      </div>
      <div class="row">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-11">
          <?php include('functionupdateketersediaan.php'); ?>
          <div class="row">
            <div class="row mb-2">
              <form action="" method="post" id="form">
                <label for="num_rows">Baris per Halaman : </label>
                <select id="num_rows" name="num_rows" class="">
                  <?php
                  $numrows_arr = array("5","10","25","50","100","250");
                  foreach($numrows_arr as $nrow){
                      if(isset($_POST['num_rows']) && $_POST['num_rows'] == $nrow){
                          echo '<option value="'.$nrow.'" selected="selected">'.$nrow.'</option>';
                      }else{
                          echo '<option value="'.$nrow.'">'.$nrow.'</option>';
                      }
                  }
                  ?>
                </select>
              </form>
            </div>
            <div class="shadow p-3" id="container">
              <table class="table table-bordered table-info" >
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
                    if(isset($_POST['num_rows'])){
                      $perHalaman = $_POST['num_rows'];
                    }else{
                      $perHalaman = 5;
                    }
                    $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman']  : 1;
                    $halamanAwal = ($halaman>1) ? ($halaman * $perHalaman) - $perHalaman : 0;

                    $prev = $halaman - 1;
                    $next = $halaman + 1;

                    $menu = mysqli_query($koneksi,"SELECT * FROM menu");
                    $jumlahMenu = mysqli_num_rows($menu);
                    $totalHalaman = ceil($jumlahMenu / $perHalaman);

                    $menus = mysqli_query($koneksi,"SELECT * FROM menu LIMIT $halamanAwal, $perHalaman");
                    $nomor = 1;
                    while($d = mysqli_fetch_assoc($menus)){
                      $idmenu = $d['id_menu'];
                      $ketersediaan = $d['ketersidiaan'];
                      $namamenu = $d['nama_menu'];
                 ?>

                  <tr>
                    <td><?php echo $d['id_menu'];?></td>
                    <td><img src="img/<?php echo $d['gambar']?>" style="height: 50px;width: 50px;"></td>
                    <td><?php echo $d['nama_menu'];?></td>
                    <td><?php echo $d['info_menu'];?></td>
                    <td><?php echo $d['harga'];?></td>
                    <td><?php
                      if($d['kategori']==1){
                        echo "Makanan";
                      }elseif($d['kategori']==2){
                        echo "Minuman";
                      }elseif($d['kategori']==3){
                        echo "Cemilan";
                      }elseif($d['kategori']==4){
                        echo "Paket";
                      }else

                    ?></td>
                    <td><?php  $d['ketersidiaan'];
                    if ($d['ketersidiaan'] >=  1) echo "Ada";
                    elseif ($d['ketersidiaan'] < 1) echo "<p class='text-danger'>Habis</p>";
                    ?></td>
                    <td colspan="2">
                      <form action="#">
                        <input type="text" value="" hidden>
                        <?php
                          if($_SESSION['level']==1||$_SESSION['level']==2){
                            echo '
                            <a href="editmenu.php?id='.$idmenu.'"class="btn btn-success"><img src="img/edit-icon.png" style="height:20px; width:20px;"> Edit</a>
                            ';
                          }else{
                              echo "<button name='gantiketersediaan' type='button' class='btn btn-success me-1' data-bs-toggle='modal' data-bs-target='#gantiketersediaan' data-bs-whatever2='$namamenu' data-bs-whatever='$idmenu' statuslevel='$ketersediaan'><img src='img/edit-icon.png' style='height:20px; width:20px;'> Edit</button>";
                          }
                        ?>
                        <?php
                          if($_SESSION['level']==1||$_SESSION['level']==2){
                            $strictlvl = '<a class="btn btn-danger" onclick="return confirm(';

                            $strictlvl .= "'Are you sure to delete this menu?'";

                            $strictlvl .= ')" href="functionhapusmenu.php?id='.$d['id_menu'].'"><img src="img/trash-can.png" style="height:20px; width:15px;"> Hapus</a>';

                            echo $strictlvl;
                          }
                        ?>
                      </form>
                    </td>
                  </tr>
                  <?php
                }
                ?>

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
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- SCRIPT modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- SCRIPT MODAL END -->
    <script src="js/searchmenu.js"></script>
    <script>
      $(document).ready(function(){
          // Number of rows selection
          $("#num_rows").change(function(){
              // Submitting form
              $("#form").submit();

          });
      });
    </script>
    <script>
    var formodallvl = document.getElementById('gantiketersediaan')
    formodallvl.addEventListener('show.bs.modal', function (event) {
      // Button that triggered the modal
      var button = event.relatedTarget
      // Extract info from data-bs-* attributes
      var idlvlupdt = button.getAttribute('data-bs-whatever')
      var namalvlupdt = button.getAttribute('data-bs-whatever2')
      var statuslevel = button.getAttribute('statuslevel')
      // If necessary, you could initiate an AJAX request here
      // and then do the updating in a callback.
      //
      // Update the modal's content.
      var modalTitlelvl = formodallvl.querySelector('.modal-title')
      var modalBodyInput = formodallvl.querySelector('.modal-body input')

      modalTitlelvl.textContent = 'Ubah Ketersediaan menu: ' + namalvlupdt
      modalBodyInput.value = idlvlupdt

      if (statuslevel>0){
        document.getElementById("ada").checked = true;
      }else if (statuslevel==0){
        document.getElementById("habis").checked = true;
      }
    });
    </script>
  </body>
</html>
