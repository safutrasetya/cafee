<?php
 require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");
//export.php

$output = '';


 $query = "SELECT * FROM history";
 $result = mysqli_query($koneksi, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">
      <tr>
        <th>Id Histori</th>
        <th>Pelaku</th>
        <th>Aksi</th>
        <th>Objek yang terkena</th>
        <th>Waktu</th>
      </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>
      <td>'.$row["id_history"].'</td>
      <td>'.$row["pelaku"].'</td>
      <td>'.$row["aksi"].'</td>
      <td>'.$row["akibat"].'</td>
      <td>'.$row["waktu"].'</td>
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }

?>
