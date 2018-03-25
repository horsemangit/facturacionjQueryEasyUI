<?php
	require 'conexion.php';
	$cnx = conectar();
	
	$sql = "select * from formapago";
	$rs = ejecutar($cnx,$sql);	
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	echo json_encode($items);

	cerrar($cnx);
?>