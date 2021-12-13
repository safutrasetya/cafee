$cekindb = "SELECT * FROM menu where nama_menu = '{$nama_menu}'";
$cekdb = mysqli_query($koneksi, $cekindb);
if(count($cekdb)>0){
  echo '
    <div class="jumbotron">Nama menu ini sudah ada di daftar</div>
  '
}
