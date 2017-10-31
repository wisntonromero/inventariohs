 <?php 
 	include("config.php");
 	require_once('adodb5/adodb.inc.php');

	$con = ADONewConnection('mysql');
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

	$query = "SELECT * FROM estado ORDER BY est_descripcion";
	   $rs=$con->Execute($query);
	   $i=0;
	   while(!$rs->EOF)
	   {
	   	$estado[$i] = array('id'=>$rs->fields['est_id'],'estado'=>utf8_encode($rs->fields['est_descripcion']));
	   	$rs->MoveNext();
	   	$i++;
	   }

	$proceso += array('estado'=>$estado);
	echo json_encode($proceso);


?>