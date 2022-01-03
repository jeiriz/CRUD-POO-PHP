<?php
	//Empezaremos definiendo la jerarquia de clases

	class classPoligono
	{
		function calculo()
		{
			echo 'El area depende del tipo de poligono';
		}
	}
		
	class classCuadrado extends classPoligono
	{
		function calculo()
		{
			echo 'area de un cuadrado : a=l*l<br>';
		}
	}

	class classRectangulo extends classPoligono
	{
		function calculo()
		{
			echo 'area de un rectangulo : a=b*h<br>';
		}
	}

	class classTriangulo extends classPoligono
	{
		function calculo()
		{
			echo 'area de un triangulo : a=(b*h)/2<br>';
		}
	}
	/* fin definicion de la jerarquia de clases */
		
	/* 
	definicion de la funcion encargada de realizar las llamadas polimorficas al metodo "calculo"
	A destacar que en la definicion de la funcion definimos el tipo parametro que pasamos por referencia, esto no es obligatorio en PHP, pero nos ayuda a entender el concepto y asi poder aplicarlo 
	en otros lenguajes mas estrictos.
	 */
	function area(classPoligono $obj)
	{
		$obj->calculo();
	}

	/*
	Creamos los objetos necesarios
	*/
	$cuadrado = new classCuadrado;
	$rectangulo = new classRectangulo;
	$triangulo = new classTriangulo;

	/*
	Ejecutamos la funcion encargada 
	de realizar la llamada polimorfica
	*/
	area($cuadrado);
	area($rectangulo);
	area($triangulo);
?>
