<?php
include "conexion.php";

// Crear pedido
if (isset($_POST['guardar'])) {
    $cliente = $_POST['cliente'];
    $plato = $_POST['plato'];
    $cantidad = $_POST['cantidad'];
    $estado = $_POST['estado'];

    $conn->query("INSERT INTO pedidos (cliente, plato, cantidad, estado)
                  VALUES ('$cliente','$plato','$cantidad','$estado')");
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Restaurante</title>
<link rel="stylesheet" href="estilos.css">
</head>
<body>

<div class="container">
<h1>🍽️ Pedidos del Restaurante</h1>

<form method="POST">
    <input type="text" name="cliente" placeholder="Nombre del cliente" required>
    <input type="text" name="plato" placeholder="Plato" required>
    <input type="number" name="cantidad" placeholder="Cantidad" required>

    <select name="estado">
        <option>Pendiente</option>
        <option>Preparando</option>
        <option>Despachado</option>
    </select>

    <button name="guardar">Guardar Pedido</button>
</form>

<table>
<tr>
    <th>ID</th>
    <th>Cliente</th>
    <th>Plato</th>
    <th>Cantidad</th>
    <th>Estado</th>
    <th>Acciones</th>
</tr>

<?php
$result = $conn->query("SELECT * FROM pedidos");
while ($row = $result->fetch_assoc()) {
?>
<tr>
<td><?= $row['id'] ?></td>
<td><?= $row['cliente'] ?></td>
<td><?= $row['plato'] ?></td>
<td><?= $row['cantidad'] ?></td>
<td><?= $row['estado'] ?></td>
<td>
    <a href="editar.php?id=<?= $row['id'] ?>">✏️</a>
    <a href="eliminar.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Eliminar?')">🗑️</a>
</td>
</tr>
<?php } ?>

</table>
</div>

</body>
</html>
