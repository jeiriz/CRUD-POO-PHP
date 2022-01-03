<?php 
	/*  Empezaremos definiendo la interface  */
	interface Poligono
	{
		function calculo();
	}

	/*  A continuacion defino las clases que implementan  la interface  */
	class classCuadrado implements Poligono
	{
		function calculo()
		{
			echo 'area de un cuadrado : a=l*l<br>';
		}
	}

	class classRectangulo implements Poligono
	{
		function calculo()
		{
			echo 'area de un rectangulo : a=b*h<br>';
		}
	}

	class classTriangulo implements Poligono
	{
		function calculo()
		{
			echo 'area de un triangulo : a=(b*h)/2<br>';
		}
	}

	/* 
	definicion de la funcion encargada de realizar las llamadas polimorficas al metodo "calculo"
	A destacar que en la definicion de la funcion definimos el tipo parametro que pasamos por referencia, esto no es obligatorio en PHP, pero nos ayuda a entender el concepto y asi poder aplicarlo en otros lenguajes mas estrictos.
	*/
	function area(Poligono $obj)
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
