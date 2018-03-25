<?php

$id = intval($_REQUEST['id']);
$codigo = htmlspecialchars($_REQUEST['codigo']);
$idtipodoc= htmlspecialchars($_REQUEST['idtipodoc']);
$nomprove = htmlspecialchars($_REQUEST['nomprove']);
$idrazonsocial = htmlspecialchars($_REQUEST['idrazonsocial']);
$direccion = htmlspecialchars($_REQUEST['direccion']);
$telefono = htmlspecialchars($_REQUEST['telefono']);
$email = htmlspecialchars($_REQUEST['email']);
$barrio = htmlspecialchars($_REQUEST['barrio']);
$nomciudad = htmlspecialchars($_REQUEST['idciudad']);


require 'conexion.php';
$cnx = conectar();

$sql =	"UPDATE `proveedor` SET `idtipodoc`='$idtipodoc',`nomprove`='$nomprove',`idrazonsocial`=$idrazonsocial,`direccion`='$direccion',`telefono`='$telefono',`email`='$email',`barrio`='$barrio',`idciudad`='$nomciudad' WHERE `idproveedor`=".$id;

$result = ejecutar($cnx, $sql);
if ($result){
	echo json_encode(array(
		'idproveedor' => $id,	
		'idtipodoc' => $idtipodoc,	
		'nomprove' => $nomprove,		
		'idrazonsocial' => $idrazonsocial,
		'direccion' => $direccion,	
		'telefono' => $telefono,
		'email' => $email,
		'barrio' => $barrio,
		'nomciudad' => $nomciudad
		
	));
} else {
	echo json_encode(array('errorMsg'=>'Ha ocurrido un error al intentar almacenar los datos.'));
}
cerrar($cnx);
?>
