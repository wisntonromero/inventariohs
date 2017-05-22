<?php
include_once("config.php");
include_once("sesion.php");
?>

<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Activo - Ingresar / Modificar</title>
  <Link rel ="shortcut icon" href="images/icons/uninorte.ico" type="image/x-icon"/> 
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
        <h1><a href="#">Inventario de Hardware</a></h1>
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



<!-- ******************************************** INFORMACION DEL EQUIPO  ************************************** -->
  <form name="form_activo" id="form_activo" method="post" action="">
    <div class="row">
      <h4>Informacion del equipo</h4>
      <div class="columns large-2">
        <label for="activo_equipo">Activo CPU</label>
        <input type="text" name="activo_equipo" id="activo_equipo" required = "[0-9]" autofocus=true value="" placeholder="Obligatorio activo equipo">
      </div>

      <div class="columns large-2">
        <label for="consultar">&nbsp;</label>
        <input type="button" name="consultar" id="consultar" value="Consultar" class="button">
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
      <div class="columns large-3">
        <label for="modelo_equipo">Modelo del equipo.</label>
        <input type="text" name="modelo_equipo" id="modelo_equipo" style="text-transform: uppercase;" value="" placeholder="Obligatorio modelo del equipo">
      </div>

      <div class="columns large-2">
        <label for="serial_equipo">Serial del equipo.</label>
        <input type="text" name="serial_equipo" id="serial_equipo" disabled style="text-transform: uppercase;" value="">
      </div>

      <div class="columns large-3">
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

      <div class="columns large-3">
<!--         <label for="nro_cc">Nro del punto de red</label> -->
        <input type="hidden" name="nro_cc" id="nro_cc" value="" placeholder="nro cc" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">      
      </div>

      <div class="columns large-2">
        <label for="consultar_punto_de_red">&nbsp;</label>
        <input type="button" name="consultar_punto_de_red" id="consultar_punto_de_red" value="Consultar" class="button">
      </div>

      <div class="columns large-2">
        <label for="modificar_punto_de_red">&nbsp;</label>
        <input type="button" name="modificar_punto_de_red" id="modificar_punto_de_red" value="Modificar" class="button">
      </div>
    </div>

    <div class="row">
      <div class="columns large-2">
        <label for="punto_de_voz">P. Voz</label>
        <input type="text" name="punto_de_voz" id="punto_de_voz" style="text-transform: uppercase;" value="" placeholder="Obligatorio punto de voz">
      </div>
      
      <div class="columns large-2">
        <input type="hidden" name="sw_id" id="sw_id" value="" placeholder="Obligatorio switches">
      </div>

       <div class="columns large-3">
        <input type="hidden" name="dir_ip_sw" id="dir_ip_sw" value="" placeholder="Suministrada por el sistema">
      </div>

      <div class="columns large-4">
        <label for="bloque">Bloque</label>
        <input type="text" name="bloque" id="bloque" style="text-transform: uppercase;" value="" placeholder="Obligatorio bloque">
      </div>

      <div class="columns large-2">
        <label for="piso">Piso</label>
        <input type="text" name="piso" id="piso" style="text-transform: uppercase;" value="" placeholder="Obligatorio piso">
      </div>      
      
      <div class="columns large-4">
        <label for="cubiculo">Cubiculo</label>
        <input type="text" name="cubiculo" id="cubiculo" style="text-transform: uppercase;" value="" placeholder="Obligatorio cubiculo">
      </div>
    </div>

    <div class="row"> 
       <div class="columns large-8">
          <label for="seleccionar_switches">Ip Switch</label>
          <select name="seleccionar_switches_puertos" id="seleccionar_switches_puertos">
                  <option selected="selected">----- Seleccionar Switch ---</option>
                  <?php
                    include_once("config.php");
                    $conexion = mysql_connect($server,$username,$password);
                    mysql_set_charset('utf8',$conexion);
                    mysql_select_db($database);
                      $sw_id     = $_POST['sw_id'];
                      $nro_cc    = $_POST['nro_cc'];
                      $bit_sw_id = $_POST['bit_sw_id'];
                      $dir_ip_sw = $_POST['dir_ip_sw'];
                      $unidad    = $_POST['unidad'];
                    
                    $query = "SELECT switches.sw_id, switches.nro_cc, switches.dir_ip_sw, switches.unidad, bitacora_switches.bit_sw_id, bitacora_switches.puerto_sw, bitacora_switches.vlan, bitacora_switches.punto_de_red, bitacora_switches.estado_puerto_sw 
                    FROM bitacora_switches LEFT JOIN switches ON switches.sw_id = bitacora_switches.id_sw  GROUP BY nro_cc, dir_ip_sw, puerto_sw ASC";

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
                      $estado_puerto_sw = $registro['estado_puerto_sw'];
                         
                      echo '<option value="'.$bit_sw_id.'">'."Nro CC: ".''.$nro_cc.''." - Ip Sw: ".''.$dir_ip_sw.''." - Unidad: ".''.$unidad.''." - Puerto Sw: ".''.$puerto_sw.''." - Estado: ".''.$estado_puerto_sw.'</option>';
                    } 
                ?>
        </select> <br/><br/>
      </div>

      <div class="columns large-2">
        <label for="vlan_puerto_sw">Vlan</label>
        <input type="text" name="vlan_puerto_sw" id="vlan_puerto_sw" value="" placeholder="Suministrada por el sistema">
      </div>

      <div class="columns large-2">
         <label for="estado_puerto_sw">Estado Puerto Sw</label>
        <input type="text" name="estado_puerto_sw" id="estado_puerto_sw" value="" placeholder="Obligatorio estado puerto sw" style="text-transform:uppercase;">
      </div>
      <!--     ****************************    OCULTOS    ***********************  -->
      <div class="columns large-2">
        <input type="hidden" name="color_toma" id="color_toma" value="" placeholder="Suministrada por el sistema">
      </div>

      <div class="columns large-2">
        <input type="hidden" name="categoria_punto_de_red" id="categoria_punto_de_red" value="" placeholder="Suministrada por el sistema">  
      </div>

      <div class="columns large-3">
