<?php
include_once("menu.php");

?>
<!DOCTYPE html>
</html>
  	<body>
  		<div class="row">
	  		<h1>Importar correos nuevos desde archivo CSV</h1>
	  		
	  		<form action='correo-php-validar_correo_institucional_desde_csv.php' method='post' enctype="multipart/form-data">
	   			Seleccionar Archivo csv : <input type='file'  name='sel_file' size='20'>
	   			<input type='submit' name='submit' value='Validar archivo csv'>
	  		</form>

	  		<form action='correo-php-importar_correo_institucional_desde_csv.php' method='post' enctype="multipart/form-data">
	   			Importar Archivo csv : <input type='file' name='sel_file' size='20'>
	   			<input type='submit' name='submit' value='Importar archivo csv'>
	  		</form>

	  	</div>
	</body>
	<script src="js/correo.js"></script>
</html>


