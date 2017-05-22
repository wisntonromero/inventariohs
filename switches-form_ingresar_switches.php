
<?php
include_once("config.php");
include_once("sesion.php");
?>

<!-- ************************************************ Formularios que se trabajan aqui ***************************************************** -->

<!-- ************************************* Formulario switches-form_ingresar_switches.php *************************************** -->
<!-- *************************************  *************************************** -->
<!-- ************************************* *************************************** -->

<!DOCTYPE html>
<html class="no-js" lang="es">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Switches / Ingresar / Modificar</title> <!-- Nombre prestaña -->
    <Link rel ="shortcut icon" href="images/icons/uninorte.ico" type="image/x-icon"/>  <!-- Icono prestaña -->
    <link rel="stylesheet" href="css/app.css" />  <!-- Css Fundattion  -->
    <link rel="stylesheet" href="css/foundation.css" />  <!-- Css Fundattion  -->
    <script src="js/vendor/jquery.js"></script> <!-- Clases y Rutinas de JavaScript  -->
    <script src="js/foundation.min.js"></script> <!-- Clases y Rutinas de JavaScript  -->
    <script src="js/vendor/modernizr.js"></script> <!-- Clases y Rutinas de JavaScript  -->
    <script src="js/switches.js"></script>  <!-- Clases y Rutinas de JavaScript  Switches-->
  </head>
  <body>
  

        <div class="row">
          <div class="columns large-10">
            <h1>
              <img style="width: 203px; height: 146px margin: -55px -216px -112px -140px;" src="images/jpg/logo.jpg" alt="Logo Universidad del Norte."/>
            </h1>
          </div>
          <div class="columns large-2">

          </div>
        </div>
   
      <div class ="contain-to-grid sticky">
          <nav class="top-bar" data-topbar> <!-- Menú de navegación  -->
            
            <ul class="title-area">
              <li class="name">
                <h1><a href="#">Inventario de Hardware</a></h1> <!-- Titulo menú de navegación  -->
              </li>
              <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li> 
            </ul>

            <section class="top-bar-section">
              <ul class="right">
                  <li><a href="inicio.php">Inicio</a></li>
                  <li class="has-dropdown"><a href="#">Activos</a> <!-- Menu lado derecho -->
                    <ul class="dropdown">
                      <li><a href="activo-form_ingresar_activo.php" >Ingresar / Modificar</a></li>
                      <li><a href="activo-form_exportar_reubicacion.php" >Exportar Reubicado</a></li>
                      <li><a href="activo-form_consultar_activo.php" >Consultar Activo</a></li>
                      <li><a href="activo-form_consultar_equipos_por_ubicacion.php" >Consultar por Ubicación</a></li>
                    </ul>
                  </li>

                  <li class="has-dropdown"><a href="#">Redes</a> <!-- Menu lado derecho -->
                    <ul class="dropdown">
                      
                      <li class="has-dropdown"><a href="#">Prestamo de Llaves</a> <!-- Menu lado derecho -->
                        <ul class="dropdown">
                          <li><a href="llaves-form_ingresar_prestamo.php" >Ingresar Prestamo</a></li>
                          <li><a href="llaves-form_consultar_prestamo.php" >Consultar y Recibir</a></li>
                        </ul>
                      </li>

                    
                      <li class="has-dropdown"><a href="#">Puntos de red</a> <!-- Menu lado derecho -->
                        <ul class="dropdown">
                          <li><a href="red-form_ingresar_punto_de_red.php" >Ingresar Puntos de red</a></li>
                          <li><a href="red-form_ingresar_punto_de_red_por_lotes.php" >Consultar / Modificar</a></li>
                        </ul>
                      </li>


                      <li class="has-dropdown"><a href="#">Switches</a> <!-- Menu lado derecho -->
                        <ul class="dropdown">
                          <li><a href="switches-form_ingresar_switches.php" >Ingresar / Modificar</a></li>
                          <li><a href="switches-form_consultar_switches.php" >Consultar</a></li>
                        </ul>
                      </li>

                    </ul>
                  </li>

                  <li class="has-dropdown"><a href="#">Compras</a> <!-- Menu lado derecho -->
                    <ul class="dropdown">
                      <li><a href="compras-form_ingresar_compras.php" >Ingresar Nueva Compra</a></li>
                      <li><a href="compras-form_modificar_compras.php" >Modificar Compra por Activo</a></li>
                      <li><a href="compras-form_consultar_equipos_por_orden_compra.php" >Consultar por Criterios</a></li>
                      <li><a href="compras-form_modificar_estado_de_equipos_por_lotes.php" >Modificar Estado por Lotes</a></li>
                      <li><a href="frmbitacora.php" > Consultar Bitacora</a></li>
                    </ul>
                  </li>

                  <li class="has-dropdown"><a href="#">Reubicaciones</a> <!-- Menu lado derecho -->
                    <ul class="dropdown">
                      <li><a href="reubicacion-form_ingresar_reubicacion.php" >Ingresar</a></li>
                      <li><a href="reubicacion-form_modificar_reubicacion.php" >Consultar / Modificar</a></li>
                      <li><a href="reubicacion-form_consultar_equipos_por_estado.php" >Consultar por Criterios</a></li>
                      <li><a href="frmbitacora.php" > Consultar Bitacora</a></li>
                    </ul>
                  </li>

                  <li class="has-dropdown"><a href="#">Soportes</a> <!-- Menu lado derecho -->
                    <ul class="dropdown">
                      
                      <li class="has-dropdown"><a href="#">Equipos de Soporte</a> <!-- Menu lado derecho -->
                        <ul class="dropdown">
                          <li><a href="soporte-form_ingresar_activo_soporte_a_bodega.php" >Ingresar Equipo Soporte a Bodega</a></li>
                          <li><a href="soporte-form_ingresar_prestamo_equipo_soporte.php" >Prestar Equipo de Soporte por Nro de Activo</a></li>
                          <li><a href="soporte-form_consultar_equipos_soporte_en_prestamo.php" >Consultar y recibir Equipos Prestados</a></li>
                        </ul>
                      </li>


                      <li class="has-dropdown"><a href="#">Equipos Alquilados</a> <!-- Menu lado derecho -->
                        <ul class="dropdown">
                          <li><a href="alquilado-form_ingresar_activo_alquilado_a_bodega.php" >Ingresar Nuevo Equipo Alquilado a Bodega</a></li>
                          <li><a href="alquilado-form_ingresar_prestamo_equipo_alquilado.php" >Prestar Equipo de Alquilado por Nro de Activo</a></li>
                          <li><a href="soporte-form_consultar_equipos_soporte_en_prestamo.php" >Consultar y recibir Equipos Alquilados</a></li>
                        </ul>
                      </li>


                      <li class="has-dropdown"><a href="#">Switches de Soporte</a> <!-- Menu lado derecho -->
                        <ul class="dropdown">
                          <li><a href="soporte-form_ingresar_activo_soporte_a_bodega.php" >Ingresar Nuevo Switch de Soporte a Bodega</a></li>
                          <li><a href="soporte-form_ingresar_prestamo_soporte_switch.php" >Prestar Switch por Nro de Activo</a></li>
                          <li><a href="soporte-form_consultar_equipos_soporte_en_prestamo.php" >Consultar y recibir Switches Prestados</a></li>
                        </ul>
                      </li>

                    </ul>
                  </li>
                  <li><a href="acceso-php_logout.php">Cerrar sesion</a></li>

              </ul>
            </section>
          </nav>
      </div>

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
