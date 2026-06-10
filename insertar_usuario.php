<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    echo json_encode(["success" => false, "message" => "Método no permitido."]);
    exit;
}

$nombre   = trim($_POST["name"] ?? "");
$email    = trim($_POST["email"] ?? "");
$password = $_POST["password"] ?? "";

if ($nombre === "" || $email === "" || $password === "") {
    http_response_code(400);
    echo json_encode(["success" => false, "message" => "Faltan datos."]);
    exit;
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sss", $nombre, $email, $passwordHash);

if ($stmt->execute()) {
    echo json_encode(["success" => true, "message" => "Usuario registrado correctamente."]);
} else {
    http_response_code(500);
    echo json_encode(["success" => false, "message" => "Error al guardar: " . $stmt->error]);
}

$stmt->close();
$conn->close();
