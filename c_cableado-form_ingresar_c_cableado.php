<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>

<!--  ********************************************************* CUADRO INFORMACION  DEL CENTRO DE CABLEADPO ************************************* -->
    <form method="post" action="">
        <div class="row">
          <h4>Informacion del centro de cableado</h4>
          <div class="columns large-3">
            <label for="consulta_c_cableado">Nro centro de cableado</label>
            <input type="text" name="nro_cc" id="nro_cc" required pattern="[0-9]+$" autofocus=true  placeholder="Obligatorio nro cc">
            <input type="button" name="consulta_c_cableado" id="consulta_c_cableado" value="Consultar" class="button">
          </div>

          <div class="columns large-4">
            <label for="descripcion_cc">Descripción del centro de cableado</label>
            <input type="text" name="descripcion_cc" id="descripcion_cc" placeholder="Suministrado por el sistema">
          </div>

          <div class="columns large-5">
            <label for="ubicacion_cc">Ubicación del centro de cableado</label>
            <input type="text" name="ubicacion_cc" id="ubicacion_cc" placeholder="Suministrado por el sistema">
          </div>
        </div>
    </form>
  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/c_cableado.js"></script>
  <script>
//    $(document).foundation();
  </script>
</body>
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/ >
<script src="js/jquery.js"></script>
<script src="js/jquery.datetimepicker.js"></script>
<script>jQuery('.datetimepicker').datetimepicker();</script>
