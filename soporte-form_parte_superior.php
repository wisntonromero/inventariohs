<?php
include_once("config.php");
include_once("sesion.php");
// formulario Layout 
/*if(isset($_SESSION['usuario'])){
echo "Has iniciado Sesion: ".$_SESSION['usuario'];
}else{ 
header("location: index.php");
echo $_SESSION['usuario'];
}*/
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
    <script type="text/javascript" src="resources/jquery-1.7.1.min.js"></script>
    <script type="text/javascript" src="js/soporte-functions.js"></script>
    <link rel="stylesheet" href="css/foundation.css" />
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Prestamo de Soportes</title>
    <link rel="stylesheet" href="css/foundation.css" />
    <link rel="stylesheet" href="resources/style.css" />
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
        <h1><a href="#">Inventario de Hardware - Prestamo de Equipos de Soporte</a></h1>
      </li>
        <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
    </ul>

    <section class="top-bar-section">
      <span id="res"></span>
      <!-- Right Nav Section  menu lado derecho-->
      <ul class="right">
        <li><a href="inicio.php">Inicio</a></li>
        <li><a href="soporte-form_inicio_soporte.php">Modulo Soporte</a></li>
      </ul>
    </section>
  </nav>
</head>
<body>
    <div id ="block"></div>
    <div class="container">
        <div id="popupbox"></div>
        <div id="content">
            <?php include_once ($view->contentTemplate); // incluyo el template que corresponda ?>
        </div>
    </div>
    <form method="post" action="soporte-php_enviar_sql_completo_excel.php">
        <div class="row">
          <div class="columns large-4">
            <input type="submit" name="excel" id="excel" value="Generar Excel" class="button">
          </div>
        </div>
    </form>
</body>
</html>