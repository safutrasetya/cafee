<!DOCTYPE html>
<html>
<head>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/f6dcf461c1.js" crossorigin="anonymous"></script>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<style>
.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  max-width: 300px;
  margin: auto;
  text-align: center;
  font-family: arial;
}

.title {
  color: grey;
  font-size: 18px;
}

.button {
  margin-bottom: -20px;
  border: none;
  outline: 0;
  display: inline-block;
  padding: 5px;
  color: white;
  background-color: green;
  text-align: center;
  cursor: pointer;
  width: 100%;
  font-size: 18px;
}

.link {
  text-decoration: none;
  font-size: 22px;
  color: black;
  /* a */
}

button:hover, a:hover {
  opacity: 0.7;
}
</style>
</head>
<body class="bg-light">
  <?php include("includes/koneksi.php"); include("includes/logincheck.php"); ?>
  <?php include('temp_sidebar.php');
  $id = $_SESSION['id'];

  $query = mysqli_query($koneksi,"SELECT * FROM akun WHERE id = '$id'");
  $sql= mysqli_fetch_assoc($query);
  ?>
<div class="container-fluid mt-5">
<h2 style="text-align:center">Profil</h2>
<div class="card">
<img src="img/<?php echo $sql['gambar'];?>" alt="User" style="width:100%">
  <h1 style="padding-top:15px"><?php echo $sql['nama']; ?></h1>
  <p class="title"><?php echo $sql['No_Hp']; ?></p>
  <p><?php echo $sql['email']; ?></p>
  <div class="button">
    <a href="editprofil.php?id=<?= $_SESSION['id']?>"><button class="button">Edit</button></a>
  </div>
</div>
</div>

</body>
</html>
