<?php
if(isset($_SESSION['keranjang'])){
  $count = count($_SESSION['keranjang']);
  echo "<p>TOTAL PESANAN : $count</p>";

  $hargatotal = 0;
  $pesanan_id2 = array_column($_SESSION['keranjang'],'menu_id');
  $pesanan_quantity_key = array_column($_SESSION['keranjang'],'menu_quantity');
  $keyquantity = key($pesanan_quantity_key);

  $query3 = "SELECT * FROM menu";
  $qresult2 = mysqli_query($koneksi, $query3);
  $idUpdate=0;
  while($row2 = mysqli_fetch_array($qresult2)){
    foreach($pesanan_id2 as $pesanan_id3){
      $keyquantity = key($pesanan_quantity_key);
      if($row2['id_menu']== $pesanan_id3){
        $keyint = (int)$keyquantity;
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
