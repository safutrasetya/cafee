<?php
 require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");
//export.php

  $output = '';
  $filter_query = 'SELECT DISTINCT tanggal_pembayaran FROM riwayat_pembelian WHERE status_bayar = 1 ORDER BY tanggal_pembayaran';
  $filterdistinct = mysqli_query($koneksi, $filter_query);
 $query = 'SELECT DISTINCT tanggal_pembayaran FROM riwayat_pembelian WHERE status_bayar = 1 ORDER BY tanggal_pembayaran';
 $result = mysqli_query($koneksi, $query);
 if(mysqli_num_rows($result) > 0)
 {
  $output .= '
   <table class="table" bordered="1">
      <tr>
        <th>Tanggal</th>
        <th>Total penjualan harian</th>

      </tr>
  ';
  while($row = mysqli_fetch_array($result))
  {
    $tanggal = $row['tanggal_pembayaran'];
    $query2 = "SELECT * FROM riwayat_pembelian WHERE tanggal_pembayaran='{$tanggal}' AND status_bayar = 1";
    $queryget2 = mysqli_query($koneksi, $query2);
    $totalharian = 0;
    while($queryhasil2=mysqli_fetch_array($queryget2)){
      $totalharian = $totalharian + (int)$queryhasil2['total_pembayaran'];
    }
    $output .= '
    <tr>
      <td>'.$tanggal.'</td>
      <td>Rp. '.$totalharian.',-</td>
    </tr>
    ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=download.xls');
  echo $output;
 }

?>
