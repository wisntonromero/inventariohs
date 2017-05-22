<?php
 
  include('config.php');
  require_once 'Classes/PHPExcel.php';
 // error_reporting(0);

  $conexion = mysql_connect($server,$username,$password);
  mysql_set_charset('utf8',$conexion);
  mysql_select_db($database);

 $objPHPExcel = new PHPExcel();
          
         //Informacion del excel
         $objPHPExcel->getProperties()
            ->setCreator("Winston Romero Duarte")
            ->setLastModifiedBy("Winston Romero Duarte")
            ->setTitle("Bitacora por pntos de red")
            ->setSubject("Bitacora centros de cableados")
            ->setDescription("Documento generado con PHPExcel")
            ->setKeywords("Puntos de red ")
            ->setCategory("Puntos de red");    

    $cc = 2;
    while ($cc <= 10) {
        $pp = "A";
        $k=1; // 27 letras del abecedario
        $objPHPExcel->getSheetCount();//cuenta las pestañas

        $positionInExcel=0;//esto es para que ponga la nueva pestaña al principio

        $objPHPExcel->createSheet($positionInExcel);//creamos la pestaña


          while ($k <= 27) {
          //echo $i;
    
                    // $sql = "SELECT * FROM puntos_de_red ORDER BY punto_de_red ASC";
                     $sql = "SELECT punto_de_red,dir_ip_sw,puerto_sw, vlan_puerto_sw,bloque,piso,cubiculo FROM puntos_de_red WHERE punto_de_red LIKE  '$cc$pp%' ORDER BY punto_de_red ASC "; 
                     $headings = array('punto de red', 'dir ip sw','puerto sw','vlan puerto sw','bloque','piso','cubiculo');
                     $resultado.$k = mysql_query ($sql, $conexion) or die (mysql_error ());
                     $registros = mysql_num_rows ($resultado.$k);
                                       
                    if ($result = mysql_query($sql) or die(mysql_error())) {
                        // Create a new PHPExcel object
                      
                              $rowNumber = 1;
                              $col = 'A';
                              foreach($headings as $heading) {
                                 $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$heading);
                                 $col++;
                              }

                              // Loop through the result set
                              $rowNumber = 2;
                              while ($row = mysql_fetch_row($result)) {
                                 $col = 'A';
                                 foreach($row as $cell) {
                                    $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$cell);
                                    $col++;
                                  }
                                    $rowNumber++;
                              }
                  }
                  $k++;

                  $pp++; 
              
      }
     $cc++;
     $objPHPExcel->getActiveSheet()->setTitle('Tecnologia Simple');
}

header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment;filename="bitacora.xlsx"');
header('Cache-Control: max-age=0');
 
$objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
$objWriter->save('php://output');
exit;
mysql_close ();
?>