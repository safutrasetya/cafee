<?php

include ("includes/koneksi.php");

if(isset($_POST['btnLogin'])){
    $user_login=$_POST['username'];
    $pass_login=$_POST['pass']; //kasih "md5" klo mau di enkripsi passwordnya jadi md5($_POST['pass'])

$sql = "SELECT * FROM akun WHERE username = '{$user_login}' and password = '{$pass_login}'";
$query = mysqli_query($koneksi, $sql);
$count = mysqli_num_rows($query);

if(!$query){
    die("Query gagal" .mysqli_error($koneksi));
}
if(!empty($user_login) && (!empty($pass_login))){
    if($count==0){
        echo " USERNAME NOT FOUND";

    }else {
        while ($row=mysqli_fetch_array($query)){
            $id = $row['id'];
            $user = $row['username'];
            $pass = $row['password'];
            $nama = $row['nama'];
            $email = $row['email'];
            $level = $row['level'];
            $nohp = $row['no_hp'];
        }

        if($user_login==$user && $pass_login==$pass){
            header("Location:daftarmenu.php");
            $_SESSION['username'] = $user;
            $_SESSION['nama'] = $nama;
            $_SESSION['email'] = $email;
            $_SESSION['level'] = $level;
            $_SESSION['password'] = $password;
            $_SESSION['id'] = $id;
            $_SESSION['nohp'] = $nohp;


        }else {
            echo "<div class='alert alert-warning' role='alert'><i class='bi bi-exclamation-circle-fill'></i> User tidak ditemukan!</div>";
        }
    }
}

}


?>
