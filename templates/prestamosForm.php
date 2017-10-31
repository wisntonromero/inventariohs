
<h2><?php echo $view->label ?></h2>
<form name ="client" id="client" method="POST" action="llaves-form_consultar_prestamo.php">
    <input type="hidden" name="id" id="id" value="<?php print $view->client->getId() ?>">
    <div>
        Nro del Centro de Cableado
        <input type="text" name="nro_cc" id="nro_cc" value = "<?php print $view->client->getNroCC() ?>">
    </div><br>
    <div>
        Descripción
        <input type="text" name="descripcion_cc" id="descripcion_cc" value = "<?php print $view->client->getDescripcion() ?>">
    </div>
    
    <div>
        Fecha Recibido
        <input type="text" name="f_h_recibido" id="f_h_recibido" class="datetimepicker">
    </div>
    <div>
        Cliente
        <input type="text" styletext="strong" name="cliente" id="cliente" value = "<?php print $view->client->getCliente() ?>">
    </div>
    
    <div>
        Correo
        <input type="text" name="correo" id="correo" value = "<?php print $view->client->getCorreo() ?>">
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