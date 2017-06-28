<?php
include_once("config.php");
include_once("sesion.php");
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Soporte - Ingresar / Modificar</title>
  <Link rel ="shortcut icon" href="uninorte.ico" type="image/x-icon"/>
  <link rel="stylesheet" href="css/foundation.css" />
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
        <h1><a href="#">Inventario de Equipos de Soporte</a></h1>
      </li>
        <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
    </ul>
    <section class="top-bar-section">
      <span id="res"></span>
      <!-- Right Nav Section  menu lado derecho-->
      <ul class="right">
        <li><a href="inicio.php">Inicio</a></li>
        <li><a href="soporte-form_inicio_soporte.php">Modulo Soporte</a></li>
      </ul>
    </section>
  </nav>

  <form name="form_activo" id="form_activo" method="post" action="">
    <div class="row">
      <h4>Informacion del equipo de soporte</h4>
      <div class="columns large-2">
        <label for="activo_equipo">Activo CPU</label>
        <input type="text" name="activo_equipo" id="activo_equipo" onkeypress="return letrasynumeros_sin_espacio(event)" style="text-transform: uppercase;" required = "[0-9]" autofocus=true value="" placeholder="Obligatorio activo equipo">
      </div>

      <div class="columns large-2">
        <label for="consultar_soporte">&nbsp;</label>
        <input type="button" name="consultar_soporte" id="consultar_soporte" value="Consultar" class="button">
      </div>

      <div class="columns large-4">
        <label for="tipo_equipo">Tipo. Pc / Monitor / Impresora / Mac / Telefono</label>
        <input type="text" name="tipo_equipo" id="tipo_equipo" style="text-transform: uppercase;" value="" placeholder="Obligatorio tipo de equipo">
      </div>

      <div class="columns large-4">
        <label for="marca_equipo">Marca del equipo.</label>
        <input type="text" name="marca_equipo" id="marca_equipo" style="text-transform: uppercase;" value="" placeholder="Obligatorio marca del equipo">
      </div>
    </div>

    <div class="row">
      <div class="columns large-2">
        <label for="modelo_equipo">Modelo del equipo.</label>
        <input type="text" name="modelo_equipo" id="modelo_equipo" style="text-transform: uppercase;" value="" placeholder="Obligatorio modelo del equipo">
      </div>

      <div class="columns large-2">
        <label for="serial_equipo">Serial del equipo.</label>
        <input type="text" name="serial_equipo" id="serial_equipo" style="text-transform: uppercase;" value="" placeholder="Obligatorio serial del equipo">
      </div>

      <div class="columns large-3">
        <label for="f_compra">Fecha de Compra.</label>
        <input type="date" name="f_compra" id="f_compra" value="">
      </div>

      <div class="columns large-2">
        <label for="estado_equipo">Estado del equipo </label>
        <input type="text" name="estado_equipo" id="estado_equipo" style="text-transform: uppercase;" DISABLED value="SOPORTE" placeholder="Obligatorio estado del equipo">
      </div>

      <div class="columns large-3">
        <label for="bodega_actual">Bodega (Micros / Sonda)</label>
        <input type="text" name="bodega_actual" id="bodega_actual" style="text-transform: uppercase;" value="" placeholder="Obligatorio bodega">
      </div>
    </div>
    <!--  ******************************************* FIN DE INFORMACION DEL EQUIPO  **************************************************************************** -->

    <!-- ******************************************** INFORMACION DE RED DEL EQUIPO *********************************************************** 68-5b-35-97-ad-fd -->
    <div class="row">
      <h4> Información de red del equipo.  Mac  </h4>
      <div class="columns large-3">
        <label for="dir_mac">Dirección Mac del pc</label>
        <input type="text" name="dir_mac" id="dir_mac" style="text-transform: uppercase;" value="AA-AA-AA-AA-AA-AA" placeholder="Opcional Mac">
      </div>
    </div>
    <!-- ******************************************** INFORMACION DE RED DEL EQUIPO ****************************** -->

    <!-- ******************************************** UBICACION DEL EQUIPO ************************************ -->

    <div class="row">
      <h4>Informacion del responsable del equipo </h4>
    <div class="row">
      <div class="columns large-4">
        <label for="responsable">Responsable</label>
        <input type="text" name="responsable" id="responsable" style="text-transform: uppercase;" value="" placeholder="Obligatorio responsable del equipo">
      </div>

       <div class="columns large-1">
          <label for="seleccionar_correo">Email</label>
          <select name="seleccionar_correo" id="seleccionar_correo">
                <option selected="selected">----- Seleccionar E-mail ------</option>
                <?php
                  include_once("config.php");
                  $conexion = mysql_connect($server,$username,$password);
                  mysql_set_charset('utf8',$conexion);
                  mysql_select_db($database);
                   //$sw_id     = $_POST['sw_id'];
                   // $dir_ip_sw = $_POST['dir_ip_sw'];
                  //  $unidad    = $_POST['unidad'];
                  $query = "SELECT id_correo, nombres, area, cargo, ext, correo FROM correo ORDER BY nombres ";

                  $resultado = mysql_query($query,$conexion);
                  $numero_de_filas = mysql_num_rows($resultado);
                  while($registro=mysql_fetch_array($resultado))
                  {
                    $id_correo          = $registro['id_correo'];
                    $nombres            = $registro['nombres'];
                    $cargo              = $registro['cargo'];
                    $ext                = $registro['ext'];
                    $correo             = $registro['correo'];

                    echo '<option value="'.$id_correo.'">'.$nombres.''." - ".''.$cargo.''." - ".''.$ext.''." ".''." - correo: ".''.$correo.'</option>';
                  }
              ?>
            </select> <br/><br/>
      </div>

      <div class="columns large-4">
        <label for="email_responsable">Email Responsable</label>
        <input type="text" name="email_responsable" id="email_responsable" value="" placeholder="Obligatorio email del responsable del equipo">
      </div>

      <div class="columns large-2">
        <input type="hidden" name="ext_tel2" id="ext_tel2" style="text-transform: uppercase;" value="" placeholder="Obligatorio ext telefonica">
      </div>
    </div>

    <div class="row">
        <h4>Informacion del usuario que responde por el equipo que esta en la bodega. </h4>
      <div class="row">
        <div class="columns large-4">
          <label for="usuario">Usuario</label>
          <input type="text" name="usuario" id="usuario" style="text-transform: uppercase;" value="" placeholder="Obligatorio usuario del equipo">
        </div>

         <div class="columns large-1">
          <label for="seleccionar_correo2">Email</label>
          <select name="seleccionar_correo2" id="seleccionar_correo2">
                <option selected="selected">----- Seleccionar E-mail ------</option>
                <?php
                  include_once("config.php");
                  $conexion = mysql_connect($server,$username,$password);
                  mysql_set_charset('utf8',$conexion);
                  mysql_select_db($database);
                   //$sw_id     = $_POST['sw_id'];
                   // $dir_ip_sw = $_POST['dir_ip_sw'];
                  //  $unidad    = $_POST['unidad'];
                  $query = "SELECT id_correo, nombres, area, cargo, ext, correo FROM correo ORDER BY nombres ";

                  $resultado = mysql_query($query,$conexion);
                  $numero_de_filas = mysql_num_rows($resultado);
                  while($registro=mysql_fetch_array($resultado))
                  {
                    $id_correo          = $registro['id_correo'];
                    $nombres            = $registro['nombres'];
                    $cargo              = $registro['cargo'];
                    $ext                = $registro['ext'];
                    $correo             = $registro['correo'];

                    echo '<option value="'.$id_correo.'">'.$nombres.''." - ".''.$cargo.''." - ".''.$ext.''." ".''." - correo: ".''.$correo.'</option>';
                  }
              ?>
            </select> <br/><br/>
      </div>

        <div class="columns large-4">
          <label for="email_usuario">Email Usuario</label>
          <input type="text" name="email_usuario" id="email_usuario" value="" placeholder="Obligatorio email usuario del equipo">
        </div>

        <div class="columns large-2">
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
        <label for="ingresar_activo_nuevo_soporte_a_bodega">&nbsp;</label>
        <input type="button" name="ingresar_activo_nuevo_soporte_a_bodega" id="ingresar_activo_nuevo_soporte_a_bodega" value="Ingresar Activo" class="button">
      </div>

      <div class="columns large-4">
        <label for="modificar_activo_soporte">&nbsp;</label>
        <input type="button" name="modificar_activo_soporte" id="modificar_activo_soporte" value="Modificar Activo" class="button">
      </div>

      <div class="columns large-4">
        <label for="limpiar_forma">&nbsp;</label>
        <input type="submit" href="soporte-form_ingresar_activo_soporte_a_bodega.php" name="limpiar_forma" id="limpiar_forma" value="Consultar otro equipo" class="button">
      </div>
    </div>
  </form>
  <!--******************************************** FIN DE TODOS CAMPOS DE LA CONSULTA DEL ACTIVO ************************************* -->

  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/soporte.js"></script>
  <script src="js/correo.js"></script>
  <script>
      $(document).foundation();
  </script>
</body>
</html>
