<?php 
	require_once('config.php');
	require_once('adodb5/adodb.inc.php');
	try 
	{
	   $con = ADONewConnection('mysql');
	   $con->debug=false;
	   $con->PConnect($server,$username,$password,$database);
	   $con->SetFetchMode(ADODB_FETCH_ASSOC);
	   $query = "SELECT * FROM tipos_equipo ORDER BY tip_descripcion";
	   $rs=$con->Execute($query);
	   $i=0;
	   while(!$rs->EOF)
	   {
	   	$tipos[$i] = array('id'=>$rs->fields['tip_id'],'tipo'=>$rs->fields['tip_descripcion']);
	   	$rs->MoveNext();
	   	$i++;
	   }
	   $con->Close();
	   echo json_encode($tipos);
	}catch (Exception $e) 
	{
		echo $e;
	}
?>