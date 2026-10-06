<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

try {
    //                  servidor     usuario  contraseña        base
    $mysqli = new mysqli('localhost', 'root', '123456', 'agenda');
    echo '✅ Conexión exitosa a la base "agenda"';
    $mysqli->close();
} catch (mysqli_sql_exception $e) {
    echo '❌ Error: ' . $e->getMessage();
}