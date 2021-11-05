<?php
if(!empty($_SESSION['nama'])){
    echo $_SESSION['nama'];
}elseif(!empty($_SESSION['meja'])){
    echo "MEJA : ";echo $_SESSION['meja'];
}
?>
