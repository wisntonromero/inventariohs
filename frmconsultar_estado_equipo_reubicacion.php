<?php
include_once("config.php");
include_once("sesion.php");
?>

<!Doctype html>
<html lang="es">
<html>
<head>
	<title>Consultar Estado de Equipo</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Inicio</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <script src="js/jquery.js"></script>
    <script src="js/consulta_equipo_reubicacion.js"></script>
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
          <h1><a href="#"><strong>CONSULTAR INFORMACION DE EQUIPO<strong></a></h1>
        </li>
          <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
        </ul>
        <section class="top-bar-section">
          <!-- Right Nav Section -->
          <ul class="right">
            <li><a href="inicio.php">Menú</a></li>
          </ul>
        </section>
    </nav>

  
    <div id="contenedor" class="centered"><br>
      <h3><strong>CONSULTAR INFORMACION DE EQUIPO<strong></h3>
      <div class="centered large-3"><br>
        <select id="cbxtipoconsulta">
          <option value="0">-Seleccione Tipo de Consulta-</option>
          <option value="1">Activo</option>
          <option value="2">Fecha</option>
          <option value="3">Responsable</option>
        </select>
        <div id="capa_activo" class="hide"><input type="search" id="txtActivo" placeholder="Consulte por Activo" class="solonum"></div>
        <div id="capa_fecha" class="hide"><input type="text" id="txtFecha" class="datetimepicker" placeholder="Consulte por Fecha"></div>
        <div id="capa_responsable" class="hide"><input type="search" id="txtResponsable" class="mayuscula" placeholder="Consulte por Responsable"></div>
        <!-- <div id="capa_boton" class="hide"><input id="btnconsultar" type="button" class="button" value="Consultar"></div> -->
      </div>
    </div>


    <div id="tabla"></div>
</body>

    <link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/ >
    <script src="js/jquery.datetimepicker.js"></script>
    <script>jQuery('.datetimepicker').datetimepicker();</script>
</html>