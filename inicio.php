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
	echo '<a href="alta.php"><button type="button" class="btn btn-info">Nuevo Producto</button></a><br /><br />';
	echo '<a href="carrito.php"><button type="button" class="btn btn-info">Mi carrito</button></a><br /><br />';
	
	require ('autoload.php');

	
	// $base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
	// $producto = new Producto($base);
	// Lo hice hardcodeado porque no tengo tanto tiempo libre, la idea es hacerlo con clases la proxima
	require('biblioteca_clases/pagination_class.php');
	$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
	$producto = new Producto($base);

	$productos = $producto->getProductos();
	$db = new mysqli("localhost", "root", "", "carrocompras");

	$limit = 5;
	$offset= !empty($_GET["page"]) ? ($_GET["page"] - 1) * $limit : 0;
	//count records
	$query = $db->query("SELECT COUNT(*) as numrows FROM productos");
	$result = $query->fetch_array();
	$rowCount = $result['numrows'];
	 
	$pagConfig = array(
		'baseURL' => 'inicio.php',
		'totalRows' => $rowCount,
		'perPage' => $limit,
	);

	$pagination =  new Pagination($pagConfig);

	if ($db->connect_errno) {
		echo "Fallo al conectar a MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
	}
	
	$qry = $db->query("SELECT * FROM productos LIMIT $offset, $limit");
	
	if ($qry->num_rows > 0){
		echo '<table class="table table-striped">
				<tr class="active">
					<td>Código</td>
					<td>Producto</td>
					<td>Descripcion</td>
					<td>Precio</td>
					<td colspan="3">Operaciones</td>
				</tr>';
		while ($row = $qry->fetch_assoc()) {
			echo '<tr>
					<td>'.$row['codigo'].'</td>
					<td>'.$row['producto'].'</td>
					<td>'.$row['descripcion'].'</td>
					<td>'.$row['precio'].'</td>
					<td><a href="modificar.php?codigo='.$row['codigo'].'"><button type="button" class="btn btn-warning">Modificar</button></a></td>
					<td><a href="eliminar.php?codigo='.$row['codigo'].'"><button type="button" class="btn btn-danger">Eliminar</button></a></td>
					<td><a href="carrito.php?codigo='.$row['codigo'].'"><button type="button" class="btn btn-success">Agregar al carrito</button></a></td>
				</tr>';
		}
		echo '</table>';
		echo $pagination->createLinks();
	}
	else{
		echo 'Aún no hay datos ingresados';
	}


?>
</div>
</div> 
<div id="push"></div>
</div> 
<footer><div class="container">Este es el pie de página</div></footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>