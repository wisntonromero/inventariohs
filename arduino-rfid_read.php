<?php
class rfid{
 public $link='';
 function __construct($allow, $id){
  $this->connect();
  $this->storeInDB($allow, $id);
 }
 
 function connect(){
  $this->link = mysql_connect('localhost','database_username','DB_PASSWARD') or die('Cannot connect to the DB');
  mysql_select_db('DATABASE_NAME') or die('Cannot select the DB');
 }
 
 function storeInDB($allow, $id){
  $query = "insert into rfid set rfid='".$id."', allow='".$allow."'";
  $result = mysql_query($query) or die('Errant query:  '.$query);
 }
 
}
if($_GET['allow'] != '' and $_GET['id'] != ''){
 $rfid=new rfid($_GET['allow'],$_GET['id']);
}
?>