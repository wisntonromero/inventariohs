<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>

    
		<div id="wrap">
		<div class="row">
        <h5>Consulta y Modificación de puntos de red por lotes</h5> 
		</div>
			<!-- Feedback message zone -->
			<div id="message"></div>

        <div id="toolbar">
            <div class="row">
              <input type="text" id="filter" name="filter" autofocus=true placeholder="Filtro : Digite punto de red a consultar"  />
              <a id="showaddformbutton" class="button green"><i class="fa fa-plus"></i> Ingresar Punto de red</a>
            </div>              
        </div>

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

            <div class="row">
                <input type="text" id="cubiculo" name="cubiculo" placeholder="Cubiculo" />
            </div>

            <div class="row">
                <input type="text" id="tipo_de_punto_de_red" name="Tipo de punto de red" placeholder="Tipo de punto de red" />
            </div>

            <div class="row tright">
              <a id="addbutton" class="button green" ><i class="fa fa-save"></i> Ingresar</a>
              <a id="cancelbutton" class="button delete">Cancelar</a>
            </div>
        </div>




			<!-- Grid contents -->
			<div id="tablecontent" class="row"></div>
		
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

        

        <script src="js/vendor/jquery.js"></script>
        <script src="js/foundation.min.js"></script>
        <script src="js/usuario.js"></script>
        <script>
           $(document).foundation();
        </script>
	</body>
</html>
