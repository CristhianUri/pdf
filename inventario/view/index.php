<?php 
include "../Db/conexion.php";
$sentencia = $bd->query("SELECT * FROM pdf");
$resultados = $sentencia->fetchAll(PDO::FETCH_NUM);
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
    <title>inventario celulares</title>
</head>
<body>
<div class="container mt-3">
  <h2>Registro</h2>
  <p>Favor de insertar los datos solicitados correctamente</p>
  <form method="post" id="frm_registrar">
    <div class="row">
      <div class="col-6">
        <input type="text" class="form-control" placeholder="nombre" name="nombre">
      </div>
      <div class="col-6 ">
        <input type="text" class="form-control" placeholder="apellido paterno" name="aPaterno">
      </div>
      <div class="col-6 mt-2">
        <input type="text" class="form-control" placeholder="apellido materno" name="aMaterno">
      </div>
      <div class="col-6 mt-2">
        <input type="text" class="form-control" placeholder="telefono" name="telefono">
      </div>
      <div class="col-6 mt-2">
      <button type="submit" class="btn btn-success" name="btn_guardar" id="btn_guardar">Guardar</button>
      </div>
    </div>
  </form>
</div>


<div class="container">
        <div class="row">
        <div class="continer mt-3">
    <div class="row">
        <div class="col-6">
            <a href="pdf.php">generar pdf</a>
            
        </div>
    </div>
</div>
        <table class="table mt-4">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nombre</th>
      <th scope="col">Apellido paterno</th>
      <th scope="col">Apellido materno</th>
      <th scope="col">telefono</th>
      <th scope="col">editar</th>
      
    </tr>
  </thead>
    <?php
        foreach ($resultados as $resultado) {
            $datos=$resultado[0]."||".
            $resultado[1]."||".
            $resultado[2]."||".
            $resultado[3]."||".
            $resultado[4];
    ?>

  <tbody>
    <tr>
      <th scope="row"><?php echo $resultado[0]?></th>
      <td><?php echo $resultado[1]?></td>
      <td><?php echo $resultado[2]?></td>
      <td><?php echo $resultado[3]?></td>
      <td><?php echo $resultado[4]?></td>
      <td><button type="button" class="btn btn-warning" id="ver_modal" data-bs-toggle="modal" data-bs-target="#exampleModal" onclick="llenarModal_actualizar('<?php echo $datos?>');">Editar</button></td>
      
    </tr>
  </tbody>
    <?php 
        }
    ?>
</table>
        </div>
    </div>
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Actualizar informacion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form id="frm_actualizar" method="post">
      <div class="mb-3">
                    <label for="aid" class="form-label">id</label>
                    <input type="text" class="form-control" name="aid" value="" id="aid" placeholder="">
                    </div>
                    <div class="mb-3">
                    <label for="anombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="anombre" value="" id="anombre" placeholder="">
                    </div>
                    <div class="mb-3">
                    <label for="aapellidoP" class="form-label">Apellido paterno</label>
                    <input type="text" class="form-control" name="aapellidoP" value="" id="aapellidoP" placeholder="">
                    </div>
                    <div class="mb-3">
                    <label for="aapellidoM" class="form-label">Apellido materno</label>
                    <input type="text" class="form-control" name="aapellidoM" value="" id="aapellidoM" placeholder="">
                    </div>
                    <div class="mb-3">
                    <label for="atelefono" class="form-label">Telefono</label>
                       <input type="text" class="form-control" name="atelefono" id="atelefono">
                    </div>
                    <div class="mb-3 mt-3">
                    <button type="submit" name="btn_editar" id="btn_editar" class="btn btn-primary">Actualizar</button>
                    </div>
                    <div class="mb-3 mt-3">
                    <button type="submit" name="btn_eliminar" id="btn_eliminar" class="btn btn-danger">Eliminar</button>
                    </div>
                </form>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
          $(document).ready(function(){
              $("#btn_guardar").on('click', function(e){

                  e.preventDefault();
                  agregar_datos();
              });
          });
    </script>
<script type="text/javascript">
        $(document).ready(function(){
            $("#btn_editar").on('click', function(e){
                e.preventDefault();
                actualizar_datos();
            });
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $("#btn_eliminar").on('click', function(e){

              e.preventDefault();
              eliminar_datos();
            });
        });
    </script>
    <script type="text/javascript">
            document.getElementById("btn-pdf").onclick = function () {
            location.href = "../pdf.php";
            };
            document.getElementById("btn-pdf").on('click', function(){
                location
            })
         </script>
  <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
</body
</html>
