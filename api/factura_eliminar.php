<?php

$id = intval($_REQUEST['id']);

require 'conexion.php';
$cnx = conectar();

$sql = "delete from factura where idfactura=$id";
$result = ejecutar($cnx, $sql);
if ($result):
	echo json_encode(array('success'=>true));
else:
	echo json_encode(array('errorMsg'=>'Ha ocurrido un error al intentar eliminar el documento.'));
endif;
cerrar($cnx);
?>