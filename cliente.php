<?php
include("conexion.php");
$con = conectar();


if (isset($_POST['buscar'])) {
    $cliente = $_POST['cliente'];
    $sql = "SELECT * FROM clientes WHERE Cliente LIKE '%$cliente%'";
}

else if (isset($_POST['RFC'])) {
    $rfc = $_POST['RFC'];
    $sql = "SELECT * FROM clientes WHERE RFC LIKE '%$rfc%'";
}

else {
    $sql = "SELECT * FROM clientes";
}

$query = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clientes</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">

    <!-- Datatables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap5.min.css">

    <!-- Estilos personalizados -->
    <link rel="stylesheet" href="client.css">
</head>

<body>

    <div class="container mt-5">

        <!-- Formulario para añadir un cliente -->
        <div class="row mb-4">
            <div class="col-md-4">
                <h1>Añadir cliente</h1>
                <form action="insertar.php" method="POST">
                    <div class="mb-3">
                        <label class="form-label">ID</label>
                        <input type="text" class="form-control" name="ID" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Cliente</label>
                        <input type="text" class="form-control" name="Cliente" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">RFC</label>
                        <input type="text" class="form-control" name="RFC" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">C.P</label>
                        <input type="text" class="form-control" name="CP" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">ITEM</label>
                        <input type="text" class="form-control" name="ITEM" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Impuestos ITEMs</label>
                        <input type="text" class="form-control" name="Impuestos" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Añadir</button>
                </form>
            </div>





        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-12 mt-3">
                    <h1 class="text-center mb-3">Tabla de clientes</h1>

                    <table class="table table-bordered" id="mitabla">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Cliente</th>
                                <th>RFC</th>
                                <th>C.P</th>
                                <th>Item</th>
                                <th>Impuestos Item</th>
                                <th>Editar</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while ($row = mysqli_fetch_array($query)) { ?>
                                <tr>
                                    <td><?php echo $row['ID'] ?></td>
                                    <td><?php echo $row['Cliente'] ?></td>
                                    <td><?php echo $row['RFC'] ?></td>
                                    <td><?php echo $row['CP'] ?></td>
                                    <td><?php echo $row['ITEM'] ?></td>
                                    <td><?php echo $row['Impuestos'] ?></td>
                                    <td><a href="actualizar.php?id=<?php echo $row['ID'] ?>" class="btn btn-info">Editar</a></td>
                                    <td><a href="delete.php?id=<?php echo $row['ID'] ?>" class="btn btn-danger">Eliminar</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>

                    <div class="text-end mt-3">
                        <a href="json.php" class="btn btn-success" download>Descargar JSON</a>
                    </div>

                </div>
            </div>
        </div>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

        <!-- DataTables JS -->
        <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

        <script>
            $(document).ready(function() {
                $('#mitabla').DataTable({
                    language: {
                        url: 'https://cdn.datatables.net/plug-ins/1.11.3/i18n/es_es.json'
                    }
                });
            });
        </script>

</body>

</html>