<?php
session_start();
require 'config/database.php';

$sqlproductos = "SELECT id, nombre, descripcion FROM producto";
$sqlproductos = $conn->query($sqlproductos);
?>

<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Modal</title>
    <link href="./assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="./assets/css/all.min.css" rel="stylesheet">
</head>

<body class="d-flex flex-column h-100">

    <div class="container py-3">

        <h2 class="text-center">Productos</h2>

        <hr>

        <?php if (isset($_SESSION['msg']) && isset($_SESSION['color'])) { ?>
            <div class="alert alert-<?= $_SESSION['color']; ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['msg']; ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>

        <?php
            unset($_SESSION['color']);
            unset($_SESSION['msg']);
        } ?>

        <div class="row justify-content-end">
            <div class="col-auto">
                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#nuevoModal"><i class="fa-solid fa-circle-plus"></i> Nuevo registro</a>
            </div>
        </div>

        <table class="table table-sm table-striped table-hover mt-4">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acción</th>
                </tr>
            </thead>

            <tbody>
                <?php while ($row = $sqlproductos->fetch_assoc()) { ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['nombre']; ?></td>
                        <td><?= $row['descripcion']; ?></td>
                        <td>
                            <a href="#" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editaModal<?= $row['id']; ?>"><i class="fa-solid fa-pen-to-square"></i> Editar</a>
                            <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#eliminaModal<?= $row['id']; ?>"><i class="fa-solid fa-trash"></i> Eliminar</a>
                        </td>
                    </tr>

                    <!-- Modal para editar producto -->
                    <div class="modal fade" id="editaModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="editaModalLabel<?= $row['id']; ?>" aria-hidden="true">
                        <!-- Contenido del modal para editar -->
                    </div>

                    <!-- Modal para eliminar producto -->
                    <div class="modal fade" id="eliminaModal<?= $row['id']; ?>" tabindex="-1" aria-labelledby="eliminaModalLabel<?= $row['id']; ?>" aria-hidden="true">
                        <!-- Contenido del modal para eliminar -->
                    </div>
                <?php } ?>
            </tbody>
        </table>
    </div>

    
    <?php include 'editaModal.php'; ?>
    

    <script src="./assets/js/bootstrap.bundle.min.js"></script>

</body>

</html>
