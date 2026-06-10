<?php
$host     = "localhost";
$usuario  = "root";       // usuario por defecto en XAMPP
$password = "";           // vacío por defecto en XAMPP
$base     = "mi_proyecto";

$conn = new mysqli($host, $usuario, $password, $base);

if ($conn->connect_error) {
    die(json_encode(["error" => "Conexión fallida: " . $conn->connect_error]));
}
?>