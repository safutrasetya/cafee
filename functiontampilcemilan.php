<?php

$query = "SELECT * FROM menu WHERE kategori = 3 ";
$hasil = mysqli_query($koneksi, $query);
$banyakdata = 0;
//TABEL
foreach ($hasil as $data){
  if($banyakdata%4 == 0){
    echo "</tr>";
  }
  if($banyakdata % 4 == 0){
    echo "<tr>
    <td>
      <div class='card' style='width: 18rem;'>
        <img src='img/menu_makanan.jpg' class='card-img-top' alt='img/menu_makanan.jpg'>
        <div class='card-body'>
          <h5 class='card-title'>$data[nama_menu]</h5>
          <p class='card-text'>$data[info_menu]</p>
          <p class='card-text'>$data[harga]</p>
          <form action='' method='post'>
            <input type='text' value='$data[id_menu]' hidden name='id_pesanan_baru'>
            <button class='btn btn-primary' type='submit' name='addMakanan'>+</button>
          </form>
        </div>
      </div>
    </td>
    <td>";
    $banyakdata++;
  }elseif($banyakdata % 4 != 0){
    echo "
    <td>
      <div class='card' style='width: 18rem;'>
        <img src='img/menu_makanan.jpg' class='card-img-top' alt='img/menu_makanan.jpg'>
        <div class='card-body'>
          <h5 class='card-title'>$data[nama_menu]</h5>
          <p class='card-text'>$data[info_menu]</p>
          <p class='card-text'>$data[harga]</p>
          <form action='' method='post'>
            <input type='text' value='$data[id_menu]' hidden name='id_pesanan_baru'>
            <button class='btn btn-primary' type='submit' name='addMakanan'>+</button>
          </form>
        </div>
      </div>
    </td>
    <td>";
    $banyakdata++;
  }

}
echo "</tr>"
?>
