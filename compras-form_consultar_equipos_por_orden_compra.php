<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>

  <form method="post" action="compras-php_enviar_sql_completo_excel.php">

    <div class="row">
      <h4>Información de los equipos por orden de compra</h4>
      <div class="columns large-3">
        <label for="orden_de_compra">Orden de compra</label>
        <input type="text" name="orden_de_compra" id="orden_de_compra" placeholder="Obligatorio orden de compra " onkeypress="return letrasynumeros_sin_espacio(event)" style="text-transform:uppercase;" >
      </div>

      

      <div class="columns large-4">
            <label for="proceso_equipo">Estado actual del equipo.</label>
            <select name="seleccionar_estado" id="seleccionar_estado">
                  <option selected="selected">----Seleccionar estado ----</option>
                  <?php
                    include_once("config.php");
                      $conexion   = mysql_connect($server,$username,$password);
                      mysql_set_charset('utf8',$conexion);
                      mysql_select_db($database);
                      $id_est         = $_POST['id_est'];
                      $estado_equipo  = $_POST['estado_equipo'];

                    $query = "SELECT est_id,est_descripcion FROM estado ORDER BY est_descripcion ASC  ";

                    $resultado = mysql_query($query,$conexion);
                    $numero_de_filas = mysql_num_rows($resultado);
                    while($registro=mysql_fetch_array($resultado))
                    {
                      $id_est         = $registro['est_id'];
                      $estado_equipo  = $registro['est_descripcion'];

                      echo '<option value="'.$id_est.'">'.$estado_equipo.'</option>';
                  }
                ?>
              </select> <br/><br/>
        </div>

        <div class="columns large-2">
            <input type="hidden" name="id_est" id="id_est" value="" placeholder="Obligatorio estado del equipo">
        </div>
        <div class="columns large-2">
            <input type="hidden" name="estado_equipo" id="estado_equipo" value="" placeholder="Obligatorio estado del equipo">
        </div>
    </div>

    <div class="row">

      <div class="columns large-3">
          <label for="activo_equipo">Activo equipo a instalar</label>
          <input type="text" name="activo_equipo" id="activo_equipo" placeholder="Obligatorio activo equipo " onkeypress="return letrasynumeros_sin_espacio(event)" style="text-transform:uppercase;">
      </div>

      <div class="columns large-3">
          <label for="activo_monitor">Activo monitor a instalar</label>
          <input type="text" name="activo_monitor" id="activo_monitor" placeholder="Obligatorio activo monitor " onkeypress="return letrasynumeros_sin_espacio(event)" style="text-transform:uppercase;">
      </div>

      <div class="columns large-3">
          <label for="activo_equipo">Activo equipo a retirar</label>
          <input type="text" name="activo_equipo_a_retirar" id="activo_equipo_a_retirar" placeholder="Obligatorio activo equipo " onkeypress="return letrasynumeros_sin_espacio(event)" style="text-transform:uppercase;">
      </div>

      <div class="columns large-3">
          <label for="activo_monitor">Activo monitor a retirar</label>
          <input type="text" name="activo_monitor_a_retirar" id="activo_monitor_a_retirar" placeholder="Obligatorio activo monitor " onkeypress="return letrasynumeros_sin_espacio(event)" style="text-transform:uppercase;">
      </div>
    </div>


    <div class="row">
      <div class="columns large-4">
        <input type="button" name="consultar_compras_de_equipos_por_pantalla" id="consultar_compras_de_equipos_por_pantalla" value="Consultar orden de compra pantalla" class="button">
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
  <script src="js/estado.js"></script>
  <script src="js/compras.js"></script>

  <script>
    $(document).foundation();

    $('#consultar_compras_de_equipos_por_pantalla').click(function(e){

      $.post('compras-php_enviar_sql_a_pantalla.php',
        {
          orden_de_compra: $('#orden_de_compra').val(),
          activo_equipo: $('#activo_equipo').val(),
          activo_monitor: $('#activo_monitor').val(),
          activo_equipo_a_retirar: $('#activo_equipo_a_retirar').val(),
          activo_monitor_a_retirar: $('#activo_monitor_a_retirar').val(),
          id_est: $('#id_est').val(),
        },
        function (data){
          $('#resultado').html(data);
        }
      );

    });

  </script>
</body>
</html>