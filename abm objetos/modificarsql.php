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

$producto->updateProducto($_POST['codigo'],$_POST['nombre'], $_POST['descripcion'],$_POST['precio']);

if ($producto) {
	echo '  <script type="text/javascript">
				alert("Producto modificado");
				window.location="inicio.php"
			</script>';
}

?>
