
<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>

  <!--  ********************************************************* inicio  ************************************* -->
  <!-- <form method="post" action="almacen-php_enviar_mail_equipos_bajas.php" enctype="multipart/form-data">  -->
      <form method="post" action="almacen-bajas-php-enviar_mail_equipos_bajas.php" enctype="multipart/form-data"> 
            <div class="row">
             <div class="texto1 info">Estas en : Ingresar baja</div>
              <h4>Envio de equipos al almacen - Equipos de baja</h4>
              
              <div class="columns large-3">
                <label for="solicitud">Nro de solicitud</label>
                
                <?php
                  include_once("config.php");
                  $conexion = mysql_connect($server,$username,$password);
                  mysql_set_charset('utf8',$conexion);
                  mysql_select_db($database);
                 
                  $query = "SELECT solicitud FROM bajas_reubicaciones_almacen ORDER BY solicitud ";
                  
                  $resultado = mysql_query($query,$conexion);
                  $numero_de_filas = mysql_num_rows($resultado);
                  while($registro=mysql_fetch_array($resultado))
                  { 
                    $solicitud          = $registro['solicitud'];
                  } 
                ?>

                <input type="text" name="solicitud"  id="solicitud" value="<?php echo $solicitud+1;?>" style="font-family: Arial;  font-size: 20pt; color:red; text-transform:uppercase;";>

              </div>
                                                                                            
              <div class="columns large-2">
                <label for="baja">Tipo de proceso</label>
                <input type="text" name="baja"  id="baja" value="BAJA" style="font-family: Arial; font-size: 18pt"; readonly >            
              </div>

              <div class="columns large-3">
                <label for="f_registro">Fecha de registro (dd-mm-aaaa)</label>
                <input type="date" name="f_registro"  id="f_registro" value="<?php echo date("Y-m-d");?>" style="font-family: Arial; font-size: 18pt"; readonly > 
              </div>

            </div>
   <!-- ##  *************************************************** FIN ************************************* -->

   <!-- ******************************************** inicio ************************************** -->
            
            <div class="row">
              <div class="columns large-4">
                <label for="archivo_formato">Seleccionar archivo formato *.XLS </label>
                <input type="file" name="archivo_formato" id="archivo_formato"  placeholder="Archivo Zip">
              </div>

              <div class="columns large-12">
                <input type="hidden" name="usuario2" id="usuario2"  placeholder="Suministrado por el sistema" >
              </div>

              <div class="columns large-4">
                <label for="archivo_soporte">Seleccionar archivo soporte *.ZIP</label>
                <input type="file" name="archivo_soporte" id="archivo_soporte"  placeholder="Archivo Zip">
              </div>

              <div class="columns large-8">
                <input type="hidden" name="usuario2" id="usuario2"  placeholder="Suministrado por el sistema" >
              </div>                       
            </div>

            <div class="row">
              <div class="columns large-12">
                <label for="relacion_activos">Relacion de activos</label>
                <input type="text" name="relacion_activos" id="relacion_activos" placeholder="relacion de activos enviados al almacen separados por comas (,) - obligatorio" style="text-transform:uppercase;"">
              </div>
            </div>

            <div class="row">
              <div class="columns large-12">
                <label for="observaciones">observaciones</label>
                <input type="text" name="observaciones" id="observaciones" placeholder="observaciones - opcional" style="text-transform:uppercase;"">
              </div>
            </div>

  <!-- ##  *************************************************** FIN **************************************************** -->

    <!-- ********************************************************** BOTONES ************************************************************* -->          
            <div class="row">
              <div class="columns large-2">
                <label for="enviar_equipos_baja_almacen">&nbsp;</label>
              <!--  <input type="button" name="enviar_equipos_baja_almacen" id="enviar_equipos_baja_almacen" value="Enviar correo" class="button"> -->
             <input type="submit" value="Enviar"> 

              </div>
            </div>  

    <!-- *******************************************************FIN BOTONES ************************************************************* -->  

      </form>
      <script src="js/vendor/jquery.js"></script>
      <script src="js/foundation.min.js"></script>
      <script src="js/almacen_bajas.js"></script>
      <script src="js/jquery.js"></script>
   