<?php

$idfactura = intval($_REQUEST['id']);
$idarticulo = htmlspecialchars($_REQUEST['idarticulo']);
$cantarti = htmlspecialchars($_REQUEST['cantarti']);

require 'conexion.php';
$cnx = conectar();

// Acá antes de insertar el producto, se debe validar las cantidades del stock.
$sql = "SELECT * FROM articulo WHERE idarticulo='$idarticulo'";
$producto = ejecutar($cnx, $sql);
if (mysqli_num_rows($producto)>0):
	$row = mysqli_fetch_array($producto);
	// Acá validamos el stock negativo, si no cumple le retornamos un error al usuario
	if(($row["stock"] - $cantarti) < 0):
		echo json_encode(array('errorMsg'=>'No hay el stock suficiente para vender este articulo.'));
		return;
	endif;
endif;

$sql2 = "INSERT into detallefactura(idfactura, idarticulo, cantarti) values($idfactura, $idarticulo, $cantarti)";
$result = ejecutar($cnx,$sql2);
if ($result):
	$iddetallefactura = mysqli_insert_id($cnx);
	$sql3 = "select * from detallefactura where iddetallefactura = $iddetallefactura";
	$rs = ejecutar($cnx, $sql3);	
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