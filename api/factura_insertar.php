<?php

	$idclie = htmlspecialchars($_REQUEST['idclie']);
	$vendedor = htmlspecialchars($_REQUEST['vendedor']);
	$idformapago = htmlspecialchars($_REQUEST['idformapago']);

	require 'conexion.php';
	$cnx = conectar();

	$sql = "insert into factura(idclie, vendedor, idformapago) values($idclie, '$vendedor', $idformapago)";
	$result = ejecutar($cnx,$sql);
	if ($result):
		$idfactura = mysqli_insert_id($cnx);
		$sql2 = "select * from factura where idfactura = $idfactura";
		$rs = ejecutar($cnx,$sql2);	
		$items = array();
		while($row = mysqli_fetch_object($rs)){
			array_push($items, $row);
		}
		echo json_encode($items[0]);	
	else:
		echo json_encode(array('errorMsg'=>'Ha ocurrido un error al intentar almacenar los datos.'));
endif;
cerrar($cnx);
?>