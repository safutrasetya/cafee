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
    <title>Tambah Menu</title>
    <script type="text/javascript">

        // function validate(){
        //     if (document.myForm.nama.value == NULL){
        //       alert("Nama harus diisi");
        //       document.myForm.nama.focus();
        //       return false
        //     }
        // }
       // function validasi()
      // {
      //    var nama = document.myForm.nama.value;
      //    var password = document.myForm.password.value;
      //    if (name==null || name=" "){
      //      alert("Nama tidak boleh kosong");
      //      return false;
      //    }else if(password.length > 8 || password.length < 6 ){
      //      alert("Password minimal 6 digit dan maksimal 8 digit")
      //    }
      //  }
      //   var noHp = document.getElementById('nohp').value;
      //   var nama = document.getElementById('nama').value;
      //
      //   // var noHp=document.forms["akun"]["nohp"].value;
      //   var nomor =/^[0-9]+$/;
      //   // var nama=document.forms["akun"]["nama"].value;
      //
      //   if(noHp==null || noHp="")
      //   {
      //     alert("Nomor Handphone tidak boleh kosong !");
      //     return false;
      //   }
      //
      //   if(!noHp.match(nomor)){
      //     alert("Nomor Hp harus angka !");
      //     return false;
      //   }
      //   if(noHp.lenth!=12){
      //     alert("Nomor Hp harus 12 digit angka !");
      //     return false;
      //   }
      //   if(nama.match(nomor)){
      //     alert("Nama tidak boleh ada angka !");
      //     return false;
      //   }
    // }
    </script>
  </head>
  <body class="bg-light">
    <?php include("includes/koneksi.php"); include("includes/logincheck.php");

    ?>
    <div class="jumbotron p-3 h-100" style="height: 750px;">
      <div class="jumbotron bg-light shadow-lg mx-auto p-5">
        <div class="mx-auto text-center mb-5" style="margin-top:-25px;">
          <h2 class="text-dark">Tambah Akun</h2>
        </div>
        <div class="my-4 ps-3 pb-3 shadow">
          <div class="row">

              <div class="col-sm-3">
                  <form action="functiontambahakun.php" method="post">
                  <div class="mb-3 mt-3 me-3">
                    <label for="gambar" class="form-label">Foto Profil</label>
                    <input type="file" class="form-control" name="gambar" id="gambar">
                  </div>
                  <div class="mb-3 mt-5 me-3">
                    <label for="ketersediaanmenu" class="form-label">Level</label>
                    <input type="radio" id="admin" name="level" value="1">
                    <label for="admin" class="form-label">Admin</label>
                    <input type="radio" id="staff" name="level" value="2">
                    <label for="staff" class="form-label">Staff</label>
                  </div>
                </div>
                <div class="col-sm-9">
                  <div class="mb-3 mt-3 me-3">
                      <label for="username" class="form-label">Username</label>
                      <input type="text" class="form-control" name="username" id="username" placeholder="Masukkan Username"required >
                  </div>
                  <div class="mb-3 mt-3 me-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="nama" id="nama" pattern="[a-zA-Z][a-zA-z]{2,}" title="Nama hanya boleh terdiri oleh huruf saja"
                    placeholder="Masukkan Nama" required>
                  </div>
                  <div class="mb-3 mt-3 me-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Email tidak valid"
                    placeholder="cth. contoh@test.om" required>
                  </div>
                  <div class="mb-3 mt-3 me-3">
                    <label for="nohp" class="form-label">No.Hp</label>
                    <input type="text" class="form-control" name="No_Hp" id="nohp" pattern="[0-9]{10,}" title="Nomor HP hanya boleh diisi angka saja"
                    placeholder="cth. 081234567899" required>
                  </div>
                  <div class="mb-3 mt-3 me-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" name="password" id="password" placeholder="Masukkan password" pattern="{8}" title="Password harus 8 karakter"
                    required>
                  </div>
                  <div class="text-end me-3">
                    <a href="daftarakun.ph" onclick="return confirm('Anda yakin ingin keluar?')"><button type="button" class="btn btn-danger">Cancel</button></a>
                    <button type="submit" name="submit" value="submit" class="btn btn-success">Tambah!</button>
                  </div>
                </form>
              </div>

          </div>
        </div>
      </div>
    </div>
    <!-- SCRIPT modal -->
  </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- SCRIPT MODAL END -->
    <!-- WYSIWYG untuk editor sinopsis -->

</html>
