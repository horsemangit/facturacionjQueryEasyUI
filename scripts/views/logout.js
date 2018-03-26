function confirm1(){
    $.messager.confirm('Cerrar Sesión', '¿Esta seguro(a) de cerrar la sesión?', function(r){
    if (r){
        	window.location = 'cerrarsesion.php';
    	}
	});
}