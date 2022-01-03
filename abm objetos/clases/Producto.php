<?php
class Producto {
	private $db;
	
	public function __construct($base){
		$this->db = $base;
	}

	public function __destruct() {
		$this->db = null;
	}

	public function insertProducto($nombre,$descripcion,$precio){		
		$respuesta = $this->db->enviarQuery("insert into productos values (null, '$nombre', '$descripcion', $precio) ");		
		
		if (!$respuesta){
			echo $this->db->error; 
			return false;
		}
		else{
			return $respuesta;
		}
	}
	
	
	public function getProductos(){
		//echo $this->db->error; 
		$respuesta = $this->db->enviarQuery("select * from productos");
		if (!$respuesta and $this->db->error!=''){
			echo $this->db->error; 
			return false;
		}
		else{
			if (!$respuesta){
				return false;
			}
			else {
				return $respuesta;
			}
		}
	}

	public function getProducto($codigo){
		//echo $this->db->error; 
		$respuesta = $this->db->enviarQuery("select * from productos where codigo = $codigo");
		if (!$respuesta and $this->db->error!=''){
			echo $this->db->error; 
			return false;
		}
		else{
			if (!$respuesta){
				return false;
			}
			else {
				return $respuesta;
			}
		}
	}
	
	public function updateProducto($idproducto,$nombre,$descripcion,$precio){		
		$respuesta = $this->db->enviarQuery("UPDATE productos SET producto = '$nombre',
																  descripcion = '$descripcion',
																  precio = $precio
															  WHERE codigo = $idproducto");
		
		
		if (!$respuesta and $this->db->error!=''){
			echo $this->db->error; 
			return false;
		}
		else{
			if (!$respuesta){
				return true;
			}
			else {
				return $respuesta;
			}
		}
	}
	
	public function deleteProducto($idproducto){		
		$respuesta = $this->db->enviarQuery("DELETE FROM productos WHERE codigo = $idproducto");	
		
		if (!$respuesta and $this->db->error!=''){
			echo $this->db->error; 
			return false;
		}
		else{
			return $respuesta;
		}
	}
	
}
?>