<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!--BOOSTRAP CSS AND CKEDITOR-->
    <link rel="stylesheet" href="css/sidebar.css">
    <link rel="stylesheet" href="css/navbar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  	<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">
    <!--END BOSTTSTRAP AND CKEDITOR-->
    <!--CSS KITA SENDIRI-->
    <link rel="stylesheet" href="css/akun.css">
    <link rel="stylesheet" href="css/cafee.css">
    <!--end css kita sendiri-->
    <title>cafee</title>
  </head>
  <body class="bg-light">
    <?php include("includes/koneksi.php"); include("includes/logincheck.php");
    $data = mysqli_query($koneksi,"SELECT * FROM akun ORDER BY id");
    ?>
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
            <div class="col-sm-6">
              <form>
                <div class="row">
                  <div class="col">
                    <input type="text" class="form-control my-2" placeholder="Cari Akun...">
                  </div>
                  <div class="col">
                    <button type="submit" class="btn btn-primary my-2">Search</button>
                  </div>
                  <div class="col" style="margin-right: -750px">
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
                  <thead class="h5">
                    <tr>
                      <td>Id</td>
                      <td>Nama</td>
                      <td>Email</td>
                      <td>No. Handphone</td>
                      <td>Action</td>
                    </tr>
                  </thead>
                  <tbody>
                    <?php while ($d = mysqli_fetch_array($data)){
                      ?>
                    <tr>
                      <td><?php echo $d['id'];?></td>
                      <td><img src="img/imgtest1.jpg" class="gambarsize1"></td>
                      <td><?php echo $d['email'];?></td>
                      <td><?php echo $d['No_Hp'];?></td>
                      <td>
                        <form action="#">
                          <input type="text" value="" hidden>
                          <a class="btn btn-success"><img src="img/edit-icon.png" style="height:20px; width:20px;"> Edit</a>
                          <a class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this item')" href="hapusakun.php?id=<?php echo $d['id'];?>"><img src="img/trash-can.png" style="height:20px; width:15px;"> Hapus</a>
                        </form>
                      </td>
                    </tr>
                    <?php
                      }
                    ?>
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
  </body>
</html>
