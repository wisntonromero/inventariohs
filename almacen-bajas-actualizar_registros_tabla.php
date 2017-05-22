
<?php
	//include connection file 
	include_once("connection.php");
	
	//define index of column
	$columns = array(
		0 => 'item', 
		1 => 'solicitud',
		2 => 'activo',
		3 => 'recibido_almacen',
		4 => 'observaciones',
	);
	$error = false;
	$colVal = '';
	$colIndex = $rowId = 0;
	
	$msg = array('status' => !$error, 'msg' => 'Failed! updation in mysql');


	if(isset($_POST)){
    
	    if(isset($_POST['val']) && !empty($_POST['val']) && !$error) {
	      $colVal = $_POST['val'];
	      $error = false;
	    } else {
	      $error = true;
	    }

	    if(isset($_POST['index']) && $_POST['index'] >= 0 &&  !$error) {
	      $colIndex = $_POST['index'];
	      $error = false;
	    } else {
	      $error = true;
	    }
	   
	    if(isset($_POST['id']) && $_POST['id'] > 0 && !$error) {
	      $rowId = $_POST['id'];
	      $error = false;
	    } else {
	      $error = true;
	    }
		
	    
		if(!$error) {
			$query = "UPDATE bajas_reubicaciones_detalle SET ".$columns[$colIndex]." = '".ltrim(rtrim($colVal))."' WHERE id='".$rowId."'";
			$status = mysqli_query($conexion,$query) or die("database error:". mysqli_error($conexion));
			
		 	    //	$query = "UPDATE bajas_reubicaciones_detalle SET ".$columns[$colIndex]." = '".$colVal."' WHERE id='".$rowId."'";
		//	$status = mysqli_query($conexion,$query) or die("database error:". mysqli_error($conexion));	

			$query = "UPDATE bajas_reubicaciones_detalle SET f_recibido = NOW() WHERE id='$rowId'";
			$status2 = mysqli_query($conexion,$query) or die("database error:". mysqli_error($conexion));

			
			$msg = array('error' => $error, 'msg' => 'Registro Actualizado en la base de datos');
			//$msg = array('error' => $error, 'msg' => ' ');
		} 
		else {
			$msg = array('error' => $error, 'msg' => 'Error! No se actualizo el resgitro en la mase de datos');
		}

		if(ltrim(rtrim($colVal)) == 'SI') {
	  		$query = "UPDATE bajas_reubicaciones_detalle SET observaciones = 'RECIBIDO A SATISFACCION' WHERE id='".$rowId."'";
			$status3 = mysqli_query($conexion,$query) or die("database error:". mysqli_error($conexion));
		}
		if(ltrim(rtrim($colVal)) == 'NO' and $column[4] == "") {
			$query = "UPDATE bajas_reubicaciones_detalle SET observaciones = '' WHERE id='".$rowId."'";
			$status4 = mysqli_query($conexion,$query) or die("database error:". mysqli_error($conexion));
	  		$msg = array('error' => $error, 'msg' => 'DEBES COLOCAR UNA OBSERVACION DE POR QUE NO RECIBES EL EQUIPO ');

	  	}

	}
	// send data as json format
	echo json_encode($msg);
	


?>

 
