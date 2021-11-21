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
  function hiddenFormPesan($pesananid, $IDQTTUPDATE){
    $idkey = array_search($pesananid, array_column($_SESSION['keranjang'], 'menu_id'));
    $kuantitas = $_SESSION['keranjang'][$idkey]['menu_quantity'];
    echo "
    <input hidden name='updatepesanan[$IDQTTUPDATE][pesananidupdate]' value='$pesananid'>
    <input hidden name='updatepesanan[$IDQTTUPDATE][kuantitasupdate]' value='$kuantitas'>
    ";
  }
?>
