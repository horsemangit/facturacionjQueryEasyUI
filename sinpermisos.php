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
<body>
	<?php include('./shared/menu.php'); ?>	
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