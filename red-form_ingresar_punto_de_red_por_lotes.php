<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>

<!--  ************************************************** INFORMACION DEL PUNTO DE RED  ****************************** -->
      <form method="post" action="">
          <div class="row">
            <h4>Información del punto de red</h4>
            <div class="columns large-2">
              <label for="nro_cc">Centro de cableado</label>
              <input type="text" name="nro_cc" id="nro_cc" autofocus=true value="" placeholder="Obligatorio" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>

            <div class="columns large-2">
              <label for="letra_pp">Letra del patch panel</label>
              <input type="text" name="letra_pp" id="letra_pp" autofocus=true value="" placeholder="Obligatorio" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>

            <div class="columns large-2">
              <label for="nro_inicial">Nro donde inicia</label>
              <input type="text" name="nro_inicial" id="nro_inicial" autofocus=true value="" placeholder="Obligatorio" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>

            <div class="columns large-2">
              <label for="nro_final">Nro donde termina</label>
              <input type="text" name="nro_final" id="nro_final" autofocus=true value="" placeholder="Obligatorio" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>

            <div class="columns large-2">
              <label for="consultar_equipos_por_pantalla">&nbsp;</label>
              <input type="button" name="consultar_equipos_por_pantalla" id="consultar_equipos_por_pantalla" value="Consultar" class="button">
            </div>

            <div class="columns large-2">
              <input type="hidden" name="www" id="www" autofocus=true value="" placeholder="Obligatorio" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>
          </div>


        <div id="resultado" class="row">

        </div>

          <div class="row">
            <div class="columns large-2">
              <label for="bloque">Bloque</label>
              <input type="text" name="bloque" id="bloque" value="" placeholder="Obligatorio bloque" style="text-transform:uppercase;">
            </div>

            <div class="columns large-2">
              <label for="piso">Piso</label>
              <input type="text" name="piso" id="piso" value="" placeholder="Obligatorio piso" style="text-transform:uppercase;">
            </div>

            <div class="columns large-8">
              <label for="cubiculo">Cubiculo</label>
              <input type="text" name="cubiculo" id="cubiculo" value="" placeholder="Obligatorio cubiculo" style="text-transform:uppercase;">
            </div>
          </div>

          <div class="row">
            <div class="columns large-2">
              <label for="tipo_de_punto_de_red">Tipo punto de red</label>
              <input type="text" name="tipo_de_punto_de_red" id="tipo_de_punto_de_red" value="DATOS" placeholder="Obligatorio tipo de punto de red" style="text-transform:uppercase;">
            </div>

            <div class="columns large-2">
              <label for="categoria_punto_de_red">Categoria </label>
              <input type="text" name="categoria_punto_de_red" id="categoria_punto_de_red" value="6a F/UTP" placeholder="Obligatorio categoria punto de red">
            </div>

            <div class="columns large-2">
              <label for="estado_punto_de_red">Estado punto de red</label>
              <input type="text" name="estado_punto_de_red" id="estado_punto_de_red" value="OCUPADO" placeholder="Obligatorio estado punto de red" style="text-transform:uppercase;">
            </div>

            <div class="columns large-2">
              <label for="color_toma">Color del toma de red</label>
              <input type="text" name="color_toma" id="color_toma" value="NEGRO" placeholder="Obligatorio color del toma" style="text-transform:uppercase;">
            </div>

             <div class="columns large-2">
              <input type="hidden" name="estado_de_red" id="estado_de_red" value="" placeholder="Obligatorio estado punto de red" style="text-transform:uppercase;">
            </div>
          </div>


<!--  ************************************************** FIN INFORMACION DEL PUNTO DE RED  ********************************************************* -->

          <div class="row">
            <div class="columns large-2">
              <label for="modificar_punto_de_red">&nbsp;</label>
              <input type="hidden" name="modificar_punto_de_red" id="modificar_punto_de_red2" value="2Modificar punto de red" class="button">
            </div>

            <div class="columns large-2">
              <label for="btn_ingresar_puntos_de_red_por_lotes">&nbsp;</label>
              <input type="button" name="btn_ingresar_puntos_de_red_por_lotes" id="btn_ingresar_puntos_de_red_por_lotes" value="Ingresar Nuevo Patch Panel" class="button">
            </div>

             <div class="columns large-2">
              <label for="modificar_punto_de_red">&nbsp;</label>
              <input type="hidden" name="modificar_punto_de_red" id="modificar_punto_de_red2" value="2Modificar punto de red" class="button">
            </div>

            <div class="columns large-2">
              <label for="limpiar_forma">&nbsp;</label>
              <input type="submit" href="red-form_ingresar_punto_de_red_por_lotes.php" name="limpiar_forma" id="limpiar_forma" value="Consultar otro patch panel" class="button">
            </div>

            <div class="columns large-2">
              <label for="modificar_punto_de_red">&nbsp;</label>
              <input type="hidden" name="modificar_punto_de_red" id="modificar_punto_de_red2" value="2Modificar punto de red" class="button">
            </div>
          </div>
    </form>

      <!--******************************************** FIN DE TODOS CAMPOS DE LA CONSULTA DEL ACTIVO ************************************* -->
    </div>
  </div>

        <script src="js/vendor/jquery.js"></script>
        <script src="js/red.js"></script>
        <script src="js/foundation.min.js"></script>
        <script>
        $(document).foundation();

        $('#consultar_equipos_por_pantalla').click(function(e){

          $.post('red-php_enviar_sql_a_pantalla.php',
            {
              nro_cc:   $('#nro_cc').val(),
              letra_pp: $('#letra_pp').val(),
            },
            function (data){
              $('#resultado').html(data);
            }
          );
        });

      </script>
</body>
</html>