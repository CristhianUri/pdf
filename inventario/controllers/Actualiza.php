<?php
include '../Db/conexion.php';

$id=$_POST['aid'];
$nombre=$_POST['anombre'];
$aPaterno=$_POST['aapellidoP'];
$aMaterno=$_POST['aapellidoM'];
$telefono=$_POST['atelefono'];

$sentencia = $bd->prepare("UPDATE pdf SET nombre=?, aPaterno=?, aMaterno=?, telefono=? WHERE Id_Pdf=$id;");
$resultado = $sentencia->execute([$nombre, $aPaterno, $aMaterno, $telefono]);

echo $resultado;

?>