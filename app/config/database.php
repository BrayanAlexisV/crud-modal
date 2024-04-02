<?php

$conn = new mysqli("localhost", "root", "password", "ejercicio");
if ($conn->connect_error){
    die("Error en conexion" . $conn->connect_error)
}