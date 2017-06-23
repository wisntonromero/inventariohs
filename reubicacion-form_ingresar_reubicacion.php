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
		    <h4>Informacion del equipo a instalar</h4>
		    <div class="columns large-2">
		        <label for="activo_equipo">Activo del equipo</label>
		        <input type="text" name="activo_equipo" id="activo_equipo" required = "[0-9]" autofocus=true value="" placeholder="Obligatorio activo equipo">
	      	</div>

	      	<div class="columns large-2">
		        <label for="consultar_reubicacion">&nbsp;</label>
		        <input type="button" name="consultar_reubicacion" id="consultar_reubicacion" value="Consultar" class="button">
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
			        		$id_tip			= $registro['tip_id'];
			            	$tipo_equipo 	= $registro['tip_descripcion'];

			                echo '<option value="'.$id_tip.'">'.$tipo_equipo.'</option>';
			           	}
		            ?>
            	</select> <br/><br/>

            	<div class="columns large-2">
		        	<input type="hidden" name="id_tip" id="id_tip" value="" placeholder="Obligatorio marca del equipo">
		    	</div>
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
		        <input type="hidden" name="id_mar" id="id_mar" value="" placeholder="Obligatorio marca del equipo">
		    </div>

			<div class="columns large-2">
		        <label for="modelo_equipo">Modelo del equipo.</label>
		    	<input type="text" name="modelo_equipo" id="modelo_equipo" value="" placeholder="Obligatorio modelo del equipo">
		    </div>

		    <div class="columns large-2">
		        <label for="activo_monitor">Activo del monitor.</label>
		        <input type="text" name="activo_monitor" id="activo_monitor" value="" placeholder="Obligatorio activo monitor">
		    </div>



		    <div class="columns large-4">
		        <label for="proceso_equipo">Estado actual del equipo.</label>
		        <select name="seleccionar_estado" id="seleccionar_estado" disabled >
	                <option selected="selected">----Seleccionar estado ----</option>
	                <?php
	                	include_once("config.php");
		                	$conexion 	= mysql_connect($server,$username,$password);
		                	mysql_set_charset('utf8',$conexion);
		                	mysql_select_db($database);
			                $id_est			= $_POST['id_est'];
			                $estado_equipo	= $_POST['estado_equipo'];

		                $query = "SELECT est_id,est_descripcion FROM estado ORDER BY est_descripcion ASC  ";


		                $resultado = mysql_query($query,$conexion);
		                $numero_de_filas = mysql_num_rows($resultado);
		                while($registro=mysql_fetch_array($resultado))
		                {
		                	$id_est			= $registro['est_id'];
			                $estado_equipo	= $registro['est_descripcion'];

			                echo '<option value="'.$id_est.'">'.$estado_equipo.'</option>';
			           	}
		            ?>
            	</select> <br/><br/>
		    </div>

		    <div class="columns large-2">
		        <input type="hidden" name="id_est" id="id_est" value="" placeholder="Obligatorio estado del equipo">
		    </div>
		    <div class="columns large-2">
		        <input type="hidden" name="estado_equipo" id="estado_equipo" value="" placeholder="Obligatorio estado del equipo">
		    </div>

	 		<div class="columns large-4">
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
		        <input type="hidden" name="id_pri" id="id_pri" value="" placeholder="Obligatorio prioridad del equipo">
		    </div>

	    </div>

	    <!--  ******************************************* FIN DE INFORMACION DEL EQUIPO  **************************************************************************** -->


		<div class="row">
	      	<h4>Informacion del responsable actual del equipo </h4>
		   	<div class="columns large-4">
		        <label for="responsable_actual">Responsable</label>
		    	<input type="text" name="responsable_actual" id="responsable_actual" value="" placeholder="Obligatorio responsable del equipo">
		    </div>
	   		<div class="columns large-4">
	        	<label for="usuario">Usuario</label>
	        	<input type="text" name="usuario" id="usuario" value="" placeholder="Obligatorio usuario del equipo">
	      	</div>
		    <div class="columns large-4">
		    	<label for="ext_tel">Extension telefónica </label>
		        <input type="text" name="ext_tel" id="ext_tel" value="" placeholder="Suministrada por el sistema" disabled>
		    </div>
		</div>

		<div class="row">
		    <h4> Información de la ubicación actual del equipo</h4>
	    	<div class="columns large-4">
		        <label for="bloque_actual">Bloque</label>
		        <input type="text" name="bloque_actual" id="bloque_actual" value="" placeholder="Obligatorio bloque">
		    </div>
		    <div class="columns large-4">
		        <label for="piso_actual">Piso</label>
		        <input type="text" name="piso_actual" id="piso_actual"  value="" placeholder="Obligatorio piso">
		    </div>
		    <div class="columns large-4">
		        <label for="cubiculo_actual">Cubiculo</label>
		        <input type="text" name="cubiculo_actual" id="cubiculo_actual" value="" placeholder="Obligatorio cubiculo">
		    </div>
	    </div>

	    <div class="row">
	    	<h4> Información de red del equipo. Ip - Mac - Punto de red. </h4>
		    <div class="columns large-3">
		    	<label for="dir_ip">Dirección Ip el pc</label>
		        <input type="text" name="dir_ip" disabled id="dir_ip" value="000.000.000.000" placeholder="Suministrada por el sistema">
		    </div>

		    <div class="columns large-3">
		        <label for="dir_mac">Dirección Mac del pc</label>
		        <input type="text" name="dir_mac" id="dir_mac" value="AA-AA-AA-AA-AA-AA" onkeypress="return solohexadecimal(event)" placeholder="Obligatorio Mac">
		    </div>

		    <div class="columns large-2">
		        <label for="punto_de_red">Punto de red.</label>
		        <input type="text" name="punto_de_red" disabled id="punto_de_red" class="punto_de_red" value="NO TIENE" placeholder="Suministrada por el sistema">
		    </div>
			<div class="row">
			    <div class="columns large-2">
			        <input type="hidden" name="id_est" id="id_est" value="" placeholder="Obligatorio estado del equipo">
			    </div>

			    <div class="columns large-2">
			        <input type="hidden" name="estado_equipo" id="estado_equipo" value="" placeholder="Obligatorio estado del equipo">
			    </div>
			</div>


		<h4>************************************  / Informacion del equipo retirar /  ****************************************</h4>
		<div class="row">
			<div class="columns large-2">
		        <label for="activo_equipo_retirar">Activo equipo a retirar</label>
		        <input type="text" name="activo_equipo_retirar" id="activo_equipo_retirar" value="" placeholder="Opcional">
		    </div>
		    <div class="columns large-2">
		        <label for="consultar_retirar">&nbsp;</label>
		        <input type="button" name="consultar_retirar" id="consultar_retirar" value="Consultar" class="button">
	      	</div>
		    <div class="columns large-4">
		        <label for="activo_monitor_retirar">Activo monitor a retirar.</label>
		        <input type="text" name="activo_monitor_retirar" id="activo_monitor_retirar" value="" placeholder="Opcional">
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
			                $id_pro					= $_POST['id_pro'];
			                $proceso_equipo_retirar = $_POST['proceso_equipo_retirar'];

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
		        <input type="hidden" name="id_pro" id="id_pro" value="" placeholder="Obligatorio proceso del equipo">
		    </div>

		    <div class="columns large-2">
		        <input type="hidden" name="id_pro" id="id_pro" value="" placeholder="Obligatorio proceso del equipo">
		    </div>
		</div>
		<!-- </div> -->

		<div class="row">
	      	<h4>Informacion del nuevo responsable del equipo </h4>
		   	<div class="columns large-4">
		        <label for="responsable">Responsable</label>
		    	<input type="text" name="responsable" id="responsable" value="" placeholder="Obligatorio responsable del equipo">
		    </div>
	   		<div class="columns large-4">
	        	<label for="nuevo_usuario">Usuario</label>
	        	<input type="text" name="nuevo_usuario" id="nuevo_usuario" value="" placeholder="Obligatorio usuario del equipo">
	      	</div>
		    <div class="columns large-4">
		    	<label for="nuevo_ext_tel">Extension telefónica </label>
		        <input type="text" name="nuevo_ext_tel" id="nuevo_ext_tel" value="" placeholder="Obligatorio ext telefonica">
		    </div>
		</div>

	    <div class="row">
		    <h4> Información de la nueva ubicación del equipo</h4>
	    	<div class="columns large-4">
		        <label for="bloque">Bloque</label>
		        <input type="text" name="bloque" id="bloque" value="" placeholder="Obligatorio bloque">
		    </div>
		    <div class="columns large-4">
		        <label for="piso">Piso</label>
		        <input type="text" name="piso" id="piso"  value="" placeholder="Obligatorio piso">
		    </div>
		    <div class="columns large-4">
		        <label for="cubiculo">Cubiculo</label>
		        <input type="text" name="cubiculo" id="cubiculo" value="" placeholder="Obligatorio cubiculo">
		    </div>
	    </div>


		<div class="row">
	    	<h4> Información de red del equipo. Ip - Mac - Punto de red. </h4>
		    <div class="columns large-3">
		    	<label for="nuevo_dir_ip">Dirección Ip el pc</label>
		        <input type="text" name="nuevo_dir_ip" id="nuevo_dir_ip" onkeypress="return solonumeros(event)" value="000.000.000.000"  placeholder="Obligatorio ip del equipo">
		     </div>

		    <div class="columns large-3">
		        <label for="nuevo_dir_mac">Dirección Mac del pc</label>
		        <input type="text" name="nuevo_dir_mac" id="nuevo_dir_mac" value="AA-AA-AA-AA-AA-AA" onkeypress="return solohexadecimal(event)" placeholder="Obligatorio Mac">
		    </div>

		    <div class="columns large-2">
		        <label for="nuevo_punto_de_red">Punto de red.</label>
		        <input type="text" name="nuevo_punto_de_red" id="nuevo_punto_de_red" onkeypress="return letrasynumeros(event)" class="punto_de_red" value="NO TIENE" placeholder="Obligatorio punto de red">
		    </div>

			<div class="columns large-2">
		        <label for="activo_equipo_soporte">Activo de soporte</label>
		        <input type="text" name="activo_equipo_soporte" id="activo_equipo_soporte" required = "[0-9]" value="OPCIONAL" placeholder="Activo soporte">
	      	</div>

		    <div class="columns large-12">
			    <label for="observaciones">Observaciones </label>
			    <input type="text" name="observaciones" id="observaciones" value="" placeholder="Opcional">
			</div>
		</div>

	    <!-- ********************************************************** BOTONES ************************************************************* -->
	    <div class="row">
	        <div class="columns large-2" id="capa_btn_ingresar_reubicacion">
	        	<label for="btningresar_reubicacion">&nbsp;</label>
	            <input type="button" name="btningresar_reubicacion" id="btningresar_reubicacion" value="Ingresar reubicación" class="button">
	        </div>

	        <div class="columns large-2">
	            <label for="mmmm">&nbsp;</label>
	            <input type="hidden" href="compras-form_ingresar_compras.php" name="limpiar_forma" id="limpiar_forma" value="Limpiar" class="button">
	        </div>

	        <div class="columns large-3" id="capa_btn_enviar_email_equipo_reubicado">
          		<label for="reubicacion_enviar_mail_equipo_reubicado">&nbsp;</label>
          		<input type="button" name="reubicacion_enviar_mail_equipo_reubicado" id="reubicacion_enviar_mail_equipo_reubicado" value="Enviar mail reubicado" class="button">
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
	<script src="js/activo.js"></script>
  	<script src="js/red.js"></script>
	<script src="js/marcas.js"></script>
	<script src="js/tipo_equipo.js"></script>
	<script src="js/prioridades.js"></script>
	<script src="js/centro_costos.js"></script>
	<script src="js/proceso.js"></script>
	<script src="js/estado.js"></script>
	<script src="js/usuario.js"></script>
	<script src="js/reubicacion.js"></script>
	<script>
    	$(document).foundation();
  	</script>
</body>
</html>