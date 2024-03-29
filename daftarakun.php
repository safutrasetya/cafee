<?php include("includes/koneksi.php");
 include("includes/logincheck.php");
 include("includes/admincheck.php");
 require_once("includes/staffcheck.php");require_once("includes/akunmenumejacheckboxes.php");
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <title>Daftar Akun</title>
  </head>
  <body class="bg-light">
    <div class="modal" id="gantilevel" tabindex="-1">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="">Ubah Level Akun</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <p class="text-danger">PERHATIAN UNTUK ADMIN! Mengubah akun staff menjadi admin akan membuat anda tidak dapat mengedit/menghapus akun tersebut. Ubah jabatan user dengan bijak.</p>
            <form method="POST" action="">
              <div class="mb-3">
                <input hidden name="idupdtlevel" type="text" class="form-control" id="idupdtlevel">
                <?php

                ?>
                <input class="" type="radio" name="levelakun" id="admin" value="2">
                <label class="form-check-label" for="admin">Admin</label>
                <input class="" type="radio" name="levelakun" id="staff" value="3">
                <label class="form-check-label" for="staff">Staff</label>
              </div>
              <div class="mt-2">
                <button type="button" class="btn btn-outline-secondary float-start" data-bs-dismiss="modal">Batal</button>
                <button type="submit" name="btnUpdtLvl" class="btn btn-primary float-end" data-bs-dismiss="modal">Simpan</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <?php include("temp_sidebar.php");?>
    <div class="jumbotron h-100" style="height: 750px;">
      <div class="mx-auto" style="">
        <h2 class="text-dark text-center display-5">Daftar Akun</h2>
      </div>
      <div class="row pe-2">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-11">
          <div class="mt-3 ps-3">
            <form action="" method="POST">
              <div class="row">
                <div class="col-sm-7">
                  <input type="text" name="keyword" id="keyword" class="form-control my-2" placeholder="Masukkan ID/Username/Nama..." autocomplete="off">
                </div>
                <div class="col-sm-auto" style="margin-left: -20px;">
                  <a href="tambahakunimport.php">
                    <button type="button" class="btn btn-success my-2">
                      <i class="bi bi-folder-plus"></i> Import
                    </button>
                  </a>
                </div>
                <div class="col-sm-auto" style="margin-left: -20px;">
                  <a href="tambahakun.php">
                    <button type="button" class="btn btn-success my-2">
                      <i class="bi bi-person-plus"></i> Tambah akun</button>
                    </a>
                </div>
                <div class="col-sm-auto" style="margin-left: -20px;">
                  <a href="exportakun.php">
                    <button type="button" class="btn btn-info my-2">
                      <i class="bi bi-folder-symlink"></i> Export
                    </button>
                  </a>
                </div>
                <div class="col-sm-auto" style="margin-left: 20px;">
                  <a href="daftarakunhapus.php">
                    <button type="button" class="btn btn-danger my-2">
                      <i class="bi bi-trash-fill"></i> Hapus banyak akun
                    </button>
                  </a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
      <div class="row pe-2">
        <div class="col-sm-1">
        </div>
        <div class="col-sm-11">
          <div class="mb-3 p-3 shadow">
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
            <?php include('functionubahlvl.php'); ?>
            <div class="body" id="container">
              <table class="table table-bordered table-info ">
                <thead class="h5">
                  <tr style="text-align:center">
                    <td>Id</td>
                    <td>Foto</td>
                    <td>Username</td>
                    <td>Nama</td>
                    <td>Email</td>
                    <td>No. Handphone</td>
                    <td>Level</td>
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

                      $akun = mysqli_query($koneksi,"SELECT * FROM akun");
                      $jumlahAkun = mysqli_num_rows($akun);
                      $totalHalaman = ceil($jumlahAkun / $perHalaman);

                      $akuns = mysqli_query($koneksi,"SELECT * FROM akun LIMIT $halamanAwal, $perHalaman");
                      while($d = mysqli_fetch_assoc($akuns)){
                        $id=$d['id'];
                        $levelakun = $d['level'];
                        $nama = $d['nama'];
                   ?>
                  <tr>
                    <td><?php echo $d['id'];?></td>
                    <td><img src="img/<?php echo $d['gambar']?>" style="height: 50px;width: 50px;"></td>
                    <td><?php echo $d['username'] ?></td>
                    <td><?php echo $d['nama'] ?></td>
                    <td><?php echo $d['email'];?></td>
                    <td><?php echo $d['No_Hp'];?></td>
                    <td>
                      <?php
                        if($d['level']==1){
                          echo "Dev";
                        }elseif($d['level']==2){
                          echo "Admin";
                        }elseif($d['level']==3){
                          echo "Staff";
                        }
                      ?>
                    </td>
                    <td>
                      <?php
                        if(($d['level']>2 && $_SESSION['level']==2)||($d['level']>1 && $_SESSION['level']==1)){
                          echo "<button name='gantilevel' type='button' class='btn btn-success me-1' data-bs-toggle='modal' data-bs-target='#gantilevel' data-bs-whatever2 ='$nama' data-bs-whatever='$id' statuslevel='$levelakun'><img src='img/edit-icon.png' style='height:20px; width:20px;'> Edit</button>";
                          echo "<a class='btn btn-danger' onclick='return confirm(";
                          echo '"Yakin menghapus akun '.$nama.' ?"';
                          echo ")' href='functionhapusakun.php?id=$id'><img src='img/trash-can.png' style='height:20px; width:15px;'> Hapus</a>";
                        }
                       ?>
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
    <script src="js/searchakun.js"></script>
    <script>
      jQuery(function($) {
        $('#divAlert').delay(3000).fadeOut(500);
      });
      var formodallvl = document.getElementById('gantilevel')
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

        modalTitlelvl.textContent = 'Ubah level akun : ' + namalvlupdt
        modalBodyInput.value = idlvlupdt

        if (statuslevel==2){
          document.getElementById("admin").checked = true;
        }else if (statuslevel==3){
          document.getElementById("staff").checked = true;
        }
      });
    </script>
    <script>
      $(document).ready(function(){
          // Number of rows selection
          $("#num_rows").change(function(){
              // Submitting form
              $("#form").submit();

          });
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
