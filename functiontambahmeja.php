<?php
require_once("includes/koneksi.php");
require_once("includes/logincheck.php");
require_once("includes/admincheck.php");

        // koneksi database
     $conn = mysqli_connect("localhost","root","","orari");

       // ambil data dari tabel
     function query($query){
           global $conn;
        $result = mysqli_query($conn,$query);
        $rows = [];
        while($row = mysqli_fetch_assoc($result)){
          $rows[] = $row;
        }
        return $rows;
     }

    // function tambah Meja
    function tambahmeja($data){
      // ambil data dari tiap elemen form
      global $conn;
       $no_meja = $data["no_meja"];
       $pass_meja = $data["pass_meja"];
       $reservasi = $data["reservasi"];

       // query insert data
       $query = "INSERT INTO meja
          VALUES
          ('','$no_meja','$pass_meja','$reservasi')
          ";
        mysqli_query($conn,$query);
        $nama = $_SESSION['nama'];
        $startdate = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
        $start_date = $startdate->format('Y-m-d H:i:s');
        $history = "INSERT INTO history (nama,aksi,waktu) VALUES ('$nama','Penambahan akun','$start_date')";
        mysqli_query($koneksi, $history);

        return mysqli_affected_rows($conn);
    }
 //FUNCTION Cari
 function cari($keyword){
     $query = "SELECT * fROM meja
          WHERE
         id_meja LIKE '%$keyword%' OR
         no_meja Like '%$keyword%'
         ";
      return query($query);
  }
 ?>
