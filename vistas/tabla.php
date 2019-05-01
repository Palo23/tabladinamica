
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tabla dinamica</title>
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/alertify.css">
    <link rel="stylesheet" type="text/css" href="librerias/alertifyjs/css/themes/default.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="librerias/jquery-3.4.0.min.js"></script>
    <script src="js/funciones.js"></script>
    <script src="librerias/bootstrap/js/bootstrap.js"></script>
    <script src="librerias/alertifyjs/alertify.js"></script>
</head>
<body>
<!-- Tabla -->
<div class="container">
    <div class="row">
        <div class="col-sm-12">
            <h2>Tabla dinámica</h2>
            <table class="table table-hover table-bordered">
                <thead>
                <button class="btn btn-primary" data-toggle="modal" data-target="#modalRegistro">
                    <span class="fas fa-user-plus">
                        Agregar registro
                    </span>
                </button>
                </thead>
                <thead>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Acciones</th>
                </thead>
                <?php
                if (count($personas) > 0): ?>
                <?php foreach ($personas as $item):
                    $datos=$item['id'].",".$item['nombre'].",".$item['apellido'].",".$item['email'].",".$item['telefono'];
                    ?>
                    <tr>
                        <td><?php echo $item['nombre'] ; ?></td>
                        <td><?php echo $item['apellido'] ; ?></td>
                        <td><?php echo $item['email'] ; ?></td>
                        <td><?php echo $item['telefono'] ; ?></td>
                        <td>
                            <button class="btn btn-warning fas fa-edit" data-toggle="modal" data-target="#modalEditar" onclick="agregarDatos('<?php echo $datos; ?>')"></button>
                            <button class="btn btn-danger far fa-trash-alt" data-toggle="modal" onclick="pregunta('<?php echo $item['id'] ?>')"></button>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <?php else: ?>
                <p>No hay nada para mostrar</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<!-- Nuevo registro -->
<div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar nueva persona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label>Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="">
                <label>Apellido:</label>
                <input type="text" class="form-control" id="apellido" name="">
                <label>Email:</label>
                <input type="text" class="form-control" id="email" name="">
                <label>Teléfono:</label>
                <input type="text" class="form-control" id="telefono" name="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="guardarNuevo">Agregar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal editar -->
<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" id="idpersona">
                <label>Nombre:</label>
                <input type="text" class="form-control" id="nombred" name="">
                <label>Apellido:</label>
                <input type="text" class="form-control" id="apellidod" name="">
                <label>Email:</label>
                <input type="text" class="form-control" id="emaild" name="">
                <label>Teléfono:</label>
                <input type="text" class="form-control" id="telefonod" name="">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-warning" id="actualiza" >Actualizar</button>
            </div>
        </div>
    </div>
</div>



</body>
</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('#tabla').load('vistas/tabla.php');
    });
</script>

<script>
    $(document).ready(function () {
        $('#guardarNuevo').click(function() {
            nombre = $('#nombre').val();
            apellido = $('#apellido').val();
            email = $('#email').val();
            telefono = $('#telefono').val();
            agregar(nombre, apellido, email, telefono);
        });
        $('#actualiza').click(function () {
            id = $('#idpersona').val();
            nombre = $('#nombred').val();
            apellido = $('#apellidod').val();
            email = $('#emaild').val();
            telefono = $('#telefonod').val();
            actualizar(id, nombre, apellido, email, telefono);
        })

    });
</script>

<script>

</script>



<script>
    $(document).ready(function () {
        $('#eliminar').click(function () {
            id = $('#id').val();
            eliminar(id);
        })
    })
</script>

