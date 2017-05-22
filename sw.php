<?php
    include('config.php');
    require_once 'Classes/PHPExcel.php';
    error_reporting(0);

    $conexion = mysql_connect($server,$username,$password);
    mysql_set_charset('utf8',$conexion);
    mysql_select_db($database);

    $objPHPExcel = new PHPExcel();
      //Informacion del excel
      $objPHPExcel->getProperties()
      ->setCreator("Winston Romero Duarte")
      ->setLastModifiedBy("Winston Romero Duarte")
      ->setTitle("Bitacora por puntos de red")
      ->setSubject("Bitacora centros de cableados")
      ->setDescription("Documento generado con PHPExcel")
      ->setKeywords("Puntos de red ")
      ->setCategory("Puntos de red");    

           
              //$sql = "SELECT puntos_de_red.punto_de_red, puntos_de_red.bloque, puntos_de_red.piso, puntos_de_red.cubiculo,  puntos_de_red.estado_punto_de_red, switches.sw_id, switches.dir_ip_sw, switches.unidad, bitacora_switches.id_sw, bitacora_switches.puerto_sw, bitacora_switches.punto_de_red 
              //FROM puntos_de_red JOIN bitacora_switches ON puntos_de_red.punto_de_red = bitacora_switches.punto_de_red JOIN switches ON bitacora_switches.id_sw = switches.sw_id  WHERE puntos_de_red.punto_de_red LIKE  '$cc$pp%' AND bitacora_switches.id_sw = switches.sw_id GROUP BY puntos_de_red.punto_de_red ASC ";
              //$qry =mysql_query("SELECT switches.dir_ip_sw, bitacora_switches.puerto_sw, bitacora_switches.vlan, bitacora_switches.punto_de_red FROM switches JOIN bitacora_switches ON switches.sw_id = bitacora_switches.id_sw WHERE dir_ip_sw LIKE '172.18.$cc.$k' ");  
              $sql =mysql_query("SELECT * FROM bitacora_switches WHERE id_sw = '2' ");  
            
               $headings = array('DIR IP SWITCH','PUERTO SW', 'VLAN', 'PUNTO DE RED', 'ESTADO PUERTO SW');
               $registro_en_blanco = array('A', 'B ','C ','D ','E ','F ','G ');
               $resultado = mysql_query ($sql, $conexion) or die (mysql_error ());
               $registros = mysql_num_rows ($resultado);
               mysql_close ();

                  if ($registros > 0) {
                      $rowNumber = $i;
                      $col = 'A';
                      foreach($headings as $heading) {
                        $objPHPExcel->getActiveSheet()->setCellValue($col.$rowNumber,$heading);
                        $objPHPExcel->getActiveSheet()
                        ->getStyle($col.$rowNumber)
                        ->getFill()
                        ->setFillType(PHPExcel_Style_Fill::FILL_SOLID)
                        ->getStartColor()
                        ->setARGB('0080ff'); //0080ff azul claro
                        $col++;
                      }
                        $i++;

                        while ($registros = mysql_fetch_object ($resultado)){
                        // Agregar Informacion 
                        $objPHPExcel->setActiveSheetIndex($positionInExcel)
                          //->setCellValueExplicit('A'.$i, $registros->dir_ip_sw,$tipo_cadena)
                          ->setCellValueExplicit('A'.$i, $registros->puerto_sw,$tipo_cadena)
                          ->setCellValueExplicit('B'.$i, $registros->vlan,$tipo_cadena)
                          ->setCellValueExplicit('C'.$i, $registros->punto_de_red,$tipo_cadena)
                          ->setCellValueExplicit('D'.$i, $registros->estado_puerto_sw,$tipo_cadena);
                         $i++;                        
                        }
       
              }
            header('Content-Type: application/vnd.ms-excel');
            header('Content-Disposition: attachment;filename="Bitacora_por_switches.xlsx"');
            header('Cache-Control: max-age=0');
             
            $objWriter=PHPExcel_IOFactory::createWriter($objPHPExcel,'Excel2007');
            $objWriter->save('php://output');
            exit;
            mysql_close ();
?>