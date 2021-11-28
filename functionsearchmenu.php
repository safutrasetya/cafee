<?php
require_once("includes/koneksi.php"); require_once("includes/logincheck.php");
  $connect = new PDO("mysql:host=localhost; dbname=orari", "root", "");
//halaman
  $limit=5;
  $page=1;
  if($_POST['page']>1){
    $start = (($_POST['page']-1) * $limit);
    $page = $_POST['page'];
  }else{
    $start = 0;
  }
//ENDHALAMAN

  $query = 'SELECT * FROM menu ORDER BY nama_menu DESC';
  $filter_query = 'SELECT * FROM menu ORDER BY nama_menu DESC LIMIT '.$start.', '.$limit.'';
  if($_POST['query'] != ''){
    $query = 'SELECT * FROM menu WHERE nama_menu LIKE "%'.$_POST['query'].'%"';//we rasa ada yag salah disini
    $filter_query = 'SELECT * FROM menu WHERE nama_menu LIKE "%'.$_POST['query'].'%" ORDER BY nama_menu DESC LIMIT '.$start.', '.$limit.'';
  }

  //
  // $filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

  $statement = mysqli_query($koneksi, $query);
  $total_data = mysqli_num_rows($statement);

  $statement = mysqli_query($koneksi, $filter_query);


  // $result = $statement->fetchAll();

  $output = '<p class="text-center">Total pencarian : '.$total_data.'</p>
  <div class="container-fluid mb-4">
    <div class="row row-cols-sm-2 row-cols-md-3 row-cols-lg-4 row-cols-xl-5">
  ';
  if($total_data>0){
    while($row=mysqli_fetch_array($statement)){
      $output .= '<div class="col mt-3">
        <div class="card" style="padding: 10px;">
          <img src="img/menu_makanan.jpg" class="card-img-top" alt="img/menu_makanan.jpg">
            <h5 class="card-title">'.$row["nama_menu"].'</h5>
            <p class="card-text">'.$row["harga"].'</p>
            <form action="" method="get">
              <input type="text" value="'.$row["id_menu"].'" hidden name="id_pesanan_baru">
              <button class="btn btn-primary" type="submit" name="addMakanan">+</button>
            </form>
        </div>
      </div>
      ';
    }
  }else{
    $output .= '<h5>NO DATA FOUND</h5>';
  }

  $output.= '
    </div>
    </div>
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
