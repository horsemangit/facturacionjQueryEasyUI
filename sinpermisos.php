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

	<?php include('./shared/footer.php'); ?>
		<?php include('./shared/scriptsPage/scripts.php'); ?>	
</body>
</html>