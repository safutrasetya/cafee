<?php
include("includes/koneksi.php");
        $id_menu   =$_POST['id'];
        $gambar = $_POST['gambar'];
        $ketersidiaan = $_POST['ketersidiaan'];
        $nama_menu = $_POST['nama_menu'];
        $info_menu = $_POST['info_menu'];
        $harga = $_POST['harga'];
        $kategori = $_POST['kategori'];


if ($koneksi){
          $sql = "UPDATE menu SET gambar='$gambar',ketersidiaan='$ketersidiaan',nama_menu='$nama_menu',info_menu='$info_menu',harga='$harga', kategori='$kategori'  WHERE id_menu='$id_menu'";
          mysqli_query($koneksi,$sql);
          echo "
          <script>
          alert('Menu berhasil diperbarui!');
          document.location.href = 'daftarmenu.php';
          </script>
          ";
        } elseif ($koneksi->connect_error) {
              echo"
              <script>
              alert('Menu gagal ditambahkan!');
              document.location.href = 'editmenu.php';
              </script>
              ";
          }

?>
