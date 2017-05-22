<?php
include_once("config.php");
include_once("sesion.php");
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Consultar/ Bitacora</title>
    <link rel="shortcut icon" href="uninorte.ico" type="image/x-icon"/>
    <link rel="stylesheet" href="css/foundation.css" />
    <script src="js/jquery.js" type="text/javascript"></script>
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
        <h1><a href="#">Consulta de movimiento de equipos (Bitacora) ...Por pantalla.</a></h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
    </ul>

    <section class="top-bar-section">
      <!-- Right Nav Section  menu lado derecho-->
      <ul class="right">
        <li><a href="inicio.php">Inicio</a></li>
      </ul>
    </section>
  </nav>

  <form method="post" action="bitacora-php_enviar_sql_completo_excel.php">

    <div class="row">
      <div class="columns large-3">
          <label for="activo_equipo">Activo equipo a instalar</label>
          <input type="text" name="activo_equipo" id="activo_equipo" placeholder="Obligatorio activo equipo " onkeypress="return letrasynumeros_sin_espacio(event)" style="text-transform:uppercase;">
      </div>
    </div>


    <div class="row">
      <div class="columns large-4">
        <input type="button" name="bitacora_consultar_equipos_por_pantalla" id="bitacora_consultar_equipos_por_pantalla" value="Consultar Bitacora" class="button">
      </div>
    </div>

     <div id="resultado" class="row">

     </div>

     <div class="row">
      <div class="columns large-4">
        <input type="submit" name="excel" id="excel" value="Generar Excel" class="button">
      </div>
    </div>
  </form>

  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/bitacora.js"></script>

  <script>
    $(document).foundation();

    $('#bitacora_consultar_equipos_por_pantalla').click(function(e){

      $.post('bitacora-php_enviar_sql_a_pantalla.php',
        {
          activo_equipo: $('#activo_equipo').val(),
        },
        function (data){
          $('#resultado').html(data);
        }
      );

    });

  </script>
</body>
</html>