<?php
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();

	require 'conexion.php';
	$cnx=conectar();

	$sql = "select count(*) from cliente";
	$rs = ejecutar($cnx,$sql);
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
		
	$rs = ejecutar("SELECT 
		cliente.idcliente
	    , cliente.codigo
	    , cliente.idtipodoc
	    , cliente.nomclie
	    , cliente.apeclie
	    , cliente.dirclie
	    , cliente.telclie
	    , cliente.email
	    , cliente.fechnaci
	    , cliente.fechregi
	    , cliente.nombarrio
	    , cliente.idciudad
       	, tipodocumento.desctipodoc as nomtipodoc
       	, ciudad.nomciu as nomciudad
       	, departamento.iddepartamento
       	, departamento.nomdepar
	 FROM cliente INNER JOIN tipodocumento ON cliente.idtipodoc = tipodocumento.idtipodoc
		INNER JOIN ciudad ON cliente.idciudad = ciudad.idciudad
		INNER JOIN departamento ON ciudad.iddepartamento = departamento.iddepartamento
	     	     limit $offset,$rows",$cnx);	
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;

	echo json_encode($result);
	cerrar($cnx);


?>