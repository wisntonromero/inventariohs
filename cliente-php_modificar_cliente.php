<?php 
    include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_select_db($database);

        $correo = $_POST['correo'];
        $empresa = $_POST['empresa'];
        $departamento = $_POST['departamento'];
        $cargo = $_POST['cargo'];
        $cliente = $_POST['cliente'];
        $ext_tel = $_POST['ext_tel'];

        $query = "UPDATE clientes SET empresa='$empresa', departamento='$departamento', cargo='$cargo', cliente='$cliente', ext_tel='$ext_tel' WHERE correo='$correo'";
        $resultado = mysql_query($query,$conexion);
        
        if(mysql_affected_rows()>0){
            echo "1";
        }
        else{
            echo "2";
        }
        mysql_close($conexion);
?>