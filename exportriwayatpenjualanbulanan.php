<?php
require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php"); 

$output = '';
$filter_query = 'SELECT DISTINCT tanggal_pembayaran FROM riwayat_pembelian WHERE status_bayar = 1 ORDER BY tanggal_pembayaran';
$filterdistinct = mysqli_query($koneksi, $filter_query);
$query = 'SELECT tanggal_pembayaran FROM riwayat_pembelian WHERE status_bayar = 1 GROUP BY MONTH(tanggal_pembayaran) ORDER BY tanggal_pembayaran';
$result = mysqli_query($koneksi, $query);
if(mysqli_num_rows($result) > 0)
{
$output .= '
 <table class="table" bordered="1">
    <tr>
      <th>Tanggal</th>
      <th>Total penjualan Bulanan</th>

    </tr>
';
while($row = mysqli_fetch_array($result))
{
  $totalbulanan = 0;
  $date = strtotime($row['tanggal_pembayaran']);
  $month = date("m", $date);
  $year = date("Y", $date);
  $query2 = "SELECT * FROM riwayat_pembelian WHERE MONTH(tanggal_pembayaran)='{$month}' AND YEAR(tanggal_pembayaran)='{$year}' AND status_bayar = 1";
  $getquery2 = mysqli_query($koneksi, $query2);
  while($hasil2=mysqli_fetch_array($getquery2)){
    $totalbulanan = $totalbulanan + (int)$hasil2['total_pembayaran'];
  }
  $output .= '
  <tr>
    <td>'.$year.'-'.$month.'</td>
    <td>Rp. '.$totalbulanan.',-</td>
  </tr>
  ';
}
$output .= '</table>';
header('Content-Type: application/xls');
header('Content-Disposition: attachment; filename=download.xls');
echo $output;
}




 ?>
