<?php
if(isset($_SESSION['keranjang'])){
  $count = count($_SESSION['keranjang']);
  echo "<p>TOTAL PESANAN : $count</p>";

  $hargatotal = 0;
  $pesanan_id2 = array_column($_SESSION['keranjang'],'menu_id');

  $query3 = "SELECT * FROM menu";
  $qresult2 = mysqli_query($koneksi, $query3);
  $idUpdate=0;
  while($row2 = mysqli_fetch_array($qresult2)){
    foreach($pesanan_id2 as $pesanan_id3){

      if($row2['id_menu']== $pesanan_id3){

        $kuantitas = $_SESSION['keranjang'][$idUpdate]['menu_quantity'];
        $hargatotal = $hargatotal + ((int)$row2['harga'] * (int)$kuantitas);
        $idUpdate++;
      }
    }

  }
  echo "<p>TOTAL PEMBAYARAN : Rp. $hargatotal ,-</p>";
}else{
  echo "<p>TOTAL PESANAN : 0 </p>";
}
?>
