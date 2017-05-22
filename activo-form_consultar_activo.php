<?php
include_once("config.php");
include_once("sesion.php");
?>
<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Activo - Consultar</title>
  <LINK REL="SHORTCUT ICON" HREF="uninorte.ico" />
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
      <!-- Right Nav Section  menu lado derecho-->
      <ul class="right">
          <li><a href="inicio.php">Inicio</a></li>
      </ul>
    </section>
  </nav>

  <form name="activo" id="activo" method="post" action="">
    <div class="row">
      <h4>Informacion del equipo</h4>

     <div class="columns large-2">
        <label for="activo_equipo">Activo CPU</label>
        <input type="text" name="activo_equipo" id="activo_equipo" value="" placeholder="Obligatorio activo equipo">
      </div>

      <div class="columns large-2">
        <label for="consultar">&nbsp;</label>
        <input type="button" name="consultar" id="consultar" value="Consultar" class="button">
      </div>

      <div class="columns large-4">
        <label for="tipo_equipo">Tipo de equipo. Pc / Impresora / Mac</label>
        <input type="text" name="tipo_equipo" id="tipo_equipo" value="" placeholder="Obligatorio tipo de equipo">
      </div>

      <div class="columns large-4">
        <label for="marca_equipo">Marca del equipo.</label>
        <input type="text" name="marca_equipo" id="marca_equipo" value="" placeholder="Obligatorio marca del equipo">
      </div>
    </div>

    <div class="row">
      <div class="columns large-4">
        <label for="modelo_equipo">Modelo del equipo.</label>
        <input type="text" name="modelo_equipo" id="modelo_equipo" value="" placeholder="Obligatorio modelo del equipo">
      </div>

      <div class="columns large-4">
        <label for="activo_mon">Activo del monitor.</label>
        <input type="text" name="activo_mon" id="activo_mon" value="">
      </div>

      <div class="columns large-4">
        <label for="estado_equipo">Estado del equipo (Activo - De baja) </label>
        <input type="text" name="estado_equipo" id="estado_equipo" value="" placeholder="Obligatorio estado del equipo">
      </div>
    </div>
    <!--  ******************************************* FIN DE INFORMACION DEL EQUIPO  **************************************************************************** -->

    <!-- ******************************************** INFORMACION DE RED DEL EQUIPO *********************************************************** 68-5b-35-97-ad-fd -->
    <div class="row">
      <h4> Información de red del equipo. Ip - Mac - Punto de red - Ubicación. </h4>
      <div class="columns large-3">
        <label for="dir_ip">Dirección Ip el pc</label>
        <input type="text" name="dir_ip" id="dir_ip" pattern="^(?:(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)\.){3}(?:25[0-5]|2[0-4][0-9]|[01]?[0-9][0-9]?)$" value="" placeholder="Obligatorio ip del equipo">
      </div>

      <div class="columns large-4">
        <label for="dir_mac">Dirección Mac del pc</label>
        <input type="text" name="dir_mac" id="dir_mac" value="" placeholder="Obligatorio Mac">
      </div>

      <div class="columns large-2">
        <label for="punto_de_red">Punto de red.</label>
        <input type="text" name="punto_de_red" id="punto_de_red" value="" placeholder="Obligatorio punto de red">
      </div>

      <div class="columns large-3">
        <label for="dir_ip_sw">Dirección Ip del sw.</label>
        <input type="text" name="dir_ip_sw" id="dir_ip_sw" value="" placeholder="Suministrada por el sistema">
      </div>
    </div>

    <div class="row">
      <div class="columns large-2">
        <label for="puerto_sw">Puerto del sw.</label>
        <input type="text" name="puerto_sw" id="puerto_sw" value=""  placeholder="Suministrado por el sistema">
      </div>

      <div class="columns large-2">
        <label for="vlan_puerto_sw">Vlan.</label>
        <input type="text" name="vlan_puerto_sw" id="vlan_puerto_sw" value="" placeholder="Suministrada por el sistema">
      </div>

      <div class="columns large-3">
        <label for="bloque">Bloque</label>
        <input type="text" name="bloque" id="bloque" value="" placeholder="Obligatorio bloque">
      </div>

      <div class="columns large-2">
        <label for="piso">Piso</label>
        <input type="text" name="piso" id="piso"  value="" placeholder="Obligatorio piso">
      </div>      
      
      <div class="columns large-3">
        <label for="cubiculo">Cubiculo</label>
        <input type="text" name="cubiculo" id="cubiculo" value="" placeholder="Obligatorio cubiculo">
      </div>
    </div>

    <div class="row">
      <div class="columns large-6">
        <label for="departamento">Departamento</label>
        <input type="text" name="departamento" id="departamento" value="" placeholder="Obligatorio departamento">
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
        <input type="text" name="responsable" id="responsable" value="" placeholder="Obligatorio responsable del equipo">
      </div>

      <div class="columns large-4">
        <label for="usuario">Usuario</label>
        <input type="text" name="usuario" id="usuario" value="" placeholder="Obligatorio usuario del equipo">
      </div>

      <div class="columns large-4">
        <label for="ext_tel">Extension telefónica </label>
        <input type="text" name="ext_tel" id="ext_tel" value="" placeholder="Obligatorio ext telefonica">
      </div>

      <div class="columns large-12">
        <label for="observaciones">Observaciones </label>
        <input type="text" name="observaciones" id="observaciones" value="">
      </div>
    </div>
  </form>

  <!--******************************************** FIN DE TODOS CAMPOS DE LA CONSULTA DEL ACTIVO ************************************* -->

  <script src="js/vendor/jquery.js"></script>
  <script src="js/activo.js"></script>
  <script src="js/foundation.min.js"></script>
  <script>
      $(document).foundation();
  </script>

</body>
</html>
