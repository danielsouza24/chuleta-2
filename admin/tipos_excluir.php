<?php 
include "../conn/connect.php";
$conn->quey("Delete from tipos where id = ".$_GET['id']);
header("location: tipos_lista.php")
?>