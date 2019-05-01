

function agregar(nombre,apellido,email,telefono){

    cadena = `nombre=${nombre}&apellido=${apellido}&email=${email}&telefono=${telefono}`;

    $.ajax({
        type:"POST",
        url:"clases/agregarDatos.php",
        data:cadena,
        success:function(r){
            if(r==true){
                setTimeout(_=>window.location.replace('index.php'), 500);
                alertify.success("Agregado con éxito");
            }else{
                alertify.error("Ha ocurrido un error");
            }

        }
    });

}


function agregarDatos(datos) {
    separar=datos.split(',');
    $('#idpersona').val(separar[0]);
    $('#nombred').val(separar[1]);
    $('#apellidod').val(separar[2]);
    $('#emaild').val(separar[3]);
    $('#telefonod').val(separar[4]);
}

function actualizar(id, nombre, apellido, email, telefono){

    cadena = `id=${id}&nombre=${nombre}&apellido=${apellido}&email=${email}&telefono=${telefono}`;

    $.ajax({
        type:"POST",
        url:"clases/actualizarDatos.php",
        data:cadena,
        success:function(r){
            if(r==true){
                alertify.success("Se ha actualizado corectamente");
            }else{
                alertify.error("Ha ocurrido un error");
            }
            setTimeout(_=>window.location.replace('index.php'), 200);
        }
    });

}

function pregunta(id) {
    alertify.confirm('Eliminar dato', '¿Está seguro de eliminar el registro?',
        function(){ eliminar(id) }
        , function(){ alertify.error('Cancelado')});
}

function eliminar(id){

    cadena = `id=${id}`;

    $.ajax({
       type: "POST",
        url:"clases/eliminarRegistro.php",
        data:cadena,
        success:function (r) {
            if (r==true){
                alertify.success("Eliminado con éxito");
            }else {
                alertify.error("No se pudo eliminar");
            }
            setTimeout(_=>window.location.replace('index.php'), 200);
        }

    });

}