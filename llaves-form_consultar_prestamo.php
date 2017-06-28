<?php
include_once("config.php");
include_once("sesion.php");
?>

<?php
include_once ("clase.php");// incluyo las clases a ser usadas
include_once ("sesion.php");

$action='index';
if(isset($_POST['action']))
{$action=$_POST['action'];}

$view= new stdClass(); // creo una clase standard para contener la vista
$view->disableLayout=false;// marca si usa o no el layout , si no lo usa imprime directamente el template

// para no utilizar un framework y simplificar las cosas uso este switch, la idea
// es que puedan apreciar facilmente cuales son las operaciones que se realizan
switch ($action)
{
    case 'index':
        $view->clientes=Cliente::getPrestamo(); // tree todos los clientes
        $view->contentTemplate="templates/prestamosGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'refreshGrid':
        $view->disableLayout=true; // no usa el layout
        $view->clientes=Cliente::getPrestamo();
        $view->contentTemplate="templates/prestamosGrid.php"; // seteo el template que se va a mostrar
        break;
    case 'saveClient':
        // limpio todos los valores antes de guardarlos
        // por las dudas venga algo raro
        $id            =intval($_POST['id']);
        $nro_cc        =cleanString($_POST['nro_cc']);
        $descripcion_cc=cleanString($_POST['descripcion_cc']);
        $f_h_recibido  =cleanString($_POST['f_h_recibido']);
        $nomcliente    =cleanString($_POST['cliente']);
        $correo        =cleanString($_POST['correo']); 

        $cliente=new Cliente($id);
        $cliente->setNroCC($nro_cc);
        $cliente->setDescripcion($descripcion_cc);    
        $cliente->setFechaRecibido($f_h_recibido);
        $cliente->setCliente($nomcliente);
        $cliente->setCorreo($correo);
       
        $cliente->save();
        break;
    case 'newClient':
        $view->client=new Cliente();
        $view->label='Nuevo Cliente';
        $view->disableLayout=true;
        $view->contentTemplate="templates/prestamosForm.php"; // seteo el template que se va a mostrar
        break;
    case 'editClient':
        $editId=intval($_POST['id']);
        $view->label='Editar Prestamo';
        $view->client=new Cliente($editId);
        $view->disableLayout=true;
        $view->contentTemplate="templates/prestamosForm.php"; // seteo el template que se va a mostrar
        break;
    case 'recordatorioClient':
        $editId=intval($_POST['id']);
        $id            =intval($_POST['id']);
        $nro_cc        =$_POST['nro_cc'];
        $descripcion_cc=$_POST['descripcion_cc'];
        $f_h_recibido  =$_POST['f_h_recibido'];
        $nomcliente    =$_POST['cliente'];
        $correo        =$_POST['correo']; 
        
        $cliente=new Cliente($id);
        $cliente->setNroCC($nro_cc);
        //$cliente->setDescripcion($descripcion_cc);    
        $cliente->setFechaRecibido($f_h_recibido);
       // $cliente->setCliente($nomcliente);
       // $cliente->setCorreo($correo);
        $cliente->recordatoriosave();

        $view->label='Recordatorio de Prestamo';
        $view->client=new Cliente($editId);
        $view->disableLayout=true;
        $view->contentTemplate="templates/recordatorioForm.php"; // seteo el template que se va a mostrar

        break;
    case 'deleteClient':
        $id=intval($_POST['id']);
        $client=new Cliente($id);
        $client->delete();
        die; // no quiero mostrar nada cuando borra , solo devuelve el control.
        break;
    default :
}

// si esta deshabilitado el layout solo imprime el template
if ($view->disableLayout==true)
{include_once ($view->contentTemplate);}
else
{include_once ('templates/layout.php');} // el layout incluye el template adentro
?>
