<?php
	$page = isset($_POST['page']) ? intval($_POST['page']) : 1;
	$rows = isset($_POST['rows']) ? intval($_POST['rows']) : 10;
	$offset = ($page-1)*$rows;
	$result = array();

	require 'conexion.php';
	$cnx = conectar();

	$sql = "select count(*) from factura";
	$rs = ejecutar($cnx,$sql);
	$row = mysqli_fetch_row($rs);
	$result["total"] = $row[0];
	
	$sql = "SELECT 
				factura.idfactura
			    , factura.numfactura
			    , factura.idclie
			    , factura.vendedor
			    , factura.fechfactura
			    , factura.idformapago
			    , concat(cliente.nomclie,' ', cliente.apeclie) as nomcliente
			    , formapago.descripcion as nomformapago
			    , SUM(detallefactura.cantarti * detallefactura.valorunidad) as total
			FROM factura INNER JOIN cliente ON factura.idclie = cliente.idcliente
				INNER JOIN formapago ON factura.idformapago = formapago.idformapago
			    LEFT JOIN detallefactura ON factura.idfactura = detallefactura.idfactura
			GROUP BY
				factura.idfactura limit $offset,$rows";
	$rs = ejecutar($cnx,$sql);	
	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	$result["rows"] = $items;

	echo  json_encode($result);
	cerrar($cnx);


	?>