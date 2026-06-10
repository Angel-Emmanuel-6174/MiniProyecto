<?php
$host     = "localhost";
$usuario  = "root";
$password = "";
$base     = "mi_proyecto";

mysqli_report(MYSQLI_REPORT_OFF);

$conn = new mysqli($host, $usuario, $password, $base);

if ($conn->connect_error) {
    if (!headers_sent()) {
        header("Content-Type: application/json");
    }
    http_response_code(500);
    echo json_encode([
        "success" => false,
        "message" => "Conexión fallida: " . $conn->connect_error
    ]);
    exit;
}
