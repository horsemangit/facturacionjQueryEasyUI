


<div style="margin:20px 0;"></div>
    <div class="easyui-panel menu-principal">
        <a href="index.php" class="easyui-linkbutton" data-options="plain:true"><i class="icon icon-home"></i> Inicio</a>
        <a href="cliente.php" class="easyui-linkbutton" data-options="plain:true"><i class="icon icon-users"></i> Clientes</a>
        <a href="factura.php" class="easyui-linkbutton" data-options="plain:true"><i class="icon icon-printer"></i> Facturas</a>
            <?php       
                if($_SESSION['user']['idrol'] == 1):
                    echo '<a href="articulo.php" class="easyui-linkbutton" data-options="plain:true"><i class="icon icon-cogs"></i> Articulos</a>';                
                endif;
            ?>       
        <a href="proveedor.php" class="easyui-linkbutton" data-options="plain:true"><i class="icon icon-earth"></i> Proveedores</a>
        <a href="#" class="easyui-menubutton" data-options="menu:'#mm3'"><i class="icon icon-folder-open"></i> Administración</a>
    
    <div id="mm3" style="width:150px;">
        <div><a href="categoria.php" data-options="plain:true"><i class="icon icon-pushpin"></i> Categorias</div>
        <div><a href="documento.php" data-options="plain:true"><i class="icon icon-profile"></i> Documentos</div>
        <div><a href="estadisticas.php" data-options="plain:true"><i class="icon icon-pie-chart"></i> Estadisticas</a></div>     
        <div><a data-options="plain:true" onclick="confirm1();"><i class="icon icon-switch"></i> Cerrar sesión</a></div>
    </div>
 