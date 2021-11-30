<?php
require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");
  $connect = new PDO("mysql:host=localhost; dbname=orari", "root", "");
//halaman
  $limit=8;
  $page=1;
  if($_POST['page']>1){
    $start = (($_POST['page']-1) * $limit);
    $page = $_POST['page'];
  }else{
    $start = 0;
  }
//ENDHALAMAN

$query = "SELECT tanggal_pembayaran FROM riwayat_pembelian GROUP BY MONTH(tanggal_pembayaran)";
$filter_query = 'SELECT tanggal_pembayaran FROM riwayat_pembelian GROUP BY MONTH(tanggal_pembayaran) ORDER BY tanggal_pembayaran DESC LIMIT '.$start.', '.$limit.'';
if($_POST['query'] != ''){
  $query = 'SELECT tanggal_pembayaran FROM riwayat_pembelian WHERE tanggal_pembayaran LIKE "%'.$_POST['query'].'%" GROUP BY MONTH(tanggal_pembayaran)';//we rasa ada yag salah disini
  $filter_query = 'SELECT tanggal_pembayaran FROM riwayat_pembelian WHERE tanggal_pembayaran LIKE "%'.$_POST['query'].'%" GROUP BY MONTH(tanggal_pembayaran) ORDER BY tanggal_pembayaran DESC LIMIT '.$start.', '.$limit.'';
}

  //
  // $filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

  $statement = mysqli_query($koneksi, $query);
  $total_data = mysqli_num_rows($statement);

  $statement = mysqli_query($koneksi, $filter_query);


  // $result = $statement->fetchAll();

  $output = '<p class="text-center">TOTAL : '.$total_data.'</p>
  <table class="table table-responsive table-striped table-bordered table-secondary" style="width: 800px;">
    <thead class="h5">
      <tr style="text-align:center">
        <td>Bulan</td>
        <td>Total penjualan bulanan</td>
      </tr>
    </thead>
  ';
  if($total_data>0){
    while($row=mysqli_fetch_array($statement)){
      $totalbulanan = 0;
      $date = strtotime($row['tanggal_pembayaran']);
      $month = date("m", $date);
      $year = date("Y", $date);
      $query2 = "SELECT * FROM riwayat_pembelian WHERE MONTH(tanggal_pembayaran)='{$month}' AND YEAR(tanggal_pembayaran)='{$year}'";
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
  }else{
    $output .= '<h5>NO DATA FOUND</h5>';
  }

  $output.= '
    </table>
    <ul class="pagination pagination-sm justify-content-center">
  ';

  $total_links = ceil($total_data/$limit);
  $previous_link = '';
  $next_link = '';
  $page_link = '';
  $page_array[]=0;
  //echo $total_links;

  if($total_links > 4){
    if($page < 5){
      for($count = 1; $count <= 5; $count++){
        $page_array[] = $count;
      }
      $page_array[] = '...';
      $page_array[] = $total_links;
    }else{
      $end_limit = $total_links - 5;
      if($page > $end_limit){
        $page_array[] = 1;
        $page_array[] = '...';
        for($count = $end_limit; $count <= $total_links; $count++){
          $page_array[] = $count;
        }
      }else{
        $page_array[] = 1;
        $page_array[] = '...';
        for($count = $page - 1; $count <= $page + 1; $count++){
          $page_array[] = $count;
        }
        $page_array[] = '...';
        $page_array[] = $total_links;
      }
    }
  }else{
    for($count = 1; $count <= $total_links; $count++){
      $page_array[] = $count;
    }
  }
  for($count = 0; $count < count($page_array); $count++){
    if($page == $page_array[$count]){
      $page_link .= '
      <li class="page-item active">
        <a class="page-link" href="#">'.$page_array[$count].'</a>
      </li>
      ';

      $previous_id = $page_array[$count] - 1;
      if($previous_id > 0){
        $previous_link = '<li class="page-item">
                          <a class="page-link" href="javascript:void(0)" data-page_number="'.$previous_id.'">Previous</a>
                          </li>';
      }else{
        $previous_link = '
        <li class="page-item disabled">
          <a class="page-link" href="#">Previous</a>
        </li>
        ';
      }
      $next_id = $page_array[$count] + 1;
      if($next_id >= $total_links){
        $next_link = '
        <li class="page-item disabled">
          <a class="page-link" href="#">Next</a>
        </li>
          ';
      }else{
        $next_link = '<li class="page-item">
                          <a class="page-link" href="javascript:void(0)" data-page_number="'.$next_id.'">Next</a>
                        </li>';
      }
    }else{
      if($page_array[$count] == '...'){
        $page_link .= '
        <li class="page-item disabled">
          <a class="page-link" href="#">...</a>
        </li>
        ';
      }else{
        $page_link .= '
        <li class="page-item"><a class="page-link" href="javascript:void(0)" data-page_number="'.$page_array[$count].'">'.$page_array[$count].'</a></li>
        ';
      }
    }
  }


  $output .= $previous_link . $page_link . $next_link;
  $output .= '
    </ul>';
  echo $output;
?>
