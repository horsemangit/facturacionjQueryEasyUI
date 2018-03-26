<?php	 
	require 'conexion.php';
	$cnx = conectar();

  $fechainicial = $_REQUEST['fechainicial'];
  $fechafinal = $_REQUEST['fechafinal'];

  $sql = "SELECT 
              factura.numfactura
                , factura.vendedor
                , factura.fechfactura
                , concat(cliente.nomclie,' ', cliente.apeclie) as nomcliente
                , formapago.descripcion as nomformapago
                , SUM((detallefactura.cantarti * detallefactura.valorunidad)) as total
            FROM 
                factura 
            INNER JOIN 
                cliente ON factura.idclie = cliente.idcliente
            INNER JOIN 
                formapago ON factura.idformapago = formapago.idformapago
            LEFT JOIN 
                detallefactura ON factura.idfactura = detallefactura.idfactura
            WHERE
                factura.fechfactura BETWEEN '$fechainicial' AND '$fechafinal'
            GROUP BY
                factura.numfactura";
  $sql = ejecutar($cnx,$sql);    
?>
  <!DOCTYPE html>
  <html lang=en>
    <head>
      <meta charset='utf-8'>
      <title>Factura De Venta</title>
      <link rel=stylesheet href='../../content/stylefactura.css' media=all />
    </head>
         <body>
            	<header class=clearfix>
  	          	<div id='logo'>
  	        		<img src='../../content/logoJD.png'>
  	          	</div>

  	            <div id='company'>
  	                <h2 class=name>JDavidSoft</h2>
  	                <div>Calle 45 #78-90C</div>
  	                <div>(602) 519-0450</div>
  	                <div>JDavidSoft@Gmail.com</div>
  	            </div> 
           	</header>

            <main>
              <div id='details' class='clearfix'>
                <div id='client'>
                  <h1>REPORTE DE VENTAS DEL : <?php echo '<font color="#0087C3">'.$fechainicial. ' ~ ' .$fechafinal.'</font>';  ?></h1>            
              	</div>      	
              </div>         

        <table border='0' cellspacing='0' cellpadding='0'>
          <thead>
            <tr>
              <th class='no'># FACTURA</th>
              <th class='desc'>VENDEDOR</th>
              <th class='unit'>FECHA DE FACTURA</th>
              <th class='qty'>CLIENTE</th>
              <th class='qty'>FORMA DE PAGO</th>
              <th class='total'>VALOR FACTURA</th>
            </tr>
          </thead>  
       
      <tbody>

   	  <?php

  	    $total = 0;
  	  	while($row = mysqli_fetch_array($sql))
  	  	{        
  		    $total += $row[5];
  		    $iva =$total * 19/100;
  		    $totaL= $iva + $total;
  		    
          echo "<tr>
  		      		    <td>FV - $row[0]</td>
  		      		    <td>$row[1]</td>
  		      		    <td>$row[2]</td>
  		      		    <td>$row[3]</td>
  		      		    <td style='text-align: center;'>$row[4]</td>
  		      		    <td style='text-align: right;'>$" .number_format($row[5])."</td>
  		    	       </tr>";  
   	 	}
      ?>

    
              </tbody>

        <tfoot>
            <tr>
              <td></td>
              <td colspan='4'><b>Subtotal</b></td>
              <td style='text-align: right;'><?php echo '$ '.number_format($total); ?></td>
            </tr>

            <tr>
            <td></td>
              <td colspan='4'><b>IVA 19%</b></td>
              <td style='text-align: right;'><?php echo '$ '.number_format($iva); ?></td>
            </tr>

            <tr>
            <td></td>
              <td colspan='4'>Total Ventas</td>
              <td style='text-align: right;'><?php echo '$ '.number_format($totaL); ?></td>
            </tr>                    
        </tfoot>
     </table>

        </main>
           
        <footer>      
      		Fecha De Reporte <?php echo date("d/m/Y"); ?>
        </footer>
       <script> window.onload = function(){ window.print(); } </script>
  </body>
  </html>
