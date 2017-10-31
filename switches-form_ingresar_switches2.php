<?php
include_once("config.php");
//include_once("sesion.php");
?>
<!doctype html>
<html class="no-js" lang="en">
      <head>
         <meta charset="utf-8" />
         <meta name="viewport" content="width=device-width, initial-scale=1.0" />
         <title>Switches - Ingresar</title>
         <LINK REL="SHORTCUT ICON" HREF="uninorte.ico" />
         <link rel="stylesheet" href="css/foundation.css" />
         <script src="js/vendor/modernizr.js"></script>
         <script>
    $(document).ready(function(){

      // cada vez que se cambia el valor del combo
      $("#cboC_cableados").change(function() {

        // obtenemos el valor seleccionado
        var cc = $(this).val();
        console.log(cc);
        // si es 0, no es un país
        if(cc > 0)
        {
            //creamos un objeto JSON
            var datos = {
                idCc: cc
            };

            // utilizamos la función post, para hacer una llamada AJAX
            $.post("switches-php_combo_switches.php", datos, function(switches) {

                // obtenemos el combo de Switches
                var $comboSwitches = $("#cboSwitches");

                // lo vaciamos
                $comboSwitches.empty();

                $("#cboPuertos").html('');

                $comboSwitches.append("<option value='0'>Seleccione un Switch</option>");

                 // iteramos a través del arreglo de Switches
                $.each(switches, function(index, switch_) {

                // agregamos opciones al combo
                $comboSwitches.append("<option value="+switch_.id_sw+"> " +  switch_.dir_ip_sw + " - Unidad: " + switch_.unidad + " - Marca: " + switch_.marca + " - Modelo: " + switch_.modelo + " - Activo: " + switch_.activo + " - Nro de puertos: " + switch_.nro_puertos +  "</option>");

                });
            }, 'json');
        }
        else
        {
          // limpiamos el combo e indicamos que se seleccione un Centro de cableado
          var $comboSwitches = $("#cboSwitches");
              $comboSwitches.empty();
              $comboSwitches.append("<option>Seleccione un Switch</option>");
        }
      });

      $("#cboSwitches").change(function() {
        var switch_ = $(this).val();

        if(switch_ > 0)
        {
          var datos = {
              idSwitch : $(this).val()
          };

          $.post("switches-php_combo_puerto_switches.php", datos, function(puertos) {

          var $comboPuertos = $("#cboPuertos");
          var $numero       = 1;
              $comboPuertos.html('');
              $.each(puertos, function(index, puerto) {
              //
              //$comboPuertos.append("<tr><td>"+ puerto.puerto_sw + "</td></td>" + puerto.punto_de_red +"</td></tr>");
              $comboPuertos.append("<tr> <td> "+($numero++)+" </td> <td> "+puerto.puerto_sw+" </td> <td>"+  puerto.punto_de_red+" </td> <td>"+  puerto.vlan+" </td> <td>"+  puerto.estado_puerto_sw+" </td> </tr>");
              });
          }, 'json');
        }
        else
        {
          var $comboPuertos = $("#cboPuertos");
              $comboPuertos.empty();
              $comboPuertos.append("<option>Seleccione un puerto</option>");
        }
      });

    });
  </script>

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
              <h1><a href="#">Inventario de Hardware</a></h1>
            </li>
              <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
         </ul>

         <section class="top-bar-section">
            <!-- Right Nav Section  menu lado derecho-->
            <ul class="right">
                <li><a href="inicio.php">Inicio</a></li>
            </ul>
         </section>
      </nav>

      <form name="activo" id="activo" method="post" action="">

        <div class="divContenedor">
            <div class="divLabels">
              <label for="cboC_cableados">Centro de Cableados</label>
            </div>
            <div class="divSelects">
              <select id="cboC_cableados">
                <option value="0">Seleccione un Centro de Cableado</option>
                <?php
                  $c_cableados = obtenerCentrosdeCableados();
                  foreach ($c_cableados as $cc) {
                    echo '<option value="'.$cc->id_cc.'">'.utf8_encode($cc->descripcion_cc).'</option>';
                  }
                ?>
              </select>
            </div>

            <div class="divLabels">
              <label for="cboSwitches">Switches</label>
            </div>

            <div class="divSelects">
              <select id="cboSwitches">
                <option value="0">Seleccione un Switch</option>
              </select>
            </div>

            <div class="divLabels">
              <label for="cboPuertos">Item --- Puerto --- P.Red --- Vlan --- Estado</label>
            </div>

            <div class="divSelects">
              <table id="cboPuertos">
              </table>
            </div>


        <!-- fdf -->

        <div class="row">
            <h4>Informacion del Switch</h4>
            <div class="columns large-2">
              <label for="activo_equipo">Activo CPU</label>
              <input type="text" name="activo_equipo" id="activo_equipo" value="" placeholder="Obligatorio activo equipo">
            </div>

            <div class="columns large-2">
              <label for="consultar">&nbsp;</label>
              <input type="button" name="consultar" id="consultar" value="Consultar" class="button">
            </div>

            <div class="columns large-4">
              <label for="marca_equipo">Marca del equipo.</label>
              <input type="text" name="marca_equipo" id="marca_equipo" value="" placeholder="Obligatorio marca del equipo">
            </div>

            <div class="columns large-4">
              <label for="modelo_equipo">Modelo del equipo.</label>
              <input type="text" name="modelo_equipo" id="modelo_equipo" value="" placeholder="Obligatorio modelo del equipo">
            </div>
         </div>

         <div class="row">
            <div class="columns large-4">
              <label for="serie_equipo">Serie del equipo.</label>
              <input type="text" name="serie_equipo" id="serie_equipo" value="" placeholder="Obligatorio modelo del equipo">
            </div>

            <div class="columns large-4">
              <label for="nro_puertos">Numero de puertos.</label>
              <input type="text" name="nro_puertos" id="nro_puertos" value="">
            </div>

            <div class="columns large-4">
              <label for="estado_equipo">Estado del equipo (Activo - De baja) </label>
              <input type="text" name="estado_equipo" id="estado_equipo" value="" placeholder="Obligatorio estado del equipo">
            </div>
         </div>
       <!--  ******************************************* FIN DE INFORMACION DEL EQUIPO  **************************************************************************** -->

       <!-- ******************************************** INFORMACION DE RED DEL EQUIPO *********************************************************** 68-5b-35-97-ad-fd -->
         <div class="row">
            <h4> Información de red del equipo. Dir Ip - Unidad - Nro del cc.</h4>
            <div class="columns large-3">
               <label for="dir_ip_sw">Dirección Ip del sw.</label>
               <input type="text" name="dir_ip_sw" id="dir_ip_sw" value="" placeholder="Suministrada por el sistema">
            </div>

            <div class="columns large-4">
               <label for="unidad">Unidad</label>
               <input type="text" name="unidad" id="unidad" value="" placeholder="Obligatorio Mac">
            </div>

            <div class="columns large-2">
               <label for="nro_cc">Nro del cc.</label>
               <input type="text" name="nro_cc" id="nro_cc" value="" placeholder="Obligatorio punto de red">
            </div>

            <div class="columns large-2">
               <!-- <label for="oculto">Nro del cc.</label> -->
               <input type="hidden" name="oculto" id="oculto" value="" placeholder="Obligatorio punto de red">
            </div>
         </div>

         <div class="row">
            <div class="columns large-6">
              <label for="ubicacion_fisica">Ubicacion Fisica</label>
              <input type="text" name="ubicacion_fisica" id="ubicacion_fisica"  value="" placeholder="Obligatorio piso">
            </div>

            <div class="columns large-6">
              <label for="ubicacion_logo">Ubicacion Logo</label>
              <input type="text" name="ubicacion_logo" id="ubicacion_logo" value="" placeholder="Obligatorio ubicacion_logo">
            </div>
         </div>

         <div class="row">
            <div class="columns large-6">
              <label for="f_instalacion">Fecha de Instalacion.(dd/mm/aaaa)</label>
              <input type="text" name="f_instalacion" id="f_instalacion" value="" placeholder="Obligatorio f_instalacion">
            </div>

            <div class="columns large-6">
              <label for="f_ult_mantenimiento">F. Ult. Mantenimiento.(dd/mm/aaaa)</label>
              <input type="date" name="f_ult_mantenimiento" id="f_ult_mantenimiento" value="">
            </div>
         </div>
       <!-- ******************************************** INFORMACION DE RED DEL EQUIPO ****************************** -->

       <!-- ******************************************** UBICACION DEL EQUIPO ************************************ -->

         <div class="row">
            <h4>Informacion del equipo en Rack </h4>
            <div class="columns large-4">
              <label for="id_rack">Id Rack</label>
              <input type="text" name="id_rack" id="id_rack" value="" placeholder="Obligatorio id del rack">
            </div>

            <div class="columns large-4">
              <label for="posicion_rack">Posicion en Rack</label>
              <input type="text" name="posicion_rack" id="posicion_rack" value="" placeholder="Obligatorio posicion en rack del equipo">
            </div>

            <div class="columns large-4">
              <label for="unidades_de_rack">Unidades de Rack que ocupa</label>
              <input type="text" name="unidades_de_rack" id="unidades_de_rack" value="" placeholder="Obligatorio unidades de rack">
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

     <!--******************************************** FIN DE TODOS CAMPOS DE LA CONSULTA DEL ACTIVO ************************************* -->

     <script src="js/vendor/jquery.js"></script>
     <script src="js/switches.js"></script>
     <script src="js/foundation.min.js"></script>
     <script>
         $(document).foundation();
     </script>
   </body>
</html>
