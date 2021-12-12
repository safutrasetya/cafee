<?php

  require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");
  $connect = new PDO("mysql:host=localhost;dbname=orari", "root", "");

  include 'vendor/autoload.php';
  if($_FILES["importmejaexcel"]["name"] != ''){
    $allowed_extension = array('xls', 'csv', 'xlsx');
    $file_array = explode(".", $_FILES["importmejaexcel"]["name"]);
    $file_extension = end($file_array);

    if(in_array($file_extension, $allowed_extension)){
      $file_name = time() . '.' . $file_extension;
      $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($_FILES["importmejaexcel"]["name"]);
      $reader = PHpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

      $spreadsheet = $reader->load($_FILES["importmejaexcel"]["tmp_name"]);
      $data = $spreadsheet->getActiveSheet()->toArray();
      $insert_data=0;

      function myExcelErrHandler($errno, $errstr){
        echo "<div id='divAlert' name='divAlert' class='bg-warning my-2 p-2' role='alert'>
        <i class='bi bi-exclamation-circle-fill'></i>
        ";
        echo $errstr;
        echo "</div>";
        die();
      }

      set_error_handler("myExcelErrHandler",E_USER_WARNING);
      foreach($data as $row){//Check semua akun ada yang sama atau enggak
          $insert_data = array(
            ':id_meja' => $row[0],
            ':meja' =>$row[1],
            ':pass_meja' => $row[2]
          );
          if(isset($insert_data[':id_meja'])&&isset($insert_data[':meja'])&&isset($insert_data[':pass_meja']))
          {
            $idmexcel = $insert_data[':id_meja'];
            $cekdb = "SELECT * FROM meja WHERE id_meja = '{$idmexcel}'";
            $cekdbcount = mysqli_query($koneksi, $cekdb);
            if(mysqli_num_rows($cekdbcount)>0){
              foreach($cekdbcount as $datum){
                if($datum['id_meja']==$idmexcel){
                  $triggerrornya = "Terjadi kesalahan. Meja dengan id ".$idmexcel." telah ada.  Semua Meja gagal untuk diimport.";
                  break;
                }
              }
              trigger_error($triggerrornya,E_USER_WARNING);
              break;
            }
          }else{
            $triggerrornya = "Format table di file excel anda tidak sesuai dengan yang telah dicontohkan atau ada data yang belum lengkap. Semua meja gagal untuk diimport.";
            trigger_error($triggerrornya,E_USER_WARNING);
            break;

          }
          //die("<div class='alert alert-warning' role='alert'><i class='bi bi-exclamation-circle-fill'></i>Hmmm.. ada kesalahan..Pastikan header setiap kolom excel anda seperti yang di cantumkan dibawah</div>")
      }
      //klo foreach semua yang diatas berjalan sampe akhir baru bisa dimasukkan
      foreach($data as $row){
        $insert_data = array(
          'id_meja' => $row[0],
          ':meja' =>$row[1],
          ':pass_meja' => $row[2]
        );
        $query = "INSERT INTO meja (id_meja,meja,pass_meja,reservasi)
         VALUES (:id_meja, :meja, :pass_meja,0)";

         $statement = $connect->prepare($query);
         $statement->execute($insert_data);
      }
      $message = "<div class='alert alert-success' role='alert'><i class='bi bi-exclamation-circle-fill'></i> Import Meja berhasil silahkan lihat  <a href='daftarakun.php'>Daftar Akun</a></div>";
    }else{

      $message = "<div class='alert alert-warning' role='alert'><i class='bi bi-exclamation-circle-fill'></i> Masukkan file xls, csv, atau xlxs..</div>";

    }
  }else{
    $message = "<div class='alert alert-warning' role='alert'><i class='bi bi-exclamation-circle-fill'></i> Hmmm.. Anda belum memasukkan file apapun..</div>";
  }

  echo $message;

?>
