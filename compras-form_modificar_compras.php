<?php
include_once("config.php");
include_once("sesion.php");
?>

<!doctype>
<html class="no-js" lang="es">
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Compras - Modificar</title>
    <link rel="shortcut icon" href="uninorte.ico" type="image/x-icon"/>
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
          <h1><a href="#"><strong>Modificar Asignación de Compra por Activo<strong></a></h1>
        </li>
          <li class="toggle-topbar menu-icon"><a href="inicio.php">Menu</a></li>
        </ul>
        <section class="top-bar-section">
        	<span id="res"></span>
          	<!-- Right Nav Section -->
          	<ul class="right">
            	<li><a href="inicio.php">Inicio</a></li>
            	<li><a href="compras-form_compras.php">Entrega de Equipos</a></li>
          	</ul>
        </section>
    </nav>

	<div id="capaf">
	    &nbsp;
	</div>

	<form name="form_compras" id="form_compras" method="post" action="">
 		<div class="row">
		    <h4>Informacion del equipo</h4>
		    <div class="columns large-2">
		        <label for="activo_equipo">Activo del equipo</label>
		        <input type="text" name="activo_equipo" id="activo_equipo" style="text-transform: uppercase;" required = "[0-9]" autofocus=true value="" placeholder="Obligatorio activo equipo">
	      	</div>

	      	<div class="columns large-2">
		        <label for="consultar">&nbsp;</label>
		        <input type="button" name="btnconsultar_activo_compra" id="btnconsultar_activo_compra" value="Consultar" class="button">
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
		    	<div class="columns large-2">
		        	<input type="hidden" name="tipo_equipo" id="tipo_equipo" value="" placeholder="Obligatorio marca del equipo">
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
		        <input type="hidden" name="id_pri" id="id_pri" value="" placeholder="Obligatorio prioridad del equipo">
		    </div>

	      	<div class="columns large-2">
		    	<label for="orden_de_compra">Orden de Compra</label>
		        <input type="text" name="orden_de_compra" id="orden_de_compra" style="text-transform: uppercase;" value="" placeholder="Obligatorio Orden de compra">
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

		<div class="row">
			<div class="columns large-4">
		        <label for="activo_monitor">Activo del monitor.</label>
		        <input type="text" name="activo_monitor" id="activo_monitor" style="text-transform: uppercase;" value="" placeholder="Obligatorio activo monitor">
		    </div>
		    <div class="columns large-4">
		        <label for="serial_monitor">Serial del monitor.</label>
		        <input type="text" name="serial_monitor" id="serial_monitor" style="text-transform: uppercase;" value="" placeholder="Obligatorio serial monitor">
		    </div>
			<div class="columns large-4" id="capa_select_estado">
		        <label for="proceso_equipo">Estado actual del equipo.</label>
		        <select name="seleccionar_estado" id="seleccionar_estado">
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
		</div>
		<!-- **************************************************** EQUIPO A RETIRAR ************************************************************** -->
		<div class="row">
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
			        		$id_pro					= $registro['pro_id'];
			                $proceso_equipo_retirar = $registro['pro_descripcion'];

			                echo '<option value="'.$id_pro.'">'.$proceso_equipo_retirar.'</option>';
			           	}
		            ?>
            	</select> <br/><br/>
		    </div>

			<div class="columns large-2">
		        <input type="hidden" name="id_pro" id="id_pro" value="" placeholder="Obligatorio proceso del equipo">
		    </div>

		    <div class="columns large-2">
		        <input type="hidden" name="proceso_equipo_retirar" id="proceso_equipo_retirar" value="" placeholder="Obligatorio proceso del equipo">
		    </div>

			<div class="columns large-4">
		        <label for="activo_equipo_retirar">Activo equipo a retirar</label>
		        <input type="text" name="activo_equipo_retirar" id="activo_equipo_retirar" style="text-transform: uppercase;" value="" placeholder="Opcional">
		    </div>
		    <div class="columns large-4">
		        <label for="activo_monitor_retirar">Activo del monitor a retirar</label>
		        <input type="text" name="activo_monitor_retirar" id="activo_monitor_retirar" style="text-transform: uppercase;" value="" placeholder="Opcional">
		    </div>

		</div>
		<!-- </div> -->

	<!--  ************************************************ FIN DE INFORMACION DEL EQUIPO               ********************************************************** -->

	<!--  ************************************************ INICIO  INFORMACION DEL USUARIO DEL EQUIPO  *********************************************************** -->

		<div class="row">
	      	<h4>Informacion del usuario del equipo </h4>
		   	<div class="columns large-4">
		        <label for="responsable">Responsable</label>
		    	<input type="text" name="responsable" id="responsable" style="text-transform: uppercase;" value="" placeholder="Obligatorio responsable del equipo">
		    </div>
	   		<div class="columns large-3">
	        	<label for="usuario">Usuario</label >
	        	<input type="text" name="usuario" id="usuario" value="" style="text-transform: uppercase;" placeholder="Obligatorio usuario del equipo">
	      	</div>
		    <div class="columns large-2">
		    	<label for="ext_tel">Extension telefónica </label>
		        <input type="text" name="ext_tel" id="ext_tel" value="" style="text-transform: uppercase;" placeholder="Obligatorio ext telefonica">
		    </div>
		    <div class="columns large-3">
		    	<label for="f_ult_actualizacion">F-Ult-Actualización</label>
		        <input type="date" name="f_ult_actualizacion" id="f_ult_actualizacion" disabled value="" placeholder="Generada por el sistema" >
		    </div>
		</div>

	<!--  ************************************************ INICIO  DE E-MAIL 		  *********************************************************** -->
		<div id="prueba" class="row">
	    	<div class="columns large-4">
		        <label for="email_responsable">E-mail Responsable</label>
		        <input type="text" name="email_responsable"  id="email_responsable" pattern="/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/" style="color: blue; font-family: Verdana; border-color:red; font-weight: bold; font-size: 15px;" value="@uninorte.edu.co" placeholder="Obligatorio e-mail del responsable">
		    </div>

 			<div class="columns large-4">
		        <label for="email_usuario">E-mail Usuario</label>
		        <input type="text" name="email_usuario" id="email_usuario" pattern="/^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/" style="color: blue; font-family: Verdana; border-color:red; font-weight: bold; font-size: 15px;" value="@uninorte.edu.co" placeholder="Obligatorio e-mail del usuario" >
		    </div>

		   <div class="columns large-4">
	        	<label for="departamento">Departamento</label>
	        	<input type="text" name="departamento" id="departamento" style="text-transform: uppercase; color: blue; font-family: Verdana; border-color:red; font-weight: bold; font-size: 15px;" value="" placeholder="Obligatorio departamento">
	      </div>

		    <marquee scrolldelay="700" scrollamount="100">
				<font color="red"><b> No olvidar colocar los correos del responsable y el usuario final del equipo.</b></font>
			</marquee>
		</div>
	<!--  ************************************************ FIN DE E-MAIL                ********************************************************** -->


	    <!--  ************************************************************* INICIO  DE RED  DEL EQUIPO  *********************************************************************** -->

		<div id="prueba2" class="row">
	    	<h4> Información de red del equipo. Ip - Mac - Punto de red. </h4>
		    <div class="columns large-3">
		    	<label for="dir_ip">Dirección Ip el pc</label>
		        <input type="text" name="dir_ip" id="dir_ip" onkeypress="return solonumeros(event)" value="000.000.000.000" style="color: blue; font-family: Verdana; border-color:red; font-weight: bold; font-size: 15px" placeholder="Obligatorio ip del equipo">
		    </div>

		    <div class="columns large-3">
		        <label for="dir_mac">Dirección Mac del pc</label>
		        <input type="text" name="dir_mac" id="dir_mac" style="text-transform: uppercase;" value="AA-AA-AA-AA-AA-AA" onkeypress="return solohexadecimal(event)" style="color: blue; font-family: Verdana; border-color:red; font-weight: bold; font-size: 15px" placeholder="Obligatorio Mac">
		    </div>

		    <div class="columns large-2">
		        <label for="punto_de_red">Punto de red.</label>
		        <input type="text" name="punto_de_red" id="punto_de_red" style="text-transform: uppercase;" value="NO TIENE" onkeypress="return letrasynumeros(event)"  style="color: blue; font-family: Verdana; border-color:red; font-weight: bold; font-size: 15px" placeholder="Obligatorio punto de red">
		    </div>

			<div class="columns large-2">
		    	<label for="consultar_punto_de_red">&nbsp;</label>
		        <input type="button" name="consultar_punto_de_red" id="consultar_punto_de_red" value="Consultar" class="button">
		    </div>

 			<div class="columns large-2">
		        <label for="ot_sigma">Ot de Aranda.</label>
		        <input type="text" name="ot_sigma" id="ot_sigma" value="" onkeypress="return letrasynumeros(event)" style="text-transform: uppercase; color: blue; font-family: Verdana; border-color:red; font-weight: bold; font-size: 15px;"  placeholder="Obligatorio Ot de Aranda">
		    </div>
	    </div>


		
		<div id="capa_red" class="row">
		    <div class="columns large-8">
          		<label for="seleccionar_switches">Ip Switch</label>
         		<select name="seleccionar_switches_puertos" disabled id="seleccionar_switches_puertos">
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

      		<div class="columns large-3">
		   		<input type="hidden" name="dir_ip_sw" id="dir_ip_sw" value="" placeholder="dir ip sw">
			</div>
	    
	    	<div class="columns large-2">
    			<input type="hidden" name="puerto_sw" id="puerto_sw" value=""  placeholder="puerto sw">
      		</div>
      		

	      	<div class="columns large-2">
	       	 	<label for="vlan_puerto_sw">Vlan</label>
	       	 	<input type="text" name="vlan_puerto_sw" id="vlan_puerto_sw" value="" placeholder="Suministrada por el sistema">
	      	</div>

	      	<div class="columns large-2">
	         	<label for="estado_puerto_sw">Estado Puerto Sw</label>
	        	<input type="text" name="estado_puerto_sw" id="estado_puerto_sw" value="" placeholder="Obligatorio estado puerto sw" style="text-transform:uppercase;">
	      	</div>

	      	<marquee scrolldelay="700" scrollamount="100">
				<font color="red"><b> No olvidar colocar la información de red del equipo y ot de Aranda.</b></font>
			</marquee>
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
	    </div>

	    <div class="row">

	    <div class="columns large-12">
			<label for="observaciones">Observaciones </label>
			<input type="text" name="observaciones" id="observaciones" style="text-transform: uppercase;" value="" style="color: blue; font-family: Verdana; border-color:red; font-weight: bold; font-size: 15px" placeholder="Opcional">
		</div>

		</div>


	    <!-- ********************************************************** BOTONES ************************************************************* -->
	    <div class="row">
	        <div id="capa_btn_guardar" class="columns large-2">
	        	<label for="btnmodificar_compra">&nbsp;</label>
	            <input type="button" name="btnmodificar_compra" id="btnmodificar_compra" value="Guardar Modificación" class="button">
	        </div>
	        <div class="columns large-2">
	            <label for="lll">&nbsp;</label>
	            <input type="hidden" href="compras-form_ingresar_compras.php" name="limpiar_forma" id="limpiar_forma" value="Limpiar formulario" class="button">
	        </div>
	        <div id="capa_btn_guardar_enviar_email"  class="columns large-2">
	        	<label for="btnmodificar_compra_enviar_email">&nbsp;</label>
	            <input type="button" name="btnmodificar_compra_enviar_email" id="btnmodificar_compra_enviar_email" value="Guardar Modificación y enviar email" class="button">
	        </div>
	        <div class="columns large-2">
	            <label for="mmmm">&nbsp;</label>
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

	        <div class="columns large-2">
          		<label for="enviar_mail_equipo_nuevo">&nbsp;</label>
          		<input type="button" name="enviar_mail_equipo_nuevo" id="enviar_mail_equipo_nuevo" value="Reserva de IP" class="button">
        	</div>
	    </div>
	</form>
	<!-- *******************************************************FIN BOTONES ************************************************************* -->
	<script src="js/vendor/jquery.js"></script>
  	<script src="js/foundation.min.js"></script>
	<script src="js/compras.js"></script>
	<script src="js/activo.js"></script>
	<script src="js/marcas.js"></script>
	<script src="js/tipo_equipo.js"></script>
	<script src="js/prioridades.js"></script>
	<script src="js/centro_costos.js"></script>
	<script src="js/proceso.js"></script>
	<script src="js/estado.js"></script>
	<script src="js/usuario.js"></script>
	<script src="js/red.js"></script>
	<script src="js/switches.js"></script>
	<script src="js/correo.js"></script>
	<script>
    	$(document).foundation();
  	</script>
</body>
</html>