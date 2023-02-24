<?php

include("conexion.php");

$con = conectar();

$id = $_GET['id'];

$sql = "DELETE FROM clientes WHERE ID='$id'";
$query = mysqli_query($con, $sql);

if ($query) {
  header("Location: cliente.php");
}

?>