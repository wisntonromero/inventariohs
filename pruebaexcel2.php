<?php
/** Incluir la libreria PHPExcel */
require_once './Classes/PHPExcel.php';

error_reporting(0);

// Crea un nuevo objeto PHPExcel
$objPHPExcel = new PHPExcel();

// Establecer propiedades
$objPHPExcel->getProperties()
->setCreator("Winston Romero")
->setLastModifiedBy("Winston Romero")
->setTitle("Bitacoras Ejemplo de Filtros con PHPExcel")
->setSubject("Ejemplo de Filtros con PHPExcel")
->setDescription("Demostracion sobre como crear archivos de Excel con filtros activos desde PHP.")
->setKeywords("Excel Office 2007 openxml php")
->setCategory("Pruebas de Excel");

$objPHPExcel->getSheetCount();//cuenta las pestañas

$positionInExcel=0;//esto es para que ponga la nueva pestaña al principio

$objPHPExcel->createSheet($positionInExcel);//creamos la pestaña

// Agregar Informacion 
$objPHPExcel->setActiveSheetIndex($positionInExcel)
->setCellValue('A1', 'Frutas')
->setCellValue('A2', 'Manzana')
->setCellValue('A3', 'Banano')
->setCellValue('A4', 'Pera')
->setCellValue('B1', 'Precio')
->setCellValue('B2', '30')
->setCellValue('B3', '45')
->setCellValue('B4', '2')
->setCellValue('C1', 'Medida')
->setCellValue('C2', 'Kilo')
->setCellValue('C3', 'Libra')
->setCellValue('C4', 'Unidad');

$objPHPExcel->getActiveSheet()->setAutoFilter("A1:C4");

// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Tecnologia Simple');

// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex($positionInExcel);


$objPHPExcel->createSheet($positionInExcel);//creamos la pestaña

// Agregar Informacion 
$objPHPExcel->setActiveSheetIndex($positionInExcel)
->setCellValue('A1', 'Frutas')
->setCellValue('A2', 'Manzana')
->setCellValue('A3', 'Banano')
->setCellValue('A4', 'Pera')
->setCellValue('B1', 'Precio')
->setCellValue('B2', '2')
->setCellValue('B3', '3')
->setCellValue('B4', '4')
->setCellValue('C1', 'Medida')
->setCellValue('C2', 'Kilo')
->setCellValue('C3', 'Libra')
->setCellValue('C4', 'Unidad');

$objPHPExcel->getActiveSheet()->setAutoFilter("A1:C4");

// Renombrar Hoja
$objPHPExcel->getActiveSheet()->setTitle('Tecnologia Simple 2');

// Establecer la hoja activa, para que cuando se abra el documento se muestre primero.
$objPHPExcel->setActiveSheetIndex($positionInExcel);



// Se modifican los encabezados del HTTP para indicar que se envia un archivo de Excel.
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="pruebaFiltros.xlsx"');
header('Cache-Control: max-age=0');
$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
mysql_close ();
?>