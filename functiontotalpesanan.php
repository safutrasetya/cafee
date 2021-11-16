<?php
  function tampilttlpesanan($pesanangambar, $pesanannama, $pesananharga, $pesananid, $pesanankeyquantity, $IDQTTUPDATE){
    $idkey = array_search($pesananid, array_column($_SESSION['keranjang'], 'menu_id'));
    $kuantitas = $_SESSION['keranjang'][$idkey]['menu_quantity'];

    echo "
      <div class='row my-2 py-2 border'>
        <div class='col-md-2 align-self-center'>
          <img src='img/imgtest1.jpg' class='gambarsize1'>
          <a href='#' class=''></a>
        </div>
        <div class='col-md-4 align-self-center'>
          <p class='font1'>$pesanannama</p>
        </div>

        <div class='col-md-2 align-self-center'>
          <div class='row'>

              <div class='col-md align-self-center'>
              <input name='updatepesanan[$IDQTTUPDATE][pesananidupdate]' value='$pesananid' hidden>
                <input name='updatepesanan[$IDQTTUPDATE][kuantitasupdate]' type='number' value='$kuantitas' class='float-center' min='1' max='999' style='width:50px; text-align:center;'>
              </div>

          </div>
        </div>

        <div class='col-md-3 align-self-center'>
          <p>Rp. $pesananharga,-</p>
        </div>
        <div class='col-md-1 align-self-center'>

        <a href=functionremovepesanan0.php?idRemoval=$pesananid><button type='button' class='btn-close' data-bs-toggle='modal' data-bs-target='#myModal'></button></a>

        </div>
      </div>
    ";
  }
  // <form action='halpesanan.php?action=btnRemove&idRemoval=$pesananid' method='POST'>
  //   <input hidden type='text' name='idRemoval' value='$pesananid'>
  //   <button type='submit' class='btn-close' name='btnRemove' data-bs-toggle='modal' data-bs-target='#myModal'></button>
  function tampilttlharga($pesanangambar, $pesanannama, $pesananharga, $pesananid, $pesananquantity){
    $idkey = array_search($pesananid, array_column($_SESSION['keranjang'], 'menu_id'));
    $kuantitas = $_SESSION['keranjang'][$idkey]['menu_quantity'];
    $pesananharga = $pesananharga * (int)$kuantitas;

    $theharga = "
    <tr>
      <td>$pesanannama <br>$kuantitas</td>
      <td class='text-center'>Rp. $pesananharga,-</td>
    </tr>
    ";
    echo $theharga;
  }
  // <div class='col-md-2 align-self-center'>
  //   <div class='row'>
  //     <div class='col-md-4 align-self-center'>
  //       <button class='btn btn-info rounded-circle'><i class='bi bi-file-minus'></i></button>
  //     </div>
  //     <div class='col-md-3 align-self-center'>
  //       <input class='float-center' style='width:25px; text-align:center;' type='text' value='1'>
  //     </div>
  //     <div class='col-md-3 align-self-center'>
  //       <button class='btn bg-info rounded-circle'><i class='bi bi-file-plus'></i></button>
  //     </div>
  //   </div>
  // </div>
?>
