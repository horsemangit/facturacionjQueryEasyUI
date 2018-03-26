<?php

$id = intval($_REQUEST['id']);
$codigo = htmlspecialchars($_REQUEST['codigo']);
$idtipodoc= htmlspecialchars($_REQUEST['idtipodoc']);
$nomclie = htmlspecialchars($_REQUEST['nomclie']);
$apeclie = htmlspecialchars($_REQUEST['apeclie']);
$dirclie = htmlspecialchars($_REQUEST['dirclie']);
$telclie = htmlspecialchars($_REQUEST['telclie']);
$email = htmlspecialchars($_REQUEST['email']);
$fechnaci = htmlspecialchars($_REQUEST['fechnaci']);
$nombarrio = htmlspecialchars($_REQUEST['nombarrio']);
$nomciudad = htmlspecialchars($_REQUEST['idciudad']);


require 'conexion.php';
$cnx = conectar();

$sql =	"UPDATE `cliente` SET `idtipodoc`='$idtipodoc',`nomclie`='$nomclie',`apeclie`='$apeclie',`dirclie`='$dirclie',`telclie`='$telclie',`email`='$email',`fechnaci`='$fechnaci',`nombarrio`='$nombarrio',`idciudad`='$nomciudad' WHERE `idcliente`=".$id;
$result = ejecutar($cnx, $sql);
if ($result){
	echo json_encode(array(
		'idcliente' => $id,	
		'idtipodoc' => $idtipodoc,	
		'nomclie' => $nomclie,
		'apeclie' => $apeclie,		
		'dirclie' => $dirclie,	
		'telclie' => $telclie,
		'email' => $email,
		'fechnaci' => $fechnaci,
		'nombarrio' => $nombarrio,
		'nomciudad' => $nomciudad
		
	));
} else {
	echo json_encode(array('errorMsg'=>'Ha ocurrido un error al intentar almacenar los datos.'));
}
cerrar($cnx);
?>
