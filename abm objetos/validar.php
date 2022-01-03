<?php
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
</head>

<body>
<?php
require 'autoload.php';

$base = new BasedeDatosmysqli(SERVIDOR,USUARIO,PASSWORD,BASE);
$usuario = new Usuario($base);

$usuarioOk = $usuario->validarUsuario($_POST['usuario'],md5($_POST['password']));

if (!$usuarioOk){
?>
	<script type="text/javascript">
		alert('Usuario y/o password inexistentes');
		window.location='index.php'
	</script>	
<?php
}
else{
	$_SESSION['usuario'] = $_POST['usuario'];
	$_SESSION['password'] = $_POST['password'];
?>
	<script type="text/javascript">
		window.location='inicio.php'
	</script>
<?php
}

?>
</body>
</html>