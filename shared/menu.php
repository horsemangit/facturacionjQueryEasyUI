<div data-options="region:'north'" style="height:50px;color:white; background-color:#2D3E50;padding:15px;text-align:right;font-size:15px">	
	<a href="index.php" style="color:white;margin:0px 15px; 0px 15px;"><i class="icon icon-home"></i> Inicio</a>
		| <a href="cliente.php" style="color:white;margin:0px 15px; 0px 15px;"><i class="icon icon-users"></i> Clientes</a>
		| <a href="factura.php" style="color:white;margin:0px 15px; 0px 15px;"><i class="icon icon-printer"></i> Facturas</a>
			<?php		
				if($_SESSION['user']['idrol'] == 1):
					echo "| <a href='articulo.php' style='color:white;margin:0px 15px; 0px 15px;'><i class='icon icon-cogs'></i> Articulos</a>";
				endif;
			?>
		| <a href="proveedor.php" style="color:white;margin:0px 15px; 0px 15px;"><i class="icon icon-earth"></i> Proveedores</a>
		| <a href="cerrarsesion.php" style="color:white;margin:0px 15px; 0px 15px;"><i class="icon icon-switch"></i> Cerrar sesión</a>
</div>  
	