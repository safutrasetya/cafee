<?php

require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");
if(isset($_POST['btnRsrvs'])){
  $idR= $_POST['idrupdt'];
  $nama=$_POST['nama'];
  $notelp=$_POST['notelp'];
  $nomeja=$_POST["nomeja"];
  $date=$_POST['date'];
  $time=$_POST['time'];

  $waktuall = date('Y-m-d H:i:s', strtotime("$date $time"));
  $query = "SELECT * from mejareservasi";
  $getquery = mysqli_query($koneksi, $query);
  $count = mysqli_num_rows($getquery);
  if($count>0){
    while($row=mysqli_fetch_array($getquery)){
      if($row['no_meja']==$nomeja && $row['id_reservasi']!=$idR){
        $selisihwaktu = $row['waktu_rsrvs']->diff($waktuall);
        $selisihmenit = $selisihwaktu->days *24*60;
        $selisihmenit += $selisihwaktu->h*60;
        $selisihmenit += $selisihwaktu->i;
        if ($selisihmenit>60){
          $entry = "UPDATE mejareservasi SET nama_plggn = '$nama', no_telp = '$notelp', no_meja = '$nomeja', waktu_rsrvs ='$waktuall' WHERE id_reservasi = '$idR'";
          if ($koneksi->query($entry)===TRUE){
            echo "<div id='divAlert' name='divAlert' class='alert alert-success m-2' role='alert'>Reservasi telah diupdate! <br>Mengembalikan ke halaman sebelumnya...</div>";
            break;
          }else{
            echo "<div id='divAlert' name='divAlert' class='alert alert-danger m-2' role='alert'>Terjadi kesalahan...</div>";
            break;
          }
        }else{
          echo "<div id='divAlert' name='divAlert' class='alert alert-warning m-2' role='alert'>Telah ada reservasi pada meja tersebut & pada waktu yang sama.</div>";
          break;
        }
      }else{
        $entry = "UPDATE mejareservasi SET nama_plggn = '$nama', no_telp = '$notelp', no_meja = '$nomeja', waktu_rsrvs ='$waktuall' WHERE id_reservasi = '$idR'";
        if ($koneksi->query($entry)===TRUE){
          echo "<div id='divAlert' name='divAlert' class='alert alert-success m-2' role='alert'>Reservasi telah diupdate!<br>Mengembalikan ke halaman sebelumnya...</div>";
          break;
        }else{
          echo "<div id='divAlert' name='divAlert' class='alert alert-danger m-2' role='alert'>Terjadi kesalahan...</div>";
          break;
        }

      }
    }
  }else{
    echo "<div id='divAlert' name='divAlert' class='alert alert-danger m-2' role='alert'>Tidak ada data yang dapat diedit</div>";
  }
  echo "<script> window.setTimeout(function(){

      // Move to a new location or you can do something else
      window.location.href = 'daftarreservasi.php';

    }, 2500);</script>";
}

 ?>
