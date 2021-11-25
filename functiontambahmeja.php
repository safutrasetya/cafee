<?php
require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");

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

        return mysqli_affected_rows($conn);
    }

 ?>
