<?php 
session_start();
if (isset ($_SESSION["usuario"])) {
	echo '<script type="text/javascript">window.location="inicio.php";</script>';
} 
?>
<!DOCTYPE html>
<html>
<head>
<meta charset=utf-8 />

<head>
	<title>ABM Productos</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link href="http://fonts.googleapis.com/css?family=Asap:400,700" rel="stylesheet" type="text/css">
</head>

<body>
<div id="wrap">  <div id="main"> 
<div class="container">
<nav class="navbar navbar-inverse" role="navigation">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#acolapsar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span> 
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="./" class="navbar-brand">ABM Productos</a>
		</div>		
	</div>
</nav>
</div>
<div class="container">
	
	<h3>Iniciar sesión</h3><br /><br />
	<div id="login">
		<form method="post" action="validar.php">
			<input type="text" name="usuario" value="" placeholder="Usuario"/><br /><br />
			<input type="password" name="password" value="" placeholder="Contraseña"/><br /><br />
			<input type="submit" name="" value="Ingresar" />
		</form>	
		<br /><br />		
	</div>
	
</div>
</div> 
<div id="push"></div>
</div> 
<footer><div class="container">Este es el pie de página</div></footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>