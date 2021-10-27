<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Halaman Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/f6dcf461c1.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/profil.css">
  </head>
  <body class="bg-light">
    <?php include('temp_navbar.php'); ?>
    <div class="container-fluid">
      <div class="container bg-info text-light text-center header">
      <h1>Profil</h1>
    </div>
    <div class="container bg-warning info">
      <div class="row">
        <div class="col-md-12">
          <div class="exitbutton">
            <button type="button" class="btn btn-outline-light active" name="exit"><i class="fas fa-door-open"></i></button>
          </div>
        </div>
      <div class="col-md-4">
      <div class="container image">
        <img src="img/pfp1.jpg" alt="profile" class="rounded-circle" width="200px" height="200px">
      </div>
    </div>
    <div class="col-md-6">
      <div class="container text-white isi">
          <table>
            <tr>
              <td>Nama </td><td>: Budi Budiman</td>
            </tr>
            <tr>
              <td>Email</td><td>: budibudi@gmail.com</td>
            </tr>
            <tr>
              <td>No Hp</td><td>: 08xx-xxxx-xxxx</td>
            </tr>
          </table>
      </div>
    </div>
    </div>
    <div class="tombol">
      <button type="button" class="btn btn-outline-success" name="edit">Edit</button>
    </div>
    </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kQtW33rZJAHjgefvhyyzcGF3C5TFyBQBA13V1RKPf4uH+bwyzQxZ6CmMZHmNBEfJ" crossorigin="anonymous"></script>
  </body>
</html>
