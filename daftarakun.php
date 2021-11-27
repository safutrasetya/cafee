<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--BOOSTRAP CSS AND CKEDITOR-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f6dcf461c1.js" crossorigin="anonymous"></script>

    <!--END BOSTTSTRAP AND CKEDITOR-->
    <!--CSS KITA SENDIRI-->
    <link rel="stylesheet" href="css/akun.css">
    <link rel="stylesheet" href="css/cafee.css">
    <!--end css kita sendiri-->
    <title>cafee</title>
  </head>
  <body class="bg-light">
    <?php include("includes/koneksi.php"); include("includes/logincheck.php");include("includes/admincheck.php");?>
    <?php include("temp_sidebar.php");?>
    <div class="jumbotron p-3 h-100" style="height: 750px;">
      <div class="jumbotron bg-light shadow-lg mx-auto p-5">
        <div class="mx-auto text-center mb-5" style="margin-top:-25px;">
          <h2 class="text-dark">Daftar Akun</h2>
          <a href="functionlogout.php"><button class="btn btn-info" type="button" name="btnLogout">Temporary Logout Button</button></a>
        </div>
        <div class="my-4 ps-3 shadow">
          <div class="row">
            <div class="col-sm-2">
            </div>
            <div class="col">
              <form action="" method="POST">
                <div class="row">
                  <!-- <div class=""> -->
                    <!-- <a href="cariAkun.php"><button type="button" class="btn btn-outline-primary float-end my-2"><i class="bi bi-search"></i> Cari</button></a>
                  </div> -->
                  <div class="col-sm-4" style="margin-left:320px;margin-top:7px;">
                    <input type="text" name="keyword" class="form-control my-2" placeholder="Masukkan ID/Username/Nama..." autocomplete="off">
                  </div>
                  <div class="col-sm-2" style="margin-top:0px;padding:5px;">
                    <input type="submit" name="cari" class="btn btn-primary my-2 form-control" value="Cari">
                  </div>
                  <div class="col text-end" style="margin-right:5px;">
                  <a href="tambahakun.php"><button type="button" class="btn btn-success my-2"><img src="img/tambahakun-icon2.png" style="height:30px; width:30px;"> Tambah akun</button></a>
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
            <div class="shadow">
              <div class="body">
                <!-- <ul class="pagination pagination-sm justify-content-center">
                  <li class="page-item"><a class="page-link" href="#">Previous</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">Next</a></li>
                </ul> -->
                <table class="table table-bordered table-info">
                  <thead class="h5">
                    <tr style="text-align:center">
                      <td>Id</td>
                      <td>Foto</td>
                      <td>Username</td>
                      <td>Nama</td>
                      <td>Email</td>
                      <td>No. Handphone</td>
                      <td>Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                        $perHalaman = 6;
                        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman']  : 1;
                        $halamanAwal = ($halaman>1) ? ($halaman * $perHalaman) - $perHalaman : 0;

                        $prev = $halaman - 1;
                        $next = $halaman + 1;

                        $akun = mysqli_query($koneksi,"SELECT * FROM akun");
                        $jumlahAkun = mysqli_num_rows($akun);
                        $totalHalaman = ceil($jumlahAkun / $perHalaman);

                        if(!isset($_POST['cari'])){
                          $akuns = mysqli_query($koneksi,"SELECT * FROM akun LIMIT $halamanAwal, $perHalaman");
                        }elseif(isset($_POST['cari'])){
                          $cari = $_POST['keyword'];
                          $akuns = mysqli_query($koneksi,"SELECT * FROM akun WHERE nama LIKE '%$cari%' OR
                                   username LIKE '%$cari%' LIMIT $halamanAwal,$perHalaman");
                        }
                        while($d = mysqli_fetch_assoc($akuns)){
                     ?>
                    <tr>
                      <td><?php echo $d['id'];?></td>
                      <td><img src="img/<?php echo $d['gambar']?>" class="gambarsize1"></td>
                      <td><?php echo $d['username'] ?></td>
                      <td><?php echo $d['nama'] ?></td>
                      <td><?php echo $d['email'];?></td>
                      <td><?php echo $d['No_Hp'];?></td>
                      <td>
                        <form action="#">
                          <input type="text" value="" hidden>
                          <a href="editprofil.php?id=<?php echo $d['id'];?>"class="btn btn-success"><img src="img/edit-icon.png" style="height:20px; width:20px;"> Edit</a>
                          <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this account?')" href="functionhapusakun.php?id=<?php echo $d['id'];?>"><img src="img/trash-can.png" style="height:20px; width:15px;"> Hapus</a>
                        </form>
                      </td>
                    </tr>
                  <?php  } ?>
                       <!-- for($i=0;$i<6;++$i){
                         echo "<tr>
                          <td>1</td>
                           <td><img src='img/imgtest1.jpg' class='gambarsize1'></td>
                           <td>User1@gmail.com</td>
                           <td>08237794698</td>
                         <td>
                             <form action='#'>
                               <input type='text' value='' hidden>
                               <button class='btn btn-success'><img src='img/edit-icon.png' style='height:20px; width:20px;'> Edit</button>
                               <button class='btn btn-danger'><img src='img/trash-can.png' style='height:20px; width:15px;'> Hapus</button>
                             </form>
                           </td>
                         </tr>";
                       }
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
                    </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!-- <script>
      $(document).ready(function(){
        load_data(1);
        function load_data(page, query = ''){
          $.ajax({
            url:"functioncari.php",
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

    </script> -->
  </body>
</html>
