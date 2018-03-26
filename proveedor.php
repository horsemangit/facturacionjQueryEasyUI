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
	<title>Proveedores ~ INVENTASYSTEM</title>
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
	<script type="text/javascript" src="scripts/views/proveedor.js"></script>
	<script type="text/javascript" src="scripts/date.js"></script>
</head>
<body>
	
	<?php include('./shared/menu.php'); ?>	

	<div data-options="region:'center'">		
		
		<table id="dg" title="Proveedores" class="easyui-datagrid" data-options="fit:true"
				url="api/proveedor_obtener_paginado.php"
				toolbar="#toolbar" pagination="true" pageSize="30"
				rownumbers="true" fitColumns="true" singleSelect="true">
			<thead>
				<tr>
					<th field="codigo">No. Identificación Proveedor</th>					
					<th field="nomtipodoc">Tipo De Documento</th>
					<th field="nomprove">Nombre</th>
					<th field="nomrazonsocial">Razon Social</th>
					<th field="direccion">Dirección</th>
					<th field="telefono">Telefono</th>
					<th field="email">Email</th>
					<th field="fechregis">Fecha De Registro</th>
					<th field="barrio">Barrio</th>
					<th field="nomciudad">Ciudad</th>
				</tr>
			</thead>
		</table>
		
		<div id="toolbar">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="nuevo()">Registrar Proveedor</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editar()">Editar Proveedor</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="eliminar()">Eliminar Proveedor</a>
		</div>

		<div id="dlg" class="easyui-dialog" style="width:400px;height:600px" closed="true" buttons="#dlg-buttons">
			<form id="fm" method="post" novalidate>

				<label>Numero De Identificación:</label>
					<div>					
						<input id="cod" name="codigo" class="easyui-textbox" required="true" style="width:100%">
					</div><br />

				<label>Tipo De Documento:</label>
					<div>					
						<input name="idtipodoc" class="easyui-combobox" data-options="url:'api/documento_obtener.php', editable:false, required:'true', valueField:'idtipodoc', textField:'desctipodoc'" style="width:100%">
					</div><br />	

				<label>Nombre Del Proveedor:</label>
					<div>					
						<input name="nomprove" class="easyui-textbox" required="true" style="width:100%">
					</div><br />

				<label>Razon Social:</label>
					<div>					
						<input name="idrazonsocial" class="easyui-combobox" data-options="url:'api/razonsocial_obtener.php', editable:false, required:'true', valueField:'idrazonsocial', textField:'descripcion'" style="width:100%">
					</div><br />				

				<label>Dirección:</label>
					<div>					
						<input name="direccion" class="easyui-textbox" required="true" style="width:100%">
					</div><br />

				<label>Telefono:</label>
					<div>					
						<input name="telefono" class="easyui-textbox" required="true" style="width:100%">
					</div><br />

				<label>Email:</label>
					<div>					
						<input name="email" class="easyui-textbox" style="width:100%">
					</div><br />	

				<label>Fecha De Registro:</label>
					<div>					
						<input name="fechregis" class="easyui-textbox" data-options="disabled:true" style="width:100%">
					</div><br />
					
				<label>Barrio:</label>
					<div>		
						<input name="barrio" class="easyui-textbox" required="true" style="width:100%">		
					</div><br />

				<label>Departamento:</label>
					<div>					
						<input id="iddepartamento" name="iddepartamento" class="easyui-combobox" data-options="url:'api/departamento_obtener.php', editable:false, required:'true', valueField:'iddepartamento', textField:'nomdepar', onChange: actualizarCiudades" style="width:100%">
					</div><br />

				<label>Ciudad:</label>
					<div>					
						<input id="idciudad" name="idciudad" class="easyui-combobox" data-options="editable:false, required:'true', valueField:'idciudad', textField:'nomciu'" style="width:100%">
					</div><br />	

									
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