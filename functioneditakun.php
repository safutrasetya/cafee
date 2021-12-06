<?php

require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");
  $id = $_POST['id'];
  $username =htmlspecialchars($_POST['username']);
  $nama = htmlspecialchars($_POST['nama']);
  $email = htmlspecialchars($_POST['email']);
  $No_Hp = htmlspecialchars($_POST['No_Hp']);
  $password = htmlspecialchars($_POST['password']);
  $gambarLama = htmlspecialchars($_POST['gambarLama']);

  //Cek apakah user memilih gambar baru atau tidak
  if($_FILES['gambar']['error'] === 4){
    $gambar = $gambarLama;
  }else $gambar = upload();


  // if(!empty($gambar)){
  // $sql="UPDATE akun SET gambar='$gambar',username='$username',nama='$nama',email='$email',No_Hp='$No_Hp',password='$password' WHERE id='$id'";
  // $result = mysqli_query($koneksi,$sql);
  //     echo "
  //       <script>
  //       alert('Akun berhasil diperbarui!');
  //       document.location.href = 'daftarakun.php';
  //       </script>
  //       ";
  //     }elseif($koneksi->connect_error){
  //       echo "
  //         <script>
  //         alert('Akun gagal diperbarui!');
  //         document.location.href = 'daftarakun.php';
  //         </script>
  //         ";
  //     }

  if(!empty($gambar)){
    $sql="UPDATE akun SET gambar='$gambar',username='$username',nama='$nama',email='$email',No_Hp='$No_Hp',password='$password' WHERE id='$id'";
    mysqli_query($koneksi,$sql);
    $akibat=$nama;
    $nama2 = $_SESSION['nama'];
    $startdate = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
    $start_date = $startdate->format('Y-m-d H:i:s');
    $history = "INSERT INTO history (pelaku,aksi,akibat,waktu) VALUES ('$nama2','Edit Akun','$akibat','$start_date')";
    mysqli_query($koneksi, $history);
    echo "
    <script>
    alert('Akun berhasil diperbarui!');
    document.location.href = 'daftarakun.php';
    </script>
    ";
  }else{
    echo"
    <script>
    alert('Akun gagal diperbarui!');
    document.location.href = 'tambahakun.php';
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

      //Siap diupload
      //Generate nama file baru
      $namaFileBaru = uniqid();
      $namaFileBaru .= '.';
      $namaFileBaru .= $ekstensiGambar;
      move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

      return $namaFileBaru;
    }

  // if(!empty($gambar)){
  //   $sql="UPDATE akun SET gambar='$gambar',username='$username',nama='$nama',email='$email',No_Hp='$No_Hp',password='$password' WHERE id='$id'";
  //     mysqli_query($koneksi,$sql);
  //     echo "
  //       <script>
  //       alert('Akun berhasil diperbarui!');
  //       document.location.href = 'daftarakun.php';
  //       </script>
  //       ";
  //   }elseif(empty($gambar)){
  //     $sql="UPDATE akun SET username='$username',nama='$nama',email='$email',No_Hp='$No_Hp',password='$password' WHERE id='$id'";
  //       mysqli_query($koneksi,$sql);
  //       echo "
  //         <script>
  //         alert('Akun berhasil diperbarui!');
  //         document.location.href = 'daftarakun.php';
  //         </script>
  //         ";
  //   }elseif($koneksi->connect_error){
  //     echo"
  //       <script>
  //       alert('Akun gagal ditambahkan!');
  //       document.location.href = 'editprofil.php';
  //       </script>
  //       ";
  //   }
?>
