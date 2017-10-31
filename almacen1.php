<!doctype html>
<html class="no-js" lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <title>Almacen bajas</title>
        <link rel="shortcut icon" href="uninorte.ico" type="image/x-icon"/>
        <link rel="stylesheet" href="css/foundation.css" />
        <script src="js/jquery.js" type="text/javascript"></script>
        <script src="js/vendor/modernizr.js"></script>
    </head>
    <body>

        <div class="row">
          <h4>Información de los equipos que se van a dar de baja</h4>
          
          <div class="columns large-4">
                <label for="solicitudes_bajas">Solicitudes pendientes para dar de baja.</label>
                <select name="seleccionar_solicitud" id="seleccionar_solicitud">
                      <option selected="selected">----Seleccionar solicitud para de baja----</option>
                      <?php
                        include_once("config.php");
                          $conexion   = mysql_connect($server,$username,$password);
                          mysql_set_charset('utf8',$conexion);
                          mysql_select_db($database);

                          $id         = $_POST['id'];
                          $solicitud  = $_POST['solicitud'];
                          

                        $query = "SELECT id,solicitud FROM bajas_reubicaciones_almacen WHERE f_cierre = '0000-00-00' and estado2 ='' ORDER BY solicitud ASC  ";

                        $resultado = mysql_query($query,$conexion);
                        $numero_de_filas = mysql_num_rows($resultado);
                        while($registro=mysql_fetch_array($resultado))
                        {
                          $id         = $registro['id'];
                          $solicitud  = $registro['solicitud'];

                          echo '<option value="'.$id.'">'.$solicitud.'</option>';
                          
                      }
                    ?>
                  </select> <br/><br/>
            </div>

            <div class="columns large-2">
                <input type="hidden" name="id" id="id" value="" placeholder="">
            </div>
            <div class="columns large-2">
                <input type="hidden" name="solicitud" id="solicitud" value="" placeholder="">
            </div>
        </div>
        

        <?php
        //tomamos los datos del archivo conexion.php
        include('config.php');
            header('Content-Type: application/json');

            $conexion = mysql_connect($server,$username,$password);
            mysql_set_charset('utf8',$conexion);
            mysql_select_db($database);

            //se envia la consulta
            $query = "SELECT  (@numero:=@numero+1) AS item, solicitud, activo, recibido_almacen,f_recibido,observaciones FROM (SELECT @numero:=0) r, bajas_reubicaciones_detalle WHERE solicitud = 4 and recibido_almacen ='' and f_recibido = '0000-00-00' ORDER BY solicitud ASC";
                   
            $resultado = mysql_query($query,$conexion);

            $numero_de_filas = mysql_num_rows($resultado);

        
            //se despliega el resultado
            echo "<table class='data-table' border='1'>";
            echo "<tr>";
            echo "<th>Item</th>";
            echo "<th>Solicitud</th>";
            echo "<th>Activo</th>";
            echo "<th>Recibido almacen?</th>";
            echo "<th>Observaciones</th>";
            echo "</tr>";


            while($row = mysql_fetch_array($resultado)){   
                echo "<tr>";
                echo "<td>" . $row['item'] . "</td>";
                echo "<td>" . $row['solicitud'] . "</td>";
                echo "<td>" . $row['activo'] . "</td>";
                  
                echo "<td width='150' align='center'>" . $row['recibido_almacen'] . "<input type='checkbox' value='SI'> Si  </td>";
                echo "<td>" . "<input type='text' id='llenar_observaciones' style='width:300px;height:40px' value='RECIBIDO A SATISFACCIÓN' </td>"; 
                echo "</tr>";
            }
                echo "</table>";
                mysql_close($conexion);
        ?>

        <div class="row">
            <div class="columns large-4">
                <input type="button" name="consultar_equipos_de_baja_por_pantalla" id="consultar_equipos_de_baja_por_pantalla" value="Consultar solicitud " class="button">
            </div>
        </div>
    </body>
</html>

