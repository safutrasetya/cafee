<?php

require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");


$ketersidiaan = $_POST['ketersidiaan'];
$nama_menu = $_POST['nama_menu'];
$info_menu = $_POST['info_menu'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];

$gambar = upload();

// $query = "INSERT INTO akun (gambar,username,nama,email,No_Hp,password,level) VALUES
//           ('$gambar','$username','$nama','$email','$NoHp','$password','$level')";
//
// $hasil = mysqli_query($koneksi,$query);



if(!empty($gambar)){

  $sql = "SELECT * FROM menu WHERE nama_menu = '{$nama_menu}'";
  $query = mysqli_query($koneksi, $sql);
  $count = mysqli_num_rows($query);


  if(!empty($nama_menu)){

      if($count==0){

          $sql = "INSERT INTO menu (gambar,ketersidiaan,nama_menu,info_menu,harga,kategori) VALUES
                    ('$gambar','$ketersidiaan', '$nama_menu','$info_menu','$harga','$kategori')";

          if($koneksi->query("$sql")===TRUE){
            $akibat=$nama_menu;
            $nama = $_SESSION['nama'];
            $startdate = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
            $start_date = $startdate->format('Y-m-d H:i:s');
            $history = "INSERT INTO history (pelaku,aksi,akibat,waktu) VALUES ('$nama','Penambahan Menu','$akibat','$start_date')";
            mysqli_query($koneksi, $history);
              echo "<h3>Input menu berhasil</h3>";

          }else{
              echo "Terjadi Kesalahan: " .$sql."<br/>".$koneksi->error;

          }
          $koneksi->close();

      }else {
          echo "
            <script>
            alert('Menu tersebut sudah ada. Masukan menu dengan nama yang lain');
            document.location.href = 'tambahmenu.php';
            </script>
            ";
      }

  }

  echo "
    <script>
    alert('Menu berhasil ditambahkan!');
    document.location.href = 'daftarmenu.php';
    </script>
    ";
}else{
  echo"
    <script>
    alert('Menu gagal ditambahkan!');
    document.location.href = 'tambahmenu.php';
    </script>
    ";
}

function upload(){
  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  //Cek ekstensi
  if( $error === 4){
    echo "<script>
            alert('Pilih gambar terlebih dahulu');
          </script>";
          return false;
  }
  $ekstensiGambarValid = ['jpg','jpeg','png'];
  $ekstensiGambar = explode('.',$namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
  if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
    echo "<script>
            alert('Yang Anda upload bukan gambar');
          </script>";
          return false;
  }
  //Cek size
  if($ukuranFile > 1000000){
    echo "<script>
            alert('Ukuran gambar terlalu besar');
          </script>";
          return false;
  }

  //Siap diupload
  //Generate nama file baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;
  move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

  return $namaFileBaru;
}


 ?>
