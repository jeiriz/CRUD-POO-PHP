<?php
$dsn = 'mysql:dbname=personas;host=127.0.0.1';
$usuario = 'root';
$contraseña = '';

try {
    $gbd = new PDO($dsn, $usuario, $contraseña);
} catch (PDOException $e) {
    echo 'Falló la conexión: ' . $e->getMessage();
}

$result = $gbd->query("select * from personas");

$row = $result->fetchAll();

var_dump($row);
foreach ($row as $fila){
	echo $fila['id_persona'].'<br />';
}
var_dump($row);
?>