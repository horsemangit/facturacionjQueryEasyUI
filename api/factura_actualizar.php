<?php

$id = intval($_REQUEST['id']);
$idclie = htmlspecialchars($_REQUEST['idclie']);
$vendedor = htmlspecialchars($_REQUEST['vendedor']);
$idformapago = htmlspecialchars($_REQUEST['idformapago']);

require 'conexion.php';
$cnx = conectar();

$sql =	"UPDATE factura set idclie = $idclie, vendedor = '$vendedor', idformapago = $idformapago where idfactura =".$id;
$result = @ejecutar($sql, $cnx);
if ($result):
	echo json_encode(array(
		'idfactura' => $id,		
		'idclie' => $idclie,
		'vendedor' => $vendedor,		
		'idformapago' => $idformapago		
	));
else:
	echo json_encode(array('errorMsg'=>'Ha ocurrido un error al intentar almacenar los datos.'));
endif;
cerrar($cnx);
?>