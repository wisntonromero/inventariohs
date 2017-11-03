<?php
    $conexion = mysql_connect("localhost","root","root");
    mysql_select_db("inventario",$conexion);
                     
    mysql_query("INSERT INTO `arduino`(`valor`) VALUES ('" . $_GET['valor'] . "')", $conexion);
 
?>