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


<?php
	echo '<a href="inicio.php"><button type="button" class="btn btn-info">Volver</button></a><br /><br />';	

	echo '<h1> Carrito de Compras </h1>';
	echo "<br />";
	require ('autoload.php');

	
	$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
	$carrito = new Carrito($base);

	$carritoOk = $carrito->getProductosCarrito();
	
	if ($carritoOk){
		echo '<table class="table table-striped">
				<tr class="active">
					<td>Código</td>
					<td>Producto</td>
					<td>Precio</td>
					<td colspan="1">Operaciones</td>
				</tr>';
		for ($i=0;$i<count($carritoOk);$i++){
			echo '<tr>
					<td>'.$carritoOk[$i]['idproducto'].'</td>
					<td>'.$carritoOk[$i]['producto'].'</td>
					<td>'.$carritoOk[$i]['precio'].'</td>
					<td><a href="eliminarCarrito.php?codigo='.$carritoOk[$i]['idproducto'].'" onclick="if(!confirm(\'Se borrará el producto seleccionado\'))return false"><button type="button" class="btn btn-info">Eliminar</button></a></td>
				</tr>';
			
		}
		echo '</table>';
	}
	else{
		echo '<h3>Aún no hay datos ingresados</h3>';
	}


?>
</div>
</div>
</div>

 
<footer><div class="container">Este es el pie de página</div></footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>