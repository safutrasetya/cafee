<?php   require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php"); require_once("includes/staffcheck.php");?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--BOOSTRAP CSS AND CKEDITOR-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.0/font/bootstrap-icons.css">

    <!--END BOSTTSTRAP AND CKEDITOR-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!--CSS KITA SENDIRI-->
    <!--end css kita sendiri-->
    <title>Hapus Akun</title>
    <script type="text/javascript">

    </script>
  </head>
  <body class="bg-light">
    <div class="modal" id="modalDelete">
      <div class="modal-dialog">
        <div class="modal-content">

          <!-- Modal Header -->
          <div class="modal-header">
            <h4 class="modal-title">Yakin dengan pilihan anda?</h4>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <!-- Modal body -->
          <div class="modal-body">
            Akun yang anda hapus tidak akan bisa dikembalikan lagi.
          </div>

          <!-- Modal footer -->
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <form action="" method="post">
              <button name="btnAkunDel" value="btnAkunDel" id="btnAkunDel" class="btn btn-danger text-end" type="submit">Hapus</button>
            </form>
          </div>

        </div>
      </div>
    </div>




    <?php include("temp_sidebar.php");?>
    <div class="jumbotron p-3 h-100" style="height: 750px;">
      <div class="jumbotron bg-light shadow-lg mx-auto p-5">
        <div class="mx-auto text-center mb-2" style="margin-top:-25px;">
          <h2 class="text-dark">Hapus banyak akun</h2>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-7">
            </div>
        </div>
        <div class="row justify-content-center">
          <div class="col-sm-3">
            <div id='divAlert' name='divAlert' class='p-2' role='alert' style="background-color: #ffccd5;">
              <p>Akun yang anda pilih akan tertera disini</p>
              <div id="cekvalue">
                <?php
                  if(isset($_SESSION['akundelcek'])){
                    $ceksession = array_column($_SESSION['akundelcek'], "idakun");
                    $nomor =1;
                    foreach($ceksession as $key=>$value){
                      if($_SESSION['akundelcek'][$key]['cekbox']==1){
                        $select = mysqli_query($koneksi, "SELECT * FROM akun where id = '{$value}'");
                        foreach($select as $row){
                          echo "<p>".$nomor.". ".$row['nama']."</p>";
                        }
                        $nomor++;
                      }
                    }
                    $varunset = 0;
                    $cekdalamsession = array_column($_SESSION['akundelcek'], "idakun");
                    foreach ($cekdalamsession as $key=>$idakun){
                      if($_SESSION['akundelcek'][$key]['cekbox'] == 1){
                        $varunset = 1;
                        break;
                      }
                    }
                    if($varunset==0){
                      unset($_SESSION['akundelcek']);
                    }
                  }
                  if(!isset($_SESSION['akundelcek'])){
                    echo "
                    <i class='bi bi-exclamation-circle-fill'></i>
                    Tidak ada akun yang dipilih.
                    ";
                  }
                ?>
              </div>
            </div>
              <?php
                include('functionhapusakunbatch.php');
              ?>
          </div>
          <div class="col-sm-9">
            <div class="row justify-content-auto">
              <div class="col-sm-1 text-start">
                <button type="button" name="" value="" id="btnAkunDel" class="btn btn-danger mb-2 text-end" data-bs-toggle="modal" data-bs-target="#modalDelete">Hapus</button>
              </div>
              <div class="col-sm-2">
                <a href="daftarakun.php"><button name="btnUnCek" class="btn btn-info">Kembali de daftar</button></a>
              </div>
              <div class="col-sm-9 text-end">
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
            </div>
            <div>
              <table class="table table-striped table-bordered">
                <tb>
                  <tr class="h6">
                    <td><input type="checkbox" id="btnCheckAll" class="btn btn-secondary">Pilih semua</button></td>
                    <td>Nama</td>
                    <td>Foto</td>
                    <td>Username</td>
                    <td>Email</td>
                    <td>Nomor hp</td>
                    <td>Id akun</td>
                    <td>Waktu bergabung</td>
                  </tr>
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
                    if($_SESSION['level']==1){
                      $akun = mysqli_query($koneksi,"SELECT * FROM akun WHERE NOT level = 1");
                      $getcmd = "SELECT * FROM akun WHERE NOT level = 1 ORDER BY nama ASC LIMIT $halamanAwal, $perHalaman";
                    }elseif($_SESSION['level']==2){
                      $akun = mysqli_query($koneksi,"SELECT * FROM akun WHERE level = 3");
                      $getcmd = "SELECT * FROM akun WHERE level = 3 ORDER BY nama ASC LIMIT $halamanAwal, $perHalaman";
                    }else{
                      header("Location:daftarmakanan.php");
                    }
                    $jumlahAkun = mysqli_num_rows($akun);
                    $totalHalaman = ceil($jumlahAkun / $perHalaman);
                    //asda
                    $getdata = mysqli_query($koneksi, $getcmd);
                    if(mysqli_num_rows($getdata)==0){
                      $message = "<div class='alert alert-warning' role='alert'><i class='bi bi-exclamation-circle-fill'></i> Tidak ada akun terdeteksi...</div>";
                    }else{
                      while($row= mysqli_fetch_array($getdata)){
                        ?>
                        <tr>
                          <td class="text-center">
                            <?php
                              if(isset($_SESSION['akundelcek'])){
                                $cekinsession = array_column($_SESSION['akundelcek'], "idakun");
                                $idforeach = $row['id'];
                                if(in_array($row['id'],$cekinsession)){
                                  foreach($cekinsession as $key=>$value){
                                    if($value==$row['id']){
                                      if($_SESSION['akundelcek'][$key]['cekbox']==1){
                                         echo "<input id='checkAkunBox' type='checkbox' name='akun_id[]' value='$idforeach' class='form-check-input' checked>";
                                         break;
                                      }else{
                                         echo "<input id='checkAkunBox' type='checkbox' name='akun_id[]' value='$idforeach' class='form-check-input'>";
                                         break;
                                      }
                                    }
                                  }
                                }else{
                                  echo "<input id='checkAkunBox' type='checkbox' name='akun_id[]' value='$idforeach' class='form-check-input'>";
                                }
                              }else{
                                ?>
                                <input id='checkAkunBox' type='checkbox' name='akun_id[]' value="<?php echo $row['id']; ?>" class='form-check-input'>

                                <?php
                              }
                            ?>
                          </td>
                          <td><?php echo $row['nama']; ?></td>
                          <td> <img src="img/<?php echo $row['gambar']; ?>" style="height: 50px;width: 50px;"></td>
                          <td><?php echo $row['username']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo $row['No_Hp']; ?></td>
                          <td><?php echo $row['id']; ?></td>
                          <td><?php echo $row['waktu_bergabung']; ?></td>

                        </tr>
                      <?php
                      }
                    }
                  ?>
                </tb>
              </table>
              <?php echo "<p class='text-center'>$halaman</p>" ;?>
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
    <script>
      $(document).ready(function(){
        $('*[id="checkAkunBox"]').on("change", function(){
          var check = 0;
          if(this.checked == true) check = 1;
          var value = this.value;
          $.post("functionselecthapusakun.php", { idakun : value, check : check }, function(data, status){
            if(status == "success"){
              $('#cekvalue').load("functionshowhapusakun.php");
            }
          });
          if(check == 0){
            $('#btnCheckAll').each(function(event) {
              this.checked = false;
            });
          }
        })
      });
    </script>
    <script>
      $('#btnCheckAll').click(function(event) {
        if(this.checked) {
            // Iterate each checkbox
            $('*[id="checkAkunBox"]').each(function() {
                this.checked = true;
                var check = 0;
                if(this.checked == true) check = 1;
                var value = this.value;
                $.post("functionselecthapusakun.php", { idakun : value, check : check }, function(data, status){
                  if(status == "success"){
                    $('#cekvalue').load("functionshowhapusakun.php");
                  }
                })
            });
        }else {
            $('*[id="checkAkunBox"]').each(function() {
                this.checked = false;
                var check = 0;
                if(this.checked == true) check = 1;
                var value = this.value;
                $.post("functionselecthapusakun.php", { idakun : value, check : check }, function(data, status){
                  if(status == "success"){
                    $('#cekvalue').load("functionshowhapusakun.php");
                  }
                })
            });
        }
      });
    </script>
    <script type="text/javascript">
      jQuery(function($) {
        $('#divAlert2').delay(3000).fadeOut(400);
      });
      $(document).ready(function(){
          // Number of rows selection
          $("#num_rows").change(function(){
              // Submitting form
              $("#form").submit();

          });
      });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>
