<div class="modal" id="tampilstruk" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="">Cek sekali lagi struk anda</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p class="h4">Struk Pembelian</p>
        <div class="overflow-auto mb-3" style="height: 400px;">
          <table class="table text-left">
            <thead>
              <tr>
                <td>Nama Makanan/Minuman</td>
                <td>Harga</td>
              </tr>
            </thead>
            <tbody class="text-start">
              <!--PHP TABEL STRUK-->
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

              <!--END PHP TABEL STRUK-->
            </tbody>
          </table>
          <?php
            include('functiontotalharga.php');
          ?>
        </div>
      </div>
      <div class="modal-footer">
        <a href="functiontunggutransaksi.php"><button class="btn btn-primary m-2 float-end"><i class="bi bi-check2"></i> Selesaikan pesanan!</button></a>
      </div>
    </div>
  </div>
</div>
