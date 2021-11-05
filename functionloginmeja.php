<?php

include ("includes/koneksi.php");

if(isset($_POST['btnLoginMeja'])){
    $idmeja_login=$_POST['idmejapost'];
    $passmeja_login=$_POST['passmejapost']; //kasih "md5" klo mau di enkripsi passwordnya jadi md5($_POST['pass'])

$sql = "SELECT * FROM meja WHERE id_meja = '{$idmeja_login}' and pass_meja = '{$passmeja_login}'";
$query = mysqli_query($koneksi, $sql);
$count = mysqli_num_rows($query);

if(!$query){
    die("Query gagal" .mysqli_error($koneksi));
}
if(!empty($idmeja_login) && (!empty($passmeja_login))){
    if($count==0){
        echo " USERNAME NOT FOUND";

    }else {
        while ($row=mysqli_fetch_array($query)){
            $idmeja = $row['id_meja'];
            $passmeja = $row['pass_meja'];
            $meja = $row['meja'];
        }

        if($idmeja_login==$idmeja && $passmeja_login==$passmeja){
            header("Location:halamanmakanan.php");
            $_SESSION['meja'] = $meja;
            $_SESSION['password'] = $pass;
            $_SESSION['idmeja'] = $idmeja;


        }else {
          echo "<div class='alert alert-warning' role='alert'><i class='bi bi-exclamation-circle-fill'></i> Meja tidak ditemukan!</div>";

        }
    }
}

}


?>
