<?php
class Usuario {
	private $db;
	
	public function __construct($base){
		$this->db = $base;
	}

	public function __destruct() {
		$this->db = null;
	}

	public function validarUsuario($usuario,$password){		
		return $this->db->enviarQuery("select * from usuarios where usuario = '$usuario' and password = '$password' ");
	}

	
}
?>