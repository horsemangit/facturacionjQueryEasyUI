<?php
	require 'conexion.php';
	$cnx=conectar("facturacion");
	
	$sql = "select *, concat(cliente.nomclie,' ', cliente.apeclie) as nomcompleto from cliente";
	$rs = ejecutar($cnx, $sql);	
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	echo json_encode($items);

	cerrar($cnx);
?>