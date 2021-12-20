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
      $start_date = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
      // $start_date= $startdate->format('Y-m-d H:i:s');
      // $start_date =strtotime($start_date);
      // $start_date = date('Y-m-d H:i:s', $start_date);
        while ($row=mysqli_fetch_array($query)){
            $idmeja = $row['id_meja'];
            $passmeja = $row['pass_meja'];
            $meja = $row['meja'];
            if($idmeja_login==$idmeja && $passmeja_login==$passmeja){
              $cmdreservasi = "SELECT * FROM mejareservasi WHERE no_meja = '$idmeja'";
              $getcmd = mysqli_query($koneksi, $cmdreservasi);
              $variablecek = 0;
              while($each = mysqli_fetch_array($getcmd)){
                if($each['no_meja']==$idmeja){
                  $each['waktu_rsrvs'] = new DateTime($each['waktu_rsrvs']);
                  $selisihwaktu = $each['waktu_rsrvs']->diff($start_date);
                  $selisihmenit = $selisihwaktu->days *24*60;
                  $selisihmenit += $selisihwaktu->h*60;
                  $selisihmenit += $selisihwaktu->i;
                  if($selisihmenit>30||$selisihmenit<-30){
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
                    break;
                  }else{
                    $variablecek = 1;
                    echo "<div id='divAlert' name='divAlert' class='alert alert-warning m-2' role='alert'>Ada reservsi dimeja ini sekarang</div>";
                    break;
                  }
                }else{
                  echo "<div id='divAlert' name='divAlert' class='alert alert-warning m-2' role='alert'>Id meja kkok gaada ya</div>";

                }
              }
              if($variablecek==0){
                $_SESSION['meja'] = $meja;
                $_SESSION['password'] = $pass;
                $_SESSION['idmeja'] = $idmeja;
                header("Location:halamanmakanan.php");
              }
            }else {
              echo "<div id='divAlert' name='divAlert' class='alert alert-warning m-2' role='alert'>Cek kembali id meja dan password meja.</div>";

            }
        }

    }
}else{
  echo "<div id='divAlert' name='divAlert' class='alert alert-warning m-2' role='alert'>Id meja atau password belum dimasukkan...</div>";
}

}


?>
