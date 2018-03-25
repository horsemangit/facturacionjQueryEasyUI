<?php
    session_start();    
    if(isset($_SESSION['user'])){
        echo '<script> window.location="index.php"; </script>';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Login ~ INVENTASYSTEM</title>
    <link rel="stylesheet" type="text/css" href="content/themes/default/easyui.css">
    <link rel="stylesheet" type="text/css" href="content/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="content/themes/color.css">
    <link rel="stylesheet" type="text/css" href="content/site.css">
    <link rel="stylesheet" type="text/css" href="content/slider.css">
    <link rel="stylesheet" type="text/css" href="content/imgfondo.css">
    <!--ICONOS PARA EL MENU-->
    <link rel="stylesheet" type="text/css" href="content/iconmenu.css">
    <!--FIN-->
    <script type="text/javascript" src="scripts/jquery.min.js"></script>
    <script type="text/javascript" src="scripts/jquery.easyui.min.js"></script>
    <script type="text/javascript" src="scripts/locale/easyui-lang-es.js"></script>
    <script>
    function submit(){
        $('#fm').form('submit',{
        url: 'api/iniciarsesion.php',
        onSubmit: function(){
            return $(this).form('validate');
        },
        success: function(result){
            var result = eval('('+result+')');            
            if (result.errorMsg)
            {
                $.messager.alert('Error',result.errorMsg, 'error');
            } 
            else if (result.success) 
            {
                location.href = 'index.php';
            }
            else{
                $.messager.alert('Error','Ocurrio un problema en el servidor. No se pudo iniciar sesión', 'error');              
            }
        }
    });
    }
    </script>
</head>

<body>

    <div data-options="region:'north'" style="height:30px;color:white;border-radius:5px; background-color:#2D3E50;padding:15px;text-align:right;font-size:30px">  
       <center><b>Bienvenido a JDavidSoft</b></center>
    </div>   

    <div class="contenido">
        <img src="content/security.png">


    <center style="padding:1px;">
    <div style="margin:20px 0;"></div>

    <div class="easyui-panel" style="width:400px;padding:50px 60px;border-radius:10px">        

        <form id="fm" method="post" action="validar.php">        
            <div style="margin-bottom:20px">
                <input name="usuario" class="easyui-textbox" prompt="&#128272;   Usuario" required=true iconWidth="28" style="width:100%;height:34px;padding:10px">
            </div>

            <div style="margin-bottom:20px">
                <input name="clave" class="easyui-passwordbox" prompt="&#128272;   Contraseña" required=true iconWidth="28" style="width:100%;height:34px;padding:10px">
            </div>


             <div style="text-align:center;padding:5px;">
                <a href="javascript:void(0)" class="easyui-linkbutton" onclick="submit();"><i class="icon icon-enter"></i> Ingresar</a>
            </div>
        </form>
    </div>
    <br/>
     <center><font face="arial" size="2" color="white">Copyright © 2016, JDavidSoft ~ InventaSystem</font></center>
</div>

</body>
</html>
