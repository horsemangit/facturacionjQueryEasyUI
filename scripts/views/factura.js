var url;
var urld;

function nuevo(){
	$('#dlg').dialog('open').dialog('setTitle','Nueva factura');
	$('#fm').form('clear');	
	url = 'api/factura_insertar.php';
	$('#dgd').datagrid({url:'api/detallefactura_obtener_paginado.php?id=0'});	
	$('#dgd').datagrid('reload');
}

function editar(){
	var row = $('#dg').datagrid('getSelected');
	if (row){
		$('#dlg').dialog('open').dialog('setTitle','Editar factura');
		
		//Actualiza el encabezado de  la factura
		$('#fm').form('load',row);		
		url = 'api/factura_actualizar.php?id='+row.idfactura;
		
		//Actualiza el detalle de la factura
		$('#dgd').datagrid({url:'api/detallefactura_obtener_paginado.php?id='+row.idfactura});
		$('#dgd').datagrid('reload');
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
		$.messager.confirm('Confirmación','Esta seguro de eliminar la factura?',function(r){
			if (r){
				$.post('api/factura_eliminar.php',{id:row.idfactura},function(result){
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

function imprimir(){
	var idfactura = $('#idfactura').val();
	if (idfactura == null || idfactura == ""){
		return;
	}

	window.open('./factura_impreso.php?id=' + idfactura,'factura_impreso','location=no,width=800,height=600,scrollbars=yes,top=100,left=700,resizabl =no');		
}

function detallenuevo(){
	// Se valida si la información de la factura está ingresada
	if(!$("#fm").form('validate')){
		$.messager.alert('Falta información','Debe ingresar toda la información para poder ingresar los articulos a la factura', 'error');		
		return;
	}

	//Se valida si es una factura nueva o no
	var idfactura = $("#idfactura").val(); 
	var esNueva = (idfactura == null || idfactura == "");
	if (esNueva){
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
					return;
				} 
				else 
				{	
					$('#fm').form('load',result);
					$('#dlg').dialog('setTitle','Editar factura');
					url = 'api/factura_actualizar.php?id='+result.idfactura;
					urld = 'api/detallefactura_insertar.php?id='+result.idfactura;
					$("#idfactura").val(result.idfactura);
					$('#dgd').datagrid({url:'api/detallefactura_obtener_paginado.php?id='+result.idfactura});	
					$('#dg').datagrid('reload');	// reload the user data					
				}
			}
		});
	}
	else{
		urld = 'api/detallefactura_insertar.php?id='+idfactura;
	}

	$('#dlgd').dialog('open').dialog('setTitle','Nuevo detalle de factura');
	$('#fmd').form('clear');	
	$('#fmd').find('#idarticulo').combobox('enable');
}

function detalleeditar(){
	var row = $('#dgd').datagrid('getSelected');
	if (row){
		$('#dlgd').dialog('open').dialog('setTitle','Editar detalle de la factura');
		$('#fmd').form('load',row);
		$('#fmd').find('#idarticulo').combobox('disable');
		urld = 'api/detallefactura_actualizar.php?id='+row.iddetallefactura;		
	}
}

function detalleguardar(){	
	var esNuevo = !$('#fmd').find('#idarticulo').combobox('options').disabled;	
	$('#fmd').form('submit',{
		url: urld,
		onSubmit: function(){			
			var retorno = $(this).form('validate');			
			if(retorno){
				$('#fmd').find('#idarticulo').combobox('enable');
			}
			return retorno;
		},
		success: function(result){			
			var result = eval('('+result+')');
			
			if (result.errorMsg)
			{
				$.messager.show({title: 'Error',msg: result.errorMsg});
				if (!esNuevo){
					$('#fmd').find('#idarticulo').combobox('disable');	
				}				
			} 
			else 
			{
				$('#dlgd').dialog('close');		// close the dialog
				$('#dgd').datagrid('reload');	// reload the user data
			}
		}
	});
}

function seleccionararticulo(record){	
	// esto es solo para mostrarselo al usuario, el trigger hace el trabajo de guardarlo.
	$("#valorunidad").textbox('setValue', record.valven)
}

function detalleeliminar(){
	var row = $('#dgd').datagrid('getSelected');
	if (row){
		$.messager.confirm('Confirmación','Esta seguro de eliminar este articulo de la factura?',function(r){
			if (r){
				$.post('api/detallefactura_eliminar.php',{id:row.iddetallefactura},function(result){
					if (result.success){
						$('#dgd').datagrid('reload');	// reload the user data
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

function detallecancelar(){
	$('#dlgd').dialog('close');
}