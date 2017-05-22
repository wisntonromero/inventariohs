<?php
include_once("config.php");
include_once("sesion.php");
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Centro de cableados - Ingresar / Modificar</title>
  <LINK REL="SHORTCUT ICON" HREF="uninorte.ico" />
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
        <h1><a href="#">Inventario de Hardware</a></h1>
      </li>
        <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
    </ul>

    <section class="top-bar-section">
      <span id="res"></span>
      <!-- Right Nav Section  menu lado derecho-->
      <ul class="right">
        <li><a href="inicio.php">Inicio</a></li>
      </ul>
    </section>
  </nav>

  <br>

<!--  ********************************************************* CUADRO INFORMACION  DEL CENTRO DE CABLEADPO ************************************* -->
    <form method="post" action="">
        <div class="row">
          <h4>Informacion del centro de cableado</h4>
          <div class="columns large-3">
            <label for="consulta_c_cableado">Nro centro de cableado</label>
            <input type="text" name="nro_cc" id="nro_cc" required pattern="[0-9]+$" autofocus=true  placeholder="Obligatorio nro cc">
            <input type="button" name="consulta_c_cableado" id="consulta_c_cableado" value="Consultar" class="button">
          </div>

          <div class="columns large-4">
            <label for="descripcion_cc">Descripción del centro de cableado</label>
            <input type="text" name="descripcion_cc" id="descripcion_cc" placeholder="Suministrado por el sistema">
          </div>

          <div class="columns large-5">
            <label for="ubicacion_cc">Ubicación del centro de cableado</label>
            <input type="text" name="ubicacion_cc" id="ubicacion_cc" placeholder="Suministrado por el sistema">
          </div>
        </div>
    </form>
  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/c_cableado.js"></script>
  <script>
//    $(document).foundation();
  </script>
</body>
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/ >
<script src="js/jquery.js"></script>
<script src="js/jquery.datetimepicker.js"></script>
<script>jQuery('.datetimepicker').datetimepicker();</script>

</html>