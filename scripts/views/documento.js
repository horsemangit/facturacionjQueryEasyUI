var url;

function nuevo(){
	$('#dlg').dialog('open').dialog('setTitle','Nuevo Tipo De Documento');
	$('#fm').form('clear');
	url = 'api/documento_insertar.php';
}

function editar(){
	var row = $('#dg').datagrid('getSelected');
	if (row){
		$('#dlg').dialog('open').dialog('setTitle','Editar Documento');
		$('#fm').form('load',row);
		url = 'api/documento_actualizar.php?id='+row.idtipodoc;
		
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
		$.messager.confirm('Confirmación','Esta seguro de eliminar el tipo de documento?',function(r){
			if (r){
				$.post('api/documento_eliminar.php',{id:row.idtipodoc},function(result){
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