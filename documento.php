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
	<title>Tipo Documento ~ INVENTASYSTEM</title>
	<?php include('./shared/linksPage/links.php'); ?>
</head>
<body>
	 
	<?php include('./shared/menu.php'); ?>

	<div data-options="region:'center'" class="rcenter">		
		
		<table id="dg" title="Documento De Identificación" class="easyui-datagrid" data-options="fit:true" url="api/documento_obtener_paginado.php" toolbar="#toolbar" pagination="true" rownumbers="true" fitColumns="true" singleSelect="true">
			<thead>
				<tr>
					<th field="desctipodoc" width="100%">Tipo De Documento</th>					
				</tr>
			</thead>
		</table>
		
		<div id="toolbar">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="nuevo()">Nuevo</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editar()">Modificar</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="eliminar()">Eliminar</a>
		</div>

		<div id="dlg" class="easyui-dialog" style="width:400px;height:180px" closed="true" buttons="#dlg-buttons">
			<form id="fm" method="post" novalidate>
				<label>Descripción Del Documento:</label>
				<div>					
					<input name="desctipodoc" class="easyui-textbox" required="true" style="width: 100%;">
				</div>				
			</form>
		</div>
		<div id="dlg-buttons">
			<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="guardar()" style="width:90px">Guardar</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="cancelar()" style="width:90px">Cancelar</a>
		</div>

	</div>	
	

	<?php include('./shared/footer.php'); ?>
	<?php include('./shared/scriptsPage/scripts.php'); ?>
	<script type="text/javascript" src="scripts/views/documento.js"></script>
</body>
</html>