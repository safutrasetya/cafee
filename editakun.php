

<?php
  require_once("includes/staffcheck.php");
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Edit Profil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f6dcf461c1.js" crossorigin="anonymous"></script>

  <style>
  .header
  {
    margin-top: 50px;
    padding-top: 5px;
    padding-bottom: 5px;
  }
  .gambar
  {
    padding-top: 10px ;
    padding-bottom: 20px;
    padding-left: 20px;
  }

  .up
  {
    text-align: left;
    padding-left: 20px;
    margin-top: 5px;
    margin-bottom: 20px;

  }

  .fm
  {
    padding : 10px;
  }

  .editprofil
  {
      padding-left: 30px;
  }
  .tmbl
  {     float: right;
        padding-top: 50px;
        padding-bottom: 30px;
  }
  .isi{
    padding-left: 50px;
  }

  </style>
  </head>
  <body class="bg-light">
    <?php include("includes/koneksi.php"); include("includes/logincheck.php"); ?>
    <?php include("temp_sidebar.php");?>
    <?php
    $id = $_GET['id'];

    $u = mysqli_query($koneksi,"SELECT * FROM akun WHERE id=$id");
    $data = mysqli_fetch_assoc($u);
     ?>
    <div class="container-fluid">
      <div class="container text-center ">
        <h1>Edit Profil</h1>
      </div>
      <div class="container shadow p-3 mb-5 bg-body rounded isi">
      <div class="row">

          <div class="col-sm-3">
              <form action="functioneditakun.php" method="post" enctype="multipart/form-data">
                <input type="hidden" name="gambarLama" value="<?php echo $data['gambar'];?>">
              <div class="mb-3 mt-3 me-3">
                <label for="gambar" class="form-label">Foto Profil</label>
                <input type="file" class="form-control" name="gambar" id="gambar" onchange="loadfile(event)">
                <img id="preview" style="padding-top:30px;" width="250px" src="img/<?php echo $data['gambar']?>">
                <script type="text/javascript">
                  function loadfile(event){
                    var output = document.getElementById('preview');
                    output.src=URL.createObjectURL(event.target.files[0]);
                  }
                </script>
              </div>
            </div>
            <div class="px-5 pb-5 col-sm-9">
              <div class="isi mb-3 mt-3 me-3">
                  <input type="text" class="form-control" name="id" hidden value="<?php echo $data['id']; ?>">
              </div>
              <div class="isi mb-3 mt-3 me-3">
                  <label for="username" class="form-label">Username</label>
                  <input type="text" class="form-control" name="username" id="username" value="<?php echo $data['username']; ?>"required >
              </div>
              <div class="isi mb-3 mt-3 me-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" pattern="[a-zA-Z\s]{2,}" title="Nama hanya boleh terdiri oleh huruf saja"
                value="<?php echo $data['nama']; ?>" required>
              </div>
              <div class="isi mb-3 mt-3 me-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" id="email" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-z]{2,}$" title="Email tidak valid"
                value="<?php echo $data['email']; ?>" required>
              </div>
              <div class="isi mb-3 mt-3 me-3">
                <label for="nohp" class="form-label">No.Hp</label>
                <input type="text" class="form-control" name="No_Hp" id="nohp" pattern="[0-9]{10,}" title="Nomor HP hanya boleh diisi angka saja"
                value="<?php echo $data['No_Hp']; ?>" required>
              </div>
              <div class="isi mb-3 mt-3 me-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" pattern="{6-9}" title="Password harus 6-9 karakter"
                value="<?php echo $data['password'];?>"required>
              </div>
              <div class="isi mb-3 mt-3 me-3">
                <label for="Repassword" class="form-label">Re Enter Password</label>
                <input type="password" class="form-control" name="Repassword" id="Repassword" placeholder="Masukkan password" pattern="{6-9}" title="Password harus 6-9 karakter"
                value="<?php echo $data['password'];?>"required>
                <script type="text/javascript">
                var password = document.getElementById("password");
                var Repassword = document.getElementById("Repassword");

                function validatePassword(){
                  if(password.value != Repassword.value) {
                    Repassword.setCustomValidity("Passwords tidak sesuai");
                  } else {
                    Repassword.setCustomValidity('');
                  }
                }

                password.onchange = validatePassword;
                Repassword.onkeyup = validatePassword;
                </script>
              </div>
              <div class="text-end me-3">
                <button type="reset" class="btn btn-danger" name="reset">Reset</button>
                <button type="submit" class="btn btn-success" value="submit" name="submit">Save</button>
              </div>
            </form>
          </div>

      </div>


      </div>
      </div>
    </div>

  </body>
</html>
