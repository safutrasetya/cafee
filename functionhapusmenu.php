<?php

include("includes/koneksi.php");

$id = $_POST['id_menu'];

if($koneksi){
mysqli_query($koneksi,"DELETE FROM menu WHERE id='$id_menu'");
    echo "<p class='alert alert-success text-center'><b>Data Menu Berhasil Dihapus.</b></p>";
           } elseif ($koneksi->connect_error){
                 echo "<p class='alert alert-danger text-center><b>Data gagal dihapus. Terjadi kesalahan: ". $koneksi->connect_error. "</b></p>";

}
header('location:daftarmenu.php');
 ?>
