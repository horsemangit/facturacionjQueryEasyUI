var url;

function nuevo(){
	$('#dlg').dialog('open').dialog('setTitle','Nuevo Articulo');
	$('#fm').form('clear');
	$('#codigo').numberbox('enable');
	url = 'api/articulo_insertar.php';
}

function editar(){
	var row = $('#dg').datagrid('getSelected');
	if (row){
		$('#dlg').dialog('open').dialog('setTitle','Editar Articulo');
		$('#fm').form('load',row);	
		$('#codigo').numberbox('disable');
		url = 'api/articulo_actualizar.php?id='+row.idarticulo;		
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
		$.messager.confirm('Confirmación','Esta seguro que desea eliminar este articulo?',function(r){
			if (r){
				$.post('api/articulo_eliminar.php',{id:row.idarticulo},function(result){
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