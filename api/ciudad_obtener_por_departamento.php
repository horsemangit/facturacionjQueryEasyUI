<?php	
	require 'conexion.php';
	$id = intval($_REQUEST['id']);
	$cnx = conectar();


	$sql = "SELECT * FROM ciudad where iddepartamento=$id";
	$rs = ejecutar($cnx, $sql);	
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	echo json_encode($items);

	cerrar($cnx);
?>