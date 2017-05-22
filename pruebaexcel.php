 <?php
/** Incluir la ruta **/
set_include_path(get_include_path() . PATH_SEPARATOR . './Classes/');

/** Clases necesarias */
require_once './Classes/PHPExcel.php';


// Variables de la página
$_VIEWDATA = array(
	'v_precioTotal'	=> 0,
	'v_descuento' => 0,
	'v_precioFinal'	=> 0
);

// Petición de cálculo?
if (isset($_REQUEST['boton_calcular'])) {
	// Cargando la hoja de cálculo
	$objReader = new PHPExcel_Reader_Excel2007();
	$objPHPExcel = $objReader->load("calculo.xlsx");
	
	// Asignar hoja de calculo activa
	$objPHPExcel->setActiveSheetIndex(0);
	
	// Asignar data
	$objPHPExcel->getActiveSheet()->setCellValue('automatico', $_REQUEST['transmision_Automatica']);
	$objPHPExcel->getActiveSheet()->setCellValue('cuero', $_REQUEST['asientos_Cuero']);
	$objPHPExcel->getActiveSheet()->setCellValue('suspension', $_REQUEST['suspension']);
	
	// Calculos
	$_VIEWDATA['v_precioTotal'] = $objPHPExcel->getActiveSheet()->getCell('total')->getCalculatedValue();
	$_VIEWDATA['v_descuento'] = $objPHPExcel->getActiveSheet()->getCell('descuento')->getCalculatedValue();
	$_VIEWDATA['v_precioFinal'] = $objPHPExcel->getActiveSheet()->getCell('final')->getCalculatedValue();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Ejemplo</title>
</head>

<body>
    <form id="formulario" method="post" name="formulario" action="pruebaexcel.php">
        <table>
            <tr>
                <th>Transmisi&oacute;n autom&aacute;tica :</th>
                <td>
                    <select id="transmision_Automatica" name="transmision_Automatica">
                    	<?php if(isset($_REQUEST['transmision_Automatica'])) { ?>
                    	<option value="<?php echo $_REQUEST['transmision_Automatica']; ?>" selected="selected"><?php echo $_REQUEST['transmision_Automatica']; ?></option>
                    	<?php } ?>
                        <option value="No">No</option>
                        <option value="Si">Si</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Asientos de cuero:</th>
                <td>
                    <select id="asientos_Cuero" name="asientos_Cuero">
                    	<?php if(isset($_REQUEST['asientos_Cuero'])) { ?>
                    	<option value="<?php echo $_REQUEST['asientos_Cuero']; ?>" selected="selected"><?php echo $_REQUEST['asientos_Cuero']; ?></option>
                    	<?php } ?>
                        <option value="No">No</option>
                        <option value="Si">Si</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>Suspensi&oacute;n:</th>
                <td>
                    <select id="suspension" name="suspension">
                    	<?php if(isset($_REQUEST['suspension'])) { ?>
                    	<option value="<?php echo $_REQUEST['suspension']; ?>" selected="selected"><?php echo $_REQUEST['suspension']; ?></option>
                    	<?php } ?>
                        <option value="No">No</option>
                        <option value="Si">Si</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th>&nbsp;</th>
                <td>
                    <input id="boton_calcular" name="boton_calcular" type="submit" value="Calcular" />
                </td>
            </tr>
        </table>
    </form>
    <?php if (isset($_REQUEST['boton_calcular'])) { ?>
    
    <h2>Detalles del Precio</h2>
    <p>Basado en tus preferencias, el precio de tu carro será S/. <?php echo number_format($_VIEWDATA['v_precioFinal'], 2); ?> Nuevos Soles.</p>
    <table>
        <tr>
            <th>Precio Total:</th>
            <td><?php echo number_format($_VIEWDATA['v_precioTotal'], 2); ?> Nuevos Soles</td>
        </tr>
        <tr>
            <th>Descuento:</th>
            <td><?php echo number_format($_VIEWDATA['v_descuento'] * 100, 2); ?>%</td>
        </tr>
        <tr>
        	<td colspan="2"><hr noshade="noshade"></hr>
        </tr>
        <tr>
            <th>Total Final:</th>
            <td><?php echo number_format($_VIEWDATA['v_precioFinal'], 2); ?> Nuevos Soles</td>
        </tr>
    </table>
    <p><a href="pruebaexcel.php">Calcular nuevo precio</a></p>
    
    <?php } ?>
</body>
</html>