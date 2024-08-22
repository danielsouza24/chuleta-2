<?php 
include "../conn/connect.php";
$conn->quey("Delete from produtos where id = ".$_GET['id']);
header("location: produtos_lista.php")
?>