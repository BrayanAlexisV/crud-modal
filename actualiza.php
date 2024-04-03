<?php
session_start();
require 'config/database.php';

$id = $conn->real_escape_string($_POST['id']);
$nombre = $conn->real_escape_string($_POST['nombre']);
$descripcion = $conn->real_escape_string($_POST['descripcion']);

$sql = "UPDATE producto SET nombre ='$nombre', descripcion = '$descripcion' WHERE id=$id";

if ($conn->query($sql)) {
    $_SESSION['color'] = "success";
    $_SESSION['msg'] = "Registro actualizado correctamente";
} else {
    $_SESSION['color'] = "danger";
    $_SESSION['msg'] = "Error al actualizar el registro: " . $conn->error;
}

header('Location: index.php');
?>
