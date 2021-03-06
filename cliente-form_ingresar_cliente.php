<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>
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