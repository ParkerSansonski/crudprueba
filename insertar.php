<?php 
include("conexion.php");
$con=conectar();

$id=$_POST['ID'];
$cliente=$_POST['Cliente'];
$rfc = $_POST['RFC'];
$cp=$_POST['CP'];
$item=$_POST['ITEM'];
$impuestos=$_POST['Impuestos'];

$sql="INSERT INTO clientes VALUES('$id','$cliente', '$rfc', '$cp', '$item', '$impuestos')";
 
$query= mysqli_query($con, $sql);

if($query){
    Header("Location: cliente.php");
}else{

}
