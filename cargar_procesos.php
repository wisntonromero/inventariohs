<?php 
	require_once('config.php');
	require_once('adodb5/adodb.inc.php');
	try 
	{
	   $con = ADONewConnection('mysql');
	   $con->debug=false;
	   $con->PConnect($server,$username,$password,$database);
	   $con->SetFetchMode(ADODB_FETCH_ASSOC);
	   $query = "SELECT * FROM procesos ORDER BY pro_descripcion";
	   $rs=$con->Execute($query);
	   $i=0;
	   while(!$rs->EOF)
	   {
	   	$proceso[$i] = array('id'=>$rs->fields['pro_id'],'proceso'=>utf8_encode($rs->fields['pro_descripcion']));
	   	$rs->MoveNext();
	   	$i++;
	   }
	   $con->Close();
	   echo json_encode($proceso);
	}catch (Exception $e) 
	{
		echo $e;
	}
?>