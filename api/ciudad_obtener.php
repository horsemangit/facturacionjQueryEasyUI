<?php
	require 'conexion.php';
	$cnx=conectar("facturacion");
	
	$sql = "SELECT * FROM  ciudad";
	$rs = ejecutar($cnx,$sql);	
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	echo json_encode($items);

	cerrar($cnx);
?>