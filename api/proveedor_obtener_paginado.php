<?php
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();

	require 'conexion.php';
	$cnx=conectar();

	$sql = "select count(*) from proveedor";
	$rs = ejecutar($cnx,$sql);
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
		
	$sql2 = "SELECT 
						proveedor.idproveedor
					    , proveedor.codigo
					    , proveedor.idtipodoc
					    , proveedor.nomprove
					    , proveedor.idrazonsocial
					    , proveedor.direccion
					    , proveedor.telefono
					    , proveedor.email
					    , proveedor.fechregis
					    , proveedor.barrio
					    , proveedor.idciudad
				       	, tipodocumento.desctipodoc as nomtipodoc
				       	, razonsocial.descripcion as nomrazonsocial
				       	, ciudad.nomciu as nomciudad       	
				       	, departamento.iddepartamento
				       	, departamento.nomdepar
					 FROM proveedor INNER JOIN tipodocumento ON proveedor.idtipodoc = tipodocumento.idtipodoc
						INNER JOIN ciudad ON proveedor.idciudad = ciudad.idciudad
						INNER JOIN departamento ON ciudad.iddepartamento = departamento.iddepartamento
						INNER JOIN razonsocial ON proveedor.idrazonsocial = razonsocial.idrazonsocial
					     	     limit $offset,$rows";
	$rs = ejecutar($cnx,$sql2);	
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;

	echo json_encode($result);
	cerrar($cnx);
?>