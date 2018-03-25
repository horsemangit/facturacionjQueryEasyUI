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
	<title>Estadisticas ~ INVENTASYSTEM</title>
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
	<script type="text/javascript" src="scripts/chartJS/Chart.min.js"></script>
	<script type="text/javascript" src="scripts/views/estadisticas.js"></script>
	<script type="text/javascript" src="scripts/date.js"></script>
	<style type="text/css">
		.#showresult {
		-moz-box-shadow:inset 0px 1px 0px 0px #dcecfb;
		-webkit-box-shadow:inset 0px 1px 0px 0px #dcecfb;
		box-shadow:inset 0px 1px 0px 0px #dcecfb;
		background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #bddbfa), color-stop(1, #80b5ea));
		background:-moz-linear-gradient(top, #bddbfa 5%, #80b5ea 100%);
		background:-webkit-linear-gradient(top, #bddbfa 5%, #80b5ea 100%);
		background:-o-linear-gradient(top, #bddbfa 5%, #80b5ea 100%);
		background:-ms-linear-gradient(top, #bddbfa 5%, #80b5ea 100%);
		background:linear-gradient(to bottom, #bddbfa 5%, #80b5ea 100%);
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#bddbfa', endColorstr='#80b5ea',GradientType=0);
		background-color:#bddbfa;
		-moz-border-radius:6px;
		-webkit-border-radius:6px;
		border-radius:6px;
		border:1px solid #84bbf3;
		display:inline-block;
		cursor:pointer;
		color:#ffffff;
		font-family:Arial;
		font-size:15px;
		font-weight:bold;
		padding:6px 24px;
		text-decoration:none;
		text-shadow:0px 1px 0px #528ecc;
	}
	#showresult:hover {
		background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #80b5ea), color-stop(1, #bddbfa));
		background:-moz-linear-gradient(top, #80b5ea 5%, #bddbfa 100%);
		background:-webkit-linear-gradient(top, #80b5ea 5%, #bddbfa 100%);
		background:-o-linear-gradient(top, #80b5ea 5%, #bddbfa 100%);
		background:-ms-linear-gradient(top, #80b5ea 5%, #bddbfa 100%);
		background:linear-gradient(to bottom, #80b5ea 5%, #bddbfa 100%);
		filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#80b5ea', endColorstr='#bddbfa',GradientType=0);
		background-color:#80b5ea;
	}
	#showresult:active {
		position:relative;
		top:1px;
	}
	</style>
</head>
<body class="easyui-layout">
	<div data-options="region:'north'" style="height:50px;color:white; background-color:#2D3E50;padding:15px;text-align:right;font-size:15px;">	
		<a href="index.php" style="color:white;margin:0px 15px; 0px 15px;"><i class="icon icon-home"></i> Inicio</a>
		| <a href="cliente.php" style="color:white;margin:0px 15px; 0px 15px;"><i class="icon icon-users"></i> Clientes</a>
		| <a href="factura.php" style="color:white;margin:0px 15px; 0px 15px;"><i class="icon icon-printer"></i> Facturas</a>
		| <a href="proveedor.php" style="color:white;margin:0px 15px; 0px 15px;"><i class="icon icon-earth"></i> Proveedores</a>
		| <a href="proveedor.php" style="color:white;margin:0px 15px; 0px 15px;"><i class="icon icon-pie-chart"></i> Estadisticas</a>
		| <a href="cerrarsesion.php" style="color:white;margin:0px 15px; 0px 15px;"><i class="icon icon-switch"></i> Cerrar sesión</a>
	</div>	
	<div data-options="region:'center'">
		<div style="margin: 50px 0px 50px 50px;">
			<h1 style="color: #2C3E50">Reporte De Ventas</h1>
			<label>Fecha Inicio: (yyyy-mm-dd)</label>
				<div>					
					<input id="fechinicio" name="fechinicio"  class="easyui-datebox"  data-options="parser: parserDate, formatter: formatterDate" style="width:20%" />
					<br>
				</div>	


			<div style="margin: -39px 0px 0px 400px;">
				<label>Fecha Final: (yyyy-mm-dd)</label>
					<div>		
						<input id="fechfinal" name="final"  class="easyui-datebox" data-options="parser: parserDate, formatter: formatterDate" style="width:28%" />
					</div><br />
			</div>		
			<a href="#" class="easyui-linkbutton" id="showresult" style="background: #2C3E50;color: white;">&#128202; Graficar</a>     
			<a href="#" class="easyui-linkbutton" id="pdf" style="background: #2C3E50;color: white;">&#128193; Generar Reporte</a>     
		</div>	

		<div style="width: 60%;position: relative;left: 50px">
			<canvas id="grafico"></canvas>
		</div>
				
	</div>	

	<div data-options="region:'south'" style="height:20px; text-align:left; padding:1px">
		<b>Software creado por: Juan David Morales A.</b>
	</div>
</body>
</html>