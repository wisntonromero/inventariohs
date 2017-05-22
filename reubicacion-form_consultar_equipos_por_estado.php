<?php
include_once("config.php");
include_once("sesion.php");
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Equipos reubicados - Consultar</title>
    <link rel="shortcut icon" href="uninorte.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/jquery.js" type="text/javascript"></script>
    <script src="js/vendor/modernizr.js"></script>
  </head>

  <body>
      <div class="row">
            <div class="columns large-10">
              <h1>
                <img style="width: 203px; height: 146px margin: -55px -216px -112px -140px;" src="images/jpg/logo.jpg" alt="Logo Universidad del Norte."/>
              </h1>
            </div>
            <div class="columns large-2">
                <img style="width: 60px; height: 146px margin: -55px -216px -112px -140px;" src="<?php echo $_SESSION['ubicacion_foto'];  ?>">
                <?php echo $_SESSION['usuario'];?>
            </div>
      </div>
      <nav class="top-bar" data-topbar>
        <ul class="title-area">
          <li class="name">
            <!-- Titulo del Menu -->
            <h1><a href="#">Consulta de equipos reubicados por estado...Por pantalla.</a></h1>
          </li>
          <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
        </ul>

        <section class="top-bar-section">
          <!-- Right Nav Section  menu lado derecho-->
          <ul class="right">
            <!--<li><a href="prestar_llaves.php">Nuevo prestamo de llaves</a></li> -->
            <li><a href="inicio.php">Inicio</a></li>
            <li><a href="compras-form_compras.php">Entrega de Equipos</a></li>
          </ul>
        </section>
      </nav>

      <form method="post" action="reubicacion-php_enviar_sql_completo_excel.php">
        <div class="row">
          <h4>Información de los equipos reubicados por estado</h4>
          <div class="columns large-3">
            <label for="activo_equipo">Activo equipo a instalar</label>
            <input type="text" name="activo_equipo" id="activo_equipo" placeholder="Obligatorio " value="" onkeypress="return letrasynumeros_sin_espacio(event)"  style="text-transform:uppercase;" >
          </div>

           <div class="columns large-3">
              <label for="activo_monitor">Activo monitor a instalar</label>
              <input type="text" name="activo_monitor" id="activo_monitor" placeholder="Obligatorio activo monitor " onkeypress="return letrasynumeros_sin_espacio(event)" style="text-transform:uppercase;">
          </div>

          <div class="columns large-3">
            <label for="activo_equipo_retirar">Activo equipo a retirar</label>
            <input type="text" name="activo_equipo_retirar" id="activo_equipo_retirar" placeholder="Obligatorio " value="" onkeypress='return letrasynumeros_sin_espacio(event)' style="text-transform:uppercase;" >
          </div>

           <div class="columns large-3">
              <label for="activo_monitor_a_retirar">Activo monitor a retirar</label>
              <input type="text" name="activo_monitor_a_retirar" id="activo_monitor_a_retirar" placeholder="Obligatorio activo monitor " onkeypress="return letrasynumeros_sin_espacio(event)" style="text-transform:uppercase;">
          </div>

          <div class="columns large-4">
            <label for="responsable">Responsable anterior</label>
            <input type="text" name="responsable" id="responsable" placeholder="Obligatorio " value="" onkeypress="return letrasynumeros(event)" style="text-transform:uppercase;" >
          </div>

          <div class="columns large-4">
            <label for="usuario_anterior">Usuario anterior</label>
            <input type="text" name="usuario_anterior" id="usuario_anterior" placeholder="Obligatorio " value="" onkeypress="return letrasynumeros(event)" style="text-transform:uppercase;" >
          </div>

          <div class="columns large-4">
            <label for="nuevo_responsable">Nuevo responsable</label>
            <input type="text" name="nuevo_responsable" id="nuevo_responsable" placeholder="Obligatorio " value="" onkeypress="return letrasynumeros(event)" style="text-transform:uppercase;">
          </div>

          <div class="columns large-4">
            <label for="nuevo_usuario">Nuevo usuario</label>
            <input type="text" name="nuevo_usuario" id="nuevo_usuario" placeholder="Obligatorio " value="" onkeypress="return letrasynumeros(event)" style="text-transform:uppercase;">
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

                        $query = "SELECT est_id,est_descripcion FROM estado ORDER BY est_descripcion ASC";

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
          <div class="columns large-4">
            <input type="button" name="consultar_estado_equipos_reubicados_por_pantalla" id="consultar_estado_equipos_reubicados_por_pantalla" value="Consultar por pantalla" class="button">
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
      <script src="js/reubicacion.js"></script>
      <script src="js/compras.js"></script>


      <script>
        $(document).foundation();

        $('#consultar_estado_equipos_reubicados_por_pantalla').click(function(e){

          $.post('reubicacion-php_enviar_sql_a_pantalla.php',
            {
              activo_equipo: $('#activo_equipo').val(),
              activo_monitor: $('#activo_monitor').val(),
              activo_equipo_retirar: $('#activo_equipo_retirar').val(),
              activo_monitor_a_retirar: $('#activo_monitor_a_retirar').val(),
              responsable: $('#responsable').val(),
              usuario_anterior: $('#usuario_anterior').val(),
              nuevo_responsable: $('#nuevo_responsable').val(),
              nuevo_usuario: $('#nuevo_usuario').val(),
              id_est: $('#id_est').val(),
            },
            function (data){
              $('#resultado').html(data);
            }
          );

        });

      </script>
      <!-- <script>
          $(document).foundation();
        </script> -->
  </body>
</html>