<?php

	require "conexion.php";
	$cnx=conectar();

	$fechainicial = $_REQUEST['fechainicio'];
	$fechafinal = $_REQUEST['fechafinal'];

	$sql = "SELECT 
				factura.fechfactura,
				SUM(detallefactura.cantarti * detallefactura.valorunidad) as total
			FROM 
				factura 
			LEFT JOIN 
				detallefactura ON factura.idfactura = detallefactura.idfactura
			WHERE
				factura.fechfactura BETWEEN '".$fechainicial."' AND '".$fechafinal."'
			GROUP BY 
				factura.fechfactura";
	$rs = ejecutar($cnx,$sql);

	$items = array();
	while($row = mysqli_fetch_object($rs)){
		array_push($items, $row);
	}
	echo json_encode($items);

	cerrar($cnx);
	 






?>