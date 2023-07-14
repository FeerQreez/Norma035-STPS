<?php

// Conectar auna base de datos de ODBC usando un alias

$username = 'root';
$password = '';
$connection = new PDO('mysql:dbname=nom035;host=127.0.0.1', $username, $password );

/*
$dsn = 'db_nom035';
$usuario = 'root';
$contraseña = '12345';
$charset = 'utf8';
$collate = 'utf8_unicode_ci';

try {
    $gbd = new PDO($dsn, $usuario, $contraseña);
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}
*/
?>
