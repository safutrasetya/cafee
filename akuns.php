<?php
include("includes/koneksi.php");

$keyword = $_GET["keyword"];
?>
<div>
<table class="table table-bordered table-info">
   <thead class="h5">
     <tr style="text-align:center">
       <td>Id</td>
       <td>Foto</td>
       <td>Username</td>
       <td>Nama</td>
       <td>Email</td>
       <td>No. Handphone</td>
       <td>Action</td>
     </tr>
   </thead>
   <tbody>
     <?php
         $perHalaman = 6;
         $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman']  : 1;
         $halamanAwal = ($halaman>1) ? ($halaman * $perHalaman) - $perHalaman : 0;

         $prev = $halaman - 1;
         $next = $halaman + 1;

         $akun = mysqli_query($koneksi,"SELECT * FROM akun");
         $jumlahAkun = mysqli_num_rows($akun);
         $totalHalaman = ceil($jumlahAkun / $perHalaman);

         $query = mysqli_query($koneksi,"SELECT * FROM akun WHERE id LIKE '%$keyword%' OR nama LIKE '%$keyword%' OR username LIKE '%$keyword%' LIMIT $halamanAwal,$perHalaman");
          while($d = mysqli_fetch_assoc($query)){

      ?>
     <tr>
       <td><?php echo $d['id'];?></td>
       <td><img src="img/<?php echo $d['gambar']?>" class="gambarsize1"></td>
       <td><?php echo $d['username'] ?></td>
       <td><?php echo $d['nama'] ?></td>
       <td><?php echo $d['email'];?></td>
       <td><?php echo $d['No_Hp'];?></td>
       <td>
         <form action="#">
           <input type="text" value="" hidden>
           <a href="editprofil.php?id=<?php echo $d['id'];?>"class="btn btn-success"><img src="img/edit-icon.png" style="height:20px; width:20px;"> Edit</a>
           <a class="btn btn-danger" onclick="return confirm('Are you sure to delete this account?')" href="functionhapusakun.php?id=<?php echo $d['id'];?>"><img src="img/trash-can.png" style="height:20px; width:15px;"> Hapus</a>
         </form>
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
</div>
