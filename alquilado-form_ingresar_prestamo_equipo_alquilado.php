<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>

 <!-- ******************************************** INFORMACION DEL USUARIO QUE PRESTA LAS LLAVES ************************************** -->
          <div class="row">
            <h4> Informacion del Equipo alquilado a prestar (Pc - Monitor - Impresora - Scanner)</h4>
            <select name="seleccionar_equipo_soporte" id="seleccionar_equipo_soporte">
                <option selected="selected">-----Seleccionar Activo------</option>
                <?php
                  include_once("config.php");
                  $conexion = mysql_connect($server,$username,$password);
                  mysql_set_charset('utf8',$conexion);
                  mysql_select_db($database);
                  $id = $_POST['id'];
                  //$sql=mysql_query("select id,data from data where weight='1'");
                  $query = "SELECT * FROM alquilados WHERE estado_equipo = 'SOPORTE' AND tipo_equipo != 'SWITCH' ORDER BY activo_equipo ASC  ";
                  $resultado = mysql_query($query,$conexion);
                  $numero_de_filas = mysql_num_rows($resultado);
                  //$registro=mysql_fetch_array($resultado);//// no se coloca
                  while($registro=mysql_fetch_array($resultado))
                  {
                    $id=$registro['id'];
                    $activo_equipo=$registro['activo_equipo'];
                    $tipo_equipo=$registro['tipo_equipo'];
                    $marca_equipo=$registro['marca_equipo'];
                    $modelo_equipo=$registro['modelo_equipo'];
                    $serial_equipo=$registro['serial_equipo'];
                    $f_compra=$registro['f_compra'];
                    $bodega_actual=$registro['bodega_actual'];

                  echo '<option value="'.$id.'">'." Activo: ".''.$activo_equipo.''." - ".''." Tipo: ".''.$tipo_equipo.''." - ".''." Marca: ".''.$marca_equipo.''." - ".''." Modelo: ".''.$modelo_equipo.''." - ".''." Fecha Compra: ".''.$f_compra.''." - ".''."Bodega: ".''.$bodega_actual.'</option>';
                  echo "$id";
                  // echo '<option value="'.$id.'">'.$correo.'</option>';
                  }
                ?>
            </select> <br/><br/>
          </div>

          <div class="columns large-2">
              <input type="hidden" name="activo_equipo" id="activo_equipo" placeholder="Activo equipo">
              <input type="hidden" name="tipo_equipo" id="tipo_equipo" placeholder="Activo equipo">
              <input type="hidden" name="marca_equipo" id="marca_equipo" placeholder="Activo equipo">
              <input type="hidden" name="modelo_equipo" id="modelo_equipo" placeholder="Activo equipo">
              <input type="hidden" name="serial_equipo" id="serial_equipo" placeholder="Activo equipo">
          </div>



          <div class="row">
            <div class="columns large-2">
                <label for="activo_danado">Activo Dañado</label>
                <input type="text" name="activo_danado" id="activo_danado" placeholder="Obligatorio Activo Dañado">
              </div>

              <div class="columns large-2">
                <label for="ot_sigma">Ot Aranda</label>
                <input type="text" name="ot_sigma" id="ot_sigma" placeholder="Obligatorio Ot Sigma">
              </div>

              <div class="columns large-2">
                <label for="bloque">Bloque</label>
                <input type="text" name="bloque" id="bloque" placeholder="Obligatorio Bloque">
              </div>

              <div class="columns large-3">
                <label for="piso">Piso</label>
                <input type="text" name="piso" id="piso" placeholder="Obligatorio Piso">
              </div>

              <div class="columns large-3">
                <label for="cubiculo">Cubiculo</label>
                <input type="text" name="cubiculo" id="cubiculo" placeholder="Obligatorio Cubiculo">
              </div>
          </div>


          <div class="row">
              <div class="columns large-4">
                <label for="departamento">Departamento</label>
                <input type="text" name="departamento" id="departamento" value="" placeholder="Suministrado por el sistema">
              </div>

              <div class="columns large-8">
                <label for="seleccionar_correo_usuario_equipo">Email</label>
                <select name="seleccionar_correo_usuario_equipo" id="seleccionar_correo_usuario_equipo">
                  <option selected="selected">----- Seleccionar E-mail ------</option>
                  <?php
                    include_once("config.php");
                    $conexion = mysql_connect($server,$username,$password);
                    mysql_set_charset('utf8',$conexion);
                    mysql_select_db($database);
                     //$sw_id     = $_POST['sw_id'];
                     // $dir_ip_sw = $_POST['dir_ip_sw'];
                    //  $unidad    = $_POST['unidad'];
                    $query = "SELECT id_correo, nombres, area, cargo, ext, correo FROM correo ORDER BY nombres ";

                    $resultado = mysql_query($query,$conexion);
                    $numero_de_filas = mysql_num_rows($resultado);
                    while($registro=mysql_fetch_array($resultado))
                    {
                      $id_correo          = $registro['id_correo'];
                      $nombres            = $registro['nombres'];
                      $cargo              = $registro['cargo'];
                      $ext                = $registro['ext'];
                      $correo             = $registro['correo'];

                      echo '<option value="'.$id_correo.'">'.$nombres.''." - ".''.$cargo.''." - ".''.$ext.''." ".''." - correo: ".''.$correo.'</option>';
                    }
                  ?>
                </select> <br/><br/>
              </div>


          </div>


          <div class="row">

            <div class="columns large-4">
                <label for="usuario_equipo">Usuario del equipo</label>
                <input type="text" name="usuario_equipo" id="usuario_equipo" placeholder="Suministrado por el sistema">
            </div>

            <div class="columns large-4">
                <label for="email_usuario">Email Usuario</label>
                <input type="text" name="email_usuario" id="email_usuario" value="" placeholder="Suministrado por el sistema">
            </div>

             <div class="columns large-2">
                <label for="ext_tel">Extension telefonica</label>
                <input type="text" name="ext_tel" id="ext_tel"  pattern="[0-9]+$" placeholder="Obligatorio Ext">
            </div>
          </div>

          <div class="row">
            <div class="columns large-4">
              <label for="usuario_tecnico">Tecnico que atiende el servicio</label>
              <input type="text" name="usuario_tecnico" id="usuario_tecnico"  placeholder="Obligatorio Tecnico">
            </div>

            <div class="columns large-4">
              <label for="email_usuario_tecnico">Email tecnico que atiende el servicio</label>
              <input type="text" name="email_usuario_tecnico" id="email_usuario_tecnico"  placeholder="Obligatorio Tecnico">
            </div>

           <div class="columns large-4">
              <label for="usuario_que_presta_soporte">Tecnico responsable de la bodega</label>
              <input type="text" name="usuario_que_presta_soporte" disabled value="<?php echo $_SESSION['nombre'];?>" id="usuario_que_presta_soporte"  placeholder="Suministrado por el sistema">
            </div>
          </div>

          <div class="row">
            <div class="columns large-12">
              <label for="observaciones">Observaciones </label>
              <input type="text" name="observaciones" id="observaciones" value="">
            </div>
          </div>

