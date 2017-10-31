<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>
	<div id="capaf">
	    &nbsp;
	</div>


	<div class="container">
			<h2><strong>Editar Información de Equipo</strong></h2>
				<div id="seleccion" class="large-3 centered">
					<label><strong>Proceso</strong></label>
					<select id="cbxproceso" ><option value="-1">-SELECCIONE PROCESO-</option></select>
				</div>
		<div id="info" class="centered info hide">
				<div class="large-3 centered">
					<label><strong>Activo Equipo</strong></label>
					<input type="text" id="txtnuevo_activo" placeholder="NUEVO ACTIVO EQUIPO" class="solonum centered" autofocus>
					
					<input type="button" value="Consultar Orden" id="btnconsultar" class="button">
				</div>

			<div class="espacio left large-3">
				<label><strong>Orden de Compra</strong></label>
				<input type="text" id="orden" placeholder="Digite Orden de Compra" class="mayuscula centered"  required>
				<label><strong>Marca</strong></label>
				<select id="cbxmarca" class="combo"><option value="-1">-SELECCIONE MARCA-</option><select>
				<label><strong>Modelo</strong></label>
				<input type="text" id="txtmodelo" placeholder="Modelo del Equipo" class="mayuscula centered">
				<label><strong>Tipo de Equipo</strong></label>
				<select id="cbxtipo_equipo" class="tipo_equipo combo"><option value="-1">-TIPO DE EQUIPO-</option></select>
				<div class="final hide">
					<label><strong>Dirección Ip</strong></label>
					<input type="text" id="txtdir_ip" placeholder="IP" class="mayuscula centered">
				</div>
				<div class="final hide">
					<label><strong>Usuario</strong></label>
					<input type="text" id="txtusuario" placeholder="Usuario" class="mayuscula centered">
				</div>
				<label><strong>Observaciones</strong></label>
				<textarea id="texto"></textarea>
				<label>&nbsp;</label>
				<input type="button" id="btneditar" class ="button" value="Guardar Cambios">

			</div>

			<div class="espacio left large-3">
				<label><strong>Centro de Costo</strong></label>
				<select id="cbxcentro_costo" class="combo"><option value="-1">-CENTRO DE COSTO-</option><select>
				<label><strong>Prioridad</strong></label>
				<select id="cbxprioridad" class="prioridad combo"><option value="-1">-SELECCIONE PRIORIDAD-</option></select>
				<label><strong>Nuevo Activo Equipo*</strong></label>
				<input type="text" id="txtnuevo_activo" placeholder="NUEVO ACTIVO EQUIPO" class="solonum centered">
				<label><strong>Serial Equipo</strong></label>
				<input type="text" id="txtserial_equipo" placeholder="Serial Equipo" class="mayuscula centered">
				<div class="final hide">
					<label><strong>Dirección MAC</strong></label>
					<input type="text" id="txtdir_mac" placeholder="MAC" class="mayuscula centered">
				</div>
				<div class="final hide">
					<label><strong>OT SIGMA</strong></label>
					<input type="text" id="txtot" placeholder="OT SIGMA" class="mayuscula centered">
				</div>
			</div>

			<div class="espacio left large-3">
				<label><strong>Activo Monitor</strong></label>
				<input type="text" id="txtactivo_monitor" placeholder="ACTIVO MONITOR" class="solonum centered">
				<label><strong>Serial Monitor</strong></label>
				<input type="text" id="txtserial_monitor" placeholder="Serial Monitor" class="mayuscula centered">
				<label><strong>Activo Cpu a Retirar</strong></label>
				<input type="text" id="txtactivo_retirar" placeholder="ACTIVO CPU A RETIRAR" class="solonum centered">
				<label><strong>Activo Monitor a Retirar</strong></label>
				<input type="text" id="txtactivo_monitor_retirar" placeholder="ACTIVO MONITOR A RETIRAR" class="solonum centered">
				<div class="final hide">
					<label><strong>Punto de Red</strong></label>
					<input type="text" id="txtpunto_de_red" placeholder="Punto de Red" class="mayuscula centered">
				</div>
			</div>

			<div class="espacio left large-3">
				<label><strong>Acción con el equipo a retirar</strong></label>
				<select id="cbxprocesos" class="proceso combo"><option value="-1">-SELECCIONE ACCIÓN-</option></select>
				<label><strong>Responsable</strong></label>
				<input type="text" id="txtresponsable" placeholder="Responsable" class="mayuscula centered">
				<label><strong>Ubicación / Bloqe / Piso / Cub</strong></label>
				<input type="text" id="txtubicacion" placeholder="Ubicación" class="mayuscula centered">
				<label><strong>Extensión</strong></label>
				<input type="text" id="txtextension" placeholder="EXTENSIÓN" class="solonum centered">
				<label><strong>Estado Actual Equipo</strong></label>
				<select id="cbxestado" class="estado combo"><option value="-1">-SELECCIONE ESTADO-</option></select>
				
			<!--	<label><strong>Proceso</strong></label>
				<select id="cbxprocesos" class="proceso combo"><option value="-1">-SELECCIONE PROCESO-</option></select> -->				
			</div>
		</div>

			<div id="reubicacion" class="centered info hide">
				<div class="large-3 centered">
					<form id="reubicacion">
						<label><strong>Activo Equipo</strong></label>
						<input type="text" id="activo_equipo" placeholder="NUEVO ACTIVO EQUIPO" class="solonum centered" required>
						<input type="submit" value="Consultar Activo" id="btnconsultar_reubicacion" class="button">
					</form>
				</div>
			<div class="espacio left large-3">
				<label><strong>Activo a Retirar</strong></label>
				<input type="text" id="activo_retirar" placeholder="ACTIVO A RETIRAR" class="solonum centered">
				<label><strong>Tipo de Equipo</strong></label>
				<select id="tipo_equipo" class="combo tipo_equipo"><option value="-1">-TIPO DE EQUIPO-</option></select>
				<label><strong>Dirección IP</strong></label>
				<input type="text" id="ip" placeholder="DIRECCIÓN IP" class="centered mayuscula">
				<label><strong>Dirección MAC</strong></label>
				<input type="text" id="mac" placeholder="DIRECCIÓN MAC" class="centered">
				<label><strong>&nbsp;</strong></label>
				<input type="button" id="btnmodificar_reubicacion" class ="button" value="Guardar Cambios">
			</div>
			<div class="espacio left large-3">
				<label><strong>Ubicación</strong></label>
				<input type="text" id="ubicacion" placeholder="Ubicación" class="mayuscula centered">
				<label><strong>Nueva Ubicación</strong></label>
				<input type="text" id="nueva_ubicacion" placeholder="Nueva Ubicación" class="mayuscula centered">
				<label><strong>Activo Monitor</strong></label>
				<input type="text" id="activo_monitor" placeholder="ACTIVO MONITOR" class="solonum centered">
				<label><strong>OT SIGMA</strong></label>
				<input type="text" id="ot" placeholder="OT SIGMA" class="centered mayuscula">
			</div>
			<div class="espacio left large-3">
				<label><strong>Responsable</strong></label>
				<input type="text" id="responsable" placeholder="Responsable" class="mayuscula centered">
				<label><strong>Nuevo Responsable</strong></label>
				<input type="text" id="nuevo_responsable" placeholder="Nuevo Responsable" class="mayuscula centered">
				<label><strong>Activo de Soporte</strong></label>
				<input type="text" id="activo_soporte" placeholder="ACTIVO SOPORTE" class="solonum centered">
				<label><strong>Extensión</strong></label>
				<input type="text" id="extension" placeholder="EXTENSIÓN" class="solonum centered">
			</div>
			<div class="espacio left large-3">
				<label><strong>Prioridad</strong></label>
				<select id="prioridad" class="prioridad combo"><option value="-1">-SELECCIONE PRIORIDAD-</option></select>
				<label><strong>Estado</strong></label>
				<select id="estado" class="estado combo"><option value="-1">-SELECCIONE ESTADO-</option></select>
				<label><strong>Estado</strong></label>
				<select id="proceso" class="proceso combo"><option value="-1">-SELECCIONE PROCESO-</option></select>
				<label><strong>Punto de Red</strong></label>
				<input type="text" id="punto_de_red" placeholder="PUNTO DE RED" class="centered mayuscula">
				<label><strong>Observaciones</strong></label>
				<textarea id="observacion"></textarea>
			</div>
		</div>
		<div id="cont" class="row">
			<h5 id="msj" class="error"></h5>
		</div>
	</div>
</body>
</html>