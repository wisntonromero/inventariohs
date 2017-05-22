<?php
include_once("config.php");
include_once("sesion.php");
?>

<!doctype>
<html lang="es">
<html>
<head>
	<title>Ingresar Información de Equipo</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicio</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <script src="js/vendor/modernizr.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/guardar_equipo.js"></script>
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
          <h1><a href="#"><strong>INGRESAR INFORMACION DE EQUIPO<strong></a></h1>
        </li>
          <li class="toggle-topbar menu-icon"><a href="inicio.php">Menu</a></li>
        </ul>
        <section class="top-bar-section">
          <!-- Right Nav Section -->
          <ul class="right">
            <li><a href="inicio.php">Menu</a></li>
          </ul>
        </section>
    </nav>
	<div id="capaf">
	    &nbsp;
	</div>

	<div class="container">
		<div id="seleccion" class="large-2 centered">
			<label><strong>Proceso</strong></label>
			<select id="cbxproceso"><option value="-1">-SELECCIONE PROCESO-</option></select>
		</div>
		<div id="compra" class="centered info hide">
			<h2><strong>Ingresar Nueva Asignación Compra</strong></h2>
			<div class="espacio left large-3">
				<label><strong>Orden de Compra*</strong></label>
				<input type="text" id="txtorden" placeholder="Orden de Compra" class="mayuscula centered">
				<label><strong>Marca*</strong></label>
				<select id="cbxmarca" class="combo"><option value="-1">-SELECCIONE MARCA-</option><select>
				<label><strong>Modelo*</strong></label>
				<input type="text" id="txtmodelo" placeholder="Modelo del Equipo" class="mayuscula centered">
				<label><strong>Tipo de Equipo*</strong></label>
				<select id="cbxtipo_equipo" class="combo tipo_equipo"><option value="-1">-TIPO DE EQUIPO-</option></select>
				<label><strong>&nbsp;</strong></label>
				<!--<label><strong>Observaciones</strong></label>
				<textarea id="observacion"></textarea>
				<input type="button" id="btnguardar_compra" class ="button" value="GUARDAR EQUIPO"> -->
			</div>

			<div class="espacio left large-3">
				<label><strong>Centro de Costo*</strong></label>
				<select id="cbxcentro_costo"  class="combo"><option value="-1">-CENTRO DE COSTO-</option><select>
				<label><strong>Prioridad*</strong></label>
				<select id="cbxprioridad" class="prioridad"><option value="-1">-SELECCIONE PRIORIDAD-</option></select>
				<label><strong>Nuevo Activo Equipo*</strong></label>
				<input type="text" id="txtnuevo_activo" placeholder="NUEVO ACTIVO EQUIPO" class="solonum centered">
				<label><strong>Serial Equipo*</strong></label>
				<input type="text" id="txtserial_equipo" placeholder="Serial Equipo" class="mayuscula centered">
				
			</div>

			<div class="espacio left large-3">
				<label><strong>Activo Monitor</strong></label>
				<input type="text" id="txtactivo_monitor" placeholder="ACTIVO MONITOR" class="solonum centered">
				<label><strong>Serial Monitor</strong></label>
				<input type="text" id="txtserial_monitor" placeholder="SERIAL MONITOR" class="mayuscula centered">
				<label><strong>Activo Cpu a Retirar</strong></label>
				<input type="text" id="txtactivo_retirar" placeholder="ACTIVO CPU A RETIRAR" class="solonum centered">
				<label><strong>Activo Monitor a Retirar</strong></label>
				<input type="text" id="txtactivo_monitor_retirar" placeholder="ACTIVO MONITOR A RETIRAR" class="solonum centered">
			</div>

			<div class="espacio left large-3">
				<label><strong>Acción con el equipo a retirar</strong></label>
				<select id="cbxprocesos" class="proceso combo"><option value="-1">-SELECCIONE ACCIÓN-</option></select>
				<label><strong>Responsable*</strong></label>
				<input type="text" id="txtresponsable" placeholder="Responsable" class="mayuscula centered">
				<label><strong>Ubicación*</strong></label>
				<input type="text" id="txtubicacion" placeholder="UBICACIÓN " class="mayuscula centered">
				<label><strong>Extensión</strong></label>
				<input type="text" id="txtextension" placeholder="EXTENSIÓN" class="solonum centered restringir">
				<label><strong>Observaciones</strong></label>
				<textarea id="texto"></textarea>
				<input type="button" id="btnguardar_compra" class ="button" value="GUARDAR EQUIPO">
				<!-- <label><strong>Usuario*</strong></label>
				<input type="text" id="txtusuario" placeholder="Usuario" class="mayuscula centered"> -->
				<!-- <input type="text" id="observaciones" placeholder="Observaciones" class="mayuscula centered"> -->
			</div>

			
		</div>

		<div id="reubicacion" class="centered info hide">
			<h2><strong>Ingresar Reubicación</strong></h2>
			<div class="espacio left large-3">
				<label><strong>Activo Equipo*</strong></label>
				<input type="text" id="activo" placeholder="ACTIVO EQUIPO" class="solonum centered">
				<label><strong>Activo Monitor</strong></label>
				<input type="text" id="activo_monitor" placeholder="ACTIVO MONITOR" class="solonum centered">
				<label><strong>Ubicación / Bloqe / Piso / Cub</strong></label>
				<input type="text" id="ubicacion" placeholder="Ubicación" class="mayuscula centered">
				<label><strong>Responsable*</strong></label>
				<input type="text" id="responsable" placeholder="Responsable" class="mayuscula centered">
				<label><strong>Tipo de Equipo*</strong></label>
				<select id="tipo_equipo" class="combo tipo_equipo"><option value="-1">-TIPO DE EQUIPO-</option></select>
				<label><strong>&nbsp;</strong></label>
				<input type="button" id="btnguardar_reubicacion" class ="button" value="GUARDAR EQUIPO">
			</div>
			<div class="espacio left large-3">
				<label><strong>Nueva Ubicación*</strong></label>
				<input type="text" id="nueva_ubicacion" placeholder="Nueva Ubicación" class="mayuscula centered">
				<label><strong>Nuevo Responsable*</strong></label>
				<input type="text" id="nuevo_responsable" placeholder="Nuevo Responsable" class="mayuscula centered">
				<label><strong>Activo a Retirar*</strong></label>
				<input type="text" id="activo_retirar" placeholder="ACTIVO A RETIRAR" class="solonum centered">
				<label><strong>Activo Monitor a Retirar*</strong></label>
				<input type="text" id="activo_monitor_retirar" placeholder="ACTIVO MONITOR A RETIRAR" class="solonum centered">
				<label><strong>Acción con el equipo a retirar</strong></label>
				<select id="cbxprocesos" class="proceso combo"><option value="-1">-SELECCIONE ACCIÓN-</option></select>
			</div>
			<div class="espacio left large-3">
				<label><strong>Activo de Soporte</strong></label>
				<input type="text" id="activo_soporte" placeholder="ACTIVO SOPORTE" class="solonum centered">
				<label><strong>Prioridad*</strong></label>
				<select id="prioridad" class="prioridad combo"><option value="-1" class="combo">-SELECCIONE PRIORIDAD-</option></select>
				<label><strong>Extensión</strong></label>
				<input type="text" id="extension" placeholder="EXTENSIÓN" class="solonum centered restringir">
				<label><strong>Dirección IP*</strong></label>
				<input type="text" id="ip" placeholder="DIRECCIÓN IP" class="centered mayuscula">			
			</div>
			<div class="espacio left large-3">
				<label><strong>Dirección MAC*</strong></label>
				<input type="text" id="mac" placeholder="DIRECCIÓN MAC" class="centered">
				<label><strong>OT SIGMA*</strong></label>
				<input type="text" id="ot" placeholder="OT SIGMA" class="centered mayuscula">
				<label><strong>Punto de Red*</strong></label>
				<input type="text" id="punto_de_red" placeholder="PUNTO DE RED" class="centered mayuscula">
				<label><strong>Observaciones</strong></label>
				<textarea id="observacion"></textarea>
				<!-- <input type="text" id="observaciones" placeholder="Observaciones" class="mayuscula centered"> -->
			</div>
		</div>
		<div id="cont">
			<h5 id="msj" class="error"></h5>
		</div>
	</div>
</body>
</html>