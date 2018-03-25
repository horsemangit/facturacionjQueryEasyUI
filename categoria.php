<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Categorias ~ INVENTASYSTEM</title>
	<link rel="stylesheet" type="text/css" href="content/themes/bootstrap/easyui.css">
	<link rel="stylesheet" type="text/css" href="content/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="content/themes/color.css">
	<link rel="stylesheet" type="text/css" href="content/site.css">
	<script type="text/javascript" src="scripts/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="scripts/locale/easyui-lang-es.js"></script>
	<script type="text/javascript" src="scripts/views/categoria.js"></script>
</head>
<body class="easyui-layout">
	
	<?php include('./shared/menu.php'); ?>

	<div data-options="region:'center'">		
		
		<table id="dg" title="Categorias" class="easyui-datagrid" data-options="fit:true"
				url="api/categoria_obtener_paginado.php"
				toolbar="#toolbar" pagination="true"
				rownumbers="true" fitColumns="true" singleSelect="true">
			<thead>
				<tr>
					<th field="nomcategoria" width="100%">Nombre de la categoria</th>					
				</tr>
			</thead>
		</table>
		
		<div id="toolbar">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="nuevo()">Nueva</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editar()">Editar</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="eliminar()">Eliminar</a>
		</div>

		<div id="dlg" class="easyui-dialog" style="width:400px;height:180px" closed="true" buttons="#dlg-buttons">
			<form id="fm" method="post" novalidate>
				<label>Nombre de la categoria:</label>
				<div>					
					<input name="nomcategoria" class="easyui-textbox" required="true" style="width:100%">
				</div>				
			</form>
		</div>
		<div id="dlg-buttons">
			<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="guardar()" style="width:90px">Guardar</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="cancelar()" style="width:90px">Cancelar</a>
		</div>

	</div>	
	

	<div data-options="region:'south'" style="height:20px; text-align:left; padding:1px">
		<b>Software creado por: Juan David Morales A.</b>
	</div>
</body>
</html>