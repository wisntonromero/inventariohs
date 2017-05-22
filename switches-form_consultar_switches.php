<!doctype html>
<?php
/*<!-- 1 *********************************** Formulario switches-form_consultar_switches.php *************************************** -->
<!-- ***********************************  switches-php_combo_switches.php *************************************** -->
<!-- ***********************************  switches-php_combo_puerto_switches.php *************************************** -->*/

include("c_cableado-php_combo_c_cableados.php");
//include_once("sesion.php");
?>
<html class="no-js" lang="es">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Consultar Switches</title>
  <LINK REL="SHORTCUT ICON" HREF="uninorte.ico" />
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
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
                $comboSwitches.append("<option value="+switch_.id_sw+"> " +  "Id Sw: " + switch_.id_sw + " - Ip Sw: " + switch_.dir_ip_sw + " - Unidad: " + switch_.unidad + " - Marca: " + switch_.marca + " - Modelo: " + switch_.modelo + " - Activo: " + switch_.activo + " - Nro de puertos: " + switch_.nro_puertos +  "</option>");

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
  <!-- <link rel="stylesheet" href="style.css"> -->
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

    <form method="post" action="">
    <div class="row">
      <h4>Consulta de Switches por Centro de cableado</h4>
    </div>
<!-- //**************************************************************** INICIO SELECT *************************************************************************** //  -->
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

  </div>

 <!-- /* <script>
      $(document).foundation();
  </script>*/ -->

</body>
</html>
