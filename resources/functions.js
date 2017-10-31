/**
 * Autor: Lucas Forchino
 * Web: http://www.tutorialjquery.com
 *
 */
$(document).ready(function(){ //cuando el html fue cargado iniciar

    //añado la posibilidad de editar al presionar sobre edit
    $('.edit').live('click',function(){
        //this = es el elemento sobre el que se hizo click en este caso el link
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');
        //preparo los parametros
        params={};
        params.id=id;
        params.action="editClient";
        $('#popupbox').load('llaves-form_consultar_prestamo.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
    })

    $('.recordatorio').live('click',function(){
            //this = es el elemento sobre el que se hizo click en este caso el link
            //obtengo el id que guardamos en data-id
            var id=$(this).attr('data-id');
            //preparo los parametros
            params={};
            params.id=id;
            params.action="recordatorioClient";
            $('#popupbox').load('llaves-form_consultar_prestamo.php', params,function(){
                $('#block').hide();
                $('#popupbox').hide();
            })

        })

    $('.delete').live('click',function(){
        //obtengo el id que guardamos en data-id
        var id=$(this).attr('data-id');
        //preparo los parametros
        params={};
        params.id=id;
        params.action="deleteClient";
        $('#popupbox').load('llaves-form_consultar_prestamo.php', params,function(){
            $('#content').load('llaves-form_consultar_prestamo.php',{action:"refreshGrid"});
        })

    })

   /* $('#new').live('click',function(){
        params={};
        params.action="newClient";
        $('#popupbox').load('index.php', params,function(){
            $('#block').show();
            $('#popupbox').show();
        })
    }) */


    $('#client').live('submit',function(){
        var params={};
        params.action='saveClient';
        params.id=$('#id').val();
        params.nro_cc=$('#nro_cc').val();
        params.descripcion_cc=$('#descripcion_cc').val();
        params.f_h_prestamo=$('#f_h_prestamo').val();
        params.f_h_limite=$('#f_h_limite').val();
        params.f_h_recibido=$('#f_h_recibido').val();
        params.cliente=$('#cliente').val();
        params.empresa=$('#empresa').val();
        params.correo=$('#correo').val();
        params.ext_tel=$('#ext_tel').val();
        params.trabajo=$('#trabajo').val();
        $.post('llaves-form_consultar_prestamo.php',params,function(){
            $('#block').hide();
            $('#popupbox').hide();
            $('#content').load('llaves-form_consultar_prestamo.php',{action:"refreshGrid"});
        })
        return false;
    })

    $('#recordatorio').live('submit',function(){
        var params={};
        params.action='recordatorioClient';
        params.id=$('#id').val();
        params.nro_cc=$('#nro_cc').val();
        params.descripcion_cc=$('#descripcion_cc').val();
        params.f_h_prestamo=$('#f_h_prestamo').val();
        params.f_h_limite=$('#f_h_limite').val();
        params.f_h_recibido=$('#f_h_recibido').val();
        params.cliente=$('#cliente').val();
        params.empresa=$('#empresa').val();
        params.correo=$('#correo').val();
        params.ext_tel=$('#ext_tel').val();
        params.trabajo=$('#trabajo').val(); 
        $.post('llaves-form_consultar_prestamo.php',params,function(){
            $('#block').hide();
            $('#popupbox').hide();
            $('#content').hide('llaves-form_consultar_prestamo.php',{action:"refreshGrid"});
        })
        return false;
        })
    // boton cancelar, uso live en lugar de bind para que tome cualquier boton
    // nuevo que pueda aparecer
    $('#cancel').live('click',function(){
        $('#block').hide();
        $('#popupbox').hide();
    })


})

NS={};
