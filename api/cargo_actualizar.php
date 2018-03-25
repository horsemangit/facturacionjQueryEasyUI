<?php

$id = intval($_REQUEST['id']);
$descargo = htmlspecialchars($_REQUEST['descripcion']);

require 'conexion.php';
$cnx = conectar();

$sql = "update cargo set descripcion='$descargo' where idcargo=$id";
$result = ejecutar($sql);
if ($result){
	echo json_encode(array(
		'idcategoria' => $id,
		'descripcion' => $descargo
	));
} else {
	echo json_encode(array('errorMsg'=>'Ha ocurrido un error al intentar almacenar los datos.'));
}
?>