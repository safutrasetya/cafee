<?php

  require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");
  $connect = new PDO("mysql:host=localhost;dbname=orari", "root", "");

  include 'vendor/autoload.php';
  if($_FILES["importmenuexcel"]["name"] != ''){
    $allowed_extension = array('xls', 'csv', 'xlsx');
    $file_array = explode(".", $_FILES["importmenuexcel"]["name"]);
    $file_extension = end($file_array);

    if(in_array($file_extension, $allowed_extension)){
      $file_name = time() . '.' . $file_extension;
      $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($_FILES["importmenuexcel"]["name"]);
      $reader = PHpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

      $spreadsheet = $reader->load($_FILES["importmenuexcel"]["tmp_name"]);
      $data = $spreadsheet->getActiveSheet()->toArray();
      $insert_data=0;

      function myExcelErrHandler($errno, $errstr){
        echo "<div id='divAlert' name='divAlert' class='alert alert-warning mt-1' role='alert'>
        <i class='bi bi-exclamation-circle-fill'></i>
        ".$errstr."
        </div>";
        die();
      }

      set_error_handler("myExcelErrHandler",E_USER_WARNING);
      foreach($data as $row){//Check semua akun ada yang sama atau enggak
          $insert_data = array(
            ':nama_menu' => $row[0],
            ':info_menu' =>$row[1],
            ':harga' => $row[2],
            ':kategori' => $row[3],
            ':ketersediaan' => $row[4]
          );
          if(isset($insert_data[':nama_menu'])&&isset($insert_data[':info_menu'])&&isset($insert_data[':harga'])&&isset($insert_data[':kategori'])&&isset($insert_data[':ketersediaan']))
          {
            $nammenuex = $insert_data[':nama_menu'];
            $cekdb = "SELECT * FROM menu WHERE nama_menu = '{$nammenuex}'";
            $cekdbcount = mysqli_query($koneksi, $cekdb);
            if(mysqli_num_rows($cekdbcount)>0){
              foreach($cekdbcount as $datum){
                if($datum['nama_menu']==$nammenuex){
                  $triggerrornya = "Terjadi kesalahan. Makanan dengan nama ".$nammenuex." telah ada.  Semua menu gagal untuk diimport.";
                }
              }
              trigger_error($triggerrornya,E_USER_WARNING);
            }
          }else{
            $triggerrornya = "Format table di file excel anda tidak sesuai dengan yang telah dicontohkan atau ada data yang belum lengkap. Semua menu gagal untuk diimport.";
            trigger_error($triggerrornya,E_USER_WARNING);
          }
          //die("<div class='alert alert-warning' role='alert'><i class='bi bi-exclamation-circle-fill'></i>Hmmm.. ada kesalahan..Pastikan header setiap kolom excel anda seperti yang di cantumkan dibawah</div>")
      }
      //klo foreach semua yang diatas berjalan sampe akhir baru bisa dimasukkan
      foreach($data as $row){
        $insert_data = array(
          ':nama_menu' => $row[0],
          ':info_menu' =>$row[1],
          ':harga' => $row[2],
          ':kategori' => $row[3],
          ':ketersediaan' => $row[4]
        );
        $query = "INSERT INTO menu (nama_menu,gambar,info_menu,harga,kategori,ketersidiaan)
         VALUES (:nama_menu, 'menu1.jpg', :info_menu, :harga, :kategori, :ketersediaan)";

         $statement = $connect->prepare($query);
         $statement->execute($insert_data);
      }
      $message = "<div class='alert alert-success' role='alert'><i class='bi bi-exclamation-circle-fill'></i> Import Makanan berhasil! Silahkan lihat <a href='daftarmenu.php'>Daftar Menu</a>.</div>";
    }else{

      $message = "<div class='alert alert-warning' role='alert'><i class='bi bi-exclamation-circle-fill'></i> Masukkan file xls, csv, atau xlxs..</div>";

    }
  }else{
    $message = "<div class='alert alert-warning' role='alert'><i class='bi bi-exclamation-circle-fill'></i> Hmmm.. Anda belum memasukkan file apapun..</div>";
  }

  echo $message;

?>
