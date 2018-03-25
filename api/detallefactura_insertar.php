<?php

$idfactura = intval($_REQUEST['id']);
$idarticulo = htmlspecialchars($_REQUEST['idarticulo']);
$cantarti = htmlspecialchars($_REQUEST['cantarti']);

require 'conexion.php';
$cnx = conectar();

// Acá antes de insertar el producto, se debe validar las cantidades del stock.
$producto = mysql_query("SELECT * FROM articulo WHERE idarticulo='$idarticulo'");
if (mysqli_num_rows($producto)>0):
	$row = mysqli_fetch_array($producto);
	// Acá validamos el stock negativo, si no cumple le retornamos un error al usuario
	if(($row["stock"] - $cantarti) < 0):
		echo json_encode(array('errorMsg'=>'No hay el stock suficiente para vender este articulo.'));
		return;
	endif;
endif;

$sql = "insert into detallefactura(idfactura, idarticulo, cantarti) values($idfactura, $idarticulo, $cantarti)";
$result = ejecutar($sql, $cnx);
if ($result):
	$iddetallefactura = mysqli_insert_id($cnx);
	$rs = ejecutar("select * from detallefactura where iddetallefactura = $iddetallefactura",$cnx);	
	$items = array();
	while($row = mysql_fetch_object($rs)){
		array_push($items, $row);
	}
	echo json_encode($items[0]);	
else:
	echo json_encode(array('errorMsg'=>'Ha ocurrido un error al intentar almacenar los datos.'));
endif;
cerrar($cnx);
?>