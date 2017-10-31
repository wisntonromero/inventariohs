<?php
    include('config.php');
    require_once('sesion.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $nro_cc                 = $_POST['nro_cc'];
    $letra_pp               = $_POST['letra_pp'];
    $nro_inicial            = $_POST['nro_inicial'];
    $nro_final              = $_POST['nro_final'];
    $bloque                 = $_POST['bloque'];
    $piso                   = $_POST['piso'];
    $cubiculo               = $_POST['cubiculo'];
    $tipo_de_punto_de_red   = $_POST['tipo_de_punto_de_red'];
    $categoria_punto_de_red = $_POST['categoria_punto_de_red'];
    $color_toma             = $_POST['color_toma'];
    $estado_punto_de_red    = $_POST['estado_punto_de_red'];
    $nro_cc_letra_pp        = $_POST['nro_cc'] . $_POST['letra_pp'];
    //$punto_de_red="";

    for($x = $_POST['nro_inicial']; $x <= $_POST['nro_final'] ; $x++)
        if(isset($_POST["nro_inicial"])) {
            if($x <=9){
               $punto_de_red = "";
               $punto_de_red = $nro_cc_letra_pp;
               $punto_de_red = $punto_de_red . '0'. $x; ;
            }
            else{
               $punto_de_red = "";
               $punto_de_red = $nro_cc_letra_pp;
               $punto_de_red = $punto_de_red . $x;
                //$nro_inicial++;
            }
            $query  = "INSERT INTO puntos_de_red(punto_de_red, bloque, piso, cubiculo, tipo_de_punto_de_red, categoria_punto_de_red, color_toma, estado_punto_de_red)
            VALUES('$punto_de_red', '$bloque', '$piso', '$cubiculo', '$tipo_de_punto_de_red', '$categoria_punto_de_red', '$color_toma', '$estado_punto_de_red')" or die("Error in the consult.." . mysqli_error($query));
            $resultado = mysql_query($query,$conexion);
        }
    if(mysql_affected_rows()>0){
        echo "1";
        //echo "location.href = compras-form_modificar_estado_de_equipos_por_lotes.php";
    }
    else{
        echo "2";
    }
    mysql_close($conexion);
?>

