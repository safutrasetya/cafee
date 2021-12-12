<?php
 require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php"); require_once("includes/staffcheck.php");
//export.php

$output = '';


 $query = "SELECT * FROM riwayat_pembelian";
 $result = mysqli_query($koneksi, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">
      <tr>
        <th>Id transaksi</th>
        <th>Id meja</th>
        <th>total Pembayaran</th>
        <th>Status Pembayaran</th>
        <th>Status Pesanan</th>
        <th>Tanggal Pembayaran</th>
        <th>Waktu pembayaran</th>
      </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
    <tr>
      <td>'.$row["id_transaksi"].'</td>
      <td>'.$row["id_meja"].'</td>
      <td>'.$row["total_pembayaran"].'</td>
      <td>'.$row["status_bayar"].'</td>
      <td>'.$row["status_pesanan"].'</td>
      <td>'.$row["tanggal_pembayaran"].'</td>
      <td>'.$row["waktu_pembayaran"].'</td>
    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }

?>
