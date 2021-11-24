<p class="h5">Transaksi sedang berlangsung <span class='spinner-border spinner-border-sm'></span></p>
<p class='h5'>Total harga yang dibayar = Rp. <?php echo $_SESSION['totalharga'];?> ,-</p>
<p class="h5 text-center">Struk Pembelian</p>
<div class="overflow-auto mb-3" style="height: 400px;">
  <table class="table text-left">
    <thead>
      <tr>
        <td>Nama Makanan/Minuman</td>
        <td>Harga</td>
      </tr>
    </thead>
    <tbody>
      <!--TABEL STRUK-->
      <?php
        if(isset($_SESSION['keranjang'])){
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
                tampilttlharga($row2['gambar'], $row2['nama_menu'],$row2['harga'],$row2['id_menu'],$idUpdate);
                $idUpdate++;
              }
              next($pesanan_quantity_key);
            }
          }
        }else{
          echo "<h5>Anda belumm memesan apapun</h5>";
        }
      ?>
      <tr>
        <td class="h6">Total harga</td>
        <td>Rp. <?php echo $_SESSION['totalharga'];?> ,-</td>
      </tr>
      <!--END TABEL STRUK-->
    </tbody>
  </table>
</div>
