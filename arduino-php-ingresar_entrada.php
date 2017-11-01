
<!--      
<?php
   
  //  $conexion = mysql_connect("localhost","root","root");
  //  mysql_select_db("inventario", $conexion); // Select the database
   
  //  mysql_query ("INSERT INTO arduino_bitacora('id_usuario') VALUES ('".$_GET["id_usuario"]."')",$conexion); 
  //mysql_query =("INSERT INTO arduino_bitacora(id_usuario, fecha_hora, permiso) VALUES ('".$_GET["id_usuario"]."',now(), '".$_GET["permiso"]."')";  
      
   
?> -->
 

<?php
$parametro1=$_GET['parametro1'];
$parametro2=$_GET['parametro2'];
 
?>
 
<html>
<head>
</head>
<body>
  
</body>
<?php
echo "El Primer Parametro es :" . $parametro1 . "<br />";
echo "El Segundo Parametro es :" . $parametro2 . "<br />";

  $conexion = mysql_connect("localhost","root","root");
  mysql_select_db("inventario", $conexion); // Select the database
  mysql_query ("INSERT INTO arduino_bitacora('id_usuario') VALUES ('".$_GET["parametro1"]."')",$conexion); 
?>
