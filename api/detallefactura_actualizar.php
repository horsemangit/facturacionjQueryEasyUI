<?php

$id = intval($_REQUEST['id']);
$idarticulo = htmlspecialchars($_REQUEST['idarticulo']);
$cantarti = htmlspecialchars($_REQUEST['cantarti']);

require 'conexion.php';
$cnx = conectar();

// Acá antes de actualizar el producto, se debe validar las cantidades del stock.
$detalle = ejecutar($cnx,"SELECT * FROM detallefactura WHERE iddetallefactura=$id");
if (mysqli_num_rows($detalle)<=0) {
	echo json_encode(array('errorMsg'=>'Dentro de la factura no se encontró el articulo que desea actualizar.'));
	return;
}

$rowdetalle = mysqli_fetch_array($detalle);
$producto = ejecutar($cnx,"SELECT * FROM articulo WHERE idarticulo='$idarticulo'");
if (mysql_num_rows($producto)>0) {
	$row = mysql_fetch_array($producto);
	// Acá validamos el stock negativo, si no cumple le retornamos un error al usuario
	if(($row["stock"]  + $rowdetalle["cantarti"] - $cantarti) < 0){
		echo json_encode(array('errorMsg'=>'No hay el stock suficiente para vender este articulo.'));
		return;
	}	
}

$sql =	"UPDATE detallefactura set idarticulo = $idarticulo, cantarti = $cantarti where iddetallefactura =".$id;
$result = ejecutar($cnx, $slq);
if ($result):
	echo json_encode(array(
		'iddetallefactura' => $id,		
		'idarticulo' => $idarticulo,		
		'cantarti' => $cantarti		
	));
else:
	echo json_encode(array('errorMsg'=>'Ha ocurrido un error al intentar almacenar los datos.'));
endif;
cerrar($cnx);
?>