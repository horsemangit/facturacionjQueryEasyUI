<?php
	$nomcategoria = htmlspecialchars($_REQUEST['nomcategoria']);

	require('conexion.php');
	$cnx = conectar();

	$sql = "insert into categoria(nomcategoria) values('$nomcategoria')";
	$result = ejecutar($cnx,$sql);
	if ($result):
		echo json_encode(array(
			'idcategoria' => mysqli_insert_id($cnx),
			'nomcategoria' => $nomcategoria		
		));
	else:
		echo json_encode(array('errorMsg'=>'Ha ocurrido un error al intentar almacenar los datos.'));
	endif;

	cerrar($cnx);
?>