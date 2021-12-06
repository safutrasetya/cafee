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
      echo "<div id='divAlert' name='divAlert' class='alert alert-warning m-2' role='alert'>Cek kembali id meja dan password meja.</div>";

    }else {
      $startdate = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
      $start_date ->format('Y-m-d H:i:s');
        while ($row=mysqli_fetch_array($query)){
            $idmeja = $row['id_meja'];
            $passmeja = $row['pass_meja'];
            $meja = $row['meja'];
            if($idmeja_login==$idmeja && $passmeja_login==$passmeja){
              $cmdreservasi = "SELECT * FROM mejareservasi WHERE no_meja = '$idmeja'";
              $getcmd = mysqli_query($koneksi, $cmdreservasi);
              while($each = mysqli_fetch_array($getcmd)){
                if($each['no_meja']==$meja){
                  $each['waktu_rsrvs'] = new DateTime($each['waktu_rsrvs']);
                  $selisihwaktu = $each['waktu_rsrvs']->diff($start_date);
                  $selisihmenit = $selisihwaktu->days *24*60;
                  $selisihmenit += $selisihwaktu->h*60;
                  $selisihmenit += $selisihwaktu->i;
                  if ($selisihmenit>60){
                    $_SESSION['meja'] = $meja;
                    $_SESSION['password'] = $pass;
                    $_SESSION['idmeja'] = $idmeja;
                    header("Location:halamanmakanan.php");
                    $akibat=$_SESSION['meja'];
                    $nama2 = $_SESSION['meja'];
                    $startdate = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
                    $start_date = $startdate->format('Y-m-d H:i:s');
                    $history = "INSERT INTO history (pelaku,aksi,akibat,waktu) VALUES ('$nama2','Login Meja','$akibat','$start_date')";
                    mysqli_query($koneksi, $history);
                  }else{
                    echo "<div id='divAlert' name='divAlert' class='alert alert-warning m-2' role='alert'>Ada reservsi dimeja ini sekarang</div>";
                    break;
                  }
                }
              }
                header("Location:halamanmakanan.php");

            }else {
              echo "<div id='divAlert' name='divAlert' class='alert alert-warning m-2' role='alert'>Cek kembali id meja dan password meja.</div>";

            }
        }

    }
}

}


?>
