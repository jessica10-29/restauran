<?php
include "conexion.php";
$id = $_GET['id'];

$pedido = $conn->query("SELECT * FROM pedidos WHERE id=$id")->fetch_assoc();

if (isset($_POST['actualizar'])) {
    $conn->query("UPDATE pedidos SET
        cliente='$_POST[cliente]',
        plato='$_POST[plato]',
        cantidad='$_POST[cantidad]',
        estado='$_POST[estado]'
        WHERE id=$id");
    header("Location: index.php");
}
?>

<form method="POST">
<input name="cliente" value="<?= $pedido['cliente'] ?>">
<input name="plato" value="<?= $pedido['plato'] ?>">
<input name="cantidad" value="<?= $pedido['cantidad'] ?>">
<select name="estado">
<option><?= $pedido['estado'] ?></option>
<option>Pendiente</option>
<option>Preparando</option>
<option>Despachado</option>
</select>
<button name="actualizar">Actualizar</button>
</form>
