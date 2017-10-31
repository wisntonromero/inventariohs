<?php 
    include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);
          
        $usuario = strtoupper($_POST['usuario']);
        $contrasena = base64_encode($_POST['contrasena']);
        $nivel = $_POST['nivel'];
        $nombre = ucwords($_POST['nombre']);
        $correo = $_POST['correo'];
        $departamento = ucwords($_POST['departamento']);
        $cargo = ucwords($_POST['cargo']);
        $ext_tel = strtoupper($_POST['ext_tel']);
        $ubicacion_foto = $_POST['ubicacion_foto'];

        $query = "UPDATE usuarios SET contrasena='$contrasena', nivel='$nivel', nombre='$nombre', correo='$correo', departamento='$departamento', cargo='$cargo', ext_tel='$ext_tel',  ubicacion_foto='$ubicacion_foto' WHERE usuario='$usuario'";
        
        $resultado = mysql_query($query,$conexion);
        
        if(mysql_affected_rows()>0){
            echo "1";
        }
        else{
            echo "2";
        }
        mysql_close($conexion);
?>