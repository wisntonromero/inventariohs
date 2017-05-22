<?php
include_once("config.php");
include_once("sesion.php");
?>

<?php
include_once("config.php");
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Puntos de red -  Modificar</title>
  <LINK REL="SHORTCUT ICON" HREF="uninorte.ico" />
  <link rel="stylesheet" href="css/foundation.css" />
  <!-- <Link href="css/estilo_maestro.css" type="text/css" rel="stylesheet"> -->
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
        <h1><a href="#">Consulta / Modificación de puntos de red y puertos en sw</a></h1>
      </li>
        <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
    </ul>

    <section class="top-bar-section">
      <span id="res"></span>
      <!-- Right Nav Section  menu lado derecho-->
      <ul class="right">
        <li><a href="inicio.php">Inicio</a></li>
      </ul>
    </section>
  </nav>
  <br>

<!--  ************************************************** INFORMACION DEL PUNTO DE RED  ****************************** -->
      <form method="post" action="">
          <div class="row">
            <h4>Información del punto de red</h4>
            <div class="columns large-3">
              <label for="punto_de_red">Nro del punto de red</label>
              <input type="text" name="punto_de_red" id="punto_de_red" autofocus=true value="" placeholder="Obligatorio" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
            </div>

            <div class="columns large-2">
                <label for="consultar_punto_de_red">&nbsp;</label>
                 <input type="button" name="consultar_punto_de_red" id="consultar_punto_de_red" value="Consultar" class="button">
            </div>

            <div class="columns large-2">
                <label for="www">&nbsp;</label>
                 <input type="hidden" name="www" id="www" value="www" class="button">
            </div>
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
              <input type="text" name="tipo_de_punto_de_red" id="tipo_de_punto_de_red" value="" placeholder="Obligatorio tipo de punto de red" style="text-transform:uppercase;">
            </div>

            <div class="columns large-2">
              <label for="categoria_punto_de_red">Categoria </label>
              <input type="text" name="categoria_punto_de_red" id="categoria_punto_de_red" value="6a F/UTP" placeholder="Obligatorio categoria punto de red">
            </div>

            <div class="columns large-2">
              <label for="estado_punto_de_red">Estado punto de red</label>
              <input type="text" name="estado_punto_de_red" id="estado_punto_de_red" value="" placeholder="Obligatorio estado punto de red" style="text-transform:uppercase;">
            </div>

            <div class="columns large-2">
              <label for="color_toma">Color del toma de red</label>
              <input type="text" name="color_toma" id="color_toma" value="" placeholder="Obligatorio color del toma" style="text-transform:uppercase;">
            </div>

             <div class="columns large-2">
              <input type="hidden" name="estado_de_red" id="estado_de_red" value="" placeholder="Obligatorio estado punto de red" style="text-transform:uppercase;">
            </div>
          </div>


<!--  ************************************************** FIN INFORMACION DEL PUNTO DE RED  ********************************************************* -->

