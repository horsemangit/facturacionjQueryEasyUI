<?php

$desdocu = htmlspecialchars($_REQUEST['desctipodoc']);

require 'conexion.php';
$cnx = conectar("facturacion");

$sql = "insert into tipodocumento(desctipodoc) values('$desdocu')";
$result = ejecutar($cnx, $sql);
if ($result){
	echo json_encode(array(
		'idtipodoc' => mysqli_insert_id($cnx),
		'desctipodoc' => $desdocu		
	));
} else {
	echo json_encode(array('errorMsg'=>'Ha ocurrido un error al intentar almacenar los datos.'));
}
?>