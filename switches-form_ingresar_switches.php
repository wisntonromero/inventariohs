<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>

    <form class="" action="" method="post" name="switches-form_ingresar_switches">
          <div class="row">
              <h4>Informacion del Switch</h4>
              <div class="columns large-2">
                <label for="activo_equipo">Activo Switch</label>
                <input type="text" name="activo_equipo" id="activo_equipo" style="text-transform: uppercase;"value="" placeholder="Obligatorio activo equipo">
              </div>

              <div class="columns large-2">
                <label for="consultar_switch">&nbsp;</label>
                <input type="button" name="consultar_switch" id="consultar_switch" value="Consultar" class="button">
              </div>

              <div class="columns large-4">
                <label for="marca_equipo">Marca del equipo.</label>
                <input type="text" name="marca_equipo" id="marca_equipo" value="" placeholder="Cisco / Alcatel / 3Com">
              </div>

              <div class="columns large-4">
                <label for="modelo_equipo">Modelo del equipo.</label>
                <input type="text" name="modelo_equipo" id="modelo_equipo" value="" placeholder="2960 / 2960-G / 2960-S / 2960-X">
              </div>
          </div>

          <div class="row">
              <div class="columns large-4">
                <label for="serie_equipo">Serie del equipo.</label>
                <input type="text" name="serie_equipo" id="serie_equipo" value="" placeholder="Obligatorio modelo del equipo">
              </div>

              <div class="columns large-2">
                <label for="nro_puertos">Numero de puertos.</label>
                <input type="text" name="nro_puertos" id="nro_puertos" value="" placeholder="28 / 52 incluye sfp ">
              </div>

              <div class="columns large-2">
                <label for="poe">POE (Si / No)</label>
                <input type="text" name="poe" id="poe" value="" placeholder="Si / No">
              </div>

              <div class="columns large-2">
                <label for="vatiaje_poe">Vatiaje POE</label>
                <input type="text" name="vatiaje_poe" id="vatiaje_poe" value="" placeholder="370 / 740">
              </div>

              <div class="columns large-2">
                <label for="estado_equipo">Estado del equipo</label>
                <input type="text" name="estado_equipo" id="estado_equipo" value="" placeholder="Activo / Dañado">
              </div>
          </div>

          <div class="row">
              <div class="columns large-6">
                <label for="f_instalacion">Fecha de Instalacion del switch (dd/mm/aaaa)</label>
                <input type="date" name="f_instalacion" id="f_instalacion" value="" placeholder="Obligatorio dd/mm/aaaa">
              </div>

              <div class="columns large-6">
                <label for="f_ult_mantenimiento">Fecha Ultimo Mantenimiento (dd/mm/aaaa)</label>
                <input type="date" name="f_ult_mantenimiento" id="f_ult_mantenimiento" value="" placeholder="Obligatorio dd/mm/aaaa">
              </div>
          </div>
         <!--  ******************************************* FIN DE INFORMACION DEL EQUIPO  **************************************************************************** -->

         <!-- ******************************************** INFORMACION DE RED DEL EQUIPO *********************************************************** 68-5b-35-97-ad-fd -->
          <div class="row">
              <h4> Información de red del equipo. Dir Ip - Unidad - Nro del cc.</h4>
              <div class="columns large-3">
                 <label for="dir_ip_sw">Dirección Ip del sw.</label>
                 <input type="text" name="dir_ip_sw" id="dir_ip_sw" value="" placeholder="Obligatorio dir ip del switch">
              </div>

              <div class="columns large-4">
                 <label for="unidad">Unidad</label>
                 <input type="text" name="unidad" id="unidad" value="" placeholder="Obligatorio unidad">
              </div>

              <div class="columns large-2">
                 <label for="nro_cc">Nro del cc.</label>
                 <input type="text" name="nro_cc" id="nro_cc" value="" placeholder="Obligatorio cc">
              </div>

              <div class="columns large-2">
                 <!-- <label for="oculto">Nro del cc.</label> -->
                 <input type="hidden" name="oculto" id="oculto" value="" placeholder="Obligatorio punto de red">
              </div>
           </div>

           <div class="row">
              <div class="columns large-6">
                <label for="ubicacion_fisica">Ubicacion Fisica</label>
                <input type="text" name="ubicacion_fisica" id="ubicacion_fisica"  value="" placeholder="Obligatorio ubicación fisica">
              </div>

              <div class="columns large-6">
                <label for="ubicacion_logo">Ubicacion Logo</label>
                <input type="text" name="ubicacion_logo" id="ubicacion_logo" value="" placeholder="Obligatorio ubicacion del logo">
              </div>
           </div>

           

          
         <!-- ******************************************** INFORMACION DE RED DEL EQUIPO ****************************** -->

         <!-- ******************************************** UBICACION DEL EQUIPO ************************************ -->

          <div class="row">
              <h4>Informacion del equipo en Rack </h4>
              
              <div class="columns large-2">
                <label for="id_rack">Id del rack</label>
                <input type="text" name="id_rack" id="id_rack"  value="" placeholder="Obligatorio piso">
              </div>

              <div class="columns large-2">
                <label for="posicion_rack">Posicion en Rack</label>
                <input type="text" name="posicion_rack" id="posicion_rack" value="" placeholder="Obligatorio ubicacion_logo">
              </div>

              <div class="columns large-3">
                <label for="unidades_de_rack">Unidades de Rack que ocupa</label>
                <input type="text" name="unidades_de_rack" id="unidades_de_rack" value="" placeholder="Obligatorio ubicacion_logo">
              </div>

              <div class="columns large-2">
                <label for="conectado_a_tgb">Conecatdo a Tgb ?</label>
                <input type="text" name="conectado_a_tgb" id="conectado_a_tgb" value="" placeholder="Obligatorio ubicacion_logo">
              </div>

              <div class="columns large-12">
                <label for="observaciones">Observaciones </label>
                <input type="text" name="observaciones" id="observaciones" value="">
              </div>

          </div>

          <div class="row">
              <div id="boton_ingresar_activo" class="columns large-4">
                <label for="ingresar_activo_nuevo">&nbsp;</label>
                <input type="button" name="ingresar_activo_nuevo" id="ingresar_activo_nuevo" value="Ingresar Activo" class="button">
              </div>

              <div class="columns large-4">
                <label for="modificar_activo">&nbsp;</label>
                <input type="button" name="modificar_activo" id="modificar_activo" value="Modificar Activo" class="button">
              </div>

              <div class="columns large-4">
                <label for="limpiar_forma">&nbsp;</label>
                <input type="submit" href="activo-form_ingresar_activo.php" name="limpiar_forma" id="limpiar_forma" value="Consultar otro equipo" class="button">
              </div>
          </div>
    </form>
    
    <div class="row"> 
      <div id="pie_de_pagina" class="columns large-6">
    </div>
      <div id="pie_de_pagina" class="columns large-6">
            Copyright Winston Romero - Barranquilla - Colombia  - 2016
      </div>
    </div>
  <!--******************************************** FIN DE TODOS CAMPOS DE LA CONSULTA DEL ACTIVO ************************************* -->

    <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/switches.js"></script>
    <script>
        $(document).foundation();
    </script>
  </body>
</html>
