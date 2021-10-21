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
                <h1 class = "card-title text-center">LOGIN</h1>
            </div>
            <div class="card-text">
              <!--form ussername & password-->
                <form>
              <div class="mb-4">
                <label for="ussername" class="form-label">Ussername</label>
                <input type="text" class="form-control" id="ussername">
              </div>
              <div class="mb-4">
                <label for="InputPassword" class="form-label">Password</label>
                <input type="password" class="form-control" id="InputPassword">
              </div>  
              <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Submit</button>
            </div>
                </form>
                <p>belum punya akun? <a href="daftar.php">Daftar disini</a></p>
            </div>
        </div>
     </div>

  </body>
</html>
