
      
<?php
   
    $conexion = mysql_connect("localhost","root","root");
    mysql_select_db("inventario", $conexion); // Select the database
   
    mysql_query ("INSERT INTO arduino_bitacora('id_usuario') VALUES ('".$_GET["id_usuario"]."')",$conexion); 
  //mysql_query =("INSERT INTO arduino_bitacora(id_usuario, fecha_hora, permiso) VALUES ('".$_GET["id_usuario"]."',now(), '".$_GET["permiso"]."')";  
      
   
?>
 
