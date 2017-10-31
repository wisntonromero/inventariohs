<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>
      <form method="post" action="">
          <div class="row">
            <h4> Informacion del Usuario</h4>
              <div class="columns large-4">
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario" placeholder="Digitar usuario">
              </div>            
     
              <div class="columns large-8">
                <label for="consultar_usuario">Consultar</label>
                 <input type="button" name="consultar_usuario" id="consultar_usuario" value="Consultar" class="button">
              </div>
          </div>

          <div class="row">
              <div class="columns large-4">
                <label for="contrasena">Contraseña</label>
                <input type="password" name="contrasena" id="contrasena" type="password" placeholder="Digitar constraseña">
         
                <label for="contrasena2">Repetir contraseña</label>
                <input type="password" name="contrasena2" id="contrasena2" type="password" placeholder="Repetir contraseña">
              </div>
          </div>

          <div class="row">
              <div class="columns large-2">
                <label for="nivel">Nivel</label>
                <input type="text" name="nivel" id="nivel" placeholder="Nivel del usuario">
              </div>

              <div class="columns large-5">
                <label for="nombre">Nombre del usuario</label>
                <input type="text" name="nombre" id="nombre" placeholder="Nombre del usuario">
              </div>

              <div class="columns large-5">
                <label for="correo">Correo</label>
                <input type="text" name="correo" id="correo" placeholder="Correo usuario">
              </div>
          </div>

          <div class="row">
            <div class="columns large-5">
                <label for="departamento">Departamento</label>
                <input type="text" name="departamento" id="departamento" placeholder="Departamento del usuario">
            </div>
            
            <div class="columns large-5">
                <label for="cargo">Cargo</label>
                <input type="text" name="cargo" id="cargo" placeholder="Cargo del usuario">
            </div>

            <div class="columns large-2">
              <label for="ext_tel">Extension telefonica</label>
              <input type="text" name="ext_tel" id="ext_tel"  pattern="[0-9]+$" placeholder="Extension telefonica">
            </div>

          </div>

          <div class="row">           
              <div class="columns large-12">
                <label for="ubicacion_foto">Foto usuario</label>
                <input type="text" name="ubicacion_foto" id="ubicacion_foto" placeholder="Ruta foto usuario">
              </div>
           </div>

          <div class="row">
            <div class="columns large-2">
              <label for="ingresar_usuario">&nbsp;</label>
              <input type="button" name="ingresar_usuario" id="ingresar_usuario" value="Ingresar usuario" class="button">
            </div>

            <div class="columns large-2">
              <label for="modificar_usuario">&nbsp;</label>
              <input type="button" name="modificar_usuario" id="modificar_usuario" value="Modificar usuario" class="button">
            </div>

            <div class="columns large-2">
              <label for="limpiar_forma">&nbsp;</label>
              <input type="submit" href="usuario-form_ingresar_usuario.php" name="limpiar_forma" id="limpiar_forma" value="Consultar otro usuario" class="button">
            </div>
          </div>
      </form>
    </div>
  </div>
  </script>
  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/usuario.js"></script>
  <script>
    $(document).foundation();
  </script>
</body>
</html>