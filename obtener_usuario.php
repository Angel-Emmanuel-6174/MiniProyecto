<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once "conexion.php";

$result = $conn->query("SELECT * FROM usuarios");

$datos = [];
while ($fila = $result->fetch_assoc()) {
    $datos[] = $fila;
}

echo json_encode($datos);
?>