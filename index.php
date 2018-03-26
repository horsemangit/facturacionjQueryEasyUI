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
	<link rel="stylesheet" type="text/css" href="content/slider.css">
	<!--ICONOS PARA EL MENU-->
	<link rel="stylesheet" type="text/css" href="content/iconmenu.css">
	<!--FIN-->
	<script type="text/javascript" src="scripts/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="scripts/locale/easyui-lang-es.js"></script>
	<script type="text/javascript" src="scripts/views/logout.js"></script>
	
</head>
<body>

	<?php include('./shared/menu.php'); ?>	
	
	<div data-options="region:'center'">
		<div style="padding:25px; text-align:right;">
			<label><strong>Fecha De Hoy: </label>
				<script type="text/javascript" >
					var meses = new Array ("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
						var f=new Date();
					document.write(f.getDate() + " de " + meses[f.getMonth()] + " de " + f.getFullYear());
				</script></strong>	
		</div>	

	<div class="slider">
		<ul>
				<li><img src="content/Logo.png"></li>
				<li><img src="content/Logo1.png"></li>
				<li><img src="content/tis.png"></li>
				<li><img src="content/Estadistica.png"></li>
		</ul>
	</div>
		<p/>
		<p/>

	<div style="padding:30px; color:#2D3E50;">
		<label><center><b><h1>SOFTWARE DE INVENTARIO & FACTURACIÓN</h1></b></center></label>
	</div>	
	</div>	

	<div data-options="region:'south'" style="height:20px; text-align:left; padding:1px">
		<b>Software creado por: Juan David Morales A.</b>
	</div>
</body>
</html>