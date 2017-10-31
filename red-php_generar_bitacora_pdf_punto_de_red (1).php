<?php
    include('config.php');
    require_once('class.ezpdf.php');
    error_reporting(0);

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $pdf = new Cezpdf('A4');
   // $pdf->selectFont('fonts/Helvetica.afm');

               $sql = "SELECT punto_de_red,dir_ip_sw,puerto_sw, vlan_puerto_sw,bloque,piso,cubiculo FROM puntos_de_red WHERE punto_de_red LIKE  '$20%' GROUP BY punto_de_red ASC "; 
               //$headings = array('PUNTO DE RED', 'DIRECCION IP SW','PUERTO SW','VLAN PUERTO SW','BLOQUE','PISO','CUBICULO');
               //$registro_en_blanco = array('A', 'B ','C ','D ','E ','F ','G ');
               $resultado = mysql_query ($sql, $conexion) or die (mysql_error ());
               $registros = mysql_num_rows ($resultado);
               mysql_close ();

                  if ($registros > 0) {
                    $pdf = new Cezpdf('A4');
                      //$pdf->selectFont('fonts/Helvetica.afm');
                        
                        while($row=mysql_fetch_row($resultado)){
                         // $data[]=array('punto_de_red'=>$row[0], 'dir_ip_sw'=>$row[1],'vlan_puerto_sw'=>$row[2],'bloque'=>$row[3]);
                           $data[]=array();
                        }
                       // $titles=array('Depto'=>'Depto', 'num_tickets'=>'Tickets','abiertos'=>'abiertos','cerrados'=>'cerrados');
                        /*
                      $data[] = array('pais'=>'Peru', 'capital'=>'Lima');
                      $data[] = array('pais'=>'Colombia', 'capital'=>'Bogota');
                      $data[] = array('pais'=>'Chile', 'capital'=>'Santiago de Chile');
                      $data[] = array('pais'=>'Brasil', 'capital'=>'Brasilia');
                      $data[] = array('pais'=>'Ecuador', 'capital'=>'Quito');
                      $data[] = array('pais'=>'Bolivia', 'capital'=>'La Paz');
                      $data[] = array('pais'=>'Argentina', 'capital'=>'Buenos Aires');
                      $data[] = array('pais'=>'Guyana', 'capital'=>'Georgetown');
                      $data[] = array('pais'=>'Surinam', 'capital'=>'Paramaribo');
                      $data[] = array('pais'=>'Uruguay', 'capital'=>'Montevideo');
                      $data[] = array('pais'=>'Paraguay', 'capital'=>'Asuncion');
                      $data[] = array('pais'=>'Venezuela', 'capital'=>'Caracas');
                       
                      $titles = array('pais'=>'<b>Pais</b>', 'capital'=>'<b>Capital</b>');*/
                       
                      $pdf->ezTable($data);
                      $pdf->ezStream();
                  }
           
?>


