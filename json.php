<?php
include("conexion.php");
// Conexión a la base de datos
$con = conectar();



// Consulta SQL para obtener los datos de la tabla
$sql = "SELECT * FROM clientes";
$resultado = $con->query($sql);

// Almacenar los resultados de la consulta en un array
$datos = array();
while ($row = $resultado->fetch_assoc()) {
    $datos[] = $row;
}

// Convertir el array en formato JSON
$json = json_encode($datos);

// Configurar las cabeceras HTTP para que el navegador reconozca el archivo como un archivo .json descargable
header("Content-Type: application/json");
header("Content-Disposition: attachment; filename=datos.json");

// Enviar los datos JSON al navegador
echo $json;
?>
