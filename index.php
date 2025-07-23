<?php include 'db.php'; ?>
<!DOCTYPE html>
<html lang="es">
<head>

<!-- DataTables CSS -->
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <meta charset="UTF-8">
    <title>Productos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

    <h2 class="mb-4">Lista de Productos</h2>
    <a href="create.php" class="btn btn-primary mb-3">Nuevo Producto</a>

    <table id="tablaProductos" class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th><th>Nombre</th><th>Precio</th><th>Cantidad</th><th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $result = $conn->query("SELECT * FROM productos");
        while ($row = $result->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['id'] ?></td>
                <td><?= $row['nombre'] ?></td>
                <td>$<?= $row['precio'] ?></td>
                <td><?= $row['cantidad'] ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-warning btn-sm">Editar</a>
                    <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Eliminar producto?')">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

<script>
  $(document).ready(function () {
    $('#tablaProductos').DataTable({
      "language": {
        "search": "Buscar:",
        "lengthMenu": "Mostrar _MENU_ registros",
        "info": "Mostrando _START_ a _END_ de _TOTAL_ registros",
        "paginate": {
          "first": "Primero",
          "last": "Último",
          "next": "Siguiente",
          "previous": "Anterior"
        },
        "zeroRecords": "No se encontraron resultados",
        "infoEmpty": "Mostrando 0 a 0 de 0 registros"
      }
    });
  });
</script>

</body>
</html>