<!--         <label for="punto_de_red_actual">Nro del punto de red</label> -->
        <input type="hidden" name="punto_de_red_actual" id="punto_de_red_actual" value="" placeholder="punto de red actual" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">      
      </div>

      <div class="columns large-2">
        <input type="hidden" name="tipo_de_punto_de_red" id="tipo_de_punto_de_red" value="" placeholder="Obligatorio tipo de punto de red" style="text-transform:uppercase;">      
      </div>

      <div class="columns large-2">
        <input type="hidden" name="estado_punto_de_red" id="estado_punto_de_red" value="" placeholder="Obligatorio estado punto de red" style="text-transform:uppercase;">      
      </div>
       <!--     ****************************   FIN DE  OCULTOS    ***********************  -->

      <div class="columns large-2">
        <!-- <label for="puerto_sw">Puerto del sw.</label> -->
        <input type="hidden" name="puerto_sw" id="puerto_sw" value=""  placeholder="Suministrado por el sistema">
      </div>

  </div>
      
    </div>

    <div class="row">
      <div class="columns large-6">
        <label for="departamento">Departamento</label>
        <input type="text" name="departamento" id="departamento" style="text-transform: uppercase;" value="" placeholder="Obligatorio departamento">
      </div>

      <div class="columns large-6">
        <label for="f_ult_actualiza">F. Ult. Actualización.(dd/mm/aaaa)</label>
        <input type="date" name="f_ult_actualiza" id="f_ult_actualiza" value="" disabled>
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
        <h4>Informacion del usuario del equipo </h4>
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
      <div id="boton_ingresar_activo" class="columns large-2">
        <label for="ingresar_activo_nuevo">&nbsp;</label>
        <input type="button" name="ingresar_activo_nuevo" id="ingresar_activo_nuevo" value="Ingresar " class="button">
      </div>

      <div class="columns large-2">
        <label for="modificar_activo">&nbsp;</label>
        <input type="button" name="modificar_activo" id="modificar_activo" value="Modificar " class="button">
      </div>

      <div class="columns large-2">
        <label for="limpiar_forma">&nbsp;</label>
        <input type="submit" href="activo-form_ingresar_activo.php" name="limpiar_forma" id="limpiar_forma" value="Limpiar " class="button">
      </div>

      <div class="columns large-3">
        <label for="enviar_mail_a_mi">&nbsp;</label>
        <input type="button" name="enviar_mail_a_mi" id="enviar_mail_a_mi" value="Enviar mail a mi " class="button">
      </div>

      
    </div>

    <div class="row">

        <div class="columns large-2">
          <label for="enviar_mail_equipo_nuevo">&nbsp;</label>
          <input type="button" name="enviar_mail_equipo_nuevo" id="enviar_mail_equipo_nuevo" value="E-mail Nuevo" class="button">
        </div>
        
        <div class="columns large-3">
          <label for="enviar_mail_equipo_reubicado">&nbsp;</label>
          <input type="button" name="enviar_mail_equipo_reubicado" id="enviar_mail_equipo_reubicado" value="E-mail Reubicado" class="button">
        </div>

        <div class="columns large-2">
          <label for="enviar_mail_quitar_reserva_ip">&nbsp;</label>
          <input type="button" name="enviar_mail_quitar_reserva_ip" id="enviar_mail_quitar_reserva_ip" value="Quitar Reserva" class="button">
        </div>

        <div class="columns large-3">
          <label for="enviar_mail_almacen">&nbsp;</label>
          <input type="button" name="enviar_mail_almacen" id="enviar_mail_almacen" value="Traslado Almacen" class="button">
        </div>

        <div class="columns large-2">
          <label for="enviar_email_inconsistencia_almacen">&nbsp;</label>
          <input type="button" name="enviar_email_inconsistencia_almacen" id="enviar_email_inconsistencia_almacen" value="Inconsistencia Almacen" class="button">
        </div>


     </div>
  </form>
  <!--******************************************** FIN DE TODOS CAMPOS DE LA CONSULTA DEL ACTIVO ************************************* -->

  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/activo.js"></script>
  <script src="js/red.js"></script>
  <script src="js/correo.js"></script>
  <script src="js/switches.js"></script>
  <script>
      $(document).foundation();
  </script>
</body>
</html>
