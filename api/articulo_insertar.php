<?php
	$codigo = htmlspecialchars($_REQUEST['codigo']);
	$nomarti = htmlspecialchars($_REQUEST['nomarti']);
	$stock = htmlspecialchars($_REQUEST['stock']);
	$valuni = htmlspecialchars($_REQUEST['valuni']);
	$valven = htmlspecialchars($_REQUEST['valven']);
	$idproveedor = htmlspecialchars($_REQUEST['idproveedor']);
	$fechvenci = htmlspecialchars($_REQUEST['fechvenci']);
	$idcategoria = htmlspecialchars($_REQUEST['idcategoria']);
	$ubicacion = htmlspecialchars($_REQUEST['ubicacion']);
	$observaciones = htmlspecialchars($_REQUEST['observaciones']);


	require 'conexion.php';
	$cnx = conectar();

	$sql = "INSERT INTO `articulo`(`codigo`, `nomarti`, `stock`, `valuni`, `valven`, `idproveedor`, `fechvenci`, `idcategoria`,`ubicacion`, `observaciones`) VALUES ($codigo,'$nomarti','$stock','$valuni','$valven','$idproveedor','$fechvenci','$idcategoria','$ubicacion','$observaciones')";
	$result = ejecutar($sql, $cnx);
	if ($result):
		$idarticulo = mysql_insert_id();
		$rs = ejecutar("select * from  articulo where  idarticulo= $idarticulo",$cnx);	
		$items = array();
		while($row = mysqli_fetch_object($rs)){
			array_push($items, $row);
		}
		echo json_encode($items[0]);	
	else :
		echo json_encode(array('errorMsg'=>'Ha ocurrido un error al intentar almacenar los datos.'));
	endif;

	cerrar($cnx);
?>