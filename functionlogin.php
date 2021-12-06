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
      echo "<div id='divAlert' name='divAlert' class='alert alert-warning m-2' role='alert'>Cek kembali username dan password anda.</div>";

    }else {
        while ($row=mysqli_fetch_array($query)){
            $id = $row['id'];
            $gambar = $row['gambar'];
            $user = $row['username'];
            $nama = $row['nama'];
            $email = $row['email'];
            $No_Hp = $row['No_Hp'];
            $pass = $row['password'];
            $level = $row['level'];
        }

        if($user_login==$user && $pass_login==$pass){


            header("Location:daftarmenu.php");
            $_SESSION['id'] = $id;
            $_SESSION['gambar'] = $gambar;
            $_SESSION['username'] = $user;
            $_SESSION['nama'] = $nama;
            $_SESSION['email'] = $email;
            $_SESSION['No_Hp'] = $No_Hp;
            $_SESSION['password'] = $password;
            $_SESSION['level'] = $level;
            $akibat=$_SESSION['nama'];
            $nama2 = $_SESSION['nama'];
            $startdate = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
            $start_date = $startdate->format('Y-m-d H:i:s');
            $history = "INSERT INTO history (pelaku,aksi,akibat,waktu) VALUES ('$nama2','Login Staff/Admin','$akibat','$start_date')";
            mysqli_query($koneksi, $history);

        }else {
          echo "<div id='divAlert' name='divAlert' class='alert alert-warning m-2' role='alert'>Cek kembali username dan password anda.</div>";
        }
    }
}

}


?>
