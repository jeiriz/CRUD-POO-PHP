<?php
class clsFiltroSql{
	private $conexion;

	function __construct($mysqli){
		$this->conexion = $mysqli;
	}
	
	public function filtrar($texto){
		if (!is_array($texto)){
			return $this->procesar($texto);
		}
		else{
			$texto = array_map(array($this, 'procesar'), $texto);
			return $texto;
		}
	}
	
	private function procesar($t){
		if (is_string($t)){
			$t = mysqli_real_escape_string($this->conexion,$t);
		}
		
		if (is_int($t)){
			$t = (int) $t;
		}
		
		return $t;
	}
}

?>