<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>

<!--  ********************************************************* CUADRO INFORMACION  DEL CENTRO DE CABLEADPO ************************************* -->
      <form method="post" action="">
 <!-- ##  *************************************************** FIN DE INFORMACION DEL CENTRO DE CABLEADO ************************************* -->

 <!-- ******************************************** INFORMACION DEL USUARIO QUE PRESTA LAS LLAVES ************************************** -->


          <div class="row">
            <h4> Centro de Cableado</h4>
            <select name="seleccionar_c_cableado" id="seleccionar_c_cableado">
                <option selected="selected">-----Seleccionar Centro de Cableado------</option>
                <?php
                  include_once("config.php");
                  $conexion = mysql_connect($server,$username,$password);
                  mysql_set_charset('utf8',$conexion);
                  mysql_select_db($database);
                  $id_cc = $_POST['id_cc'];
                  $query = "SELECT * FROM c_cableados ORDER BY nro_cc ASC  ";
                  $resultado = mysql_query($query,$conexion);
                  $numero_de_filas = mysql_num_rows($resultado);
                  //$registro=mysql_fetch_array($resultado);//// no se coloca
                  while($registro=mysql_fetch_array($resultado))
                  {
                    $id_cc=$registro['id_cc'];
                    $nro_cc=$registro['nro_cc'];
                    $descripcion_cc=$registro['descripcion_cc'];
                    $ubicacion_cc=$registro['ubicacion_cc'];

                  echo '<option value="'.$id_cc.'">'.$descripcion_cc.''." - ".''.$ubicacion_cc.'</option>';
                  echo "$id_cc";
                  // echo '<option value="'.$id.'">'.$correo.'</option>';
                  }
                ?>
            </select> <br/><br/>

          </div>

           <div class="row">
            <div class="columns large-3">
              <input type="button" name="consulta_switches_en_c_cableado" id="consulta_switches_en_c_cableado" value="Consultar Switches" class="button">
            </div>

            <div class="columns large-4">
              <input type="hidden" name="nro_cc" id="nro_cc" placeholder="Suministrado por el sistema">
            </div>

            <div class="columns large-4">

              <input type="hidden" name="descripcion_cc" id="descripcion_cc" placeholder="Suministrado por el sistema">
            </div>

            <div class="columns large-5">

              <input type="hidden" name="ubicacion_cc" id="ubicacion_cc" placeholder="Suministrado por el sistema">
            </div>
          </div>

          <div class="row">
            <h4> Centro de Cableado</h4>
            <select name="seleccionar_switches" id="seleccionar_switches">
                <option selected="selected">-----Seleccionar Centro de Cableado------</option>
                <?php
                  include_once("config.php");
                  $conexion = mysql_connect($server,$username,$password);
                  mysql_set_charset('utf8',$conexion);
                  mysql_select_db($database);
                  $nro_cc = $_POST['nro_cc'];
                  $query = "SELECT * FROM switches WHERE switches.nro_cc = '$nro_cc' ORDER BY nro_cc ASC  ";
                  $resultado = mysql_query($query,$conexion);
                  $numero_de_filas = mysql_num_rows($resultado);
                  //$registro=mysql_fetch_array($resultado);//// no se coloca
                  while($registro=mysql_fetch_array($resultado))
                  {
                    $sw_id=$registro['sw_id'];
                    $nro_cc=$registro['nro_cc'];
                    $dir_ip_sw=$registro['dir_ip_sw'];
                    $unidad=$registro['unidad'];

                  echo '<option value="'.$sw_id.'">'.$dir_ip_sw.''." - ".''.$unidad.'</option>';
                  echo "$sw_id";
                  // echo '<option value="'.$id.'">'.$correo.'</option>';
                  }
                ?>
            </select> <br/><br/>

          </div>

<!-- ********************************************************** BOTONES ************************************************************* -->
        <div class="row">
          <div class="columns large-2">
            <label for="ingresar_prestamo_llaves">&nbsp;</label>
            <input type="button" name="ingresar_prestamo_llaves" id="ingresar_prestamo_llaves" value="Ingresar Prestamo" class="button">
          </div>

          <div class="columns large-2">
            <label for="limpiar_forma">&nbsp;</label>
            <input type="submit" href="llaves-form_ingresar_prestamo.php" name="limpiar_forma" id="limpiar_forma" value="Nuevo prestamo" class="button">
          </div>
        </div>
<!-- *******************************************************FIN BOTONES ************************************************************* -->

        </form>
    </div>
  </div>

  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/c_cableado.js"></script>
  <script src="js/cliente.js"></script>
  <script src="js/switches.js"></script>
  <script>
//    $(document).foundation();
  </script>
</body>
<link rel="stylesheet" type="text/css" href="css/jquery.datetimepicker.css"/ >
<script src="js/jquery.js"></script>
<script src="js/jquery.datetimepicker.js"></script>
<script>jQuery('.datetimepicker').datetimepicker();</script>