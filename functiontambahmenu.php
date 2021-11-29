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



if(!empty($gambar))
{
  $query = "INSERT INTO menu (gambar,ketersidiaan,nama_menu,info_menu,harga,kategori) VALUES
            ('$gambar','$ketersidiaan', '$nama_menu','$info_menu','$harga','$kategori')";

  mysqli_query($koneksi,$query);

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
