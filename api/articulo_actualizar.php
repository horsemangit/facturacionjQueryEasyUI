<?php
	$id = intval($_REQUEST['id']);
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

	$sql =	"UPDATE `articulo` SET `nomarti`='$nomarti',`stock`=$stock,`valuni`='$valuni',`valven`='$valven',`idproveedor`='$idproveedor',`fechvenci`='$fechvenci',`idcategoria`='$idcategoria',`ubicacion`='$ubicacion',`observaciones`='$observaciones' WHERE `idarticulo`=".$id;
	$result = ejecutar($cnx,$sql);
	if ($result):
		echo json_encode(array(
			'idarticulo' => $id,	
			'nomarti' => $nomarti,
			'stock' => $stock,		
			'valuni' => $valuni,	
			'valven' => $valven,
			'idproveedor' => $idproveedor,
			'fechvenci' => $fechvenci,
			'idcategoria' => $idcategoria,
			'ubicacion' => $ubicacion,
			'observaciones' => $observaciones	
		));
	else:
		echo json_encode(array('errorMsg'=>'Ha ocurrido un error al intentar almacenar los datos.'));
	endif;
	
	cerrar($cnx);
?>