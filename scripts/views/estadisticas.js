$(document).ready(function(){

	$('#showresult').click(function(event)
	{

		event.preventDefault();
		var fechinicio = $("#fechinicio").datebox('getValue');
		var fechfinal = $("#fechfinal").datebox('getValue');

		if(fechinicio > fechfinal)
		{
			 $.messager.alert('Error','La fecha de inicio no puede ser mayor a la fecha final!','error');
		}
		else if(fechinicio == "" && fechfinal == "")
		{
			 $.messager.alert('Error','No puedes dejar los campos vacios!','error');
		}
		else
		{		
			$.ajax({
				type: 'POST',
				url: 'api/graficos_ventas.php',
				data: {'fechainicio' : fechinicio, 'fechafinal' : fechfinal},
				success: function(data){
					var valores = JSON.parse(data);
								
				    var valorLabels = [];
				    for (var i = valores.length - 1; i >= 0; i--)  {
				        valorLabels[i] = valores[i].fechfactura;
				    }

				    var valortotal = [];
				    for (var i = valores.length - 1; i >= 0; i--)  {
				        valortotal[i] = valores[i].total;
				    }
				    var Datos = {
				                    labels : valorLabels,

                                    datasets : [
                                        {
                                            fillColor : 'rgba(91,228,146,0.6)', //COLOR DE LAS BARRAS
                                            strokeColor : 'rgba(57,194,112,0.7)', //COLOR DEL BORDE DE LAS BARRAS
                                            highlightFill : 'rgba(73,206,180,0.6)', //COLOR "HOVER" DE LAS BARRAS
                                            highlightStroke : 'rgba(66,196,157,0.7)', //COLOR "HOVER" DEL BORDE DE LAS BARRAS
                                            data: valortotal                                            
                                        }
                                    ]
                                }
                                
                            var contexto = document.getElementById('grafico').getContext('2d');
                            window.Barra = new Chart(contexto).Bar(Datos, { responsive : true });
                        }
                    });
                    return false;
                }	
	})

	$('#pdf').click(function(event)
	{
		event.preventDefault();
		var fechinicio = $("#fechinicio").datebox('getValue');
		var fechfinal = $("#fechfinal").datebox('getValue');

		if(fechinicio > fechfinal)
		{
			$.messager.alert('Error','La fecha de inicio no puede ser mayor a la fecha final!','error');
		}
		else if(fechinicio == "" && fechfinal == "")
		{
			$.messager.alert('Error','No puedes dejar los campos vacios!','error');
		}
		else
		{		
			window.open('api/reportes_pdf.php/?fechainicial=' + fechinicio + '&fechafinal='+ fechfinal);
		}
	});

});

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