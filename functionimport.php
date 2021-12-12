<?php

  require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");
  $connect = new PDO("mysql:host=localhost;dbname=orari", "root", "");

  include 'vendor/autoload.php';
  if($_FILES["importakunexcel"]["name"] != ''){
    $allowed_extension = array('xls', 'csv', 'xlsx');
    $file_array = explode(".", $_FILES["importakunexcel"]["name"]);
    $file_extension = end($file_array);

    if(in_array($file_extension, $allowed_extension)){
      $file_name = time() . '.' . $file_extension;
      $file_type = \PhpOffice\PhpSpreadsheet\IOFactory::identify($_FILES["importakunexcel"]["name"]);
      $reader = PHpOffice\PhpSpreadsheet\IOFactory::createReader($file_type);

      $spreadsheet = $reader->load($_FILES["importakunexcel"]["tmp_name"]);
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
            ':username' => $row[0],
            ':nama' =>$row[1],
            ':email' => $row[2],
            ':No_Hp' => $row[3],
            ':password' => $row[4]
          );
          if(isset($insert_data[':username'])&&isset($insert_data[':nama'])&&isset($insert_data[':email'])&&isset($insert_data[':No_Hp'])&&isset($insert_data[':password']))
          {
            $userexcel = $insert_data[':username'];
            $emailexcel = $insert_data[':email'];
            $cekdb = "SELECT * FROM akun WHERE username = '{$userexcel}' OR email = '{$emailexcel}'";
            $cekdbcount = mysqli_query($koneksi, $cekdb);
            if(mysqli_num_rows($cekdbcount)>0){
              foreach($cekdbcount as $datum){
                if($datum['email']==$emailexcel){
                  $triggerrornya = "Terjadi kesalahan. User dengan email ".$emailexcel." telah ada.  Semua akun gagal untuk diimport.";
                  break;
                }else{
                  $triggerrornya = "Terjadi kesalahan. User dengan nama ".$userexcel." telah ada.  Semua akun gagal untuk diimport.";
                  break;
                }
              }
              trigger_error($triggerrornya,E_USER_WARNING);
              break;
            }
          }else{
            $triggerrornya = "Format table di file excel anda tidak sesuai dengan yang telah dicontohkan atau ada data yang belum lengkap. Semua akun gagal untuk diimport.";
            trigger_error($triggerrornya,E_USER_WARNING);
            break;

          }
          //die("<div class='alert alert-warning' role='alert'><i class='bi bi-exclamation-circle-fill'></i>Hmmm.. ada kesalahan..Pastikan header setiap kolom excel anda seperti yang di cantumkan dibawah</div>")
      }
      //klo foreach semua yang diatas berjalan sampe akhir baru bisa dimasukkan
      foreach($data as $row){
        $insert_data = array(
          ':username' => $row[0],
          ':nama' =>$row[1],
          ':email' => $row[2],
          ':No_Hp' => $row[3],
          ':password' => $row[4],
        );
        $query = "INSERT INTO akun (gambar,username,nama,email,No_Hp,password,level)
         VALUES ('pfp1.jpg',:username, :nama, :email, :No_Hp, :password, 3)";

         $statement = $connect->prepare($query);
         $statement->execute($insert_data);
      }
      $message = "<div class='alert alert-success' role='alert'><i class='bi bi-exclamation-circle-fill'></i> Import Akun berhasil silahkan lihat  <a href='daftarakun.php'>Daftar Akun</a></div>";
    }else{

      $message = "<div class='alert alert-warning' role='alert'><i class='bi bi-exclamation-circle-fill'></i> Masukkan file xls, csv, atau xlxs..</div>";

    }
  }else{
    $message = "<div class='alert alert-warning' role='alert'><i class='bi bi-exclamation-circle-fill'></i> Hmmm.. Anda belum memasukkan file apapun..</div>";
  }

  echo $message;

?>
