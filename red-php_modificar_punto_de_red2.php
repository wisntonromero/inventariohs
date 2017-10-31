 <?php
           include('config.php');
            header('Content-Type: application/json');

            $conexion = mysql_connect($server,$username,$password);
            mysql_set_charset('utf8',$conexion);
            mysql_select_db($database);

                  $punto_de_red = $_POST['punto_de_red'];
                  $dir_ip_sw = $_POST['dir_ip_sw'];
                  $sw_id      = $registro['sw_id'];
                  $unidad     = $registro['unidad'];
                  $puerto_sw = $_POST['puerto_sw'];
                  $vlan_puerto_sw = $_POST['vlan_puerto_sw'];
                  $bloque = $_POST['bloque'];
                  $piso = $_POST['piso'];
                  $cubiculo = $_POST['cubiculo'];

                  $query = "UPDATE puntos_de_red_importar INNER JOIN bitacora_switches ON puntos_de_red_importar.punto_de_red = bitacora_switches.punto_de_red SET  puntos_de_red_importar.bloque='$bloque', piso='$piso',cubiculo='$cubiculo' WHERE puntos_de_red_importar.punto_de_red='$punto_de_red' ";
                  $resultado = mysql_query($query,$conexion);

                  $query2 = "UPDATE bitacora_switches  SET  vlan='$vlan_puerto_sw', puerto_sw='$puerto_sw' WHERE bitacora_switches.punto_de_red='$punto_de_red' ";
                  $resultado2 = mysql_query($query2,$conexion);

                  $query3 = "UPDATE bitacora_switches INNER JOIN switches ON switches.sw_id = bitacora_switches.id_sw SET bitacora_switches.id_sw = '$sw_id' WHERE switches.sw_id = bitacora_switches.id_sw ";
                  $resultado3 = mysql_query($query3,$conexion);

                  if(mysql_affected_rows()>0){
                        echo "1";
                  }
                  else{
                        echo "2";
                  }

                  mysql_close($conexion);
?>