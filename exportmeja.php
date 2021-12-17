<?php
 require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php"); 
//export.php

$output = '';


 $query = "SELECT * FROM meja";
 $result = mysqli_query($koneksi, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">
      <tr>
        <th>Id Meja</th>
        <th>Meja</th>
        <th>Password Meja</th>
        <th>Reservasi</th>
      </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>
      <td>'.$row["id_meja"].'</td>
      <td>'.$row["meja"].'</td>
      <td>'.$row["pass_meja"].'</td>
      <td>'.$row["reservasi"].'</td>
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }

?>
