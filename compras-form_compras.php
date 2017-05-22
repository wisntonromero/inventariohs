<?php
include_once("config.php");
include_once("sesion.php");
?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <title>Inicio</title>
      <LINK REL="SHORTCUT ICON" HREF="uninorte.ico" />
      <link rel="stylesheet" href="css/foundation.css" />
      <!-- <Link href="css/estilo_maestro.css" type="text/css" rel="stylesheet">  -->
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
              <!-- Right Nav Section -->
              <ul class="right">
                <!--<li><a href="agregar_activo.php">Agregar</a></li> -->
                <li><a href="inicio.php">Inicio</a></li>
                <li><a href="acceso-php_logout.php">Cerrar sesion</a></li>
              </ul>
            </section>
        </nav>
        <br>

        <div class="row">
          <div class="columns large-12">
            <form method="post" action="">
                <div class="row">
                 <!-- A default button-group with small buttons inside -->
                  <ul class="button-group">
                    <div class="columns large-3">
                      <h4>Activos</h4>
                      <h4>Consulta de activos</h4>
                      <li><a href="activo-form_consultar_activo.php" class="button">Consultar un equipo por su activo</a></li>
                      <li><a href="activo-form_consultar_equipos_por_ubicacion.php" class="button">Consultar equipo por ubicacion.</a></li>
                      <!-- <li><a href="frmmodificar_equipo.php" class="button">Modificar Información de Orden de Compra</a></li> -->
                    </div>                  

                    <div class="columns large-3">
                      <h4>Equipos Nuevos</h4>
                      <h4>Ingresar / Modificar</h4>
                      <li><a href="compras-form_ingresar_compras.php" class="button">Ingresar Nueva Compra</a></li>
                      <li><a href="compras-form_modificar_compras.php" class="button">Modificar Compra por Nro de Activo </a></li>
                      <li><a href="compras-form_consultar_equipos_por_orden_compra.php" class="button">Consultar Estado Actual de Equipo por Compra.</a></li>
                      <li><a href="compras-form_modificar_estado_de_equipos_por_lotes.php" class="button">Modificar Estado de Equipos por Lote.</a></li>
                    </div>  

                    <div class="columns large-3">
                      <h4>Reubicaciones</h4>
                       <h4>Ingresar / Modificar</h4>
                      <li><a href="reubicacion-form_ingresar_reubicacion.php" class="button">Ingresar Equipo por Reubicaciòn.</a></li>                     
                      <li><a href="reubicacion-form_modificar_reubicacion.php" class="button">Modificar Equipo Reubicado.</a></li>  
                      <li><a href="reubicacion-form_consultar_equipos_por_estado.php" class="button">Consultar Estado de Equipos Reubicados.</a></li>
                    </div> 

                     <div class="columns large-3">
                      <h4>Eventos</h4>
                      <h4>consulta Bitacora</h4>
                      <li><a href="frmbitacora.php" class="button">Consultar Bitacora del Equipo.</a></li>  
                    </div>   


                  </ul>
                </div>
            </form>
          </div>
        </div>
          <script src="js/vendor/jquery.js"></script>
          <script src="js/foundation.min.js"></script>
          <script src="js/usuario.js"></script>

          <script>
            $(document).foundation();
          </script>
  </body>
</html>