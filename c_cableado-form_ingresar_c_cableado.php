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
            <input type="text" name="descripcion_cc" id="descripcion_cc" placeholder="Descripción del centro de cableado">
          </div>

          <div class="columns large-5">
            <label for="ubicacion_cc">Ubicación del centro de cableado</label>
            <input type="text" name="ubicacion_cc" id="ubicacion_cc" placeholder="Ubicación del centro de cableado">
          </div>
        </div>

        <div class="row">
          <h4>Elementos del centro de cableado</h4>
          <div class="columns large-3">
            <label for="aire_acondicionado">Aire acondicionado Si / No</label>
            <input type="text" name="aire_acondicionado" id="aire_acondicionado" placeholder="Obligatorio Si / No">
          </div>

          <div class="columns large-3">
            <label for="tipo_aire_acondicionado">Tipo Minisplit / Central</label>
            <input type="text" name="tipo_aire_acondicionado" id="tipo_aire_acondicionado" placeholder="Obligatorio Minisplit / Central">
          </div>

          <div class="columns large-3">
            <label for="activo_aire_acondicionado">Activo aire acondicionado</label>
            <input type="text" name="activo_aire_acondicionado" id="activo_aire_acondicionado" placeholder="Obligatorio activo aire acondicionado">
          </div>

          <div class="columns large-3">
            <label for="disponibilidad_aire_acondicionado">Disponibilidad 24 Horas / 12 Horas </label>
            <input type="text" name="disponibilidad_aire_acondicionado" id="disponibilidad_aire_acondicionado" placeholder="Disponibiliad activo aire acondicionado">
          </div>
        </div>

        <div class="row">
          <div class="columns large-3">
            <label for="nro_circuito_regulado">Nro del circuito regulado</label>
            <input type="text" name="nro_circuito_regulado" id="nro_circuito_regulado" placeholder="Obligatorio nro del circuito regulado">
          </div>
          
          <div class="columns large-3">
            <label for="nro_circuito_normal">Nro del circuito Normal</label>
            <input type="text" name="nro_circuito_normal" id="nro_circuito_normal" placeholder="Obligatorio nro del circuito normal">
          </div>

          <div class="columns large-3">
            <label for="barraje_a_tierra">Barraje de tierra Si / No</label>
            <input type="text" name="barraje_a_tierra" id="barraje_a_tierra" placeholder="Obligatorio Si / No">
          </div>

          <div class="columns large-3">
            <label for="detector_de_incendio">Detector de incendio Si / No</label>
            <input type="text" name="detector_de_incendio" id="detector_de_incendio" placeholder="Obligatorio Si / No">
          </div>
        </div>

         <div class="row">
          <h4>Medidas del centro de cableado</h4>
          <div class="columns large-3">
            <label for="alto_centro_cableado">Alto del centro de cableado</label>
            <input type="text" name="alto_centro_cableado" id="alto_centro_cableado" placeholder="Obligatorio alto">
          </div>

          <div class="columns large-4">
            <label for="largo_centro_cableado">Largo del centro de cableado</label>
            <input type="text" name="largo_centro_cableado" id="largo_centro_cableado" placeholder="Obligatorio largo">
          </div>

          <div class="columns large-5">
            <label for="ancho_centro_cableado">Ancho del centro de cableado</label>
            <input type="text" name="ancho_centro_cableado" id="ancho_centro_cableado" placeholder="Obligatorio ancho">
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
