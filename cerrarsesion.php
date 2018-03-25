<?php
session_start();
session_destroy();
echo '<script> alert("Cerraste Sesion"); </script>';
echo '<script> window.location="loginsistema.php"; </script>';
?>
