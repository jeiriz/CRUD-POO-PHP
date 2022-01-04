<?php

class Carrito{
    private $db;
    private $codigo;
    private $producto;
    private $precio;


    public function __construct($base){
		$this->db = $base;
    } 
    
    public function insertProductCarrito($producto,$precio,$codigo){
            $respuesta = $this->db->enviarQuery("insert into carrito values ('$producto', $precio,$codigo)");		
            
            if (!$respuesta){
                echo $this->db->error; 
                return false;
            }
            else{
                return $respuesta;
            }
        }

    
    public function deleteProductCarrito($codigo){
            $respuesta = $this->db->enviarQuery("DELETE FROM carrito WHERE idproducto = $codigo");	
            
            if (!$respuesta and $this->db->error!=''){
                echo $this->db->error; 
                return false;
            }
            else{
                return $respuesta;
            }
        }
        

    public function getProductosCarrito(){
        $respuesta = $this->db->enviarQuery("select * from carrito");
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
}