<?php
  include('config.php');
  header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

        $total              = count($_POST['solicitud']);   
        $id                 = $_POST['id'];
        $solicitud          = $_POST['solicitud'];
        $activo          = $_POST['activo'];
        $recibido_almacen   = strtoupper($_POST['recibido_almacen']);
        $observaciones      = strtoupper($_POST['observaciones']);    
//        $numero_de_filas    = $_POST['numero_de_filas']  
        echo " total: ", $total;
        echo " id: ", $id;
         echo " solicitud: ",$solicitud;
          echo " recibido almacen: ",$recibido_almacen;
           echo "observaciones: " ,$observaciones;
        for($i = 1; $i < 10; $i++){
            echo $id = $id[$i];
            echo $solicitud = $solicitud[$i];
            echo $recibido_almacen = $recibido_almacen[$i];
            echo $observaciones = $observaciones[$i];

            $query = "UPDATE bajas_reubicaciones_detalle SET recibido_almacen = '$recibido_almacen', f_recibido = now(), observaciones = '$observaciones'  WHERE id= '$id' and activo = '$activo'";  
            $resultado = mysql_query($query,$conexion);
        }  
        if(mysql_affected_rows()>0){
           echo "1";
        }
        else{
            echo "2";
        }
        mysql_close($conexion);
?>