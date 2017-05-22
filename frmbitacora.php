<?php
include_once("config.php");
include_once("sesion.php");
?>

<!doctype>
<html class="no-js" lang="es">
<head>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Bitacora del Equipo</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/vendor/modernizr.js"></script>
    <script src="js/jquery.js"></script>
    <script src="js/consultar_bitacora.js"></script>
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
          <h1><a href="#"><strong>Consultar Bitacora por activo del equipo<strong></a></h1>
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