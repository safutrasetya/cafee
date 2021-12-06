<?php

require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");
if(isset($_POST['btnRsrvs'])){
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
      if($row['no_meja']==$nomeja){
        $selisihwaktu = $row['waktu_rsrvs']->diff($waktuall);
        $selisihmenit = $selisihwaktu->days *24*60;
        $selisihmenit += $selisihwaktu->h*60;
        $selisihmenit += $selisihwaktu->i;
        if ($selisihmenit>60){
          $entry = "INSERT INTO mejareservasi (nama_plggn,no_telp,no_meja,waktu_rsrvs) VALUES ('$nama','$notelp','$nomeja','$waktuall')";
          if ($koneksi->query($entry)===TRUE){
            $akibat=$nomeja;
            $nama = $_SESSION['nama'];
            $startdate = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
            $start_date = $startdate->format('Y-m-d H:i:s');
            $history = "INSERT INTO history (pelaku,aksi,akibat,waktu) VALUES ('$nama','Reservasi','$akibat','$start_date')";
            mysqli_query($koneksi, $history);
            echo "<div id='divAlert' name='divAlert' class='alert alert-success m-2' role='alert'>Reservasi telah dibuat!</div>";
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
        $entry = "INSERT INTO mejareservasi (nama_plggn,no_telp,no_meja,waktu_rsrvs) VALUES ('$nama','$notelp','$nomeja','$waktuall')";
        if ($koneksi->query($entry)===TRUE){
          $akibat=$nomeja;
          $nama = $_SESSION['nama'];
          $startdate = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
          $start_date = $startdate->format('Y-m-d H:i:s');
          $history = "INSERT INTO history (pelaku,aksi,akibat,waktu) VALUES ('$nama','Reservasi','$akibat','$start_date')";
          mysqli_query($koneksi, $history);
          echo "<div id='divAlert' name='divAlert' class='alert alert-success m-2' role='alert'>Reservasi telah dibuat!</div>";
          break;
        }else{
          echo "<div id='divAlert' name='divAlert' class='alert alert-danger m-2' role='alert'>Terjadi kesalahan...</div>";
          break;
        }

      }
    }
  }else{
    $entry = "INSERT INTO mejareservasi (nama_plggn,no_telp,no_meja,waktu_rsrvs) VALUES ('$nama','$notelp','$nomeja','$waktuall')";
    if ($koneksi->query($entry)===TRUE){
      $akibat=$nomeja;
      $nama = $_SESSION['nama'];
      $startdate = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
      $start_date = $startdate->format('Y-m-d H:i:s');
      $history = "INSERT INTO history (pelaku,aksi,akibat,waktu) VALUES ('$nama','Reservasi','$akibat','$start_date')";
      mysqli_query($koneksi, $history);
      echo "<div id='divAlert' name='divAlert' class='alert alert-success m-2' role='alert'>Reservasi telah dibuat!</div>";
    }else{
      echo "<div id='divAlert' name='divAlert' class='alert alert-danger m-2' role='alert'>Terjadi kesalahan...</div>";
    }
  }
  echo "<script> window.setTimeout(function(){

      // Move to a new location or you can do something else
      window.location.href = 'daftarreservasi.php';

    }, 2500);</script>";
}

 ?>
