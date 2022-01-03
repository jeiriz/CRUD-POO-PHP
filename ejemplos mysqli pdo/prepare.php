<?php
$mysqli = new mysqli("localhost", "root", "", "login");

/* check connection */
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

$user = "juan";
$pass = "juan1234";

/* create a prepared statement 
Creo una sentencia preparada en la cual reemplazaré los marcadores ? por los valores correspondientes con bind->param
*/
if ($stmt = $mysqli->prepare("SELECT nombre, apellido, email, dni FROM usuarios WHERE usuario=? AND password=?")) {

    /* bind parameters for markers 
	bool mysqli_stmt::bind_param ( string $types , mixed &$var1 [, mixed &$... ] )
	El método bind_param recibe como primer parámetro un string con los tipos de datos que se enviarán para cada uno de los marcadores establecidos en el prepare segun las siguientes posibilidades:
	i 	la variable correspondiente es de tipo entero
	d 	la variable correspondiente es de tipo double
	s 	la variable correspondiente es de tipo string
	b 	la variable correspondiente es un blob y se envía en paquetes
	Y a continuación los valores para los marcadores en el orden en que deben ser reemplazados
	*/
	
    $stmt->bind_param("ss", $user, $pass);

    /* execute query */
    $stmt->execute();

    /* bind result variables
	Vincula variables a la sentencia preparada, en este caso nombre, apellido, email, dni
	*/
    $stmt->bind_result($nombre, $apellido, $email, $dni);

    /* fetch value */
    $stmt->fetch();

    printf("Los datos para el user y pass ingresados son: %s %s %s %s", $nombre, $apellido, $email, $dni);

    /* close statement */
    $stmt->close();
}

/* close connection */
$mysqli->close();
?>
