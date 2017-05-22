
<? 
//$ip=$_SERVER['REMOTE_ADDR'];

//echo $ip2=$_SERVER['SERVER_ADDR'];

//client IP addresse 
//$ip=getenv("REMOTE_ADDR"); 
$ip="172.16.65.33";

//client mac addresse  
echo" 
IP-Adresse:$ip<br> 
MAC-Adress:"; 
//$cmd = "arp -n $ip | grep $ip | awk '{ print $3 }'"; 
$cmd = "arp -n $ip "; 
$ma=system($cmd); 


$rest = substr($ma, -28,3);    // devuelve "f"
$rest2 = substr($ma, -31,2);    // devuelve "f"
$rest3 = substr($ma, -34,2);    // devuelve "f"
$rest4 = substr($ma, -37,2);    // devuelve "f"
$rest5 = substr($ma, -40,2);    // devuelve "f"
$rest6 = substr($ma, -43,2);    // devuelve "f"

$valor= trim(strlen($rest)) ;


$total= $rest6."-".$rest5."-".$rest4."-".$rest3."-".$rest2."-".$rest;
echo "";
echo $total;
echo $valor;
echo $rest;
//echo $rest7 = substr($ma, -28,28);
?>

