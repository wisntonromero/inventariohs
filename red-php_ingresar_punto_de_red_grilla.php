<?php
 
/*
 * 
 * http://editablegrid.net
 *
 * Copyright (c) 2011 Webismymind SPRL
 * Dual licensed under the MIT or GPL Version 2 licenses.
 * http://editablegrid.net/license
 */
      
require_once('config_inventario.php');         

// Database connection                                   
$mysqli = mysqli_init();
$mysqli->options(MYSQLI_OPT_CONNECT_TIMEOUT, 5);
$mysqli->real_connect($config['db_host'],$config['db_user'],$config['db_password'],$config['db_name']); 

// Get all parameter provided by the javascript
$punto_de_red = $mysqli->real_escape_string(strip_tags($_POST['punto_de_red']));
$bloque = $mysqli->real_escape_string(strip_tags($_POST['bloque']));
$piso = $mysqli->real_escape_string(strip_tags($_POST['piso']));
$cubiculo = $mysqli->real_escape_string(strip_tags($_POST['cubiculo']));
$tipo_de_punto_de_red = $mysqli->real_escape_string(strip_tags($_POST['tipo_de_punto_de_red']));
$tablename = $mysqli->real_escape_string(strip_tags($_POST['tablename']));

$return=false;
if ( $stmt = $mysqli->prepare("INSERT INTO ".$tablename."  (punto_de_red, bloque, piso,cubiculo, tipo_de_punto_de_red) VALUES (  ?, ?, ?, ?, ?)")) {

	$stmt->bind_param("sss", $punto_de_red, $bloque, $piso, $cubiculo, $tipo_de_punto_de_red);
    $return = $stmt->execute();
	$stmt->close();
}             
$mysqli->close();        

echo $return ? "ok" : "error";