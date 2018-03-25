<?php

$id = intval($_REQUEST['id']);
$desdocu = htmlspecialchars($_REQUEST['desctipodoc']);

require 'conexion.php';
$cnx = conectar();

$sql =	"UPDATE tipodocumento set desctipodoc = '$desdocu' where idtipodoc =".$id;
$result = ejecutar($cnx,$sql);
if ($result){
	echo json_encode(array(
		'idtipodoc' => $id,
		'desctipodoc' => $desdocu
	));
} else {
	echo json_encode(array('errorMsg'=>'Ha ocurrido un error al intentar almacenar los datos.'));
}
?>