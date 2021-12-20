<?php
include("includes/koneksi.php");
  function upload(){
    $namaFile = $_FILES['gambar']['name'];
    $ukuranFile = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //Cek ekstensi
    if( $error === 4){
      echo "<script>
              alert('Pilih gambar terlebih dahulu');
              window.history.back();
            </script>";
            return false;
    }
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.',$namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));
    if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
      echo "<script>
              alert('Yang Anda upload bukan gambar');
              window.history.back();
            </script>";
            return false;

    }
    //Cek size
    if($ukuranFile > 1000000){
      echo "<script>
              alert('Ukuran gambar terlalu besar');
              window.history.back();
            </script>";
            return false;
      }


    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;
  }
  if(isset($_POST['btnEdit'])){
    $id_menu   = $_POST['id_menu'];
    $ketersidiaan =$_POST['ketersediaan'];
    $nama_menu = htmlspecialchars ($_POST['namamenu']);
    $info_menu = htmlspecialchars($_POST['infomenu']);
    $harga = htmlspecialchars ($_POST['harga']);
    $kategori =htmlspecialchars  ($_POST['kategori']);

    if($_FILES['gambar']['error'] === 4){
      // $gambar = $gambarLama;
    }else{

     $gambar = upload();
   }


    if(!empty($gambar)){
      $sql = "UPDATE menu SET gambar='$gambar',ketersidiaan='$ketersidiaan',nama_menu='$nama_menu',info_menu='$info_menu',harga='$harga', kategori='$kategori'  WHERE id_menu='$id_menu'";
      mysqli_query($koneksi,$sql);
      $akibat=$nama_menu;
      $nama = $_SESSION['nama'];
      $startdate = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
      $start_date = $startdate->format('Y-m-d H:i:s');
      $history = "INSERT INTO history (pelaku,aksi,akibat,waktu) VALUES ('$nama','Edit Menu','$akibat','$start_date')";
      mysqli_query($koneksi, $history);
      echo "
      <script>
      alert('Menu berhasil diperbarui!');
      document.location.href = 'daftarmenu.php';
      </script>
      ";
    }else{
      $sql = "UPDATE menu SET ketersidiaan='$ketersidiaan',nama_menu='$nama_menu',info_menu='$info_menu',harga='$harga', kategori='$kategori'  WHERE id_menu='$id_menu'";
      mysqli_query($koneksi,$sql);
      $akibat=$nama_menu;
      $nama = $_SESSION['nama'];
      $startdate = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
      $start_date = $startdate->format('Y-m-d H:i:s');
      $history = "INSERT INTO history (pelaku,aksi,akibat,waktu) VALUES ('$nama','Edit Menu','$akibat','$start_date')";
      mysqli_query($koneksi, $history);
      echo"
      <script>
      alert('Menu berhasil diperbarui!');
      document.location.href = 'daftarmenu.php';
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
                window.history.back();
              </script>";
              return false;
      }
      $ekstensiGambarValid = ['jpg','jpeg','png'];
      $ekstensiGambar = explode('.',$namaFile);
      $ekstensiGambar = strtolower(end($ekstensiGambar));
      if(!in_array($ekstensiGambar,$ekstensiGambarValid)){
        echo "<script>
                alert('Yang Anda upload bukan gambar');
                window.history.back();
              </script>";
              return false;

      }
      //Cek size
      if($ukuranFile > 1000000){
        echo "<script>
                alert('Ukuran gambar terlalu besar');
                window.history.back();
              </script>";
              return false;
        }


      $namaFileBaru = uniqid();
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensiGambar;
      move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

      return $namaFileBaru;
    }
  }


?>
