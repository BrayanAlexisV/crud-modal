<?php

$conn = new mysqli("localhost", "root", "", "ejercicio");
if ($conn->connect_error){
    die("Error en conexion" . $conn->connect_error)
}