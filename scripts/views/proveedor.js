var url;
var idciudad = null;
function nuevo(){
	$('#dlg').dialog('open').dialog('setTitle','Nuevo Proveedor');
	$('#iddepartamento').combobox('setValue', null);	
	$('#fm').form('clear');
	url = 'api/proveedor_insertar.php';
}

function editar(){
	var row = $('#dg').datagrid('getSelected');
	if (row){
		idciudad = row.idciudad;
		idrazonsocial = row.idrazonsocial;
		$('#dlg').dialog('open').dialog('setTitle','Modificar Proveedor');		
		$('#fm').form('load',row);	
		url = 'api/proveedor_actualizar.php?id='+row.idproveedor;
	}
}


function guardar(){
	$('#fm').form('submit',{
		url: url,
		onSubmit: function(){
			return $(this).form('validate');
		},
		success: function(result){
			var result = eval('('+result+')');
			
			if (result.errorMsg)
			{
				$.messager.show({title: 'Error',msg: result.errorMsg});
			} 
			else 
			{
				$('#dlg').dialog('close');		// close the dialog
				$('#dg').datagrid('reload');	// reload the user data
			}
		}
	});
}

function eliminar(){
	var row = $('#dg').datagrid('getSelected');
	if (row){
		$.messager.confirm('Confirmación','Esta seguro de eliminar este proveedor?',function(r){
			if (r){
				$.post('api/proveedor_eliminar.php',{id:row.idproveedor},function(result){
					if (result.success){
						$('#dg').datagrid('reload');	// reload the user data
					} else {
						$.messager.show({	// show error message
							title: 'Error',
							msg: result.errorMsg
						});
					}
				},'json');
			}
		});
	}
}

function cancelar(){
	$('#dlg').dialog('close');
}

function actualizarCiudades(newValue, oldValue){	
	$('#idciudad').combobox('setValue', idciudad);	
	$('#idciudad').combobox('reload','api/ciudad_obtener_por_departamento.php?id=' + newValue);
	idciudad = null;
}

 function parserDate(s){	
	if (s != null && s != ""){
		return new Date(getDateFromFormat(s,"yyyy-MM-dd"));
	} else {
		return new Date();
	}
}

function formatterDate(d){	
	return formatDate(d, "yyyy-MM-dd");
}