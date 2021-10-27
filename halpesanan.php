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
    <title>Admin : Author</title>
  </head>
  <body class="bg-light">
    <div class="jumbotron p-3 h-100" style="height: 750px;">
      <div class="jumbotron bg-light shadow-lg mx-auto p-5" style="height: 750px;">
        <div class="mx-auto text-center mb-5" style="margin-top:-25px;">
          <h2 class="text-light">Sudah yakin dengan pesanan anda?</h2>
        </div>
        <div class="my-4 ps-3 shadow">
          <form class="row g-3">
            <div class="col-sm-3">
              <input type="text" class="form-control mb-2 mr-sm-2" placeholder"Search">
            </div>
            <button type="submit" class="btn btn-primary mb-2 col-sm-1">Search</button>
          </form>
        </div>
        <div class="row">
          <div class="col-sm-8">
            <div class="overflow-auto scrollpesanan" >
              <div class="card shadow my-2">
                <div class="card-body text-center">
                    <div class="row">
                      <div class="col-sm-2 align-self-center">
                        <img src="img/imgtest1.jpg" class="gambarsize1">
                        <a href="#" class="stretched-link"></a>
                      </div>
                      <div class="col-sm-4 align-self-center">
                        <p class="font1">H E L P</p>
                      </div>
                      <div class="col-sm-2 align-self-center">
                        <button>-</button><input style="width:25px;" type="text"><button>+</button>
                      </div>
                      <div class="col-sm-3 align-self-center">
                        <p>Rp. 500.000,-</p>
                      </div>
                      <div class="col-sm-1 align-self-center">
                        <button class="btn-close"></button>
                      </div>
                    </div>
                </div>
              </div>
              <?php
                for($i=0;$i<6;++$i){
                  echo "<div class='card shadow my-2'>
                    <div class='card-body text-center'>
                        <div class='row'>
                          <div class='col-sm-2 align-self-center'>
                            <img src='img/imgtest1.jpg' class='gambarsize1'>
                            <a href='#' class='stretched-link'></a>
                          </div>
                          <div class='col-sm-4 align-self-center'>
                            <p class='font1'>H E L P</p>
                          </div>
                          <div class='col-sm-2 align-self-center'>
                            <button>-</button><input style='width:25px;' type='text'><button>+</button>
                          </div>
                          <div class='col-sm-3 align-self-center'>
                            <p>Rp. 500.000,-</p>
                          </div>
                          <div class='col-sm-1 align-self-center'>
                            <button class='btn-close'></button>
                          </div>
                        </div>
                    </div>
                  </div>";
                }
               ?>
              <!-- AAAAAAAAA-->

              <!--AAAAAAAAAAAAAAaaa-->
            </div>
          </div>
          <div class="col-sm-4">
            <div class="card shadow">
              <div class="card-body">
                <p class="text-center">Jumlah harga</p>
                <table class="table text-left">
                  <thead>
                    <tr>
                      <td>Nama Makanan/Minuman</td>
                      <td>Harga</td>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>TEST NAMA MAKAN <br>10x</td>
                      <td class="text-center">Rp. 200.000,-</td>
                    </tr>
                    <tr>
                      <td>Total</td>
                      <td class="text-center">Rp. 200.000,-</td>
                    </tr>
                  </tbody>
                </table>
                <div class="row">
                  <div class="col-sm-6">
                    <button class="btn btn-danger">Kembali</button>
                  </div>
                  <div class="col-sm-6 text-end">
                    <button class="btn btn-primary px-4">Pesan!</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
  </body>
</html>
