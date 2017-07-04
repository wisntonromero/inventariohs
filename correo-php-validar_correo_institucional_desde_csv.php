<?php
    include_once("menu.php");
?>

<div class="row">
    <?php
    if ($_FILES['sel_file']['error'] == UPLOAD_ERR_NO_FILE) {
         echo "No ha seleccionado un archivo, por favor seleccione un archivo.";
    }else
    {
    //conexiones, conexiones everywhere
    ini_set('display_errors', 1);
    error_reporting(E_ALL);


    echo '<table border="1">';
    echo '<tr>';
    echo '<th>Nombres y Apellidos</th>';
    echo '<th>Departamento</th>';
    echo '<th>Cargo</th>';
    echo '<th>Extension</th>';
    echo '<th>Correo</th>';
    echo '</tr>';
    echo '</tbody>';

       
        if(isset($_POST['submit']))
        {
            //Aquí es donde seleccionamos nuestro csv
             $fname = $_FILES['sel_file']['name']; // Nombre del archivo
             echo 'Cargando nombre del archivo: '.$fname.' <br>';
             $chk_ext = explode(".",$fname); // Tomamos la extension del archivo .csv
     
            if(strtolower(end($chk_ext)) == "csv") // Validamos que la extension del archivo sea .csv
            {
                //si es correcto, entonces damos permisos de lectura para subir
                $filename = $_FILES['sel_file']['tmp_name'];
                $handle = fopen($filename, "r");
                           
                while (($data = fgetcsv($handle, 1000, ";")) !== FALSE)
                {
                    $num = count($data);
                    echo '<tr>';
                    for ($c=0; $c < $num; $c++) 
                    {
                        if(empty($data[$c])) {
                           $value = "&nbsp;";
                        } else {
                           $value = $data[$c];
                        }                
                        echo '<td>'.$value.'</td>';

                    }
                        echo '</tr>';
                }
            }
                    echo '</tbody></table>';

                //cerramos la lectura del archivo "abrir archivo" con un "cerrar archivo"
            fclose($handle);
            echo "Archivo Valido!";
        }
             
        else
        {
            //si aparece esto es posible que el archivo no tenga el formato adecuado, inclusive cuando es cvs, revisarlo para             
            //ver si esta separado por " , "
            echo "Archivo invalido!";
        }

    }
     
    ?>
</div>
