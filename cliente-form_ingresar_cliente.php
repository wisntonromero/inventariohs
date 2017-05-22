<?php
include_once("config.php");
include_once("sesion.php");
?>

<!doctype html>
<html class="no-js" lang="en">
<head>
  <meta charset="utf-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Clientes - Ingresar / Modificar</title>
  <LINK REL="SHORTCUT ICON" HREF="uninorte.ico" />
  <link rel="stylesheet" href="css/foundation.css" />
  <script src="js/vendor/modernizr.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.10.4/themes/smoothness/jquery-ui.css" />
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.10.4/jquery-ui.js"></script>
  <!-- <link rel="stylesheet" href="/resources/demos/style.css">
 <script type="text/javascript" src="jquery/js/jquery-1.5.1.min.js"></script>
  <script type="text/javascript" src="jquery/js/jquery-ui-1.8.13.custom.min.js"></script>
  <script type="text/javascript" src="js/jquery-ui-timepicker-addon.js"></script> -->
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
      <form method="post" action="">
          <div class="row">
            <h4> Informacion del cliente</h4>
              <div class="columns large-4">
                <label for="correo">Correo</label>
                <input type="text" name="correo" id="correo" placeholder="Suministrado por el sistema">
              </div>            
     
              <div class="columns large-2">
                <label for="consultar_cliente">Consultar</label>
                 <input type="button" name="consultar_cliente" id="consultar_cliente" value="Consultar" class="button">
              </div>

              <div class="columns large-4">
                <label for="cliente">Nombre del cliente</label>
                <input type="text" name="cliente" id="cliente" placeholder="Suministrado por el sistema">
              </div>

              <div class="columns large-2">
                <label for="empresa">Empresa</label>
                <input type="text" name="empresa" id="empresa" placeholder="Suministrado por el sistema">
              </div>
          </div>

          <div class="row">
            <div class="columns large-2">
              <label for="ext_tel">Extension telefonica</label>
              <input type="text" name="ext_tel" id="ext_tel"  pattern="[0-9]+$" placeholder="Suministrado por el sistema">
            </div>

            <div class="columns large-2">
              <input type="hidden" name="usuario2" id="usuario2"  placeholder="Suministrado por el sistema" >
            </div>

            <div class="columns large-5">
                <label for="departamento">Departamento</label>
                <input type="text" name="departamento" id="departamento" placeholder="Suministrado por el sistema">
            </div>
            
            <div class="columns large-5">
                <label for="cargo">Cargo</label>
                <input type="text" name="cargo" id="cargo" placeholder="Suministrado por el sistema">
            </div>
          </div>
        
           <div class="row">
            <div class="columns large-2">
              <label for="ingresar_cliente">&nbsp;</label>
              <input type="button" name="ingresar_cliente" id="ingresar_cliente" value="Ingresar cliente" class="button">
            </div>

            <div class="columns large-2">
              <label for="modificar_cliente">&nbsp;</label>
              <input type="button" name="modificar_cliente" id="modificar_cliente" value="Modificar cliente" class="button">
            </div>

            <div class="columns large-2">
              <label for="limpiar_forma">&nbsp;</label>
              <input type="submit" href="cliente-form_ingresar_cliente.php" name="limpiar_forma" id="limpiar_forma" value="Consultar otro cliente" class="button">
            </div>
          </div>
      </form>
    </div>
  </div>
  </script>
  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/cliente.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>