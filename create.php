<?php include 'db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $stmt = $conn->prepare("INSERT INTO productos (nombre, descripcion, precio, cantidad) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssdi", $nombre, $descripcion, $precio, $cantidad);
    $stmt->execute();
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nuevo Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Registrar Producto</h2>
    <form method="post">
        <div class="mb-3"><label>Nombre:</label><input type="text" name="nombre" class="form-control" required></div>
        <div class="mb-3"><label>Descripción:</label><textarea name="descripcion" class="form-control"></textarea></div>
        <div class="mb-3"><label>Precio:</label><input type="number" step="0.01" name="precio" class="form-control" required></div>
        <div class="mb-3"><label>Cantidad:</label><input type="number" name="cantidad" class="form-control" required></div>
        <button class="btn btn-success">Guardar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>