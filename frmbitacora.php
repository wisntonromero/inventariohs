<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>

    <div class="container">
    	<div id="capaf">
		    &nbsp;
		<div class="row">
    	<div id="bitacora" class="large-2">
    		<form id="ajax" action="consultar_bitacora.php" method="post" > 
  				<label for="activo">Activo equipo </label>
          <input type="text" id="activo" name="activo" placeholder="Digite Activo del equipo" class="centered solonum restringir" autofocus required>
  				<input type="submit" id="btn_consultar" class="button" value="Consultar">
    		</form> 
          
        </div>
        <div class="row">
      		<div id="tabla" class="centered"></div>
        </div>
    </div>


</body>
</html>