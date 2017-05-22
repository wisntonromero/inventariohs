$(document).ready(function(){

  $(document).keyup(function(){
    $('h5').html('');
  });

  $('#cbxproceso').change(function(){
    $('#msj').html('');
    if($('#cbxproceso').val()==2){
      limpiar();
      $('#compra').show('slow');
      $('#reubicacion').hide('slow');
    }else if($('#cbxproceso').val()==3){
      limpiar();
      $('#compra').hide('slow');
      $('#reubicacion').show('slow');
      $('#activo').focus();
    }else{
      $('#compra').hide('slow');
      $('#reubicacion').hide('slow');
    }
  });

	$('#btnguardar_compra').click(function(){
    if($('#txtorden').val()!='' && $('#cbxmarca').val()!='-1' && $('#txtmodelo').val()!=''&& $('#cbxtipo_equipo').val()!='-1' && $('#txtubicacion').val()!='' && $('#txtresponsable').val()!='' && $('#txtusuario').val()!='' && $('#txtserial_equipo').val()!='' && $('#cbxcentro_costo').val()!='-1' && $('#cbxprioridad').val()!='-1'){
      $.ajax({
          url     : "guardar_equipo.php",
          type    : 'post',
          data:{ 
            orden          : $('#txtorden').val(),
            marca          : $('#cbxmarca').val(),
            modelo         : $('#txtmodelo').val(),
            tipo_equipo    : $('#cbxtipo_equipo').val(),  
            ubicacion      : $('#txtubicacion').val(),
            activo_retirar : $('#txtactivo_retirar').val(),
            monitor_retirar : $('#txtactivo_monitor_retirar').val(),
            usuario        : $('#txtusuario').val(),
            nuevo_activo   : $('#txtnuevo_activo').val(),
            serial_equipo  : $('#txtserial_equipo').val(),
            activo_monitor : $('#txtactivo_monitor').val(),
            serial_monitor : $('#txtserial_monitor').val(),
            extension      : $('#txtextension').val(),
            centro_costo   : $('#cbxcentro_costo').val(),
            estado         : $('#cbxestado').val(),
            prioridad      : $('#cbxprioridad').val(),
            proceso        : $('#cbxprocesos').val(),
            observaciones  : $('#txtobservaciones').val(),
            nombre         : $('#txtresponsable').val(),
          },
          success:function(datos) {
            if(datos==2){
              $('h5').removeClass('success');
              $('h5').addClass('error');
              $('h5').html('<strong>Orden de Compra Existente</strong>');
            }else{
              $('h5').removeClass('error');
              $('h5').addClass('success');
              $('h5').html('<strong>Equipo Guardado.</strong>');
              limpiar();
            }
          },
          error:function() {
            alert("El servidor no se encuentra disponible.");
          }
      });
    }else{
      $('h5').removeClass('success');
      $('h5').addClass('error');
      $('h5').html('<strong>Complete Todos los Campos.</strong>');
    };
	});

  $('#btnguardar_reubicacion').click(function(){
    if($('#activo_retirar').val()!='' && $('#activo').val()!='' && $('#tipo_equipo').val()!='-1' && $('#ubicacion').val()!='' && $('#nueva_ubicacion').val()!='' && $('#responsable').val()!='' && $('#nuevo_responsable').val()!='' && $('#prioridad').val()!='-1' && $('#ot').val()!='' && $('#ip').val()!='' && $('#mac').val()!='' && $('#punto_de_red').val()!=''){
      $.ajax({
            url     : "guardar_reubicacion.php",
            dataType: "json",
            type    : 'post',
            data:{ 
              activo         : $('#activo').val(),
              activo_monitor : $('#activo_monitor').val(),
              ubicacion      : $('#ubicacion').val(),
              responsable    : $('#responsable').val(),
              tipo_equipo    : $('#tipo_equipo').val(), 
              activo_retirar : $('#activo_retirar').val(),
              activo_monitor_retirar : $('#activo_monitor_retirar').val(),
              nueva_ubicacion: $('#nueva_ubicacion').val(),
              nuevo_responsable: $('#nuevo_responsable').val(),
              activo_soporte : $('#activo_soporte').val(),
              proceso        : $('#cbxprocesos').val(),
              prioridad      : $('#prioridad').val(),
              extension      : $('#extension').val(),
              observacion    : $('#observacion').val(),
              ot             : $('#ot').val(),
              mac            : $('#mac').val(),
              ip             : $('#ip').val(),
              red            : $('#punto_de_red').val(),
            },
            success:function(datos) {
              if(datos==2){
                $('h5').removeClass('success');
                $('h5').addClass('error');
                $('h5').html('<strong>Proceso Existente</strong>');
              }else{
                $('h5').removeClass('error');
                $('h5').addClass('success');
                $('h5').html('<strong>Equipo Guardado.</strong>');
                limpiar();
              }
            },
            error:function() {
              alert("El servidor no se encuentra disponible.");
            }
        });
    }else{
      $('h5').removeClass('success');
      $('h5').addClass('error');
      $('h5').html('<strong>Complete Todos los Campos.</strong>');
    }
  });

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


  $(".solonum").keypress(function(tecla) {
     if(tecla.charCode < 35 || ((tecla.charCode > 35 && tecla.charCode < 42) || (tecla.charCode > 42 && tecla.charCode < 48)) || tecla.charCode > 57) return false;
   });


  function limpiar(){
    $('input:text').val('');
    $('textarea').val('');
    $('.combo').val('-1');
  };


  /*$('#activo_retirar').focusout(function(){*/
    if($('#activo_retirar').val() !=''){
      $.ajax({
            url     : "consultar_reubicacion_por_activo.php",
            dataType: "json",
            type    : 'post',
            data:{ 
              activo : $('#activo_retirar').val(),
            },
            success:function(datos) {
              if(datos!=2){
                $('#tipo_equipo').val(datos['tipo_equipo']);
                $('#ubicacion').val(datos['ubicacion']);
                $('#prioridad').val(datos['prioridad']);
                $('#punto_de_red').val(datos['punto_de_red']);
                $('#mac').val(datos['mac']);
                $('#ip').val(datos['ip']);
                $('#ot').val(datos['ot']);
                $('#extension').val(datos['extension']);
                $('#responsable').val(datos['responsable']);
                $('#observacion').val(datos['observacion']);
                $('#activo_monitor').val(datos['activo_monitor']);
              }
            },
            error:function() {
              alert("El servidor no se encuentra disponible.");
            }
        });
    }
/*  });*/


  $(".restringir").keydown(function(event) {
    if(event.shiftKey){event.preventDefault();}
    if($(".restringir").val().length > 4) {
      if(event.keyCode!=8){
        event.preventDefault();
      }
    };
  });


});