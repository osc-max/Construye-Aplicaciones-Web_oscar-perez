<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nike Store - Carrito</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>

    <header>
        <h1>NIKE STORE</h1>
        <nav>
            <a href="index.html">Inicio</a>
            <a href="calzado.php">Calzado</a>
            <a href="ropa.php">Ropa</a>
            <a href="accesorios.php">Accesorios</a>
            <a href="carrito.php">Carrito </a>
            <a href="login.php">Cuenta / Login</a>
        </nav>
    </header>

    <main class="contenido">
        <h2>Tu Carrito de Compras</h2>

        <?php if (isset($_GET['compra']) && $_GET['compra'] === 'exitosa'): ?>
            <p style="background-color: #d4edda; color: #155724; padding: 12px; border-radius: 5px; border: 1px solid #c3e6cb; text-align: center; font-weight: bold;">
                ¡Muchas gracias por tu compra! Tu pedido ha sido procesado con éxito.
            </p>
        <?php endif; ?>

        <?php if (!empty($productos)): ?>
            <table style="width:100%; background:white; border-collapse:collapse; margin-bottom:20px; color:#333;">
                <thead>
                    <tr style="background:#111; color:white; text-align:left;">
                        <th style="padding:10px;">Producto</th>
                        <th style="padding:10px;">Precio</th>
                        <th style="padding:10px;">Cantidad</th>
                        <th style="padding:10px;">Subtotal</th>
                        <th style="padding:10px;">Acción</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($productos as $item): ?>
                        <tr style="border-bottom:1px solid #ddd;">
                            <td style="padding:10px; display:flex; align-items:center; gap:10px;">
                                <img src="<?php echo htmlspecialchars($item['imagen']); ?>" width="50" height="50" style="object-fit:cover;">
                                <?php echo htmlspecialchars($item['producto_nombre']); ?>
                            </td>
                            <td style="padding:10px;">$<?php echo number_format($item['precio'], 2); ?></td>
                            <td style="padding:10px;"><?php echo $item['cantidad']; ?></td>
                            <td style="padding:10px;">$<?php echo number_format($item['precio'] * $item['cantidad'], 2); ?></td>
                            <td style="padding:10px;">
                                <a href="carrito.php?eliminar=<?php echo $item['id']; ?>" style="color:red; font-weight:bold; text-decoration:none;">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>

            <h3>Total a Pagar: $<?php echo number_format($total, 2); ?></h3>

            <form action="vaciar_carrito.php" method="POST">
                <button type="submit" class="btn-comprar" style="max-width:200px; margin-top:15px; background:green; color:white; padding:10px; border:none; cursor:pointer; font-weight:bold;">
                    Finalizar Compra
                </button>
            </form>

        <?php else: ?>
            <p>Tu carrito está vacío actualmente.</p>
        <?php endif; ?>
    </main>

    <footer>
        <p><strong>Desarrollado por:</strong> Oscar Jahir Perez Munoz</p>
        <p><strong>Grupo:</strong> 5°I</p>
        <p><strong>No. Control:</strong> 0611</p>
    </footer>

</body>
</html>