<?php
include_once("config.php");
include_once("sesion.php");
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="keywords" content="onclick edit jquery php, grid in php, onclick change text box in jquery, onclick edit table row, insert update delete using jquery ajax, simple php data grid" />
  <meta name="description" content="This article is about simple grid system using PHP, jQuery. Insert a new record to the table using by normal Ajax PHP. It will show the editable textbox when user clicks on the label." />
  <link rel="stylesheet" type="text/css" href="css/style.css" />
  <link rel="stylesheet" href="css/foundation.css" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css">
  <link rel="shortcut icon" href="uninorte.ico" type="image/x-icon"/>
  <script type="text/javascript" src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script type="text/javascript" src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <script src="js/vendor/modernizr.js"></script>
  <title>Compras - Modificar</title>



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
          <h1><a href="#"><strong>Consulta de llaves prestadas<strong></a></h1>
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

<div class="as_wrapper">
  <h1 class="h1"><a href="">Llaves prestadas </a></h1>
  <div class="as_grid_container">
        <div class="as_gridder" id="as_gridder"></div> <!-- GRID LOADER -->
    </div>
</div>
<script src="js/grid.js"></script>
<script src="js/llaves.js"></script>
</body>
</html>