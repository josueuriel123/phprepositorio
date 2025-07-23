<?php include 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM productos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$producto = $result->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    $stmt = $conn->prepare("UPDATE productos SET nombre=?, descripcion=?, precio=?, cantidad=? WHERE id=?");
    $stmt->bind_param("ssdii", $nombre, $descripcion, $precio, $cantidad, $id);
    $stmt->execute();
    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">
    <h2>Editar Producto</h2>
    <form method="post">
        <div class="mb-3"><label>Nombre:</label><input type="text" name="nombre" class="form-control" value="<?= $producto['nombre'] ?>" required></div>
        <div class="mb-3"><label>Descripción:</label><textarea name="descripcion" class="form-control"><?= $producto['descripcion'] ?></textarea></div>
        <div class="mb-3"><label>Precio:</label><input type="number" step="0.01" name="precio" class="form-control" value="<?= $producto['precio'] ?>" required></div>
        <div class="mb-3"><label>Cantidad:</label><input type="number" name="cantidad" class="form-control" value="<?= $producto['cantidad'] ?>" required></div>
        <button class="btn btn-primary">Actualizar</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </form>
</body>
</html>