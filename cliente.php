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
	<title>Clientes ~ INVENTASYSTEM</title>
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
	<script type="text/javascript" src="scripts/views/cliente.js"></script>
	<script type="text/javascript" src="scripts/date.js"></script>
</head>
<body class="easyui-layout">
	 
	<?php include('./shared/menu.php'); ?>

	<div data-options="region:'center'">		
		
		<table id="dg" title="Clientes" class="easyui-datagrid" data-options="fit:true"
				url="api/cliente_obtener_paginado.php"
				toolbar="#toolbar" pagination="true" pageSize="30"
				rownumbers="true" fitColumns="true" singleSelect="true">
			<thead>
				<tr>
					<th field="codigo">No. Identificación Cliente</th>					
					<th field="nomtipodoc">Tipo De Documento</th>
					<th field="nomclie">Nombre</th>
					<th field="apeclie">Apellido</th>
					<th field="dirclie">Dirección</th>
					<th field="telclie">Telefono</th>
					<th field="email">Email</th>
					<th field="fechnaci">Fecha De Nacimiento</th>
					<th field="fechregi">Fecha De Registro</th>
					<th field="nombarrio">Barrio</th>
					<th field="nomciudad">Ciudad</th>
				</tr>
			</thead>
		</table>
		
		<div id="toolbar">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="nuevo()">Ingresar Nuevo Cliente</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editar()">Editar Cliente</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="eliminar()">Eliminar Cliente</a>
		</div>

		<div id="dlg" class="easyui-dialog" style="width:400px;height:600px" closed="true" buttons="#dlg-buttons">
			<form id="fm" method="post" novalidate>

				<label>Numero De Identificación:</label>
					<div>					
						<input name="codigo" class="easyui-textbox" required="true" style="width:100%">
					</div><br />

				<label>Tipo De Documento:</label>
					<div>					
						<input name="idtipodoc" class="easyui-combobox" data-options="url:'api/documento_obtener.php', editable:false, required:'true', valueField:'idtipodoc', textField:'desctipodoc'" style="width:100%">
					</div><br />	

				<label>Nombre Del Cliente:</label>
					<div>					
						<input name="nomclie" class="easyui-textbox" required="true" style="width:100%">
					</div><br />

				<label>Apellido Del Cliente:</label>
					<div>					
						<input name="apeclie" class="easyui-textbox" required="true" style="width:100%">
					</div><br />

				<label>Dirección:</label>
					<div>					
						<input name="dirclie" class="easyui-textbox" required="true" style="width:100%">
					</div><br />

				<label>Telefono:</label>
					<div>					
						<input name="telclie" class="easyui-textbox" required="true" style="width:100%">
					</div><br />

				<label>Email:</label>
					<div>					
						<input name="email" class="easyui-textbox" style="width:100%">
					</div><br />

				<label>Fecha De Nacimiento:</label>
					<div>	
						<input name="fechnaci" type="text" class="easyui-datebox" data-options="parser: parserDate, formatter: formatterDate" />
   					</div><br />	

				<label>Fecha De Registro:</label>
					<div>					
						<input name="fechregi" class="easyui-textbox" data-options="disabled:true" style="width:100%">
					</div><br />
					
				<label>Barrio:</label>
					<div>		
						<input name="nombarrio" class="easyui-textbox" required="true" style="width:100%">		
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