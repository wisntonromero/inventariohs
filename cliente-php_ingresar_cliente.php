<?php
    include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_select_db($database);

        $correo = $_POST['correo'];
        $empresa = $_POST['empresa'];
        $departamento = $_POST['departamento'];
        $cargo = strtoupper($_POST['cargo']);
        $cliente = strtoupper($_POST['cliente']);
        $ext_tel = $_POST['ext_tel'];

        $query = "INSERT INTO clientes(correo, empresa, departamento, cargo, cliente, ext_tel) 
        VALUES ('$correo', '$empresa', '$departamento', '$cargo', '$cliente', '$ext_tel') ";
        
        $resultado = mysql_query($query,$conexion);
        
        if(mysql_affected_rows()>0){
            echo "1";
        }
        else{
            echo "2";
        }
        mysql_close($conexion);
?>

 