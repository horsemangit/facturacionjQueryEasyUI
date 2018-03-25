<?php
	require 'conexion.php';
	$cnx=conectar("facturacion");
	
	$rs = ejecutar("select *, concat(cliente.nomclie,' ', cliente.apeclie) as nomcompleto from cliente",$cnx);	
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	echo json_encode($items);

	cerrar($cnx);
?>