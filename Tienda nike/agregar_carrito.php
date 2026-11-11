<?php
session_start();
include('conexion.php');

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario_id = $_SESSION['usuario_id'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $imagen = $_POST['imagen'];

    $stmt = $conn->prepare("SELECT id, cantidad FROM carrito WHERE usuario_id = ? AND producto_nombre = ?");
    $stmt->bind_param("is", $usuario_id, $nombre);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($fila = $resultado->fetch_assoc()) {
        $nueva_cantidad = $fila['cantidad'] + 1;
        $update = $conn->prepare("UPDATE carrito SET cantidad = ? WHERE id = ?");
        $update->bind_param("ii", $nueva_cantidad, $fila['id']);
        $update->execute();
    } else {
        $insert = $conn->prepare("INSERT INTO carrito (usuario_id, producto_nombre, precio, imagen, cantidad) VALUES (?, ?, ?, ?, 1)");
        $insert->bind_param("isds", $usuario_id, $nombre, $precio, $imagen);
        $insert->execute();
    }

    header("Location: carrito.php");
    exit();
}
?>