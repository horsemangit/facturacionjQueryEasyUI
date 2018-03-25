<?php
	session_start();	
	if(!isset($_SESSION['user'])){
		echo '<script> window.location="loginsistema.php"; </script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Inicio ~ INVENTASYSTEM</title>
	<link rel="stylesheet" type="text/css" href="content/themes/default/easyui.css">
	<link rel="stylesheet" type="text/css" href="content/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="content/themes/color.css">
	<link rel="stylesheet" type="text/css" href="content/site.css">
	<!--ICONOS PARA EL MENU-->
	<link rel="stylesheet" type="text/css" href="content/iconmenu.css">
	<!--FIN-->
	<script type="text/javascript" src="scripts/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="scripts/locale/easyui-lang-es.js"></script>
</head>
<body class="easyui-layout">
	<div data-options="region:'north'" style="height:50px;color:white; background-color:#2D3E50;padding:15px;text-align:right;font-size:15px;">	
		<a href="index.php" style="color:white;margin:0px 15px; 0px 15px;"><i class="icon icon-home"></i> Inicio</a>
		| <a href="cliente.php" style="color:white;margin:0px 15px; 0px 15px;"><i class="icon icon-users"></i> Clientes</a>
		| <a href="factura.php" style="color:white;margin:0px 15px; 0px 15px;"><i class="icon icon-printer"></i> Facturas</a>
		| <a href="proveedor.php" style="color:white;margin:0px 15px; 0px 15px;"><i class="icon icon-earth"></i> Proveedores</a>
		| <a href="cerrarsesion.php" style="color:white;margin:0px 15px; 0px 15px;"><i class="icon icon-switch"></i> Cerrar sesión</a>
	</div>	
	<div data-options="region:'center'">
		<div style="width:800px;height: 400px;text-align:center;background-color: #E45C5C;border-radius:10px;margin:0 auto;margin-top:120px;">
			<img src="content/stop.png" style="width:200px;height: 200px;margin-top: -80px;margin-bottom: -15px;">
				
				<P style="padding: 20px;">
				<font face="arial" size="15" color="WHITE">¡Usted No Cuenta Con Permisos Suficientes Para Ingresar, Consulte Con Su Administrador!
				</p>
	</div>	
	</div>	

	<div data-options="region:'south'" style="height:20px; text-align:left; padding:1px">
		<b>Software creado por: Juan David Morales A.</b>
	</div>
</body>
</html>