<?php
require 'functions.php';


    $change= $_GET["id_kita"];

    mysqli_query($connect,"UPDATE riwayat_pembelian
    set status_pesanan=0
    WHERE id_transaksi='$change'");

header("location: daftarpesanan.php")
?>
