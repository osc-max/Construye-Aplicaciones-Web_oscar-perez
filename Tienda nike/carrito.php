<?php
session_start();
include('conexion.php');

if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}

$usuario_id = $_SESSION['usuario_id'];

if (isset($_GET['eliminar'])) {
    $id_eliminar = intval($_GET['eliminar']);
    $stmt_del = $conn->prepare("DELETE FROM carrito WHERE id = ? AND usuario_id = ?");
    $stmt_del->bind_param("ii", $id_eliminar, $usuario_id);
    $stmt_del->execute();
    header("Location: carrito.php");
    exit();
}

$stmt = $conn->prepare("SELECT id, producto_nombre, precio, imagen, cantidad FROM carrito WHERE usuario_id = ?");
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$resultado = $stmt->get_result();

$productos = [];
$total = 0;

if ($resultado) {
    while ($row = $resultado->fetch_assoc()) {
        $productos[] = $row;
        $total += ($row['precio'] * $row['cantidad']);
    }
}

include('carrito_vista.php');
?>