<?php
	$id = intval($_REQUEST['id']);
	$nomcategoria = htmlspecialchars($_REQUEST['nomcategoria']);

	require('conexion.php');
	$cnx = conectar();

	$sql = "update categoria set nomcategoria='$nomcategoria' where idcategoria=$id";
	$result = ejecutar($cnx,$sql);
	if ($result):
		echo json_encode(array(
			'idcategoria' => $id,
			'nomcategoria' => $nomcategoria
		));
	else:
		echo json_encode(array('errorMsg'=>'Ha ocurrido un error al intentar almacenar los datos.'));
	endif;

	cerrar($cnx);
?>