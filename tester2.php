<?php
require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");
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

  $query = 'SELECT * FROM akun ORDER BY nama asc';
  $filter_query = 'SELECT * FROM akun ORDER BY nama asc LIMIT '.$start.', '.$limit.'';
  if($_POST['query'] != ''){
    $query = 'SELECT * FROM akun WHERE id LIKE "%'.$_POST['query'].'%" OR nama LIKE "%'.$_POST['query'].'%" OR email LIKE "%'.$_POST['query'].'%" OR No_Hp LIKE "%'.$_POST['query'].'%" OR username LIKE "%'.$_POST['query'].'%"';//we rasa ada yag salah disini
    $filter_query = 'SELECT * FROM akun WHERE id LIKE "%'.$_POST['query'].'%" OR nama LIKE "%'.$_POST['query'].'%" OR email LIKE "%'.$_POST['query'].'%" OR No_Hp LIKE "%'.$_POST['query'].'%" OR username LIKE "%'.$_POST['query'].'%" ORDER BY nama ASC LIMIT '.$start.', '.$limit.'';
  }

  //
  // $filter_query = $query . 'LIMIT '.$start.', '.$limit.'';

  $statement = mysqli_query($koneksi, $query);
  $total_data = mysqli_num_rows($statement);

  $statement = mysqli_query($koneksi, $filter_query);


  // $result = $statement->fetchAll();

  $output = '
  <table class="table table-striped table-bordered">
    <tb>
      <tr>
        <td>Id akun</td>
        <td>Foto</td>
        <td>Username</td>
        <td>Nama</td>
        <td>Email</td>
        <td>Nomor hp</td>
        <td>Waktu bergabung</td>
        <td><button id="btnCheckAll" class="btn btn-secondary">Pilih semua</button></td>
      </tr>
  ';
  if($total_data>0){
    while($row=mysqli_fetch_array($statement)){
      $output .= '
      <tr>
        <td>'.$row["id"].'</td>
        <td><img src="img/'.$row["gambar"].'" style="height: 50px;width: 50px;"></td>
        <td>Rp.'.$row["username"].',-</td>
        <td>'.$row["nama"].'</td>
        <td>'.$row["email"].'</td>
        <td>'.$row["No_Hp"].'</td>
        <td>'.$row["waktu_bergabung"].'</td>';
        if(isset($_SESSION['akundelcek'])){
          $cekdalamsession = array_column($_SESSION['akundelcek'], "idakun");
          foreach($cekdalamsession as $key=>$value){
            if($value==$row["id"]){
              if($_SESSION['akundelcek'][$key]['cekbox'] == 1){
                $output .= '<td><input checked id="checkAkunBox" type="checkbox" name="akun_id[]" value="'.$row["id"].'"></td>';
                break;
              }else{
                $output .= '<td><input id="checkAkunBox" type="checkbox" name="akun_id[]" value="'.$row["id"].'"></td>';
              }
            }
          }
        }else{
          $output .= '<td><input id="checkAkunBox" type="checkbox" name="akun_id[]" value="'.$row["id"].'"></td>';
        }
        $output .='
      </tr>
      ';
    }
  }else{
    $output .= '<h5>NO DATA FOUND</h5>';
  }

  $output.= '
      </tb>
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
