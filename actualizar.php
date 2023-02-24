<?php
include("cliente.php");
$con = conectar();

$id = $_GET['id'];

$sql = "SELECT * FROM clientes WHERE ID='$id'";
$query = mysqli_query($con, $sql);

$row = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <link rel="stylesheet" href="actualizr.css">
</head>

<body>
    <br>
   
    <div class="contenedor-editar">
    <div class="container">
        <form action="update.php" method="POST">
    
            <input type="hidden" name="ID" value="<?php echo $row['ID']  ?> ">
            <input type="text" class="form-control mb-3 " name="Cliente" placeholder="Cliente" value="<?php echo $row['Cliente'] ?>">
            <input type="text" class="form-control mb-3" name="RFC" placeholder="RFC" value="<?php echo $row['RFC'] ?>">
            <input type="text" class="form-control mb-3" name="CP" placeholder="C.P" value="<?php echo $row['CP'] ?>">
            <input type="text" class="form-control mb-3" name="ITEM" placeholder="ITEM" value="<?php echo $row['ITEM'] ?>">
            <input type="text" class="form-control mb-3" name="Impuestos" placeholder="Impuestos ITEMs" value="<?php echo $row['Impuestos'] ?>">

            <input type="submit" class="btn btn-primary btn-block" value="Actualizar">
            
            <input type="submit" class="btn btn-danger" value="Cancelar">
        </form>


    </div>
    </div>


</body>

</html>