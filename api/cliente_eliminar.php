<?php

$id = intval($_REQUEST['id']);

include 'conn.php';

$sql = "delete from  cliente where idcliente=$id";
$result = @mysql_query($sql);
if ($result){
	echo json_encode(array('success'=>true));
} else {
	echo json_encode(array('errorMsg'=>'Ha ocurrido un error al intentar eliminar el cargo.'));
}
?>