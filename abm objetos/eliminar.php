<?php 
session_start();
if (!isset($_SESSION['usuario'])){
	echo '  <script type="text/javascript">
                alert("Para acceder a este contenido tiene que estar logueado");
                window.location="index.php"
            </script>';
}
	
require 'autoload.php';

$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
$producto = new Producto($base);

$producto->deleteProducto($_GET['codigo']);

if ($producto) {
	echo '  <script type="text/javascript">
				window.location="inicio.php"
			</script>';
}

?>
