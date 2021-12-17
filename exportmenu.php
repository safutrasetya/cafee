<?php
 require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");
//export.php

$output = '';


 $query = "SELECT * FROM menu";
 $result = mysqli_query($koneksi, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">
      <tr>
        <th>Id Menu</th>
        <th>Nama Menu</th>
        <th>Info menu</th>
        <th>Harga</th>
        <th>kategori</th>
        <th>Ketersediaan</th>
      </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>
      <td>'.$row["id_menu"].'</td>
      <td>'.$row["nama_menu"].'</td>
      <td>'.$row["info_menu"].'</td>
      <td>'.$row["harga"].'</td>
      <td>'.$row["kategori"].'</td>
      <td>'.$row["ketersidiaan"].'</td>
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }

?>
