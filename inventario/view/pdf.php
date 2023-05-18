<?php 
include "../Db/conexion.php";
$sentencia = $bd->query("SELECT * FROM pdf");
$sentencia -> execute();
$registros = $sentencia ->fetchAll(PDO::FETCH_ASSOC);
?>
<?php 
   ob_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap5.min.css">
    <script src="../ajax/funciones.js"></script>
    <script src="../js.js"></script>
    <script src="../js/jquery-3.6.0.min.js"></script>
    <title>PDF</title>
</head>
<body>
<div class="container">
        <div class="row">
        <table class="table mt-4 table table-bordered border-dark">
  <thead>
    <tr>
     
      <th scope="col">Nombre</th>
      <th scope="col">Apellido paterno</th>
      <th scope="col">Apellido materno</th>
      <th scope="col">telefono</th>
      
      
    </tr>
  </thead>
    
  <tbody>
  <?php
        foreach ($registros as $registro) {
        
    ?>

    <tr>
      
      <td><?php echo $registro['nombre']?></td>
      <td><?php echo $registro['aPaterno']?></td>
      <td><?php echo $registro['aMaterno']?></td>
      <td><?php echo $registro['telefono']?></td>
     
      
    </tr>
  </tbody>
    <?php 
        }
    ?>
</table>
        </div>
    </div>
 
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
</body
</html>
<?php 
$html = ob_get_clean();
echo $html;


 require_once '../libreria/dompdf/autoload.inc.php';
use Dompdf\Dompdf;
$dompdf = new Dompdf();

$options = $dompdf ->getOptions();
$options -> set(array('isRemoteEnabled'=> true));
$dompdf -> setOptions($options); 

$dompdf ->loadhtml(utf8_decode($html));
$dompdf->setPaper('letter');
//$dompdf ->setPaper('A4','landscape');

$dompdf ->render();

$dompdf ->stream("archivo_.pdf",array("Attachment"=> false));
header("Content-type: application/pdf");
header("Content-Disposition: inline; filename=documento.pdf");
echo $dompdf->output();


?>