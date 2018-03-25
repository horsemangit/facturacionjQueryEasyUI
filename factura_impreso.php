<?php
  session_start();  
  if(!isset($_SESSION['user'])){
    echo '<script> window.location="loginsistema.php"; </script>';
  }
?>
<?php

$id = intval($_REQUEST['id']);

require 'api/conexion.php';
$cnx=conectar("facturacion");

$rs = ejecutar("SELECT 
    factura.idfactura
      , factura.numfactura
      , factura.idclie
      , factura.vendedor
      , factura.fechfactura
      , factura.idformapago
      , formapago.descripcion as nomformapago     
    , cliente.codigo as codcliente
      , concat(cliente.nomclie,' ', cliente.apeclie) as nomcliente      
      , cliente.telclie
      , cliente.dirclie     
  FROM factura INNER JOIN cliente ON factura.idclie = cliente.idcliente
    INNER JOIN formapago ON factura.idformapago = formapago.idformapago     
  WHERE
    factura.idfactura = $id",$cnx);

$row = mysql_fetch_row($rs);
if($row){

echo "<!DOCTYPE html>
<html lang=en>
  <head>
    <meta charset='utf-8'>
    <title>Factura De Venta</title>
    <link rel=stylesheet href='content/stylefactura.css' media=all />
  </head>
       <body>
          <header class=clearfix>

              <div id=logo>
                <img src=content/logoJD.png>
              </div>

              <div id=company>
                <h2 class=name>JDavidSoft</h2>
                <div>Calle 45 #78-90C</div>
                <div>(602) 519-0450</div>
                <div>JDavidSoft@Gmail.com</div>
              </div> 

         </header>

          <main>
            <div id=details class=clearfix>
              <div id=client>
                <div class=to>No. Identificación Del Cliente:</div>
                  <div class=name>$row[7]</div>
                  <div class=to>Nombre De Cliente:</div>
                  <h2 class=name>$row[8]</h2>
                <div class=address>Tel: $row[9] </div>
                <div class=address>Dir: $row[10]</div>                
            </div>";           

        $rsd = ejecutar("SELECT 
      detallefactura.iddetallefactura
      , detallefactura.idfactura
      , detallefactura.idarticulo
      , detallefactura.cantarti
      , detallefactura.valorunidad
      , detallefactura.cantarti * detallefactura.valorunidad as total 
      , articulo.codigo
      , articulo.nomarti
    FROM detallefactura INNER JOIN articulo ON detallefactura.idarticulo = articulo.idarticulo 
    WHERE idfactura=$id",$cnx);

         echo "
             <div id='invoice'>
                <h1>Factura N°:  $row[1]</h1>
                <div class='date'>Vendedor: $row[3]</div>
                <div class='date'>Fecha De Factura: $row[4]</div>
                <div class='date'>Medio De Pago: $row[6]</div>
            </div>
              </div>

      <table border='0' cellspacing='0' cellpadding='0'>
        <thead>
          <tr>
            <th class='no'>CODIGO</th>
            <th class='desc'>ARTICULO</th>
            <th class='unit'>CANTIDAD</th>
            <th class='qty'>VALOR UNITARIO</th>
            <th class='total'>VALOR TOTAL</th>
          </tr>
        </thead>";

      echo "<tbody>";
          $total = 0;
  while($rowd = mysql_fetch_array($rsd)){
    $total += $rowd[5];
    $iva=$total * 16/100;
    $totaL= $iva + $total;
    echo "
    <tr>
      <td>$rowd[6]</td>
      <td>$rowd[7]</td>
      <td>$rowd[3]</td>
      <td style='text-align: right;'>$ ".number_format($rowd[4])."</td>
      <td style='text-align: right;'>$ ".number_format($rowd[5])."</td>
    </tr>
    ";  
  }
       echo "</tbody>";
    
        echo "
      <tfoot>
          <tr>
            <td colspan='2'></td>
            <td colspan='2'>Subtotal  </td>
            <td style='text-align: right;'>$ ".number_format($total)."</td>
          </tr>

          <tr>
            <td colspan='2'></td>
            <td colspan='2'>IVA 16%</td>
            <td style='text-align: right;'>$ ".number_format($iva)."</td>
          </tr>

          <tr>
            <td colspan='2'></td>
            <td colspan='2'>Total A Pagar</td>
            <td style='text-align: right;'>$ ".number_format($totaL)."</td>
          </tr>                    
      </tfoot>
    </table>


      <div id='thanks'>RECIBIDO POR</div>
          <div id='notices'>
      </main>
         
      <footer>      
    		Esta Factura se ha creado en un ordenador y es válida sin la firma y el sello del Vendedor.
      </footer>"; 

  echo "<script> window.onload = function(){ window.print(); } </script>
      </body>
        </html>";

}
else{
	echo 'No Se Encontro La Factura!!!';	
}
cerrar($cnx);
?>

