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
	<?php include('./shared/linksPage/links.php'); ?>
</head>
<body>
	<?php include('./shared/menu.php'); ?>
	
		<div data-options="region:'center'" class="rcenter">	
	<div id="p" class="easyui-panel" title="Reporte De Ventas" style="width:auto; height:auto; padding:10px;">
			
			<label>Fecha Inicio: (yyyy-mm-dd)</label>
				<div>					
					<input id="fechinicio" name="fechinicio"  class="easyui-datebox"  data-options="parser: parserDate, formatter: formatterDate"/>
					<br>
				</div>	


			<div style="margin: -39px 0px 0px 200px;">
				<label>Fecha Final: (yyyy-mm-dd)</label>
					<div>		
						<input id="fechfinal" name="final"  class="easyui-datebox" data-options="parser: parserDate, formatter: formatterDate" />
					</div><br />
			</div>		
			<a href="#" class="easyui-linkbutton" id="showresult" style="background: #2C3E50;color: white;">&#128202; Graficar</a>     
			<a href="#" class="easyui-linkbutton" id="pdf" style="background: #2C3E50;color: white;">&#128193; Generar Reporte</a>  
			<div style="width: 60%;position: relative;left: 50px; padding-top: 20px;">
			<canvas id="grafico"></canvas>
		</div>
    </div>
</div>

	<?php include('./shared/footer.php'); ?>
	<?php include('./shared/scriptsPage/scripts.php'); ?>
	<script type="text/javascript" src="scripts/chartJS/Chart.min.js"></script>
	<script type="text/javascript" src="scripts/views/estadisticas.js"></script>
	<script type="text/javascript" src="scripts/date.js"></script>
</body>
</html>
