<?php
include 'conexion.php';
$mensaje = "";

if (isset($_POST['btn_registro'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO usuarios (nombre, email, password) VALUES ('$nombre', '$email', '$password')";
    if ($conn->query($sql)) {
        $mensaje = "<p style='color:green;'><b>¡Cuenta creada con éxito! Ya puedes iniciar sesión.</b></p>";
    } else {
        $mensaje = "<p style='color:red;'><b>Error: El correo ya existe.</b></p>";
    }
}

if (isset($_POST['btn_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = $conn->query("SELECT * FROM usuarios WHERE email = '$email' AND password = '$password'");
    if ($result && $user = $result->fetch_assoc()) {
        $usuario_logeado = $user['nombre'];
        $productos = $conn->query("SELECT * FROM productos");
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
                    Hola, <b><?php echo $usuario_logeado; ?></b> | 
                    <a href="login.php" class="salir">Cerrar Sesión</a>
                </div>
            </header>

            <h2 style="text-align:center; margin-top: 30px;">Catálogo de Productos</h2>

            <div class="grid">
                <?php while($p = $productos->fetch_assoc()): ?>
                    <div class="tarjeta">
                        <h3><?php echo $p['nombre']; ?></h3>
                        <p>Categoría: <?php echo $p['categoria']; ?></p>
                        <p class="precio">$<?php echo number_format($p['precio'], 2); ?></p>
                        <button class="btn-comprar">Comprar</button>
                    </div>
                <?php endwhile; ?>
            </div>
        </body>
        </html>
        <?php
        exit;
    } else {
        $mensaje = "<p style='color:red;'><b>Correo o contraseña incorrectos.</b></p>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Nike - Login</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; text-align: center; padding-top: 20px; }
        .caja { width: 300px; background: white; padding: 20px; margin: 15px auto; border-radius: 8px; box-shadow: 0 0 10px rgba(0,0,0,0.1); }
        input { width: 90%; padding: 8px; margin: 8px 0; }
        button { width: 95%; padding: 10px; background: #000; color: white; border: none; font-weight: bold; cursor: pointer; }
    </style>
</head>
<body>

    <h2>Tienda Oficial Nike</h2>
    <?php echo $mensaje; ?>

    <div class="caja">
        <h3>Iniciar Sesión</h3>
        <form method="POST">
            <input type="email" name="email" placeholder="Correo" required><br>
            <input type="password" name="password" placeholder="Contraseña" required><br>
            <button type="submit" name="btn_login">Entrar</button>
        </form>
    </div>

    <div class="caja">
        <h3>¿Eres nuevo? Regístrate</h3>
        <form method="POST">
            <input type="text" name="nombre" placeholder="Nombre completo" required><br>
            <input type="email" name="email" placeholder="Correo electrónico" required><br>
            <input type="password" name="password" placeholder="Contraseña" required><br>
            <button type="submit" name="btn_registro">Crear Cuenta</button>
        </form>
    </div>
 <footer>
        <p>Oscar Jahir Perez Munoz | 5°I | Programacion | 24308051280611</p>
    </footer>
</body>
</html>