<?php
      
    include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

        $activo_equipo = $_POST['activo_equipo'];
        $tipo_equipo = $_POST['tipo_equipo'];
        $marca_equipo = $_POST['marca_equipo'];
        $modelo_equipo = $_POST['modelo_equipo'];
        $activo_mon = $_POST['activo_mon'];
        $estado_equipo = $_POST['estado_equipo'];

        $dir_ip = $_POST['dir_ip'];
        $dir_mac = strtoupper($_POST['dir_mac']);
        $punto_de_red = strtoupper($_POST['punto_de_red']);
        $f_ult_actualiza = $_POST['f_ult_actualiza']; 
        
        $departamento = $_POST['departamento'];
        $responsable = strtoupper($_POST['responsable']);
        $usuario = strtoupper($_POST['usuario']);
        $ext_tel = $_POST['ext_tel'];
        $observaciones = $_POST['observaciones'];


        $query = "UPDATE hardware SET tipo_equipo='$tipo_equipo', marca_equipo='$marca_equipo', modelo_equipo='$modelo_equipo', activo_mon='$activo_mon', estado_equipo='$estado_equipo',
        dir_ip='$dir_ip', dir_mac='$dir_mac', punto_de_red='$punto_de_red', f_ult_actualiza='$f_ult_actualiza', departamento='$departamento', responsable='$responsable', usuario='$usuario', 
        ext_tel='$ext_tel', observaciones='$observaciones' WHERE activo_equipo='$activo_equipo'";
        $resultado = mysql_query($query,$conexion);
        
        if(mysql_affected_rows()>0){
            echo "1";
        }
        else{
            echo "2";
        }
       
        mysql_close($conexion);
?>