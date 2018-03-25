<?php

$codigo = htmlspecialchars($_REQUEST['codigo']);
$idtipodoc= htmlspecialchars($_REQUEST['idtipodoc']);
$nomclie = htmlspecialchars($_REQUEST['nomclie']);
$apeclie = htmlspecialchars($_REQUEST['apeclie']);
$dirclie = htmlspecialchars($_REQUEST['dirclie']);
$teleclie = htmlspecialchars($_REQUEST['telclie']);
$email = htmlspecialchars($_REQUEST['email']);
$fechnaci = htmlspecialchars($_REQUEST['fechnaci']);
$nombarrio = htmlspecialchars($_REQUEST['nombarrio']);
$nomciudad = htmlspecialchars($_REQUEST['idciudad']);



require 'conexion.php';
$cnx=conectar("facturacion");

$sql = "INSERT INTO `cliente`(`codigo`,`idtipodoc`, `nomclie`, `apeclie`, `dirclie`, `telclie`, `email`, `fechnaci`,`nombarrio`, `idciudad`) VALUES ($codigo,'$idtipodoc','$nomclie','$apeclie','$dirclie','$teleclie','$email','$fechnaci','$nombarrio','$nomciudad')";
$result = ejecutar($cnx,$sql);
if ($result){
	$idcliente = mysqli_insert_id($cnx);
	$sql2 = "SELECT * FROM cliente where idcliente = $idcliente";
	$rs = ejecutar($cnx, $sql2);	
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	echo json_encode($items[0]);	
} else {
	echo json_encode(array('errorMsg'=>'Ha ocurrido un error al intentar almacenar los datos.'));
	}
cerrar($cnx);
?>