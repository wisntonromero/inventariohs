<?php
include_once("config.php");
//include_once("sesion.php");
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
                    </div>                  

                    <div class="columns large-3">
                      <h4>Maestro de Soporte</h4>
                      <h4>Ingresar / Modificar</h4>
                      <li><a href="soporte-form_ingresar_activo_soporte_a_bodega.php" class="button">Ingresar Nuevo Soporte a Bodega</a></li>
                      <h4>----- Prestamos -----</h4>
                      <li><a href="soporte-form_ingresar_prestamo_soporte.php" class="button">Prestar Soporte por Nro de Activo </a></li>
                      <li><a href="soporte-form_ingresar_prestamo_soporte_switch.php" class="button">Prestar Switch de soporte por Nro de Activo </a></li>
                      <li><a href="soporte-form_consultar_equipos_soporte_en_prestamo.php" class="button">Consultar y recibir Equipos Prestados</a></li>
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