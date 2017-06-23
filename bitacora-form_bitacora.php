<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>

  <form method="post" action="bitacora-php_enviar_sql_completo_excel.php">

    <div class="row">
      <div class="columns large-3">
          <label for="activo_equipo">Activo equipo a instalar</label>
          <input type="text" name="activo_equipo" id="activo_equipo" placeholder="Obligatorio activo equipo " onkeypress="return letrasynumeros_sin_espacio(event)" style="text-transform:uppercase;">
      </div>
    </div>


    <div class="row">
      <div class="columns large-4">
        <input type="button" name="bitacora_consultar_equipos_por_pantalla" id="bitacora_consultar_equipos_por_pantalla" value="Consultar Bitacora" class="button">
      </div>
    </div>

     <div id="resultado" class="row">

     </div>

     <div class="row">
      <div class="columns large-4">
        <input type="submit" name="excel" id="excel" value="Generar Excel" class="button">
      </div>
    </div>
  </form>

  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/bitacora.js"></script>

  <script>
    $(document).foundation();

    $('#bitacora_consultar_equipos_por_pantalla').click(function(e){

      $.post('bitacora-php_enviar_sql_a_pantalla.php',
        {
          activo_equipo: $('#activo_equipo').val(),
        },
        function (data){
          $('#resultado').html(data);
        }
      );

    });

  </script>
</body>
</html>