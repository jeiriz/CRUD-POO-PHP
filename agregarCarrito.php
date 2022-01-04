<?php 
session_start();
if (!isset($_SESSION['usuario'])){
	echo '  <script type="text/javascript">
                alert("Para acceder a este contenido tiene que estar logueado");
                window.location="index.php"
            </script>';
}
	
require ('autoload.php');

$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
$carrito = new Carrito($base);
$producto = new Producto($base);

$productoEncontrado = $producto->getProducto($_GET['codigo']);
$carrito->insertProductCarrito($productoEncontrado[0]['producto'],$productoEncontrado[0]['precio'],$_GET['codigo']);

if ($carrito) {
	echo '  <script type="text/javascript">
				alert("Producto insertado");
				window.location="inicio.php"
			</script>';
}

?>
