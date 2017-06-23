<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>

	<div id="capaf">
	    &nbsp;
	</div>

	<form name="form_compras" id="form_compras" method="post" action="">
 		<div class="row">
		    <h4>Informacion del equipo</h4>
		    <div class="columns large-4">
		    	<label for="orden_de_compra">Orden de Compra</label>
		        <input type="text" name="orden_de_compra" id="orden_de_compra" autofocus=true style="text-transform: uppercase;" value="" placeholder="Obligatorio Orden de compra">
		    </div>
		    <div class="columns large-4">
		        <label for="tipo_de_equipo">Tipo de equipo. Pc / Impresora / Mac...</label>
		        <select name="seleccionar_tipo" id="seleccionar_tipo">
                	<option selected="selected">-----Seleccionar tipo de equipo------</option>
	                <?php
	                	include_once("config.php");
		                $conexion = mysql_connect($server,$username,$password);
		                mysql_set_charset('utf8',$conexion);
		                mysql_select_db($database);
			                $id_tip			= $_POST['id_tip'];
			                $tipo_equipo 	= $_POST['tipo_equipo'];

		                $query = "SELECT tip_id,tip_descripcion FROM tipos_equipo ORDER BY tip_descripcion ASC  ";

		                $resultado = mysql_query($query,$conexion);
		                $numero_de_filas = mysql_num_rows($resultado);
		                while($registro=mysql_fetch_array($resultado))
		                {
			        		$id_tip 		= $registro['tip_id'];
			            	$tipo_equipo 	= $registro['tip_descripcion'];

			                echo '<option value="'.$id_tip.'">'.$tipo_equipo.'</option>';
			           	}
		            ?>
            	</select> <br/><br/>
		    </div>

		    <div class="columns large-4">
		    	<label for="marca_equipo">Marca del equipo.</label>
		        <select name="seleccionar_marca" id="seleccionar_marca">
                	<option selected="selected">-----Seleccionar Marca de equipo------</option>
	                <?php
	                	include_once("config.php");
		                $conexion 	= mysql_connect($server,$username,$password);
		                mysql_set_charset('utf8',$conexion);
		                mysql_select_db($database);
			                $id_mar = $_POST['id_mar'];
			                $marca 	= $_POST['marca'];

		                $query = "SELECT mar_id,mar_descripcion FROM marcas ORDER BY mar_descripcion ASC  ";

		                $resultado = mysql_query($query,$conexion);
		                $numero_de_filas = mysql_num_rows($resultado);
		                while($registro=mysql_fetch_array($resultado))
		                {
			        		$id_mar	= $registro['mar_id'];
			                $marca 	= $registro['mar_descripcion'];

			                echo '<option value="'.$id_mar.'">'.$marca.'</option>';
			           	}
		            ?>
            	</select> <br/><br/>
		    </div>
		</div>

	    <div class="row">

			<div class="columns large-2">
		        <input type="hidden" name="id_mar" id="id_mar" style="text-transform: uppercase;" value="" placeholder="Obligatorio marca del equipo">
		    </div>

			<div class="columns large-2">
		        <input type="hidden" name="id_tip" id="id_tip" value="" placeholder="Obligatorio marca del equipo">
		    </div>

		    <div class="columns large-2">
		        <label for="modelo_equipo">Modelo del equipo.</label>
		    	<input type="text" name="modelo_equipo" id="modelo_equipo" style="text-transform: uppercase;" value="" placeholder="Obligatorio modelo del equipo">
		    </div>
	 		<div class="columns large-2">
		        <label for="prioridad_equipo">Prioridad del equipo.</label>
		        <select name="seleccionar_prioridad" id="seleccionar_prioridad">
	                <option selected="selected">----Prioridad----</option>
	                <?php
	                	include_once("config.php");
		                	$conexion 	= mysql_connect($server,$username,$password);
		                	mysql_set_charset('utf8',$conexion);
		                	mysql_select_db($database);
			                $id_pri 	= $_POST['id_pri'];
			                $prioridad	= $_POST['prioridad'];

		                $query = "SELECT pri_id,pri_descripcion FROM prioridades ORDER BY pri_descripcion ASC  ";

		                $resultado = mysql_query($query,$conexion);
		                $numero_de_filas = mysql_num_rows($resultado);
		                while($registro=mysql_fetch_array($resultado))
		                {
			        		$id_pri		= $registro['pri_id'];
			                $prioridad 	= $registro['pri_descripcion'];

			                echo '<option value="'.$id_pri.'">'.$prioridad.'</option>';
			           	}
		            ?>
            	</select> <br/><br/>
		    </div>

		    <div class="columns large-2">
		        <input type="hidden" name="id_pri" id="id_pri" style="text-transform: uppercase;" value="" placeholder="Obligatorio prioridad del equipo">
		    </div>

	 		<div class="columns large-2">
		        <label for="activo_equipo">Activo del equipo</label>
		        <input type="text" name="activo_equipo" id="activo_equipo" class= "activo_equipo" required = "[0-9]" style="text-transform: uppercase;" value="" placeholder="Obligatorio activo equipo">
	      	</div>

 			<div class="columns large-2">
		        <label for="serial_equipo">Serial del equipo</label>
		        <input type="text" name="serial_equipo" id="serial_equipo" style="text-transform: uppercase;" value="" placeholder="Obligatorio serial equipo">
		    </div>

		    <div class="columns large-4">
		        <label for="centro_costo_equipo">Centro de costo del equipo.</label>
		        <select name="seleccionar_centro_costo" id="seleccionar_centro_costo">
	                <option selected="selected">----Seleccionar centro de costo ----</option>
	                <?php
	                	include_once("config.php");
		                	$conexion 	= mysql_connect($server,$username,$password);
		                	mysql_set_charset('utf8',$conexion);
		                	mysql_select_db($database);
			                $id_cen			= $_POST['id_cen'];
			                $centro_costo	= $_POST['centro_costo'];

		                $query = "SELECT cen_id,cen_descripcion,cen_numero FROM centros_de_costos ORDER BY cen_descripcion ASC  ";

		                $resultado = mysql_query($query,$conexion);
		                $numero_de_filas = mysql_num_rows($resultado);
		                while($registro=mysql_fetch_array($resultado))
		                {
			        		$id_cen			= $registro['cen_id'];
			                $centro_costo 	= $registro['cen_descripcion'];
			                $cen_numero 	= $registro['cen_numero'];

			                echo '<option value="'.$id_cen.'">'.$cen_numero.' - '.$centro_costo.'</option>';
			           	}
		            ?>
            	</select> <br/><br/>
		    </div>

			<div class="columns large-2">
		        <input type="hidden" name="id_cen" id="id_cen" value="" placeholder="Obligatorio centro de costo del equipo">
		    </div>

	    </div>


	    <!--  ******************************************* FIN DE INFORMACION DEL EQUIPO  **************************************************************************** -->
		<div class="row">
			<div class="columns large-4">
		        <label for="activo_monitor">Activo del monitor.</label>
		        <input type="text" name="activo_monitor" id="activo_monitor" style="text-transform: uppercase;" value="" placeholder="Obligatorio activo monitor">
		    </div>
		    <div class="columns large-4">
		        <label for="serial_monitor">Serial del monitor.</label>
		        <input type="text" name="serial_monitor" id="serial_monitor" style="text-transform: uppercase;" value="" placeholder="Obligatorio serial monitor">
		    </div>
			<div class="columns large-4">
		        <label for="estado_equipo">Estado del equipo (Ingresado) </label>
		        <input type="text" name="estado_equipo" id="estado_equipo" value="INGRESADO" disabled>
		    </div>
		</div>

		<div class="row">
			<div class="columns large-4">
		        <label for="activo_equipo_retirar">Activo equipo a retirar</label>
		        <input type="text" name="activo_equipo_retirar" id="activo_equipo_retirar" style="text-transform: uppercase;" value="" placeholder="Opcional / COLOCAR NO APLICA">
		    </div>
		    <div class="columns large-4">
		        <label for="activo_monitor_retirar">Activo monitor a retirar.</label>
		        <input type="text" name="activo_monitor_retirar" id="activo_monitor_retirar" style="text-transform: uppercase;" value="" placeholder="Opcional / COLOCAR NO APLICA">
		    </div>
			<div class="columns large-4">
		       <label for="proceso_equipo">Acción con el equipo a retirar.</label>
		        <select name="seleccionar_proceso" id="seleccionar_proceso">
	                <option selected="selected">----Seleccionar proceso ----</option>
	                <?php
	                	include_once("config.php");
		                	$conexion 	= mysql_connect($server,$username,$password);
		                	mysql_set_charset('utf8',$conexion);
		                	mysql_select_db($database);
			                $id_pro			= $_POST['id'];
			                $procesos  		= $_POST['procesos'];

		                $query = "SELECT pro_id,pro_descripcion FROM procesos ORDER BY pro_descripcion ASC  ";

		                $resultado = mysql_query($query,$conexion);
		                $numero_de_filas = mysql_num_rows($resultado);
		                while($registro=mysql_fetch_array($resultado))
		                {
			        		$id_pro			= $registro['pro_id'];
			                $procesos 	  	= $registro['pro_descripcion'];

			                echo '<option value="'.$id_pro.'">'.$procesos.'</option>';
			           	}
		            ?>
            	</select> <br/><br/>
		    </div>

			<div class="columns large-2">
		        <input type="hidden" name="id_pro" id="id_pro" style="text-transform: uppercase;" value="" placeholder="Obligatorio proceso del equipo">
		    </div>
		</div>
		<!-- </div> -->

		<div class="row">
	      	<h4>Informacion del usuario del equipo </h4>
		   	<div class="columns large-4">
		        <label for="responsable">Responsable</label>
		    	<input type="text" name="responsable" id="responsable" style="text-transform: uppercase;" value="" placeholder="Obligatorio responsable del equipo">
		    </div>
	   		<div class="columns large-4">
	        	<label for="usuario">Usuario</label>
	        	<input type="text" name="usuario" id="usuario" style="text-transform: uppercase;" value="" placeholder="Obligatorio usuario del equipo">
	      	</div>
		    <div class="columns large-4">
		    	<label for="ext_tel">Extension telefónica </label>
		        <input type="text" name="ext_tel" id="ext_tel" style="text-transform: uppercase;" value="" placeholder="Obligatorio ext telefonica">
		    </div>
		</div>

		<div class="row">
		    <h4> Información de la ubicación del equipo</h4>
	    	<div class="columns large-4">
		        <label for="bloque">Bloque</label>
		        <input type="text" name="bloque" id="bloque" style="text-transform: uppercase;" value="" placeholder="Obligatorio bloque">
		    </div>
		    <div class="columns large-4">
		        <label for="piso">Piso</label>
		        <input type="text" name="piso" id="piso"  style="text-transform: uppercase;" value="" placeholder="Obligatorio piso">
		    </div>
		    <div class="columns large-4">
		        <label for="cubiculo">Cubiculo</label>
		        <input type="text" name="cubiculo" id="cubiculo" style="text-transform: uppercase;" value="" placeholder="Obligatorio cubiculo">
		    </div>
		    <div class="columns large-12">
		        <label for="observaciones">Observaciones </label>
		        <input type="text" name="observaciones" id="observaciones" style="text-transform: uppercase;" value="" placeholder="Opcional">
		    </div>
	    </div>

	    <!-- ********************************************************** BOTONES ************************************************************* -->
	    <div class="row">
	        <div id="capa_btn_ingresar" class="columns large-2">
	        	<label for="btningresar_compra">&nbsp;</label>
	            <input type="button" name="btningresar_compra" id="btningresar_compra" value="Ingresar compra" class="button">
	        </div>

	        <div class="columns large-2">
	            <label for="lll">&nbsp;</label>
	            <input type="hidden" href="compras-form_ingresar_compras.php" name="limpiar_forma" id="limpiar_forma" value="Limpiar formulario" class="button">
	        </div>

	        <div class="columns large-2">
	            <label for="limpiar_forma">&nbsp;</label>
	            <input type="submit" href="compras-form_ingresar_compras.php" name="limpiar_forma" id="limpiar_forma" value="Limpiar formulario" class="button">
	        </div>

	        <div class="columns large-2">
	            <label for="mmmm">&nbsp;</label>
	            <input type="hidden" href="compras-form_ingresar_compras.php" name="limpiar_forma" id="limpiar_forma" value="Limpiar formulario" class="button">
	        </div>
	    </div>
	</form>
	<!-- *******************************************************FIN BOTONES ************************************************************* -->
	<script src="js/vendor/jquery.js"></script>
  	<script src="js/foundation.min.js"></script>
	<script src="js/compras.js"></script>
	<script src="js/marcas.js"></script>
	<script src="js/tipo_equipo.js"></script>
	<script src="js/prioridades.js"></script>
	<script src="js/centro_costos.js"></script>
	<script src="js/proceso.js"></script>
	<script src="js/estado.js"></script>
	<script>
    	$(document).foundation();

  	</script>
</body>
</html>