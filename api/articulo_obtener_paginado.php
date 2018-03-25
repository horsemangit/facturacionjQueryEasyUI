<?php
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();

	require 'conexion.php';
	$cnx = conectar();

	$rs = ejecutar("select count(*) from cliente",$cnx);
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
		

	$sql = "SELECT 
			articulo.idarticulo
		    , articulo.codigo
		    , articulo.nomarti
		    , articulo.stock
		    , articulo.valuni
		    , articulo.valven
		    , articulo.idproveedor
		    , articulo.fechingre
		    , articulo.fechvenci
		    , articulo.idcategoria
		    , articulo.fechactualizado
		    , articulo.ubicacion
		    , articulo.observaciones
	       	, categoria.nomcategoria as nomcategoria
	       	, proveedor.nomprove as nomproveedor
		 	FROM articulo
		 		INNER JOIN categoria ON articulo.idcategoria = categoria.idcategoria
				INNER JOIN proveedor ON articulo.idproveedor = proveedor.idproveedor
		     	limit $offset,$rows";
	
	$rs = ejecutar($cnx,$sql);	
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;

	echo json_encode($result);
	
	cerrar($cnx);
?>