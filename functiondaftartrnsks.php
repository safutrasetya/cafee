<table class="table table-bordered table-info">
  <thead class="h5">
    <tr style="text-align:center">
      <td>Id Transaksi</td>
      <td>Id Meja</td>
      <td>Total Pembayaran</td>
      <td colspan="2">Status Pembayaran</td>
      <td>Tanggal Pembayaran</td>
      <td>Waktu Pembayaran</td>
      <td>Action</td>
    </tr>
  </thead>
  <tbody id="search_result">
    <?php
        $perHalaman = 10;
        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman']  : 1;
        $halamanAwal = ($halaman>1) ? ($halaman * $perHalaman) - $perHalaman : 0;

        $prev = $halaman - 1;
        $next = $halaman + 1;

        $riwayat = mysqli_query($koneksi,"SELECT * FROM riwayat_pembelian");
        $jumlahriwayat = mysqli_num_rows($riwayat);
        $totalHalaman = ceil($jumlahriwayat / $perHalaman);

        $riwayats = mysqli_query($koneksi,"SELECT * FROM riwayat_pembelian ORDER BY id_transaksi DESC LIMIT $halamanAwal, $perHalaman");
        while($d = mysqli_fetch_assoc($riwayats)){
     ?>
    <tr>
      <td><?php echo $d['id_transaksi'] ?></td>
      <td><?php echo $d['id_meja'] ?></td>
      <td>Rp.<?php echo $d['total_pembayaran'];?>,-</td>
      <td>
        <?php
        if ($d['status_bayar']==1){
          echo "<p class='text-success'>Sudah dibayar</p>";
        }elseif($d['status_bayar']==0){
          echo "<p class='text-danger'>Belum dibayar</p>";
        };
        ?>
      </td>
      <td>
          <button name="gantistatus" type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#gantistatus" data-bs-whatever="<?php echo $d['id_transaksi'];?>" statusbayar="<?php echo $d['status_bayar']?>"><img src="img/edit-icon.png" style="height:20px; width:20px;"> Ubah status pembayaran</button>

      </td>
      <td><?php echo $d['tanggal_pembayaran'];?></td>
      <td><?php echo $d['waktu_pembayaran'];?></td>
      <td>
        <button name="hapustransaksi" type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapustransaksi" data-bs-whatever="<?php echo $d['id_transaksi'];?>"><i class="bi bi-trash"></i> Hapus</button>
      </td>
    </tr>
  <?php  } ?>

  </tbody>
</table>

<ul class="pagination pagination-sm justify-content-center">
  <li class="page-item">
    <a class="page-link" <?php if($halaman > 1){echo "href = '?halaman=$prev'";} ?>>Previous</a>
  </li>
  <?php
  for($x = 1;$x<=$totalHalaman;$x++){ ?>
        <li class="page-item">
          <a class="page-link" href="?halaman=<?php echo $x ?>"><?php echo $x; ?></a>
          </li>
    <?php
    } ?>
    <li class="page-item">
      <a class="page-link" <?php if($halaman < $totalHalaman){ echo "href='?halaman=$next'";}?>>Next</a>
    </li>
</ul>
