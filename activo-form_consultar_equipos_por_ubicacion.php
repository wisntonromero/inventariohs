<?php
include_once("config.php");
include_once("sesion.php");
?>

<!doctype html>
<html class="no-js" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Consultar equipos por ubicacion</title>
    <LINK REL="SHORTCUT ICON" HREF="uninorte.ico" />
    <link rel="stylesheet" href="css/foundation.css" />
    <!-- <Link href="css/estilo_maestro.css" type="text/css" rel="stylesheet"> -->
    <script src="js/vendor/modernizr.js"></script>
    <script src="js/funciones.js"></script>
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
            <h1><a href="#">Consulta de equipos por ubicación (bloque, piso y ubicación) por pantalla.</a></h1>
          </li>
          <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
        </ul>

        <section class="top-bar-section">
          <!-- Right Nav Section  menu lado derecho-->
          <ul class="right">
            <!--<li><a href="prestar_llaves.php">Nuevo prestamo de llaves</a></li> -->
            <li><a href="inicio.php">Inicio</a></li>
          </ul>
        </section>
      </nav>

      <form method="post" action="activo-php_enviar_sql_completo_excel.php">

        <div class="row">
          <h4>Informacion de la ubicación del equipo - Bloque - Piso - Cubiculo - Usuario por pantalla</h4>
          <div class="columns large-3">
            <label for="bloque">Bloque</label>
            <input type="text" name="bloque" id="bloque" placeholder="Obligatorio bloque " style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>

          <div class="columns large-2">
            <label for="piso">Piso</label>
            <input type="text" name="piso" id="piso" placeholder="Obligatorio piso" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>

          <div class="columns large-2">
            <label for="cubiculo">Cubiculo</label>
            <input type="text" name="cubiculo" id="cubiculo" placeholder="Obligatorio cubiculo" style="text-transform:uppercase;">
          </div>

           <div class="columns large-5">
            <label for="departamento">Departamento</label>
            <input type="text" name="departamento" id="departamento" placeholder="Obligatorio departamento" style="text-transform:uppercase;">
          </div>
        </div>

        <div class="row">
          <div class="columns large-4">
            <label for="estado_equipo">Estado Equipo(Activo - Soporte)</label>
            <input type="text" name="estado_equipo" id="estado_equipo" placeholder="Obligatorio Estado Equipo" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>

          <div class="columns large-4">
            <label for="responsable">Responsable</label>
            <input type="text" name="responsable" id="responsable" placeholder="Obligatorio responsable" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>

          <div class="columns large-4">
            <label for="usuario">Usuario</label>
            <input type="text" name="usuario" id="usuario" placeholder="Obligatorio usuario" style="text-transform:uppercase;" onkeyup="javascript:this.value=this.value.toUpperCase();">
          </div>
        </div>

        <div class="row">
          <div class="columns large-4">
            <input type="button" name="consultar_equipos_por_pantalla" id="consultar_equipos_por_pantalla" value="Consultar equipos por pantalla" class="button">
          </div>
        </div>

        <div id="resultado" class="row">

        </div>

        <div class="row">
          <div class="columns large-4">
            <input type="submit" name="excel" id="excel" value="Generar Excel" class="button">
          </div>
        </div>

       <!--  <iframe width="600" height="400" scrolling="auto" src="<?php print ("https://guayacan.uninorte.edu.co/directorio_interno/"); ?>"></iframe> -->
      </form>

      <script src="js/vendor/jquery.js"></script>
      <script src="js/foundation.min.js"></script>
      <script src="js/funciones.js"></script>

      <script>
        $(document).foundation();

        $('#consultar_equipos_por_pantalla').click(function(e){

          $.post('activo-php_enviar_sql_a_pantalla.php',
            {
              usuario:      $('#usuario').val(),
              responsable:  $('#responsable').val(),
              bloque:       $('#bloque').val(),
              piso:         $('#piso').val(),
              departamento: $('#departamento').val(),
              cubiculo:     $('#cubiculo').val(),
              estado_equipo:$('#estado_equipo').val(),
            },
            function (data){
              $('#resultado').html(data);
            }
          );
        });

      </script>
    </body>
</html>