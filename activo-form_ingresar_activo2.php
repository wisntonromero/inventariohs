<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>

  <form name="form_activo" id="form_activo" method="post" action="">
    <div class="row">
      <h4>Informacion del equipo</h4>
      <div class="columns large-2">
        <label for="activo_equipo">Activo CPU</label>
        <input type="text" name="activo_equipo" id="activo_equipo" required = "[0-9]" autofocus=true value="" placeholder="Obligatorio activo equipo">
      </div>

      <div class="columns large-2">
        <label for="consultar">&nbsp;</label>
        <input type="button" name="consultar" id="consultar2" value="Consultar" class="button">
      </div>

      <div class="columns large-4">
        <label for="tipo_equipo">Tipo de equipo. Pc / Impresora / Mac</label>
        <input type="text" name="tipo_equipo" id="tipo_equipo" style="text-transform: uppercase;" value="" placeholder="Obligatorio tipo de equipo">
      </div>

      <div class="columns large-4">
        <label for="marca_equipo">Marca del equipo.</label>
        <input type="text" name="marca_equipo" id="marca_equipo" style="text-transform: uppercase;" value="" placeholder="Obligatorio marca del equipo">
      </div>
    </div>

    <div class="row">
      <div class="columns large-4">
        <label for="modelo_equipo">Modelo del equipo.</label>
        <input type="text" name="modelo_equipo" id="modelo_equipo" style="text-transform: uppercase;" value="" placeholder="Obligatorio modelo del equipo">
      </div>

      <div class="columns large-4">
        <label for="activo_mon">Activo del monitor.</label>
        <input type="text" name="activo_mon" id="activo_mon" value="">
      </div>

      <div class="columns large-4">
        <label for="estado_equipo">Estado del equipo (Activo - De baja) </label>
        <input type="text" name="estado_equipo" id="estado_equipo" style="text-transform: uppercase;" value="" placeholder="Obligatorio estado del equipo">
      </div>
    </div>
    <!--  ******************************************* FIN DE INFORMACION DEL EQUIPO  **************************************************************************** -->

    <!-- ******************************************** INFORMACION DE RED DEL EQUIPO *********************************************************** 68-5b-35-97-ad-fd -->
    <div class="row">
      <h4> Información de red del equipo. Ip - Mac - Punto de red - Ubicación. </h4>
      <div class="columns large-2">
        <label for="dir_ip">Dirección Ip el pc</label>
        <input type="text" name="dir_ip" id="dir_ip" pattern="^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$" value="" placeholder="Obligatorio ip del equipo">
      </div>

      <div class="columns large-1">
        <label for="consultar_ip">Ip</label>
        <input type="button" name="consultar_ip" id="consultar_ip" value="Ip" class="button">
      </div>

      <div class="columns large-3">
        <label for="dir_mac">Dirección Mac del pc</label>
        <input type="text" name="dir_mac" id="dir_mac" style="text-transform: uppercase;" value="" placeholder="Obligatorio Mac">
      </div>

      <div class="columns large-2">
        <label for="punto_de_red">Punto de red.</label>
        <input type="text" name="punto_de_red" id="punto_de_red" class="punto_de_red" style="text-transform: uppercase;" value="" placeholder="Obligatorio punto de red">
      </div>

      <div class="columns large-2">
        <label for="consultar_punto_de_red">&nbsp;</label>
        <input type="button" name="consultar_punto_de_red" id="consultar_punto_de_red2" value="Consultar" class="button">
      </div>

      <div class="columns large-2">
        <label for="modificar_punto_de_red">&nbsp;</label>
        <input type="button" name="modificar_punto_de_red" id="modificar_punto_de_red2" value="Modificar" class="button">
      </div>
    </div>

    <div class="row">

      <div class="columns large-2">
        <label for="punto_de_voz">P. Voz</label>
        <input type="text" name="punto_de_voz" id="punto_de_voz" style="text-transform: uppercase;" value="" placeholder="Obligatorio punto de voz">
      </div>
      
      <div class="columns large-2">
        <label for="dir_ip_sw">Dirección Ip del sw</label>
        <input type="text" name="dir_ip_sw" id="dir_ip_sw" value="" placeholder="Suministrada por el sistema">
      </div>

      <div class="columns large-2">
        <label for="puerto_sw">P. Sw</label>
        <input type="text" name="puerto_sw" id="puerto_sw" style="text-transform: uppercase;" value=""  placeholder="Suministrado por el sistema">
      </div>

      <div class="columns large-1">
        <label for="vlan_puerto_sw">Vlan</label>
        <input type="text" name="vlan_puerto_sw" id="vlan_puerto_sw" value="" placeholder="Suministrada por el sistema">
      </div>

      <div class="columns large-2">
        <label for="bloque">Bloque</label>
        <input type="text" name="bloque" id="bloque" style="text-transform: uppercase;" value="" placeholder="Obligatorio bloque">
      </div>

      <div class="columns large-1">
        <label for="piso">Piso</label>
        <input type="text" name="piso" id="piso" style="text-transform: uppercase;" value="" placeholder="Obligatorio piso">
      </div>      
      
      <div class="columns large-2">
        <label for="cubiculo">Cubiculo</label>
        <input type="text" name="cubiculo" id="cubiculo" style="text-transform: uppercase;" value="" placeholder="Obligatorio cubiculo">
      </div>
    </div>

    <div class="row">
      <div class="columns large-6">
        <label for="departamento">Departamento</label>
        <input type="text" name="departamento" id="departamento" style="text-transform: uppercase;" value="" placeholder="Obligatorio departamento">
      </div>

      <div class="columns large-6">
        <label for="f_ult_actualiza">F. Ult. Actualización.(dd/mm/aaaa)</label>
        <input type="date" name="f_ult_actualiza" id="f_ult_actualiza" value="">
      </div>
    </div>
    <!-- ******************************************** INFORMACION DE RED DEL EQUIPO ****************************** -->

    <!-- ******************************************** UBICACION DEL EQUIPO ************************************ -->

    <div class="row">
      <h4>Informacion del usuario del equipo </h4>
    <div class="row">
      <div class="columns large-4">
        <label for="responsable">Responsable</label>
        <input type="text" name="responsable" id="responsable" style="text-transform: uppercase;" value="" placeholder="Obligatorio responsable del equipo">
      </div>

      <div class="columns large-4">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" style="text-transform: uppercase;" value="" placeholder="Obligatorio usuario del equipo">
      </div>

      <div class="columns large-4">
        <label for="ext_tel">Extension telefónica </label>
        <input type="text" name="ext_tel" id="ext_tel" style="text-transform: uppercase;" value="" placeholder="Obligatorio ext telefonica">
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

    <div class="row">
        <div class="columns large-3">
          <label for="enviar_mail_equipo_nuevo">&nbsp;</label>
          <input type="button" name="enviar_mail_equipo_nuevo" id="enviar_mail_equipo_nuevo" value="Enviar mail nuevo" class="button">
        </div>
     
        <div class="columns large-3">
          <label for="enviar_mail_equipo_reubicado">&nbsp;</label>
          <input type="button" name="enviar_mail_equipo_reubicado" id="enviar_mail_equipo_reubicado" value="Enviar mail reubicado" class="button">
        </div>

        <div class="columns large-3">
          <label for="enviar_mail_quitar_reserva_ip">&nbsp;</label>
          <input type="button" name="enviar_mail_quitar_reserva_ip" id="enviar_mail_quitar_reserva_ip" value="Enviar mail quitar reserva de ip" class="button">
        </div>

        <div class="columns large-3">
          <label for="enviar_mail_a_mi">&nbsp;</label>
          <input type="button" name="enviar_mail_a_mi" id="enviar_mail_a_mi" value="Enviar mail a mi " class="button">
        </div>

        <div class="columns large-3">
          <label for="enviar_mail_almacen">&nbsp;</label>
          <input type="button" name="enviar_mail_almacen" id="enviar_mail_almacen" value="Enviar mail almacen" class="button">
        </div>
     </div>
  </form>
  <!--******************************************** FIN DE TODOS CAMPOS DE LA CONSULTA DEL ACTIVO ************************************* -->

  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/activo.js"></script>
  <script src="js/red.js"></script>
  
  <script>
      $(document).foundation();
  </script>
</body>
</html>
