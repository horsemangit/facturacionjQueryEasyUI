<?php

$codigo = htmlspecialchars($_REQUEST['codigo']);
$idtipodoc= htmlspecialchars($_REQUEST['idtipodoc']);
$nomprove = htmlspecialchars($_REQUEST['nomprove']);
$razonsocial = htmlspecialchars($_REQUEST['idrazonsocial']);
$direccion = htmlspecialchars($_REQUEST['direccion']);
$telefono = htmlspecialchars($_REQUEST['telefono']);
$email = htmlspecialchars($_REQUEST['email']);
$barrio = htmlspecialchars($_REQUEST['barrio']);
$nomciudad = htmlspecialchars($_REQUEST['idciudad']);



require 'conexion.php';
$cnx = conectar();

$sql = "INSERT INTO `proveedor`(`codigo`,`idtipodoc`, `nomprove`,`idrazonsocial`,`direccion`, `telefono`, `email`,`barrio`, `idciudad`) VALUES ($codigo,'$idtipodoc','$nomprove','$razonsocial','$direccion','$telefono','$email','$barrio','$nomciudad')";
$result = ejecutar($cnx,$sql);
if ($result):
	$idproveedor = mysqli_insert_id($cnx);
	$sql2 = "select * from  proveedor where  idproveedor= $idproveedor";
	$rs = ejecutar($cnx,$sql);	
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