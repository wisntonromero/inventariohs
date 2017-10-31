$(document).ready(function(){
  orden_de_compra=null;
  bitacora=0;
  $('#cbxestado').change(function(){
    bitacora=$('#cbxestado').val();
    if($('#cbxestado').val()==5 && $('#orden').val()!=''){
      $('.final').show('slow');
    }else{
      $('.final').hide('slow');
    }
  });

  $('#estado').change(function(){
    bitacora=$('#estado').val();
  });

	$('#btneditar').click(function(){
    if($('#cbxestado').val()==5 ){
      if($("#txtdir_ip").val()!='' && $("#txtdir_mac").val()!='' && $("#txtot").val()!='' && $("#txtpunto_de_red").val()!=''){
        editar();

      }else{

        $('#msj').removeClass('success');
        $('#msj').addClass('error');
        $('#msj').html('<strong>Verifique que Todos los Campos Estén Llenos</strong>');
        $('#txtnuevo_activo').focus();
      }
    }else{
     if($('#orden').val()!='' && $('#cbxmarca').val()!='-1' && $('#txtmodelo').val()!=''&& $('#cbxtipo_equipo').val()!='-1' && $('#txtubicacion').val()!='' && $('#txtresponsable').val()!=''  && $('#txtserial_equipo').val()!='' && $('#cbxcentro_costo').val()!='-1' && $('#cbxestado').val()!='-1' && $('#cbxprioridad').val()!='-1' && $('#cbxproceso').val()!='-1'){
        editar();    
     }else{
        $('#msj').removeClass('success');
        $('#msj').addClass('error');
        $('#msj').html('<strong>Verifique que Todos los Campos Estén Llenos</strong>');
        $('#txtnuevo_activo').focus();
      }
    }
      
	});


	$('#btnconsultar').click(function(){

    activo=$('#txtnuevo_activo').val();
    if(activo!=null && activo!=''){
    	  $.ajax({
          url     :"consultar_equipo_por_orden_de_compra.php",
          dataType:"json",
          type    :'post',
          data:{ 
          activo: activo,
        },
        success:function (data) {
          if(data==2){
            $('#msj').html('<strong>Activo Inexistente.</strong>');
            limpiar();
          }else{
            if(data['estado']==5){
              $('.final').show('slow');
            }else{
              $('.final').hide('slow');
            }
            $('#txtextension').val(data['extension']);
            $('#txtubicacion').val(data['ubicacion']);
            $('#cbxmarca').val(data['marca']);
            $('#txtmodelo').val(data['modelo']);
            $('#cbxtipo_equipo').val(data['tipo_equipo']);
            $('#txtnuevo_activo').val(data['nuevo_activo']);
            $('#txtactivo_retirar').val(data['activo']);
            $('#txtactivo_monitor_retirar').val(data['activo_monitor_retirar']);
            $('#txtresponsable').val(data['responsable']);
            $('#txtusuario').val(data['usuario']);
            $('#orden').val(data['orden']);
            $('#txtserial_equipo').val(data['serial_equipo']);
            $('#txtactivo_monitor').val(data['activo_monitor']);
            $('#txtserial_monitor').val(data['serial_monitor']);
            $('#cbxcentro_costo').val(data['centro']);
            $('#cbxestado').val(data['estado']);
            $('#cbxprioridad').val(data['prioridad']);  
            $('#cbxprocesos').val(data['proceso']);
            $('#txtdir_ip').val(data['ip']);
            $('#txtdir_mac').val(data['mac']);
            $('#txtpunto_de_red').val(data['red']);
            $('#txtot').val(data['ot']);
            $("#texto").val(data['observacion']);
            $('#msj').html('');
          }
        },
        error:function() {
         
          console.log('Something went wrong', status, 'Correo de cliente no encontrado.' ); 
        }
      });
    }else{
      limpiar();
      $('#msj').html('<strong>Digite una Orden de Compra.</strong>');
      $('#txtnuevo_activo').focus();
    }
	});


  $('#reubicacion').submit(function(e){

    activo=$('#activo_equipo').val();
    if(activo!=null && activo!=''){
        $.ajax({
          url     :"consultar_reubicacion_por_activo.php",
          dataType:"json",
          type    :'post',
          data:{ 
          activo: activo,
        },
        success:function (data) {
          if(data==2){
            $('#msj').html('<strong>Orden Inexistente.</strong>');
            limpiar();
          }else{
            $('#extension').val(data['extension']);
            $('#ubicacion').val(data['ubicacion']);
            $('#nueva_ubicacion').val(data['nueva_ubicacion']);
            $('#tipo_equipo').val(data['tipo_equipo']);
            $('#activo_retirar').val(data['activo_retirar']);
            $('#activo_monitor_retirar').val(data['activo_monitor_retirar']);
            $('#responsable').val(data['responsable']);
            $('#nuevo_responsable').val(data['nuevo_responsable']);
            $('#proceso').val(data['proceso']);
            $('#activo_monitor').val(data['activo_monitor']);
            $('#estado').val(data['estado']);
            $('#prioridad').val(data['prioridad']);
            $('#ip').val(data['ip']);
            $('#mac').val(data['mac']);
            $('#ot').val(data['ot']);
            $('#punto_de_red').val(data['red']);
            $('#activo_soporte').val(data['ot']);
            $("#observacion").val(data['observacion']);
            $('#msj').html('');
          }

        },
        error:function() {
         
          console.log('Something went wrong', status, 'Correo de cliente no encontrado.' ); 
        }
      });
    }else{
      limpiar();
      $('#msj').html('<strong>Digite un Activo.</strong>');
      $('#activo_equipo').focus();
    }
    e.preventDefault();
  });

  $('#btn')


$.ajax({
        url     :"cargar_marcas.php",
        dataType:"json",
        type    :"post",
        success:function(datos) {
          for (var i = 0; i <= datos.length - 1; i++) {
                      $('#cbxmarca').append("<option value="+datos[i].id+">"+datos[i].marca+"</option>");
                  };
        },
        error:function() {
          
          console.log('Something went wrong', status, err );
          
        }
      });

   $.ajax({
      url     :"cargar_tipo_equipos.php",
      dataType:"json",
      type    :"post",
      success:function(datos) {
        for (var i = 0; i <= datos.length - 1; i++) {
            $('.tipo_equipo').append("<option class='mayuscula' value="+datos[i].id+">"+datos[i].tipo+"</option>");
        };
      },
      error:function() {
        
        console.log('Something went wrong', status, err );
        
      }
    });

   $.ajax({
      url     :"cargar_centro_costos.php",
      dataType:"json",
      type    :"post",
      success:function(datos) {
        for (var i = 0; i <= datos.length - 1; i++) {
            $('#cbxcentro_costo').append("<option class='mayuscula' value="+datos[i].id+">"+datos[i].centro+"</option>");
        };
      },
      error:function() {
        
        console.log('Something went wrong', status, err );
        
      }
    });

    $.ajax({
      url     :"cargar_prioridad.php",
      dataType:"json",
      type    :"post",
      success:function(datos) {
        for (var i = 0; i <= datos.length - 1; i++) {
            $('.prioridad').append("<option class='mayuscula' value="+datos[i].id+">"+datos[i].prioridad+"</option>");
        };
      },
      error:function() {
        
        console.log('Something went wrong', status, err );
        
      }
    });

    $.ajax({
      url     :"cargar_procesos.php",
      dataType:"json",
      type    :"post",
      success:function(datos) {
        for (var i = 1; i <= datos.length - 1; i++) {
            $('#cbxproceso').append("<option class='mayuscula' value="+datos[i].id+">"+datos[i].proceso+"</option>");
        };
        for (var i = 0; i <= datos.length - 1; i++) {
            $('.proceso').append("<option class='mayuscula' value="+datos[i].id+">"+datos[i].proceso+"</option>");
        };
      },
      error:function() {
        console.log('Something went wrong', status, err );
      }
    });

    $.ajax({
      url     :"cargar_estados.php",
      dataType:"json",
      type    :"post",
      success:function(datos) {
        for (var i = 0; i <= datos.length - 1; i++) {
            $('.estado').append("<option class='mayuscula' value="+datos[i].id+">"+datos[i].estado+"</option>");
        };
      },
      error:function() {
        
        console.log('Something went wrong', status, err );
      }
    });


  $(".solonum").keypress(function(tecla) {
     if(tecla.charCode < 35 || ((tecla.charCode > 35 && tecla.charCode < 42) || (tecla.charCode > 42 && tecla.charCode < 48)) || tecla.charCode > 57) return false;
   });


  function limpiar(){
    $('input:text').val('');
    $('textarea').val('');
    $('.combo').val('-1');
  };

  function editar(){
    if($('#cbxestado').val()!=5){

      $.ajax({
        url     :"editar_equipo3.php",
        dataType:"json",
        type    :'post',
        data:{ 
          bitacora:       bitacora, 
          id:             activo,
          extension:      $('#txtextension').val(),
          orden:          $('#orden').val(),
          ubicacion:      $('#txtubicacion').val(),
          marca:          $('#cbxmarca').val(),
          modelo:         $('#txtmodelo').val(),
          tipo_equipo:    $('#cbxtipo_equipo').val(),
          activo_retirar: $('#txtactivo_retirar').val(),
          activo_monitor_retirar: $('#txtactivo_monitor_retirar').val(),
          responsable:    $('#txtresponsable').val(),
          usuario:        $('#txtusuario').val(),
          nuevo_activo:   $('#txtnuevo_activo').val(),
          serial_equipo:  $('#txtserial_equipo').val(),
          activo_monitor: $('#txtactivo_monitor').val(),
          serial_monitor: $('#txtserial_monitor').val(),
          centro_de_costo:$('#cbxcentro_costo').val(),
          estado:         $('#cbxestado').val(),
          prioridad:      $('#cbxprioridad').val(),
          proceso:        $('#cbxprocesos').val(),
          observacion:    $('#texto').val(),
        },
        
        success:function (data) {
          $('#msj').removeClass('error');
          $('#msj').addClass('success');
          $('#msj').html('<strong>Cambios Guardados<strong>');
          bitacora=0;
        },
        error:function() {
          console.log('Something went wrong', status, 'Correo de cliente no encontrado.' ); 
        }
      });
    }else{
      $.ajax({
        url     :"editar_equipo2.php",
        dataType:"json",
        type    :'post',
        data:{ 
          bitacora:       bitacora, 
          id:             activo,
          orden:          $('#orden').val(),
          extension:      $('#txtextension').val(),
          ubicacion:      $('#txtubicacion').val(),
          marca:          $('#cbxmarca').val(),
          modelo:         $('#txtmodelo').val(),
          tipo_equipo:    $('#cbxtipo_equipo').val(),
          activo_retirar: $('#txtactivo_retirar').val(),
          activo_monitor_retirar: $('#txtactivo_monitor_retirar').val(),
          responsable:    $('#txtresponsable').val(),
          usuario:        $('#txtusuario').val(),
          nuevo_activo:   $('#txtnuevo_activo').val(),
          serial_equipo:  $('#txtserial_equipo').val(),
          activo_monitor: $('#txtactivo_monitor').val(),
          serial_monitor: $('#txtserial_monitor').val(),
          centro_de_costo:$('#cbxcentro_costo').val(),
          estado:         $('#cbxestado').val(),
          prioridad:      $('#cbxprioridad').val(),
          proceso:        $('#cbxprocesos').val(),
          observacion:    $('#texto').val(),
          ot         :    $('#txtot').val(),
          mac        :    $('#txtdir_mac').val(),
          ip         :    $('#txtdir_ip').val(),
          punto_de_red:   $('#txtpunto_de_red').val(),

        },
        success:function (data) {
          $('#msj').removeClass('error');
          $('#msj').addClass('success');
          $('#msj').html('<strong>Cambios Guardados<strong>');
          bitacora=0;
        },
        error:function() {
          console.log('Something went wrong', status, 'Correo de cliente no encontrado.' ); 
        }
      });
    }
  }

  $('#cbxproceso').change(function(){
    $('#msj').html('');
    if($('#cbxproceso').val()==2){
      limpiar();
      $('#info').show('slow');
      $('#reubicacion').hide('slow');
      $('#txtnuevo_activo').focus();
    }else if($('#cbxproceso').val()==3){
      limpiar();
      $('#info').hide('slow');
      $('#reubicacion').show('slow');
      $('#activo_equipo').focus();
    }else{
      $('#info').hide('slow');
      $('#reubicacion').hide('slow');
    }
  });


  $('#btnmodificar_reubicacion').click(function(){
    $.ajax({
        url     :"editar_reubicacion.php",
        dataType:"json",
        type    :'post',
        data:{ 
          bitacora:       bitacora, 
          id:             $('#activo_equipo').val(),
          activo_retirar: $('#activo_retirar').val(),
          activo_monitor_retirar: $('#txtactivo_monitor_retirar').val(),
          tipo_equipo:    $('#tipo_equipo').val(),
          ip:             $('#ip').val(),
          mac:            $('#mac').val(),
          ubicacion:      $('#ubicacion').val(),
          nueva_ubicacion:$('#nueva_ubicacion').val(),
          activo_monitor: $('#activo_monitor').val(),
          ot:             $('#ot').val(),
          responsable:    $('#responsable').val(),
          nuevo_responsable:$('#nuevo_responsable').val(),
          activo_soporte: $('#activo_soporte').val(),
          extension:      $('#extension').val(),
          prioridad:      $('#prioridad').val(),
          estado:         $('#estado').val(),
          proceso:        $('#proceso').val(),
          red:            $('#punto_de_red').val(),
          observacion:    $('#observacion').val(),  
        },
        success:function (data) {
          $('#msj').removeClass('error');
          $('#msj').addClass('success');
          $('#msj').html('<strong>Reubicacion Modificada.</strong>');
          $('#orden').focus();
          limpiar();
          bitacora=0;
        },
        error:function() {
          console.log('Something went wrong', status, 'Correo de cliente no encontrado.' ); 
        }
      });
  })

});