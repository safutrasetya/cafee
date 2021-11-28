<?php

$query = "SELECT * FROM menu WHERE kategori = 2 ";
$hasil = mysqli_query($koneksi, $query);
$banyakdata = 0;
//TABEL
foreach ($hasil as $data){
    echo "<div class='col mt-4'>
      <div class='card' style='padding: 10px;'>
        <img src='img/menu_makanan.jpg' class='card-img-top' alt='img/menu_makanan.jpg'>
          <h5 class='card-title'>$data[nama_menu]</h5>
          <p class='card-text'>$data[harga]</p>
          <form action='' method='get'>
            <input type='text' value='$data[id_menu]' hidden name='id_pesanan_baru'>
            <button class='btn btn-primary' type='submit' name='addMakanan'>+</button>
          </form>
      </div>
    </div>";
    $banyakdata++;
}
?>
