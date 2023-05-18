<?php 
include '../Db/conexion.php';

$id=$_POST['aid'];

$sentencia = $bd ->prepare("DELETE FROM pdf WHERE Id_Pdf= $id;");
$resultado = $sentencia->execute();

echo $resultado;

?>