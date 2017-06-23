<?php
include_once("config.php");
include_once("sesion.php");

/*if(isset($_SESSION['usuario'])){
echo "Has iniciado Sesion: ".$_SESSION['usuario'];
}else{ 
header("location: index.php");
echo $_SESSION['usuario'];
}*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <script type="text/javascript" src="resources/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="resources/functions.js"></script>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="resources/style.css" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Consultar prestamo de llaves</title>
   
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
  <div class ="contain-to-grid sticky">
  <nav class="top-bar" data-topbar>
    <ul class="title-area">
      <li class="name">
        <!-- Titulo del Menu -->
        <h1><a href="#">Inventario de Hardware</a></h1>
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
                    <li><a href="red-form_ingresar_punto_de_red.php" >Consulta  / Modificar Punto de red</a></li>
                    <li><a href="red-form_ingresar_punto_de_red_por_lotes.php" >Ingresar puntos de red por lotes </a></li>
                    <li><a href="red-form_modificar_punto_de_red_por_lotes_grilla.php" >Consultar / Modificar por lotes</a></li>
                  </ul>
                </li>

                <li class="has-dropdown"><a href="#">Switches</a> <!-- Menu lado derecho -->
                  <ul class="dropdown">
                    <li><a href="switches-form_ingresar_switches.php" >Ingresar / Modificar</a></li>
                    <li><a href="switches-form_consultar_switches.php" >Consultar</a></li>
                  </ul>
                </li>

                <li class="has-dropdown"><a href="#">Bitacoras Exportar</a> <!-- Menu lado derecho -->
                <ul class="dropdown">
                  <li><a href="red-php_generar_bitacora_excel_punto_de_red.php"  >Bitacora por puntos de red</a></li>
                  <li><a href="red-php_generar_bitacora_excel_por_switches.php"  >Bitacora por switches</a></li>
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
                    <li><a href="contingencia-form_ingresar_prestamo_switch_contingencia.php" >Prestar Switch por Nro de Activo</a></li>
                    <li><a href="soporte-form_consultar_equipos_soporte_en_prestamo.php" >Consultar y recibir Switches Prestados</a></li>
                  </ul>
                </li>

              </ul>
            </li>
            <li><a href="form_mantenimiento.php">Mantto</a></li>
            <li><a href="acceso-php_logout.php">Cerrar sesion</a></li>

        </ul>
      </section>
  </nav>
  </div>
</head>
<body>
    <div id ="block"></div>
    <div class="container">
        <div id="popupbox"></div>
        <div id="content">
            <?php include_once ($view->contentTemplate); // incluyo el template que corresponda ?>
        </div>
    </div>
    
</body>
</html>