<?php
$conn = @new mysqli("localhost", "root", "", "tienda_nike");

if ($conn->connect_error) {
    die("Error de conexión a la base de datos.");
}
?>