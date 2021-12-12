<?php

  require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");
  $connect = new PDO("mysql:host=localhost;dbname=orari", "root", "");

  include 'vendor/autoload.php';
  use PhpOffice\PhpSpreadsheet\IOFactory;
  use PhpOffice\PhpSpreadsheet\Spreadsheet;

  if($_FILES["importmejaexcel"]["name"] != ''){
    $allowed_extension = array('xls', 'xlsx');
    $file_array = explode(".", $_FILES['importmejaexcel']['name']);
    $file_extension = end($file_array);

    if(in_array($file_extension, $allowed_extension)){
      $reader = IOFactory::createReader('Xlsx');
      $spreadsheet = $reader->load($_FILES['importmejaexcel']['tmp_name']);
      $writer = IOFactory::createWriter($spreadsheet, 'Html');

      $message = $writer->save('php://output');
    }else{
      $message = "<div id='divAlert' name='divAlert' class='bg-warning my-2 p-2' >
      <i class='bi bi-exclamation-circle-fill'></i>Hanya File .xls atau .xlsx yang dibolehkan</div>";
    }

  }else{
    $message = "<div id='divAlert' name='divAlert' class='alert alert-warning' role='alert'>
    <i class='bi bi-exclamation-circle-fill'></i>Pilih file anda...</div>";
  }


  echo $message;
?>
