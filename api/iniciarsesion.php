<?php
	session_start(); 
	$usuario = htmlspecialchars($_REQUEST['usuario']);
	$clave = htmlspecialchars($_REQUEST['clave']);
	
	require 'conexion.php';
	$cnx = conectar();

	$sql = "SELECT * FROM admin WHERE user='$usuario' AND pw='$clave'";
	$log = mysqli_query($cnx,$sql);
	if (mysqli_num_rows($log)>0) {
		$row = mysqli_fetch_array($log);
		$_SESSION["user"] = $row; 	  	
		echo json_encode(array('success'=>'Inicio de sesión exitoso.'));
	}
	else{
		echo json_encode(array('errorMsg'=>'No se pudo iniciar sesión. Verifique el usuario y la contraseña.'));
	}
?>	
