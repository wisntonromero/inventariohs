/* <!--  formulario - functions.js --> */
/**
 * Autor: Lucas Forchino
 * Web: http://www.tutorialjquery.com
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
        $('#popupbox').load('soporte-form_consultar_equipos_soporte_en_prestamo.php', params,function(){
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
        $('#popupbox').load('soporte-form_consultar_equipos_soporte_en_prestamo.php', params,function(){
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
        $('#popupbox').load('soporte-form_consultar_equipos_soporte_en_prestamo.php', params,function(){
            $('#content').load('soporte-form_consultar_equipos_soporte_en_prestamo.php',{action:"refreshGrid"});
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
        params.activo_equipo=$('#activo_equipo').val();
        params.f_prestamo=$('#f_prestamo').val();
        params.f_limite=$('#f_limite').val();
        params.f_recibido=$('#f_recibido').val();
        params.activo_danado=$('#activo_danado').val();
        params.bloque=$('#bloque').val();
        params.piso=$('#piso').val();
        params.cubiculo=$('#cubiculo').val();
        params.departamento=$('#departamento').val();
        params.usuario_equipo=$('#usuario_equipo').val();
        params.email_usuario=$('#email_usuario').val();
        params.ext_tel=$('#ext_tel').val();
        params.ot_sigma=$('#ot_sigma').val();
        params.usuario_tecnico=$('#usuario_tecnico').val();
        params.email_usuario_tecnico=$('#email_usuario_tecnico').val();
        params.usuario_que_presta_soporte=$('#usuario_que_presta_soporte').val();    
        params.observaciones=$('#observaciones').val();
        $.post('soporte-form_consultar_equipos_soporte_en_prestamo.php',params,function(){
            $('#block').hide();
            $('#popupbox').hide();
            $('#content').load('soporte-form_consultar_equipos_soporte_en_prestamo.php',{action:"refreshGrid"});
        })
        return false;
    })

    $('#recordatorio').live('submit',function(){
        var params={};
        params.action='recordatorioClient';
        params.id=$('#id').val();
        params.activo_equipo=$('#activo_equipo').val();
        params.f_prestamo=$('#f_prestamo').val();
        params.f_limite=$('#f_limite').val();
        params.f_recibido=$('#f_recibido').val();
        params.activo_danado=$('#activo_danado').val();
        params.bloque=$('#bloque').val();
        params.piso=$('#piso').val();
        params.cubiculo=$('#cubiculo').val();
        params.departamento=$('#departamento').val();
        params.usuario_equipo=$('#usuario_equipo').val();
        params.email_usuario=$('#email_usuario').val();
        params.ext_tel=$('#ext_tel').val();
        params.ot_sigma=$('#ot_sigma').val();
        params.usuario_tecnico=$('#usuario_tecnico').val();
        params.email_usuario_tecnico=$('#email_usuario_tecnico').val();
        params.usuario_que_presta_soporte=$('#usuario_que_presta_soporte').val();    
        params.observaciones=$('#observaciones').val();
        $.post('soporte-form_consultar_equipos_soporte_en_prestamo.php',params,function(){
            $('#block').hide();
            $('#popupbox').hide();
            $('#content').hide('soporte-form_consultar_equipos_soporte_en_prestamo.php',{action:"refreshGrid"});
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
