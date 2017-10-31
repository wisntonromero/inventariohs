<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>

      <form method="post" action="activo-php_enviar_sql_completo_excel.php">

        <div class="row">
        <div class="texto1 info">Estas en : Consultar equipos por ubicación</div>
          <h4>Informacion de la ubicación del equipo - Bloque - Piso - Cubiculo - Usuario por pantalla</h4>
          <div class="columns large-3">
            <label for="bloque">Bloque</label>
            <input type="text" name="bloque" id="bloque" placeholder="Obligatorio bloque " style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>

          <div class="columns large-2">
            <label for="piso">Piso</label>
            <input type="text" name="piso" id="piso" placeholder="Obligatorio piso" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>

          <div class="columns large-2">
            <label for="cubiculo">Cubiculo</label>
            <input type="text" name="cubiculo" id="cubiculo" placeholder="Obligatorio cubiculo" style="text-transform:uppercase;">
          </div>

           <div class="columns large-5">
            <label for="departamento">Departamento</label>
            <input type="text" name="departamento" id="departamento" placeholder="Obligatorio departamento" style="text-transform:uppercase;">
          </div>
        </div>

        <div class="row">
          <div class="columns large-4">
            <label for="estado_equipo">Estado Equipo(Activo - Soporte)</label>
            <input type="text" name="estado_equipo" id="estado_equipo" placeholder="Obligatorio Estado Equipo" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>

          <div class="columns large-4">
            <label for="responsable">Responsable</label>
            <input type="text" name="responsable" id="responsable" placeholder="Obligatorio responsable" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>

          <div class="columns large-4">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" placeholder="Obligatorio usuario" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>
        </div>

        <div class="row">
          <div class="columns large-4">
            <input type="button" name="consultar_equipos_por_pantalla" id="consultar_equipos_por_pantalla" value="Consultar equipos por pantalla" class="button">
          </div>
        </div>

        <div id="resultado" class="row">

        </div>

        <div class="row">
          <div class="columns large-4">
            <input type="submit" name="excel" id="excel" value="Generar Excel" class="button">
          </div>
        </div>

       <!--  <iframe width="600" height="400" scrolling="auto" src="<?php print ("https://guayacan.uninorte.edu.co/directorio_interno/"); ?>"></iframe> -->
      </form>

      <script src="js/vendor/jquery.js"></script>
      <script src="js/foundation.min.js"></script>
      <script src="js/funciones.js"></script>

      <script>
        $(document).foundation();

        $('#consultar_equipos_por_pantalla').click(function(e){

          $.post('activo-php_enviar_sql_a_pantalla.php',
            {
              usuario:      $('#usuario').val(),
              responsable:  $('#responsable').val(),
              bloque:       $('#bloque').val(),
              piso:         $('#piso').val(),
              departamento: $('#departamento').val(),
              cubiculo:     $('#cubiculo').val(),
              estado_equipo:$('#estado_equipo').val(),
            },
            function (data){
              $('#resultado').html(data);
            }
          );
        });

      </script>
  