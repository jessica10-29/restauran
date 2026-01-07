<?php
$host = "if0_40844915";
$user = "if0_40844915";
$pass = "JJ132420";
$db = "if0_40844915_restaurante";

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}
?>
