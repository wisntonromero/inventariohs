<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html>
    <head>
        <meta charset="utf-8" />
        <script type="text/javascript" src="resources/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="resources/functions.js"></script>
        <script type="text/javascript" src="js/soporte-functions.js"></script>
        <link rel="stylesheet" href="resources/style.css" />
        <link rel="stylesheet" href="css/foundation.css" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>SIPRED</title>    
    </head>

    <body>
        <div class="row">
            <div class="columns large-10">
              <h1>
                <img style="width: 203px; height: 146px margin: -55px -216px -112px -140px;" src="./images/jpg/logo.jpg" alt="Logo Universidad del Norte."/> 
              </h1>

            </div>

            <div class="columns large-2">
                <img style="width: 60px; height: 146px margin: -55px -216px -112px -140px;" src="<?php echo $_SESSION['ubicacion_foto'];  ?>">
                <?php echo $_SESSION['usuario'];?>
            </div>
        </div>
        <header style="text-align:center";> 
        <h4>SIPRED - SISTEMA DE INVENTARIO DE PUNTOS DE RED</h4>    
        </header>


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

  <script>
    $(document).foundation();
  </script>

</html>

