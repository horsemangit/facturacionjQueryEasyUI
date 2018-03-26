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
	<title>Factura ~ INVENTASYSTEM</title>
	<link rel="stylesheet" type="text/css" href="content/themes/bootstrap/easyui.css">
	<link rel="stylesheet" type="text/css" href="content/themes/icon.css">
	<link rel="stylesheet" type="text/css" href="content/themes/color.css">
	<link rel="stylesheet" type="text/css" href="content/site.css">
	<!--ICONOS PARA EL MENU-->
	<link rel="stylesheet" type="text/css" href="content/iconmenu.css">
	<!--FIN-->
	<script type="text/javascript" src="scripts/jquery.min.js"></script>
	<script type="text/javascript" src="scripts/jquery.easyui.min.js"></script>
	<script type="text/javascript" src="scripts/locale/easyui-lang-es.js"></script>
	<script type="text/javascript" src="scripts/views/factura.js"></script>
</head>
<body>

	<?php include('./shared/menu.php'); ?>

	<div data-options="region:'center'">		
		
		<table id="dg" title="Facturas de venta" class="easyui-datagrid" data-options="fit:true"
				url="api/factura_obtener_paginado.php"
				toolbar="#toolbar" pagination="true" pageSize="30"
				rownumbers="true" fitColumns="true" singleSelect="true">
			<thead>			
				<tr>
					<th field="numfactura">Número de factura</th>					
					<th field="fechfactura">Fecha de la factura</th>					
					<th field="nomcliente">Cliente</th>					
					<th field="total">Total</th>					
					<th field="nomformapago">Forma de pago</th>					
					<th field="vendedor">Vendedor</th>					
				</tr>
			</thead>
		</table>
		
		<div id="toolbar">
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="nuevo()">Generar Factura</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editar()">Editar Factura</a>
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="eliminar()">Eliminar Factura</a>
		</div>

		<div id="dlg" class="easyui-dialog" data-options="onClose:function(){$('#dg').datagrid('reload');}" style="width:600px;height:500px" closed="true" buttons="#dlg-buttons">
			<form id="fm" method="post" novalidate>
				<input type="hidden" id="idfactura" name="idfactura">
				<label>Número de factura:</label>
				<div>					
					<input name="numfactura" class="easyui-textbox" data-options="disabled:true" style="width:100%">
				</div>				
				<label>Fecha de la factura:</label>
				<div>
					<input name="fechfactura" class="easyui-textbox" data-options="disabled:true" style="width:100%">					
				</div>
				<label>Cliente:</label>
				<div>
					<input name="idclie" class="easyui-combobox" data-options="url:'api/cliente_obtener.php', editable:false, required:'true', valueField:'idcliente', textField:'nomcompleto'" style="width:100%">					
				</div>
				<label>Forma de pago:</label>
				<div>
					<input name="idformapago" class="easyui-combobox" data-options="url:'api/formapago_obtener.php', editable:false, required:'true', valueField:'idformapago', textField:'descripcion'" style="width:100%">					
				</div>
				<label>Vendedor:</label>
				<div>
					<input name="vendedor" class="easyui-textbox" required="true" style="width:100%">					
				</div>				
			</form>
			<div id="dlg-buttons">
				<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="guardar()" style="width:90px">Guardar</a>
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-print" onclick="imprimir()" style="width:90px">Imprimir</a>			
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="cancelar()" style="width:90px">Cerrar</a>
			</div>

			<br />				
			<table id="dgd" title="Articulos de la factura" class="easyui-datagrid" data-options="height:180, width:'100%'"				
				toolbar="#toolbard" pagination="false"
				rownumbers="true" fitColumns="true" singleSelect="true">
				<thead>			
					<tr>
						<th field="codigo">Código</th>					
						<th field="nomarti">Producto</th>					
						<th field="cantarti">Cantidad</th>					
						<th field="valorunidad">Valor unidad</th>					
						<th field="total">Total</th>											
					</tr>
				</thead>
			</table>
			<div id="toolbard">
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="detallenuevo()">Nuevo Detalle</a>
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="detalleeditar()">Editar Detalle</a>
				<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="detalleeliminar()">Eliminar Detalle</a>
			</div>
		</div>	

		<div id="dlgd" class="easyui-dialog" style="width:400px;height:250px" closed="true" buttons="#dlgd-buttons">
			<form id="fmd" method="post" novalidate><br/>
				<label>Producto:</label>
				<div>				
					<input id="idarticulo" name="idarticulo" class="easyui-combobox" data-options="url:'api/articulo_obtener.php', onSelect:seleccionararticulo, editable:false, required:'true', valueField:'idarticulo', textField:'nomarti'" style="width:100%">
				</div>
				<label>Cantidad:</label>
				<div>				
					<input name="cantarti" class="easyui-numberbox" data-options="required:'true', min:1, precision:0, value:1" style="width:100%">
				</div>				
				<label>Valor unitario:</label>
				<div>				
					<input id="valorunidad" name="valorunidad" class="easyui-textbox" data-options="readonly:true" style="width:100%">
				</div>				

			</form>
		</div>
		<div id="dlgd-buttons">
			<a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="detalleguardar()" style="width:90px">Guardar</a>			
			<a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="detallecancelar()" style="width:90px">Cancelar</a>
		</div>
	</div>	
	

	<div data-options="region:'south'" style="height:20px; text-align:left; padding:1px">
		<b>Software creado por: Juan David Morales A.</b>
	</div>
</body>
</html>
