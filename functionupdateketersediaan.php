<?php
  require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");


  if(isset($_POST['btnUpdtKetersediaan'])){
    if(isset($_POST['idupdtketersediaan'])){
      $idmenu = $_POST['idupdtketersediaan'];
      $postketersediaan= $_POST['ketersediaan'];
      $cekdb = "UPDATE menu SET ketersidiaan = '{$postketersediaan}' WHERE id_menu = '{$idmenu}'";
      $cmd = mysqli_query($koneksi, $cekdb);

      echo '
        <div class="p-3" style="background-color: #73ebe3;">Ketersediaan menu telah diupdate!</div>
      ';
      echo '
      <script>
        window.location.href = window.location.href;
      </script>

      ';
    }
  }




?>
