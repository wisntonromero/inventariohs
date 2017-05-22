
<!--  formulario - prestamosForm -->

<h2><?php echo $view->label ?></h2>
<form name ="client" id="client" method="POST" action="soporte-form_consultar_equipos_soporte_en_prestamo.php">
    <input type="hidden" name="id" id="id" value="<?php print $view->client->getId() ?>">
    <div>
        Activo Equipo Prestado
        <input type="text" name="activo_equipo" id="activo_equipo" value = "<?php print $view->client->getActivo_equipo() ?>">
    </div><br>
       
    <div>
        Fecha Recibido
        <input type="text" name="f_recibido" id="f_recibido" class="datetimepicker">
    </div>
           
    <div class="buttonsBar">
        <input id="cancel" class="button" type="button" value ="Cancelar" />
        <input id="submit" class="button" type="submit" name="submit" value ="Guardar" />
    </div>
</form>
    <script type="text/javascript" src="resources/jquery-1.7.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="resources/datetimepicker.css" />
    <script type="text/javascript" src="resources/datetimepicker.js"></script>
    <script>jQuery('.datetimepicker').datetimepicker();</script>