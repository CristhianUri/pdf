function agregar_datos(){

    var datos=$("#frm_registrar").serialize();
    $.ajax({

        method:"POST",
        url:"../controllers/Insert.php",
        data: datos,
 
        success: function(e){

            if(e==1){
                alert("Registro Exitoso");
                document.getElementById("frm_registrar").reset();
            }else{
                alert("Error de registro");
            }
        }
        
    });

    return false;
}
function llenarModal_actualizar(datos){
    d=datos.split('||');
    $("#aid").val(d[0]);
    $("#anombre").val(d[1]);
    $("#aapellidoP").val(d[2]);
    $("#aapellidoM").val(d[3]);
    $("#atelefono").val(d[4]);
}

function actualizar_datos(){
    var datos= $("#frm_actualizar").serialize();

    $.ajax({

        method:"POST",
        url:"../controllers/Actualiza.php",
        data: datos,
        success: function(e){

            if(e==1){
                alert("Registro Actualizado");
            }else{
                alert("Error de edicion");
            }
        }
    });

    return false;
}

function eliminar_datos(){
    
    var datos= $("#frm_actualizar").serialize();

    $.ajax({

        method:"POST",
        url:"../controllers/Eliminar.php",
        data: datos,
        success: function(e){

            if(e==1){
                alert("Registro Eliminado");
            }else{
                alert("Error");
            }
        }
    });

    return false;
}
