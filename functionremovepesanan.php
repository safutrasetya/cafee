<?php
if(isset($_POST['btnRemove'])){
  if($_GET['action']=='btnRemove'){
    foreach ($_SESSION['keranjang'] as $key=>$value){
      if($value['menu_id']==$_GET['idRemoval']){
        $query = "SELECT * FROM menu WHERE id_menu = {$_GET['idRemoval']}";
        $query1 = mysqli_query($koneksi, $query);
        while ($row=mysqli_fetch_array($query1)){
            $id = $row['id_menu'];
            $makananremove = $row['nama_menu'];
        }
        echo "<div class='alert alert-success my-2 mx-4' role='alert'>$makananremove TELAH DIHAPUS</div>";

        unset($_SESSION['keranjang'][$key]);
        $_SESSION['keranjang'] = array_values($_SESSION['keranjang']);
      }
    }
  }
}
?>
