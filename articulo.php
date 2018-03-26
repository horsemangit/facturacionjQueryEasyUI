<?php
	session_start();	
	if(!isset($_SESSION['user'])){
		echo '<script> window.location="loginsistema.php"; </script>';
	}
	else if($_SESSION['user']['idrol'] != 1)
	{
		echo '<script> window.location="sinpermisos.php"; </script>';
	}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
	<title>Articulos ~ INVENTASYSTEM</title>
	<link rel="stylesheet" type="text/css" href="content/themes/Default/easyui.css">
	<link rel="stylesheet" type="text/css" href="content/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="content/themes/color.css">
	<link rel="stylesheet" type="text/css" href="content/site.css">
	<!--ICONOS PARA EL MENU-->
	<link rel="stylesheet" type="text/css" href="content/iconmenu.css">
	<!--FIN-->
	<script type="text/javascript" src="scripts/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="scripts/locale/easyui-lang-es.js"></script>
	<script type="text/javascript" src="scripts/views/articulo.js"></script>
	<script type="text/javascript" src="scripts/date.js"></script>
</head>
<body>
	
	<?php include('./shared/menu.php'); ?>

	<div data-options="region:'center'">		
		
		<table id="dg" title="Articulos" class="easyui-datagrid" data-options="fit:true"
				url="api/articulo_obtener_paginado.php"
				toolbar="#toolbar" pagination="true" pageSize="30"
				rownumbers="true" fitColumns="true" singleSelect="true">
			<thead>
				<tr>
					<th field="codigo">Codigo Articulo</th>					
					<th field="nomarti">Nombre Articulo</th>
					<th field="stock">Stock</th>
					<th field="valuni">Valor Unitario</th>
					<th field="valven">Valor Venta</th>
					<th field="nomproveedor">Proveedor</th>
					<th field="fechingre">Fecha De Ingreso</th>
					<th field="fechvenci">Fecha De Vencimiento</th>
					<th field="nomcategoria">Nombre Categoria</th>
					<th field="fechactualizado">Ultima Fecha De Actualización</th>
					<th field="ubicacion">Ubicación</th>
					<th field="observaciones">Observaciones</th>


				</tr>
			</thead>
		</table>
		
		<div id="toolbar">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="nuevo()">Ingresar Nuevo Articulo</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editar()">Editar Articulo</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="eliminar()">Eliminar Articulo</a>
		</div>

		<div id="dlg" class="easyui-dialog" style="width:400px;height:600px" closed="true" buttons="#dlg-buttons">
			<form id="fm" method="post" novalidate>

				<label>Codigo Del Articulo:</label>
					<div>					
						<input id="codigo" name="codigo" class="easyui-numberbox" required="true" style="width:100%" data-options="min:1">
					</div><br />	

				<label>Nombre De Articulo:</label>
					<div>					
						<input name="nomarti" class="easyui-textbox" required="true" style="width:100%">
					</div><br />

				<label>Stock:</label>
					<div>					
						<input name="stock" class="easyui-numberbox" required="true" style="width:100%" data-options="min:0">
					</div><br />

				<label>Valor Unitario:</label>
					<div>					
						<input name="valuni" class="easyui-numberbox" required="true" style="width:100%" data-options="min:0">
					</div><br />

				<label>Valor Venta:</label>
					<div>					
						<input name="valven" class="easyui-numberbox" required="true" style="width:100%" data-options="min:0">
					</div><br />

					<label>Proveedor:</label>
					<div>					
						<input name="idproveedor" class="easyui-combobox" data-options="url:'api/proveedor_obtener.php', editable:false, required:'true', valueField:'idproveedor', textField:'nomprove'" style="width:100%">
					</div><br />

				<label>Fecha De Ingreso:</label>
					<div>					
						<input name="fechingre" class="easyui-textbox" data-options="disabled:true" style="width:100%">
					</div><br />

				<label>Fecha De Vencimiento:</label>
					<div>				
						<input name="fechvenci" class="easyui-datebox" numberbox" required="true" style="width:100%;" data-options="parser: parserDate, formatter: formatterDate">
   					</div><br />	

				<label>Categoria:</label>
					<div>					
						<input name="idcategoria" class="easyui-combobox" data-options="url:'api/categoria_obtener.php', editable:false, required:'true', valueField:'idcategoria', textField:'nomcategoria'" style="width:100%">
					</div><br />

				<label>Fecha Actualizacion:</label>
					<div>					
						<input name="fechactualizado" class="easyui-textbox" data-options="disabled:true" style="width:100%">
					</div><br />	

				<label>Ubicación:</label>
					<div>					
						<input name="ubicacion" class="easyui-textbox" required="true" style="width:100%">
					</div><br />
							
					<div>					
						<input class="easyui-textbox" name="observaciones" style="width:100%;height:80px" data-options="label:'Observaciones:',multiline:true">
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