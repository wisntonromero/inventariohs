<h2><?php echo $view->label ?></h2>
<form name ="recordatorio" id="recordatorio" method="POST" action="soporte-form_consultar_equipos_soporte_en_prestamo.php">
    <input type="hidden" name="id" id="id" value="<?php print $view->soporte->getId() ?>">
    
    <div>
        Activo Equipo Prestado
        <input type="text" name="activo_equipo" id="activo_equipo" value = "<?php print $view->client->getActivo_equipo() ?>">
    </div><br>

    <div class="buttonsBar">
        <input id="cancel" class="button" type="button" value ="Cancelar" />
        <input id="submit" class="button" type="submit" name="submit" value ="Enviar recordatorio" />
    </div>
</form>
    <script type="text/javascript" src="resources/jquery-1.7.1.min.js"></script>
    <link rel="stylesheet" type="text/css" href="resources/datetimepicker.css" />
    <script type="text/javascript" src="resources/datetimepicker.js"></script>
    <script>jQuery('.datetimepicker').datetimepicker();</script>