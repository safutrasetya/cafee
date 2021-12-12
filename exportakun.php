<?php
 require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php"); require_once("includes/staffcheck.php");
//export.php

$output = '';


 $query = "SELECT * FROM akun";
 $result = mysqli_query($koneksi, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">
      <tr>
        <th>Id Akun</th>
        <th>Username</th>
        <th>Nama</th>
        <th>Email</th>
        <th>No. Handphone</th>
        <th>Level</th>
        <th>Waktu Bergabung</th>
      </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>
      <td>'.$row["id"].'</td>
      <td>'.$row["username"].'</td>
      <td>'.$row["nama"].'</td>
      <td>'.$row["email"].'</td>
      <td>'.$row["No_Hp"].'</td>';
      if($row["level"]==1){
        $output .= '<td>Developer</td>';
      }elseif($row["level"]==2){
        $output .= '<td>Admin</td>';
      }elseif($row["level"]==3){
        $output .= '<td>Staff</td>';
      }else{
      }
    $output .= '
      <td>'.$row["waktu_bergabung"].'</td>
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }

?>
