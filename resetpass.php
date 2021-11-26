<?php
  include("includes/koneksi.php");
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
            <div class = "card-body">
                <h2 class = "card-title text-center">RESET PASSWORD</h2>
                <?php include("functionresetpass.php");?>
            </div>
            <div class="card-text">
              <!--form ussername & password-->
              <form method="POST" action="">
                <div class="mb-4">
                  <label for="passbaru" class="form-label">Masukan password baru anda</label>
                  <input type="password" class="form-control" name="passbaru" id="passbaru">
                </div>
                <div class="d-grid gap-2">
                  <button name="btnPassBaru" type="submit" class="btn btn-primary">Reset Password</button>
                </div>
              </form>
              <p class="mt-5"><a href="login.php">Login</a></p>
            </div>
        </div>
     </div>

  </body>
</html>
