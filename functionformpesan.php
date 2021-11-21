<?php
if(isset($_SESSION['keranjang'])&&count($_SESSION['keranjang'])!=0){
  $pesanan_id = array_column($_SESSION['keranjang'],'menu_id');
  $query2 = "SELECT * FROM menu";
  $qresult = mysqli_query($koneksi, $query2);
  $idUpdate = 0;
  while($row = mysqli_fetch_array($qresult)){
    foreach($pesanan_id as $key => $pesanan_id2){
      if($row['id_menu']== $pesanan_id2){
        hiddenFormPesan($row['id_menu'], $idUpdate);
        $idUpdate++;
      }
    }
  }
}else if(isset($_SESSION['keranjang'])&&count($_SESSION['keranjang'])==0){
  echo "<h5>Anda belum memesan apapun</h5>";
}
?>
