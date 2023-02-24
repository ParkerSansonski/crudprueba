<?php 
include("conexion.php");

$con = conectar();

$id = $_POST['ID'];
$cliente = $_POST['Cliente'];
$rfc = $_POST['RFC'];
$cp = $_POST['CP'];
$item = $_POST['ITEM'];
$impuestos = $_POST['Impuestos'];

$sql = "UPDATE clientes SET ID='$id', Cliente='$cliente', RFC='$rfc', CP='$cp', ITEM='$item', Impuestos='$impuestos' WHERE ID='$id'";
$query = mysqli_query($con, $sql);

if ($query) {
    header("Location: cliente.php");
}
