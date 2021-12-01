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
    $id = $_GET['idrsrvs'];

    $u = mysqli_query($koneksi,"SELECT * FROM mejareservasi WHERE id_reservasi=$id");
    $data = mysqli_fetch_assoc($u);
    $datetime = new DateTime($data['waktu_rsrvs']);
    $date = $datetime->format('Y-m-d');
    $time = $datetime->format('H:i:s');

     ?>
    <div class="container-fluid">
      <div class="container text-center ">
        <h1>Edit Reservasi</h1>
        <?php include('functioneditrsrvs.php'); ?>
      </div>
      <div class="container shadow p-3 mb-5 bg-body rounded isi">
        <form method="POST">
          <div class="row">
            <div class="col-sm-6">
              <div class="mb-3 mt-3 me-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" value= "<?php echo $data['nama_plggn'];?>" class="form-control" name="nama" id="nama" pattern="[a-zA-Z\s]{2,}" title="Nama hanya boleh terdiri oleh huruf saja"
                placeholder="Masukkan Nama" required>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="mb-3 mt-3 me-3">
                <label for="idrupdt" class="form-label">Id Reservasi</label>
                <input readonly id="idrupdt" name="idrupdt" value="<?php echo $data['id_reservasi'];?>" type="text" class="form-control">
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-sm-3">
              <div class="mb-3 mt-3 me-3">
                <label for="notelp" class="form-label">No.Hp</label>
                <input type="text" value= "<?php echo $data['no_telp'];?>" class="form-control" name="notelp" id="notelp" pattern="[0-9]{8,}" title="Nomor Hp/Telpon tidak valid"
                placeholder="cth. 081234567899" required>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3 mt-3 me-3">
                <label for="nomeja" class="form-label">Meja</label>
                <select class="form-select" name="nomeja" id="nomeja" aria-label="" required title="Pilih meja">
                  <?php
                    $cmdMeja = "SELECT * FROM meja";
                    $getMeja = mysqli_query($koneksi, $cmdMeja);

                    foreach($getMeja as $row){
                      if($data['no_meja']==$row['id_meja']){
                        ?><option selected value="<?php echo $row['id_meja'];?>"><?php echo $row['meja'];?></option>
                      <?php
                      }else{
                        ?><option value="<?php echo $row['id_meja'];?>"><?php echo $row['meja'];?></option>
                      <?php
                      }
                    }


                  ?>
                </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3 mt-3 me-3">
                <label for="date" class="form-label">Tanggal</label>
                <input value= "<?php echo $date;?>" type="date" name="date" id="date" class="form-control" required title="Pilih tanggal reservasi">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="mb-3 mt-3 me-3">
                <label for="time" class="form-label">Waktu</label>
                <input type="time" value= "<?php echo $time;?>" id="time" name="time" class="form-control" required title="Pilih waktu reservasi">
              </div>
            </div>
            <div class="text-end">
              <a href="daftarakun.php" onclick="return confirm('Anda yakin ingin keluar?')"><button type="button" class="btn btn-danger">Cancel</button></a>
              <button type="submit" name="btnRsrvs" value="submit" class="btn me-3 btn-success">Tambah!</button>
            </div>
          </div>
        </form>
      </div>
    </div>

  </body>
</html>
