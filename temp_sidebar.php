<link rel="stylesheet" href="css/sidebar.css">
<link rel="stylesheet" href="css/navbar.css">
<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-uWxY/CJNBR+1zjPWmfnSnVxwRheevXITnMqoEIeG1LJrdI0GlVs/9cVSyPYXdcSF" crossorigin="anonymous">


<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container-fluid">
  <a href="halamanmakanan.php" class="link-dark" class="fs-4" style="text-decoration: none; font-size: 20px; margin-top: 6px; margin-right: 10px" ><img src="img/img1.png" alt="" width="35" height="35" style ="margin-right: 10px" class="rounded-circle">Home</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <!-- <li class="nav-item">
            <a class="navbar-brand" href="#" style ="" href="halamanmakanan.php" style="margin-right: 15px">Home</a>
        </li> -->
        <li class="nav-item">
            <a class="aboutus.php" style ="text-decoration: none; font-size: 20px; margin-top: 6px; margin-left: 10px; color: black" href="aboutus.php" class="fs-4" >About Us</a>
        </li>
      </ul>
      <div style ="margin-top: "><a href="halpesanan.php">
<svg xmlns="http://www.w3.org/2000/svg"
width="25"
height="25"
fill="black"
class="bi bi-cart"
viewBox="0 0 16 16">
  <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .491.592l-1.5 8A.5.5 0 0 1 13 12H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l1.313 7h8.17l1.313-7H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg></a></div>
    <div class="dropdown">
        <button class="btn btn-white dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
        <a href="aboutus.php"><img src="img/img1.png" alt="" width="35" height="35" style ="margin-right: " class="rounded-circle"></a>
        </button>
        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
          <li><a class="dropdown-item" href="profil.php">Profil</a></li>
          <li><a class="dropdown-item" href="daftarakun.php">Admin</a></li>
          <li><a class="dropdown-item" href="functionlogout.php">Logout</a></li>
        </ul>
    </div>
    </div>
  </div>
</nav>
<div class="second" style ="margin-top: 40px">
    <input type="checkbox" id="check">
    <label for="check">
        <i class="fas fa-bars" id="btn"></i>
        <i class="fas fa-times" id="cancel"></i>
    </label>
    <div class="sidebar">
        <div class="head">
          <header>Cafe</header>
        </div>
        <ul>
            <li><a href="editprofil.php"><i class="far fa-address-card"></i>
              <i class='no-italics'>Edit Akun</i></a></li>
            <li><a href="daftarakun.php"><i class="far fa-address-book"></i>
              <i class='no-italics'>Daftar Akun</i></a></li>
            <li><a href="daftarmenu.php"><i class="far fa-clipboard"></i>
              <i class='no-italics'>Daftar Makanan</i></a></li>
            <li><a href="daftarpesanan.php"><i class="far fa-list-alt"></i>
              <i class='no-italics'>Daftar Pesanan</i></a></li>
            <li><a href=""><i class="far fa-calendar-alt"></i>
              <i class='no-italics'>Riwayat Pemesanan</i></a></li>
            <li><a href=""><i class="far fa-square"></i>
              <i class='no-italics'>Daftar Meja</i></a></li>
            <li><a href="functionlogout.php"><i class="fas fa-sign-out-alt"></i>
              <i class='no-italics'>Log Out</i></a></li>
        </ul>
    </div>
    </div>
