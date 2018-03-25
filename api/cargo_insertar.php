<?php
	$descargo = htmlspecialchars($_REQUEST['descripcion']);

	require 'conexion.php';
	$cnx = conectar();

	$sql = "insert into cargo(descripcion) values('$descargo')";
	$result = ejecutar($cnx,$sql);
	if ($result):
		echo json_encode(array(
			'idcargo' => mysqli_insert_id($cnx),
			'descripcion' => $descargo		
		));
	else:
		echo json_encode(array('errorMsg'=>'Ha ocurrido un error al intentar almacenar los datos.'));
	endif;

	cerrar($cnx);
?>