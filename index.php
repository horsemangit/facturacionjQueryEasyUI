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
	<?php include('./shared/linksPage/links.php'); ?>
	<link rel="stylesheet" type="text/css" href="content/slider.css">
</head>
<body>

	<?php include('./shared/menu.php'); ?>	
	
	<div data-options="region:'center'" class="rcenter">
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

	<?php include('./shared/footer.php'); ?>
	<?php include('./shared/scriptsPage/scripts.php'); ?>
</body>
</html>