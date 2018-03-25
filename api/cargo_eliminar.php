<?php
	$id = intval($_REQUEST['id']);

	require 'conexion.php';
	$cnx = conectar();

	$sql = "delete from cargo where idcargo=$id";
	$result = ejecutar($cnx,$sql);
	if ($result):
		echo json_encode(array('success'=>true));
	else:
		echo json_encode(array('errorMsg'=>'Ha ocurrido un error al intentar eliminar el cargo.'));
	endif;

	cerrar($cnx);
?>