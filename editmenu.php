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
    <title>Edit Menu</title>
  </head>
  <body class="bg-light">1
    <?php include("includes/koneksi.php"); include("includes/logincheck.php"); ?>>
    <?php include("temp_sidebar.php");?>
    <?php
    $id_menu = $_GET['id'];
    $sql = mysqli_query($koneksi,"SELECT * FROM menu WHERE id_menu='$id_menu'");
    $data = mysqli_fetch_assoc($sql);
     ?>
     <div class="container-fluid">
       <div class="container bg-info text-center header ">
         <h1>Edit Menu</h1>
       </div>
        <div class="container shadow p-3 mb-5 bg-body rounded isi">
          <div class="row">
              <div class="col-sm-3">
                <form action="functioneditmenu.php" method="post" enctype="multipart/form-data">
                      <input type="hidden" name="gambarLama" value="<?php echo $data['gambar'];?>" >
                  <div class="mb-3 mt-3 me-3">
                    <label for="gambarmenu" class="form-label">Gambar Menu</label>
                    <input type="file" class="form-control" name="gambar" id="gambar" onchange="loadfile(event)" required>
                    <img id="preview" style="padding-top:30px;" width="250px" src="img/<?php echo $data['gambar']?>">
                     <script type="text/javascript">
                       function loadfile(event){
                         var output = document.getElementById('preview');
                         output.src=URL.createObjectURL(event.target.files[0]);
                       }
                      </script>
                  </div>
                  <div class="mb-3 mt-5 me-3">
                    <label for="ketersediaanmenu" class="form-label">Ketersediaan</label>
                    <?php if($data['ketersidiaan']>=1){
                      echo"<input type='radio' id='ada' name='ketersidiaan' value='1' checked required>
                      <label for='ada' class='form-label'>Ada</label>
                      <input type='radio' id='habis' name='ketersidiaan' value='0' >
                      <label for='habis' class='form-label' value='0'>Habis</label>";
                      }elseif($data['ketersidiaan']==0){
                      echo "<input type='radio' id='ada' name='ketersidiaan' value='1'>
                      <label for='ada' class='form-label'>Ada</label>
                      <input type='radio' id='habis' name='ketersidiaan' value='0' checked required >
                      <label for='habis' class='form-label' value='0'>Habis</label>";
                      }?>
                  </div>
                </div>
                <?php
                  if($_SESSION['level']==1){
                    echo '
                    <div class="p-5 col-sm-9">
                      <div class="mb-3 mt-3 me-3">
                        <input type="text" class="form-control" name="id" hidden value="';?><?php echo $data['id_menu']; ?><?php echo'">
                        <label for="namamenu" class="form-label">Nama Menu</label>
                        <input type="text" class="form-control" name="nama_menu" id="nama_menu" value="';?><?php echo $data['nama_menu']; ?><?php echo'" required>
                      </div>
                      <div class="row">
                        <div class="isi mb-3 mt-3 me-3">
                          <div class="mb-3 me-3">
                            <label for="infomenu" class="form-label">Info Menu</label>
                            <input type="text" class="form-control" name="info_menu" id="info_menu" value="';?><?php echo $data['info_menu']; ?><?php echo'" required>
                          </div>
                        </div>
                        <div "isi mb-3 mt-3 me-3">
                          <div class="mb-3 me-3">
                            <label for="hargamenu" class="form-label">Harga</label>
                            <input type="text" class="form-control" name="harga" id="harga" value="';?><?php echo $data['harga']; ?><?php echo'" required>
                          </div>
                        </div>
                      </div>
                      <div class="mb-3 mt-5 me-3">
                        <label for="Tipmenu" class="form-label">Tipe Menu : </label>';?>
                      <?php  if($data['kategori']==1){ ?><?php echo'
                        <input type="radio" id="makanan" name="kategori" value="1" checked required>
                        <label for="menu" class="form-label">Makanan</label>
                        <input type="radio" id="minuman" name="kategori" value="2">
                        <label for="minuman" class="form-label" value="2">Minuman</label>
                        <input type="radio" id="cemilan" name="kategori" value="3">
                        <label for="cemilan" class="form-label" value="3">Cemilan</label>
                        <input type="radio" id="paket" name="kategori" value="4">
                        <label for="paket" class="form-label" value="4" >Paket</label>
                      ';?><?php }elseif ($data['kategori']==2) { ?><?php echo'
                        <input type="radio" id="menu" name="kategori" value="1">
                        <label for="menu" class="form-label">Makanan</label>
                        <input type="radio" id="minuman" name="kategori" value="2" checked required>
                        <label for="minuman" class="form-label" value="2">Minuman</label>
                        <input type="radio" id="cemilan" name="kategori" value="3">
                        <label for="cemilan" class="form-label" value="3">Cemilan</label>
                        <input type="radio" id="paket" name="kategori" value="4">
                        <label for="paket" class="form-label" value="4" >Paket</label>
                      ';?><?php }elseif ($data['kategori']==3) { ?><?php echo'
                        <input type="radio" id="menu" name="kategori" value="1">
                        <label for="menu" class="form-label">Makanan</label>
                        <input type="radio" id="minuman" name="kategori" value="2">
                        <label for="minuman" class="form-label" value="2">Minuman</label>
                        <input type="radio" id="cemilan" name="kategori" value="3" checked required>
                        <label for="cemilan" class="form-label" value="3">Cemilan</label>
                        <input type="radio" id="paket" name="kategori" value="4">
                        <label for="paket" class="form-label" value="4" >Paket</label>
                      ';?><?php  }elseif ($data['kategori']==4) { ?><?php echo'
                        <input type="radio" id="menu" name="kategori" value="1">
                        <label for="menu" class="form-label">Makanan</label>
                        <input type="radio" id="minuman" name="kategori" value="2">
                        <label for="minuman" class="form-label" value="2">Minuman</label>
                        <input type="radio" id="cemilan" name="kategori" value="3">
                        <label for="cemilan" class="form-label" value="3">Cemilan</label>
                        <input type="radio" id="paket" name="kategori" value="4" checked required>
                        <label for="paket" class="form-label" value="4" >Paket</label>
                      ';?><?php  }?><?php echo'

                      </div>
                      <div class="text-end me-3">
                        <a href="daftarmenu.php"><button type="button" class="btn btn-danger">Cancel</button></a>
                        <button type="submit" class="btn btn-success">Save!</button>
                      </div>
                    <form>
                  </div>


                    ';
                  }


                ?>


          </div>
        </div>
      </div>
    </div>
    <!-- SCRIPT modal -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- SCRIPT MODAL END -->
    <!-- WYSIWYG untuk editor sinopsis -->

  </body>
</html>
