<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <!-- Bootstrap  -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">

    <!-- css kita -->
    <link href = "css/halmakanan.css" rel = "stylesheet">
    <title>Halaman Makanan</title>
  </head>

  <body>
    <?php include("includes/koneksi.php"); include("includes/logincheck.php"); ?>
    <?php include("temp_navbar.php");?>
  <div class="jumbotron p-3 h-100" style="height: 750px;">
    <div class="jumbotron p-3 h-100" style="height: 750px;">
      <div class="jumbotron bg-light shadow-lg mx-auto p-5">
        <div class="mx-auto text-center mb-5" style="margin-top:-25px;">
          <h2 class="text-dark">Orari Restaurant</h2>
          <a href="functionlogout.php"><button class="btn btn-info" type="button" name="btnLogout">Temporary Logout Button</button></a>
      <div class="my-4 ps-3 shadow">
        <form class="row g-3">
          <div class="col-sm-3">
            <input type="text" class="form-control mb-2 mr-sm-2" placeholder"Search">
          </div>
          <button type="submit" class="btn btn-primary mb-2 col-sm-1">Search</button>
          <div class="col" style="margin-right: -500px">
          <button type="submit" class="btn btn-danger mb-2 col-sm-1">Selesai</button>
          </div>
        </form>
      </div>
  </div>

  <div class="tm-paging-links">
				<nav>
					<ul>
						<li class="tm-paging-item"><a href="halamanminuman.php" class="tm-paging-link">Minuman</a></li>
						<li class="tm-paging-item"><a href="halamanmakanan.php" class="tm-paging-link">Makanan</a></li>
						<li class="tm-paging-item"><a href="halamancemilan.php" class="tm-paging-link active">Cemilan</a></li>
            <li class="tm-paging-item"><a href="halamanpaket.php" class="tm-paging-link">Paket</a></li>
					</ul>
				</nav>
			</div>
<table >
  <tr>
    <td>
      <div class="card" style="width: 18rem;">
        <img src="img/menu_cemilan.jpg"class="card-img-top" alt="img/menu_Cemilan.jpg">
        <div class="card-body">
          <h5 class="card-title">Cemilan</h5>
          <p class="card-text">Rp. 12.000</p>
            <a href="#" class="btn btn-primary">+</a>
        </div>
      </div>
    </td>
    <td>
      <div class="card" style="width: 18rem;">
        <img src="img/menu_cemilan.jpg"class="card-img-top" alt="img/menu_Cemilan.jpg">
        <div class="card-body">
          <h5 class="card-title">Cemilan</h5>
          <p class="card-text">Rp. 12.000</p>
            <a href="#" class="btn btn-primary">+</a>
        </div>
      </div>
    </td>
    <td>
      <div class="card" style="width: 18rem;">
        <img src="img/menu_cemilan.jpg"class="card-img-top" alt="img/menu_Cemilan.jpg">
        <div class="card-body">
          <h5 class="card-title">Cemilan</h5>
          <p class="card-text">Rp. 12.000</p>
            <a href="#" class="btn btn-primary">+</a>
        </div>
      </div>
    </td>
    <td>
      <div class="card" style="width: 18rem;">
        <img src="img/menu_cemilan.jpg"class="card-img-top" alt="img/menu_Cemilan.jpg">
        <div class="card-body">
          <h5 class="card-title">Cemilan</h5>
          <p class="card-text">Rp. 12.000</p>
            <a href="#" class="btn btn-primary">+</a>
        </div>
      </div>
    </td>
  </tr>

  <tr>
    <td>
      <div class="card" style="width: 18rem;">
        <img src="img/menu_cemilan.jpg"class="card-img-top" alt="img/menu_Cemilan.jpg">
        <div class="card-body">
          <h5 class="card-title">Cemilan</h5>
          <p class="card-text">Rp. 12.000</p>
            <a href="#" class="btn btn-primary">+</a>
        </div>
      </div>
    </td>
    <td>
      <div class="card" style="width: 18rem;">
        <img src="img/menu_cemilan.jpg"class="card-img-top" alt="img/menu_Cemilan.jpg">
        <div class="card-body">
          <h5 class="card-title">Cemilan</h5>
          <p class="card-text">Rp. 12.000</p>
            <a href="#" class="btn btn-primary">+</a>
        </div>
      </div>
    </td>
    <td>
      <div class="card" style="width: 18rem;">
        <img src="img/menu_cemilan.jpg"class="card-img-top" alt="img/menu_Cemilan.jpg">
        <div class="card-body">
          <h5 class="card-title">Cemilan</h5>
          <p class="card-text">Rp. 12.000</p>
            <a href="#" class="btn btn-primary">+</a>
        </div>
      </div>
    </td>
    <td>
      <div class="card" style="width: 18rem;">
        <img src="img/menu_cemilan.jpg"class="card-img-top" alt="img/menu_Cemilan.jpg">
        <div class="card-body">
          <h5 class="card-title">Cemilan</h5>
          <p class="card-text">Rp. 12.000</p>
          <a href="#" class="btn btn-primary">+</a>
        </div>
      </div>
    </td>
  </tr>

</table>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
  </body>
</html>
