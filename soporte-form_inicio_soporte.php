<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>
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