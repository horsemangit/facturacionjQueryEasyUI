<?php
	$idfactura = intval($_REQUEST['id']);
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();

	require 'conexion.php';
	$cnx = conectar();

	$sql = "select count(*) from detallefactura where idfactura=$idfactura";
	$rs = ejecutar($cnx, $sql);
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
	

	$sql2 = "SELECT detallefactura.*, detallefactura.cantarti * detallefactura.valorunidad as total , articulo.codigo, articulo.nomarti
		FROM detallefactura INNER JOIN articulo ON detallefactura.idarticulo = articulo.idarticulo 
		WHERE idfactura=$idfactura";
	$rs = ejecutar($cnx,$sql2);	
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;

	echo json_encode($result);
	cerrar($cnx);


	?>