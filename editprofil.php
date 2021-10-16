<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f6dcf461c1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/editprofil.css">
  </head>
  <body class="bg-light">
    <div class="container-fluid">
      <div class="container bg-info text-light text-center header">
        <h1>Edit Profil</h1>
      </div>
      <div class="container bg-warning text light isi">
        <div class="row">
          <div class="col-md-12">
            <div class="exitbutton">
              <button type="button" class="btn btn-outline-light active" name="exit"><i class="fas fa-door-open"></i></button>
            </div>
          </div>
          <div class="col-md-4">
          <div class="container gambar">
          <img src="img/pfp1.jpg" alt="Foto Profil" class="rounded-circle" width="200px" height="200px">
        </div>
      </div>
      <div class="col-md-6">
        <div class="container up">
          <form action="upload.php" method="post" enctype="multipart/form-data">
            Pilih Gambar :
          <input type="file" name="fileToUpload" id="fileToUpload">
          <input type="submit" value="Upload Gambar" name="submit">
        </form>
        </div>
      </div>
      <div class="col-md-12">
        <div class="container editprofil">
          <form>
            <div class="form-group">
              <div class="row fm">
                <div class="col-md-2">
                  <label for="inputNama">Nama</label>
                </div>
                <div class="col-md-6 inpt">
                  <input type="text" id="inputNama"name="nama"class="form-control" placeholder="Masukkan Nama">
                </div>
              </div>
            </div>
            <div class="form-group">
              <div class="row fm">
                <div class="col-md-2">
                  <label for="inputEmail">Email</label>
                </div>
                <div class="col-md-6 inpt">
                  <input type="text" id="inputEmail" name="email"class="form-control" placeholder="Masukkan Email">
                </div>
              </div>
              </div>
              <div class="row fm">
                <div class="col-md-2">
                  <label for="inputNoHp">No Hp</label>
                </div>
                <div class="col-md-6 inpt">
                  <input type="text" id="inputNoHp" name="noHp"class="form-control" placeholder="Masukkan No Hp">
                </div>
              </div>
              <div class="row fm">
                <div class="col-md-2">
                  <label for="inputPassword">Password</label>
                </div>
                <div class="col-md-6 inpt">
                  <input type="password" id="inputPassword" name="password"class="form-control" placeholder="Masukkan Password">
                </div>
              </div>
              <div class="row fm">
                <div class="col-md-2">
                  <label for="inputReEnter">Re Enter Password</label>
                </div>
                <div class="col-md-6 inpt">
                  <input type="password" id="inputReEnter" name="reEnter"class="form-control" placeholder="Masukkan ulang Password">
                </div>
              </div>
              <div class="row tmbl">
                <div class="col-md-12">
                  <button type="reset" class="btn btn-danger" name="reset">Reset</button>
                  <button type="submit" class="btn btn-success"name="submit">Save</button>
                </div>
              </div>
            </div>
          </form>

        </div>

      </div>


      </div>
      </div>
    </div>

  </body>
</html>
