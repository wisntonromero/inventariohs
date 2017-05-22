<?php
include_once("config.php");
include_once("sesion.php");
?>

<?php
include_once ("soporte-php_clase_mail.php");// incluyo las clases a ser usadas
//include_once ("sesion.php");

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
        $view->contentTemplate="soporte-php_grid.php"; // seteo el template que se va a mostrar
        break;
    case 'refreshGrid':
        $view->disableLayout=true; // no usa el layout
        $view->clientes=Cliente::getPrestamo();
        $view->contentTemplate="soporte-php_grid.php"; // seteo el template que se va a mostrar
        break;
    case 'saveClient':
        // limpio todos los valores antes de guardarlos
        // por las dudas venga algo raro
        $id            =intval($_POST['id']);
        $activo_equipo =cleanString($_POST['activo_equipo']);
        $f_recibido    =cleanString($_POST['f_recibido']);
       // $nomcliente    =cleanString($_POST['cliente']);
       // $correo        =cleanString($_POST['correo']);


        $cliente=new Cliente($id);
        $cliente->setActivo_equipo($activo_equipo);
        $cliente->setF_recibido($f_recibido);
      //  $cliente->setCliente($nomcliente);
       // $cliente->setCorreo($correo);


        $cliente->save();
        break;
    case 'newClient':
        $view->client=new Cliente();
        $view->label='Nuevo Cliente';
        $view->disableLayout=true;
        $view->contentTemplate="soporte-form_pop_up.php"; // seteo el template que se va a mostrar
        break;
    case 'editClient':
        $editId=intval($_POST['id']);
        $view->label='Editar Prestamo';
        $view->client=new Cliente($editId);
        $view->disableLayout=true;
        $view->contentTemplate="soporte-form_pop_up.php"; // seteo el template que se va a mostrar
        break;
    case 'recordatorioClient':
        $editId=intval($_POST['id']);
        $id            =intval($_POST['id']);
        $activo_equipo =$_POST['activo_equipo'];
        $f_recibido    =$_POST['f_recibido'];
        $f_recibido    =$_POST['f_limite'];
     
        $cliente=new Cliente($id);
        $cliente->setActivo_equipo($activo_equipo);
        $cliente->setF_recibido($f_recibido);
        $cliente->recordatoriosave();

        $view->label='Recordatorio de Prestamo';
        $view->client=new Cliente($editId);
        $view->disableLayout=true;
        $view->contentTemplate="soporte-form_recordatorio.php"; // seteo el template que se va a mostrar

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
{include_once ('soporte-form_parte_superior.php');} // el layout incluye el template adentro
?>
