<?php
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();

	require 'conexion.php';
	$cnx = conectar();

	$sql = "SELECT COUNT(*) from categoria";
	$rs = ejecutar($cnx,$sql);
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
	$rs = mysql_query("select * from categoria limit $offset,$rows");
	
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;

	echo json_encode($result);
?>