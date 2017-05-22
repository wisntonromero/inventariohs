<?php
  include('config.php');
    header('Content-Type: application/json');

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);
    /********************************************  
    Write the query, call it, and find the number of fields  
    /********************************************/  
    /*************************************************** INICIO CENTRO DE CABLEADO NRO 2 **********************************************************************/  

    $cc = 2;
    while ($cc <= 100) {
        $pp = "A";
        $k=1;

        while ($k <= 27) {
        //echo $i;
          
            $qry =mysql_query("SELECT punto_de_red,dir_ip_sw,puerto_sw, vlan_puerto_sw,bloque,piso,cubiculo FROM puntos_de_red WHERE punto_de_red LIKE '$cc$pp%' ");  
            $numero_de_filas  = mysql_fetch_array($qry);
            if( $numero_de_filas > 0){

            $campos = mysql_num_fields($qry);    
            $i=0;    
                  
            /********************************************  
            Extract field names and write them to the $header  
            variable  
            /********************************************/ 
            ob_start();  
            echo "&nbsp;<center><table border=\"1\" align=\"center\">";  
            echo "<tr bgcolor=\"#336666\">  
              <td><font color=\"#ffffff\"><strong>PUNTO DE RED</strong></font></td>  
              <td><font color=\"#ffffff\"><strong>DIR_IP_SW</strong></font></td>  
              <td><font color=\"#ffffff\"><strong>PUERTO_SW</strong></font></td>  
              <td><font color=\"#ffffff\"><strong>VLAN_PUERTO_SW</strong></font></td>  
              <td><font color=\"#ffffff\"><strong>BLOQUE</strong></font></td>  
              <td><font color=\"#ffffff\"><strong>PISO</strong></font></td> 
              <td><font color=\"#ffffff\"><strong>CUBICULO</strong></font></td> 
            </tr>";  
            while($row=mysql_fetch_array($qry))  
            {    
                echo "<tr>";    
                 for($j=0; $j<$campos; $j++) {    
                     echo "<td>".$row[$j]."</td>";    
                 }    
                 echo "</tr>";          
            }    
            echo "</table>";  

            $reporte = ob_get_clean(); 

            /********************************************  
            Set the automatic downloadn section  
            /********************************************/ 

            header("Content-type: application/vnd.ms-excel");  
            header("Content-Disposition: attachment; filename=bitacora_por_puntos_de_red.xls");  
            header("Pragma: no-cache");  
            header("Expires: 0");
            header("Cache-Control: must-revalidate, post-check=0, pre-check=0");   

            echo $reporte; 
          }
            $k++;
            $pp++;  

        }
             $cc++;
    }
?>