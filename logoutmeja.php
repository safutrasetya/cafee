<?php require_once 'includes/koneksi.php';
 if(isset($_SESSION['nama'])){
   header ("Location:daftarmenu.php");
 }
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <!-- css kita -->
    <link href = "css/logout.css" rel = "stylesheet">
    <title>Logout</title>
  </head>
  <body>

     <div class = "container">
        <div class = "card login-form">
            <div class = "card-body">
                <h1 class = "card-title text-center">Logout meja</h1>
                <h3 class="text-center">Meja : <?php echo $_SESSION['meja'];?></h6>
                <?php include ("functionlogoutmeja.php");?>
            </div>
            <div class="card-text">
              <!--form ussername & password-->
              <form method="POST" action="">
                <div class="mb-4">
                  <label for="InputPassword" class="form-label">Password meja</label>
                  <input type="password" class="form-control" name="passlogout" id="InputPassword" placeholder="Masukan password meja">
                </div>
                <div class="d-grid gap-2">
                  <button name="btnLogoutM" type="submit" class="btn btn-danger">Logout</button>
                </div>
              </form>
              <p><a href="halamanmakanan.php"><button class="btn btn-outline-light mt-2">Kembali</button></a></p>
            </div>
        </div>
     </div>

  </body>
</html>













    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  </body>
</html>
