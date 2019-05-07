<?php

require_once '../clases/Persona.php';

$personas = Persona::recuperarTodos(Conexion::getInstancia());

Conexion::cerrar();

?>
<br><br>
<div class="row">
    <div class="col-sm-8"></div>
    <div class="col-sm-4">
        <label class="fas fa-search">Buscador</label>
        <select id="buscar" class="form-control input-group-lg">

            <option value="0">Selecciona</option>

            <?php foreach ($personas as $item): ?>

                <option value="<?php echo $item['id'] ?>">
                    <?php echo $item['nombre']." ".$item['apellido'] ?>
                </option>

            <?php endforeach; ?>
        </select>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {
    //$('#buscar').select2();
       $('#buscar').change(function () {
            $.ajax({
               type:"POST",
                data:'valor=' + $('#buscar').val(),
               url:'clases/crearSesion.php',
                success:function (r) {
                    setTimeout(_=>window.location.replace('index.php'), 500);
                }
            });
       });
    });
</script>