<?php
include("includes/koneksi.php");

$keyword = $_GET["keyword"];
?>
<div>
  <table class="table table-bordered table-info">
    <thead class="h6">
      <tr>
        <td>Id</td>
        <td>Gambar</td>
        <td>Nama Menu</td>
        <td>Info Menu</td>
        <td>Harga</td>
        <td>kategori</td>
        <td>ketersidiaan</td>
        <td>Action</td>
      </tr>
    </thead>
    <tbody>
      <?php
        $perHalaman = 5;
        $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman']  : 1;
        $halamanAwal = ($halaman>1) ? ($halaman * $perHalaman) - $perHalaman : 0;

        $prev = $halaman - 1;
        $next = $halaman + 1;

        $menu = mysqli_query($koneksi,"SELECT * FROM menu");
        $jumlahMenu = mysqli_num_rows($menu);
        $totalHalaman = ceil($jumlahMenu / $perHalaman);
        $query = mysqli_query($koneksi,"SELECT * FROM menu WHERE id_menu LIKE '%$keyword%' OR nama_menu LIKE '%$keyword%' OR id_menu LIKE '%$keyword%' LIMIT $halamanAwal,$perHalaman");
        while($d = mysqli_fetch_assoc($query)){
     ?>

      <tr>
        <td><?php echo $d['id_menu'];?></td>
        <td><img src="img/<?php echo $d['gambar']?>" class="gambarsize1"></td>
        <td><?php echo $d['nama_menu'];?></td>
        <td><?php echo $d['info_menu'];?></td>
        <td><?php echo $d['harga'];?></td>
        <td><?php echo $d['kategori'] ?></td>
        <td><?php  $d['ketersidiaan'];
        if ($d >=  1) echo "Ada";
        else if ($d < 1) echo "Habis";
        ?></td>
        <td colspan="2">
          <form action="#">
            <input type="text" value="" hidden>
            <a href="editmenu.php?id=<?php echo $d['id_menu'];?>"class="btn btn-success"><img src="img/edit-icon.png" style="height:20px; width:20px;"> Edit</a>
            <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this menu?')" href="functionhapusmenu.php?id=<?php echo $d['id_menu'];?>"><img src="img/trash-can.png" style="height:20px; width:15px;"> Hapus</a>
          </form>
          </form>
        </td>
      </tr>
      <?php
    }
    ?>

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

  </ul>
</div>
