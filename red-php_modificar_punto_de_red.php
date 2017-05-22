 <?php
     include('config.php');
      header('Content-Type: application/json');

      $conexion = mysql_connect($server,$username,$password);
      mysql_set_charset('utf8',$conexion);
      mysql_select_db($database);

            $sw_id = $_POST['sw_id'];
            $bit_sw_id = $_POST['bit_sw_id'];
            $dir_ip_sw = $_POST['dir_ip_sw'];
            $puerto_sw = strtoupper($_POST['puerto_sw']);
            $vlan_puerto_sw = $_POST['vlan_puerto_sw'];
            $punto_de_red = strtoupper($_POST['punto_de_red']);
            $punto_de_red_actual = strtoupper($_POST['punto_de_red_actual']);
            $estado_puerto_sw = strtoupper($_POST['estado_puerto_sw']);
            $bloque = strtoupper($_POST['bloque']);
            $piso = strtoupper($_POST['piso']);
            $cubiculo = strtoupper($_POST['cubiculo']);
            $estado_punto_de_red = strtoupper($_POST['estado_punto_de_red']);
            $color_toma = strtoupper($_POST['color_toma']);
            $categoria_punto_de_red = strtoupper($_POST['categoria_punto_de_red']);
            $tipo_de_punto_de_red = strtoupper($_POST['tipo_de_punto_de_red']);

            $query = "UPDATE bitacora_switches SET vlan='$vlan_puerto_sw',  punto_de_red='$punto_de_red_actual', estado_puerto_sw='$estado_puerto_sw' WHERE bit_sw_id='$bit_sw_id' ";
            $resultado = mysql_query($query,$conexion);

            $query = "UPDATE puntos_de_red SET bloque='$bloque', piso='$piso', cubiculo='$cubiculo', estado_punto_de_red='$estado_punto_de_red', tipo_de_punto_de_red='$tipo_de_punto_de_red', categoria_punto_de_red='$categoria_punto_de_red' , color_toma='$color_toma' WHERE punto_de_red='$punto_de_red' ";
            $resultado2 = mysql_query($query,$conexion);


            if(mysql_affected_rows()>0){
                  echo "1";
            }
            else{
                  echo "2";
            }

            mysql_close($conexion);
?>