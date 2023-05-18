<?php 
    include '../Db/conexion.php';
    $nombre=$_POST['nombre'];
    $aPaterno=$_POST['aPaterno'];
    $aMaterno=$_POST['aMaterno'];
    $telefono=$_POST['telefono'];   

    $query = $bd-> prepare("INSERT INTO pdf (nombre, aPaterno, aMaterno, telefono) VALUES (?,?,?,?);");
    $execute = $query -> execute([$nombre, $aPaterno,$aMaterno,$telefono]);
    echo $execute;

?>