<!-- ******************************************** INFORMACION DE FECHA DE ENTREGA DE LAS LLAVES ************************************************** -->

          <div class="row">
            <h4>Información fecha de entrega y fecha limite.</h4>
            <div class="columns large-4">
              <label for="f_prestamo">Fecha de prestamo (dd/mm/aaaa)</label>
              <input type="date" name="f_prestamo" id="f_prestamo" placeholder="Obligatorio fecha ">
            </div>

            <div class="columns large-4">
              <label for="f_limite">Fecha limite de prestamo (dd/mm/aaaa)</label>
              <input type="date" name="f_limite" id="f_limite" placeholder="Obligatorio fecha ">
            </div>

            <div class="columns large-4">
              <input type="hidden" name="aaa" id="aaa" placeholder="Obligatorio fecha ">
            </div>
          </div>
<!-- ******************************************** FIN DE INFORMACION DE FECHA DE ENTREGA DE LAS LLAVES ****************************** -->
<!-- ********************************************************** BOTONES ************************************************************* -->
        <div class="row">
          <div class="columns large-2">
            <label for="soporte_ingresar_prestamo_soporte">&nbsp;</label>
            <input type="button" name="soporte_ingresar_prestamo_equipo_soporte" id="soporte_ingresar_prestamo_equipo_soporte" value="Ingresar Prestamo" class="button">
          </div>

          <div class="columns large-2">
            <label for="limpiar_forma">&nbsp;</label>
            <input type="submit" href="soporte-form_ingresar_prestamo_equipo_soporte.php" name="limpiar_forma" id="limpiar_forma" value="Nuevo prestamo" class="button">
          </div>
        </div>
<!-- *******************************************************FIN BOTONES ************************************************************* -->

        </form>
    </div>
  </div>

  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/alquilado.js"></script>
  <script src="js/correo.js"></script>
  <script>
//    $(document).foundation();
  </script>
</body>
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/ >
<script src="js/jquery.js"></script>
<script src="js/jquery.datetimepicker.js"></script>
<script>jQuery('.datetimepicker').datetimepicker();</script>

</html>