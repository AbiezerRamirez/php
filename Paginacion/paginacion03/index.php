<?php 

	// Conexión a la base de datos
	require 'bd.php';

	// Establecemos el numero de pagina en la que el usuario se encuentra.
	// Esto lo hacemos por el metodo GET, si no hay ningun valor entonces le asignamos la pagina 1.
	$pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;

	// Establecemos cuantos elementos por pagina queremos cargar.
	$elementosPorPagina = 5;

	// Revisamos desde qué articulo vamos a cargar, dependiendo de la pagina en la que se encuentre el usuario.
	// Comprobamos si la pagina en la que esta es mayor a 1, sino entonces cargamos desde el articulo 0.
	// Si la pagina es mayor a 1 entonces hacemos un calculo para saber desde que elementos cargaremos.
	$inicio = ($pagina > 1) ? ($pagina * $elementosPorPagina - $elementosPorPagina) : 0 ;

	// Preparamos la consulta SQL (https://database.guide/mariadb-found_rows-explained/)
	$articulos = $conexion->prepare("
		SELECT SQL_CALC_FOUND_ROWS * FROM articulos
		LIMIT $inicio, $elementosPorPagina
	");

	// Ejecutamos la consulta
	$articulos->execute();
	$articulos = $articulos->fetchAll();

	// Comprobamos que haya articulos, sino entonces redirigimos.
	if (!$articulos) {
		header('Location: ./../');
	}

	// Calculamos el total de articulos, para despues conocer el numero de paginas de la paginacion.
	$totalArticulos = $conexion->query('SELECT FOUND_ROWS() as total');
	$totalArticulos = $totalArticulos->fetch()['total'];

	// Calculamos el numero de paginas que tendra la paginacion.
	// Para esto dividimos el total de articulos entre los elementos por pagina
	$numeroPaginas = ceil($totalArticulos / $elementosPorPagina);

	require 'vista.php';

?>