<!--  ************************************************** INFORMACION DEL SW Y PUERTO   ************************************************************* -->
          <div class="row">
            <h4>Información del sw y puerto </h4>
          <div class="row">
            <div class="columns large-10">
            <label for="seleccionar_switches_puertos">Ip Switch</label>
            <select name="seleccionar_switches_puertos" id="seleccionar_switches_puertos">
                  <option selected="selected">----- Seleccionar Switch ---</option>
                  <?php
                    include_once("config.php");
                    $conexion = mysql_connect($server,$username,$password);
                    mysql_set_charset('utf8',$conexion);
                    mysql_select_db($database);
                      $sw_id     = $_POST['sw_id'];
                      $bit_sw_id = $_POST['bit_sw_id'];
                      $dir_ip_sw = $_POST['dir_ip_sw'];
                      $unidad    = $_POST['unidad'];

                    //$query = "SELECT sw_id, nro_cc, dir_ip_sw, unidad, modelo FROM switches ORDER BY ABS(nro_cc), dir_ip_sw, ABS(unidad) DESC  ";

                    $query = "SELECT switches.sw_id, switches.nro_cc, switches.dir_ip_sw, switches.unidad, bitacora_switches.bit_sw_id, bitacora_switches.puerto_sw, bitacora_switches.vlan, bitacora_switches.punto_de_red, bitacora_switches.estado_puerto_sw
                    FROM bitacora_switches JOIN switches ON switches.sw_id = bitacora_switches.id_sw  GROUP BY nro_cc, dir_ip_sw, puerto_sw ASC";

                    $resultado = mysql_query($query,$conexion);
                    $numero_de_filas = mysql_num_rows($resultado);
                    while($registro=mysql_fetch_array($resultado))
                    {
                      $sw_id            = $registro['sw_id'];
                      $bit_sw_id        = $registro['bit_sw_id'];
                      $nro_cc           = $registro['nro_cc'];
                      $unidad           = $registro['unidad'];
                      $dir_ip_sw        = $registro['dir_ip_sw'];
                      $puerto_sw        = $registro['puerto_sw'];
                      $punto_de_red     = $registro['punto_de_red'];
                      $estado_puerto_sw = $registro['estado_puerto_sw'];

                      echo '<option value="'.$bit_sw_id.'">'."CC Nro: ".''.$nro_cc.''." - Ip Switch: ".''.$dir_ip_sw.''." Unidad: ".''.$unidad.''." - Puerto: ".''.$puerto_sw.''." - P.Red: ".''.$punto_de_red.''." - Estado: ".''.$estado_puerto_sw.'</option>';
                    }
                ?>
              </select> <br/><br/>
          </div>


          </div>

          <div class="row">
              <div class="columns large-2">
                  <input type="hidden" name="sw_id" id="sw_id" value="" placeholder="Obligatorio switches">
              </div>

              <div class="columns large-2">
                  <input type="hidden" name="bit_sw_id" id="bit_sw_id" value="" placeholder="Obligatorio switches">
              </div>

              <div class="columns large-2">
                  <input type="hidden" name="unidad" id="unidad" value="" placeholder="Obligatorio unidad">
              </div>

              <div class="columns large-3">
                <label for="punto_de_red_actual">Nro del punto de red</label>
                <input type="text" name="punto_de_red_actual" id="punto_de_red_actual" autofocus=true value="" placeholder="Obligatorio" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
              </div>

              <div class="columns large-2">

                <input type="hidden" name="puerto_sw" id="puerto_sw" value="" placeholder="Obligatorio puerto sw" style="text-transform:uppercase;">
              </div>

              <div class="columns large-1">
                <label for="vlan_puerto_sw">Vlan</label>
                <input type="text" name="vlan_puerto_sw" id="vlan_puerto_sw" value="" placeholder="Obligatorio vlan puerto sw" style="text-transform:uppercase;">
              </div>

              <div class="columns large-2">
                <label for="estado_puerto_sw">Estado puerto de sw</label>
                <input type="text" name="estado_puerto_sw" id="estado_puerto_sw" value="" placeholder="Obligatorio vlan puerto sw" style="text-transform:uppercase;">
              </div>

              <div class="columns large-3">
                <label for="vlan_puerto_sw"></label>
                <input type="hidden" name="vlan_puerto_sw" id="vlan_puerto_sw" value="" placeholder="Obligatorio vlan puerto sw" style="text-transform:uppercase;">
              </div>
          </div>

<!--  ************************************************** FIN INFORMACION DEL SW Y PUERTO   *********************************************************** -->

          <div class="row">
            <div class="columns large-2">
              <label for="modificar_punto_de_red">&nbsp;</label>
              <input type="hidden" name="modificar_punto_de_red" id="modificar_punto_de_red2" value="2Modificar punto de red" class="button">
            </div>

            <div class="columns large-2">
              <label for="modificar_punto_de_red">&nbsp;</label>
              <input type="button" name="modificar_punto_de_red" id="modificar_punto_de_red" value="Guardar Modificación punto de red" class="button">
            </div>

             <div class="columns large-2">
              <label for="modificar_punto_de_red">&nbsp;</label>
              <input type="hidden" name="modificar_punto_de_red" id="modificar_punto_de_red2" value="2Modificar punto de red" class="button">
            </div>

            <div class="columns large-2">
              <label for="limpiar_forma">&nbsp;</label>
              <input type="submit" href="red-form_ingresar_punto_de_red.php" name="limpiar_forma" id="limpiar_forma" value="Consultar otro punto de red" class="button">
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
        <script src="js/switches.js"></script>
        <script>
            $(document).foundation();
        </script>
</body>
</html>