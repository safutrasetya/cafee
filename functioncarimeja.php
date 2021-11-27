<?php
require_once("includes/koneksi.php");
require_once("includes/logincheck.php");
require_once("includes/admincheck.php");

  $connect = new PDO("mysql:host=localhost; dbname=orari", "root", "");

//ENDHALAMAN

  $query = 'SELECT * FROM meja ORDER BY id_meja DESC';
  $filter_query = 'SELECT * FROM meja ORDER BY id_meja DESC LIMIT '.$start.', '.$limit.'';
  if($_POST['query'] != ''){
    $query = 'SELECT * FROM meja WHERE id_meja LIKE "%'.$_POST['query'].'%"';//we rasa ada yag salah disini
    $filter_query = 'SELECT * FROM meja WHERE id_meja LIKE "%'.$_POST['query'].'%" ORDER BY id_meja DESC LIMIT '.$start.', '.$limit.'';
  }

  //
  // $filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

  $statement = mysqli_query($koneksi, $query);
  $total_data = mysqli_num_rows($statement);

  $statement = mysqli_query($koneksi, $filter_query);


  // $result = $statement->fetchAll();

  $output = '<p class="text-center">TOTAL ME : '.$total_data.'</p>
  <table class="table table-bordered table-info">
    <thead class="h6">
        <tr>
          <td>Id Meja</td>
          <td>No Meja</td>
          <td>Password</td>
          <td>Reservasi</td>
          <td>Action</td>
         </tr>
    </thead>
  ';
  if($total_data>0){
    while($row=mysqli_fetch_array($statement)){
      $output .= '
      <tr>
        <td>'.$row["id_meja"].'</td>
        <td>'.$row["meja"].'</td>
        <td>'.$row["pass_meja"].'</td>
        ';
        if ($row["reservasi"]==1){
          $output .= '<p class="text-success">Penuh</p>';
        }elseif($row["reservasi"]==0){
          $output .= '<p class="text-danger">kosong</p>';
        }elseif("reeservasi"==2){
          $output .= '<p class="text-danger">dibooking</p>';
        };
        $output .= ';
        <td>
            <button name="gantistatus" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#gantistatus" data-bs-whatever="'.$row["id_transaksi"].'" statusbayar="'.$row["status_bayar"].'"><img src="img/edit-icon.png" style="height:20px; width:20px;"> Ubah status pembayaran</button>
        </td>
        <td>
        <button name="gantistatus" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#gantistatus" data-bs-whatever="'.$row["id_meja"].'" reservasi="'.$row["reservasi"]'"><img src="img/edit-icon.png" style="height:20px; width:20px;">Edit</button>

        <button name="gantistatus" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#gantistatus" data-bs-whatever="'.$row["id_meja"].'"><i class="bi bi-trash"></i> Hapus</button>

        </td>
      </tr>
      ';
    }
  }else{
    $output .= '<h5>NO DATA FOUND</h5>';
  }

  $output.= '
    </table>


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
