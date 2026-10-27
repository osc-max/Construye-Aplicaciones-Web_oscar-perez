<?php
session_start();
include 'conexion.php';

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$sql = "SELECT * FROM productos";
$resultado = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Catálogo Nike</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; background: #fafafa; }
        header { background: #000; color: white; padding: 15px 30px; display: flex; justify-content: space-between; align-items: center; }
        a.salir { color: #ff5555; text-decoration: none; font-weight: bold; }
        .grid { display: flex; flex-wrap: wrap; gap: 20px; padding: 30px; justify-content: center; }
        .tarjeta { background: white; border: 1px solid #ddd; width: 220px; padding: 15px; border-radius: 8px; text-align: center; }
        .precio { color: #111; font-weight: bold; font-size: 1.2em; }
        .btn-comprar { background: #000; color: white; border: none; padding: 8px 15px; border-radius: 4px; cursor: pointer; }
    </style>
</head>
<body>

    <header>
        <h1>NIKE STORE</h1>
        <div>
            Hola, <b><?php echo $_SESSION['usuario']; ?></b> | 
            <a href="login.php" class="salir">Cerrar Sesión</a>
        </div>
    </header>

    <h2 style="text-align:center; margin-top: 30px;">Catálogo de Productos</h2>

    <div class="grid">
        <?php while($producto = $resultado->fetch_assoc()): ?>
            <div class="tarjeta">
                <h3><?php echo $producto['nombre']; ?></h3>
                <p>Categoría: <?php echo $producto['categoria']; ?></p>
                <p class="precio">$<?php echo number_format($producto['precio'], 2); ?></p>
                <button class="btn-comprar">Comprar</button>
            </div>
        <?php endwhile; ?>
    </div>
<footer>
        <p>Oscar Jahir Perez Munoz | 5°I | Programacion | 24308051280611</p>
    </footer>
</body>
</html>