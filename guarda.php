<?php

session_start();

require 'config/database.php';

$nombre = $conn->real_escape_string($_POST['nombre']);
$descripcion = $conn->real_escape_string($_POST['descripcion']);

$sql = "INSERT INTO producto (nombre, descripcion) VALUES ('$nombre', '$descripcion')";

if ($conn->query($sql) === TRUE) {
    $_SESSION['msg'] = 'Registro agregado exitosamente.';
    $_SESSION['color'] = 'success';
} else {
    $_SESSION['msg'] = 'Error al agregar el registro: ' . $conn->error;
    $_SESSION['color'] = 'danger';
}

$conn->close();

header('Location: index.php');
?>
