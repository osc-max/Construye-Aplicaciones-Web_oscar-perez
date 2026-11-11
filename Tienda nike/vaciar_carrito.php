<?php
session_start();
include('conexion.php');

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

$stmt_cart = $conn->prepare("SELECT producto_nombre, precio, cantidad FROM carrito WHERE usuario_id = ?");
$stmt_cart->bind_param("i", $usuario_id);
$stmt_cart->execute();
$resultado = $stmt_cart->get_result();

if ($resultado->num_rows > 0) {
    $stmt_insert = $conn->prepare("INSERT INTO ventas (usuario_id, producto_nombre, precio, cantidad, subtotal) VALUES (?, ?, ?, ?, ?)");
    
    while ($item = $resultado->fetch_assoc()) {
        $subtotal = $item['precio'] * $item['cantidad'];
        $stmt_insert->bind_param("isdid", $usuario_id, $item['producto_nombre'], $item['precio'], $item['cantidad'], $subtotal);
        $stmt_insert->execute();
    }
}

$stmt_del = $conn->prepare("DELETE FROM carrito WHERE usuario_id = ?");
$stmt_del->bind_param("i", $usuario_id);
$stmt_del->execute();

// Redirigir con confirmación
header("Location: carrito.php?compra=exitosa");
exit();
?>