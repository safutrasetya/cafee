<?php
if(isset($_GET['btnHapus'])){
  require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");

$id = $_GET['id_menu'];

if($koneksi){
  $sql = "DELETE FROM menu WHERE id=$id_menu";
mysqli_query($koneksi,"$sql");
    echo "<p class='alert alert-success text-center'><b>Data Menu Berhasil Dihapus.</b></p>";
           } elseif ($koneksi->connect_error){
                 echo "<p class='alert alert-danger text-center><b>Data gagal dihapus. Terjadi kesalahan: ". $koneksi->connect_error. "</b></p>";

}
}
header('location:daftarmenu.php');
 ?>
