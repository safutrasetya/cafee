<?php require_once 'includes/koneksi.php';
 if(isset($_SESSION['meja'])){
   header ("Location:halamanmakanan.php");
 }
 include('includes/checkadminstaff.php');
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
    <link href = "css/login.css" rel = "stylesheet">
    <title>Login</title>
  </head>
  <body>
     <div class = "container">
        <div class = "card login-form">
            <div class = "card-header">
                <h1 class = "card-title text-center">LOGIN MEJA</h1>
                <?php include ("functionloginmeja.php");?>
            </div>
            <div class="card-body">
              <!--form ussername & password-->
                <form method="POST" action="">
              <div class="mb-4">
                <label for="idmeja" class="form-label">id Meja</label>
                <input type="text" class="form-control" name="idmejapost" id="idmeja">
              </div>
              <div class="mb-4">
                <label for="InputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" name="passmejapost" id="InputPassword">
              </div>
              <div class="d-grid gap-2">
            <button type="submit" name="btnLoginMeja" class="btn btn-primary">Login Meja</button>
            </div>
                </form>
                <p><a href="login.php">Login Staff</a></p>
            </div>
        </div>
     </div>

  </body>
</html>
