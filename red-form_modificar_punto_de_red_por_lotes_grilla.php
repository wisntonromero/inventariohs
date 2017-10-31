<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>

    <div class ="contain-to-grid sticky">

          <nav class="top-bar" data-topbar> <!-- Menú de navegación  -->
            
            <ul class="title-area">
              <li class="name">
                <h1><a href="#">Inventario de Hardware</a></h1> <!-- Titulo menú de navegación  -->
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
		<div id="wrap">
		<h5>Consulta y Modificación de puntos de red por lotes</h5> 
		
			<!-- Feedback message zone -->
			<div id="message"></div>

            <div id="toolbar">
              <input type="text" id="filter" name="filter" autofocus=true placeholder="Filtro : Digite punto de red a consultar"  />
              <a id="showaddformbutton" class="button green"><i class="fa fa-plus"></i> Ingresar Punto de red</a>
            </div>
			<!-- Grid contents -->
			<div id="tablecontent"></div>
		
			<!-- Paginator control -->
			<div id="paginator"></div>
		</div>  
		
		<script src="js/editablegrid-2.1.0-b25.js"></script>   
		<script src="js/jquery-1.11.1.min.js" ></script>
        <!-- EditableGrid test if jQuery UI is present. If present, a datepicker is automatically used for date type -->
    <script src="//ajax.googleapis.com/ajax/libs/jqueryui/1.10.4/jquery-ui.min.js"></script>
		<script src="js/punto_de_red_grilla.js" ></script>

		<script type="text/javascript">
		
            var datagrid = new DatabaseGrid();
			window.onload = function() { 

                // key typed in the filter field
                $("#filter").keyup(function() {
                    datagrid.editableGrid.filter( $(this).val());

                    // To filter on some columns, you can set an array of column index 
                    //datagrid.editableGrid.filter( $(this).val(), [0,3,5]);
                  });

                $("#showaddformbutton").click( function()  {
                  showAddForm();
                });
                $("#cancelbutton").click( function() {
                  showAddForm();
                });

                $("#addbutton").click(function() {
                  datagrid.addRow();
                });
			}; 
		</script>

        <!-- simple form, used to add a new row -->
        <div id="addform">

            <div class="row">
                <input type="text" id="punto_de_red" name="punto_de_red" placeholder="Punto de red" />
            </div>

             <div class="row">
                <input type="text" id="bloque" name="bloque" placeholder="Bloque" />
            </div>

            <div class="row">
                <input type="text" id="piso" name="piso" placeholder="Piso" />
            </div>

            <div class="row tright">
              <a id="addbutton" class="button green" ><i class="fa fa-save"></i> Ingresar</a>
              <a id="cancelbutton" class="button delete">Cancelar</a>
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
