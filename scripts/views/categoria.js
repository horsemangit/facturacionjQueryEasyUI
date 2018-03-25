var url;

function nuevo(){
	$('#dlg').dialog('open').dialog('setTitle','Nueva Categoria');
	$('#fm').form('clear');
	url = 'api/categoria_insertar.php';
}

function editar(){
	var row = $('#dg').datagrid('getSelected');
	if (row){
		$('#dlg').dialog('open').dialog('setTitle','Editar Categoria');
		$('#fm').form('load',row);
		url = 'api/categoria_actualizar.php?id='+row.idcategoria;
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
		$.messager.confirm('Confirmación','Esta seguro de eliminar la categoria?',function(r){
			if (r){
				$.post('api/categoria_eliminar.php',{id:row.idcategoria},function(result){
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