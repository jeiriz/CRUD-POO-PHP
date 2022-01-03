<?php
function __autoload($nombreclase){
	require ('clases/'.$nombreclase.'.php');
}
require ('define.php');
?>