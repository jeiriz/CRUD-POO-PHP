<?php 
session_start();
if (!isset($_SESSION['usuario'])){
	echo '  <script type="text/javascript">
                alert("Para acceder a este contenido tiene que estar logueado");
                window.location="index.php"
            </script>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Carrito de Compras</title>
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
			<a href="salir.php" class="navbar-brand">Cerrar Sesion</a>
		</div>
		
	</div>
</nav>

<h2>Alta Producto</h2>

<form action="altasql.php" method="post">
  <div class="form-group">
    <label for="nombre">Nombre del producto</label>
    <input type="text" class="form-control" id="nombre" placeholder="Nombre" name="nombre">
  </div>
  <div class="form-group">
    <label for="descripcion">Descripcion del producto</label>
    <textarea class="form-control" id="descripcion" rows="3" name="descripcion"></textarea>
  </div>
  <div class="form-group">
    <label for="precio">Precio del producto</label>
    <input type="text" class="form-control" id="precio" placeholder="Precio" name="precio">
  </div>
  
  <button type="submit" class="btn btn-default">Alta</button>
  <button type="reset" class="btn btn-default">Limpiar</button>
</form>


</div>
</div> 
<div id="push"></div>
</div> 
<footer><div class="container">Este es el pie de página</div></footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>