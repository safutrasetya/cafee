<?php 
$connect = mysqli_connect("localhost", "root","","orari");

function mysql_query($query){
    $connect = mysqli_connect("localhost", "root","","orari");
    $result = mysqli_query($connect,$query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}


?>