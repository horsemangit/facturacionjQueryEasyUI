<?php
	function conectar(){
		$cnx = mysqli_connect("localhost","root","","facturacion");
		return $cnx;
	}

	function ejecutar($cnx,$query){
		mysqli_query($cnx,"SET NAMES 'utf8'");
		$r = mysqli_query($cnx,$query);
		return $r;
	}

	function cerrar($c){
		mysqli_close($c);
	}
?>