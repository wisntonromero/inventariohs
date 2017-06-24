$(document).ready(function(){
  $("#capa_btn_guardar_enviar_email_equipo_reubicado").css("display", "none");
  $("#capa_btn_guardar_reubicado").css("display", "block");
  $("#capa_btn_enviar_email_equipo_reubicado").css("display", "block");

$('#consultar_reubicacion').click(
  function ()
  {
     if($('#activo_equipo').val()==""){
      alert("Por favor introduce el numero del activo");
      return false;
    }
    $.ajax({
          url     :"reubicacion-php_consultar_activo_reubicado.php",
          dataType:"json",
          type    :'post',
          data:{
          activo_equipo: $('#activo_equipo').val(),
          },
          success:function(data) {
        if (jQuery.isPlainObject(data)){


            $('#reu_id').val( data['reu_id'] );
            $('#seleccionar_tipo').val( data['id_tip'] );
            $('#id_tip').val( data['id_tip'] );
            $('#tipo_equipo').val( data['tipo_equipo'] );
            $('#seleccionar_marca').val( data['id_mar'] );
            $('#id_mar').val( data['id_mar'] );
            $('#marca').val( data['marca'] );
            $('#modelo_equipo').val( data['modelo_equipo'] );
            $('#activo_monitor').val( data['activo_monitor'] );
            $('#seleccionar_estado').val( data['estado_equipo'] );
            $('#id_est').val( data['estado_equipo'] );
            $('#seleccionar_prioridad').val( data['prioridad'] );
            $('#id_pri').val( data['prioridad'] );
            $('#responsable_actual').val( data['responsable_actual'] );
            $('#usuario_actual').val( data['usuario_actual'] );
            $('#bloque_actual').val( data['bloque_actual'] );
            $('#piso_actual').val( data['piso_actual'] );
            $('#cubiculo_actual').val( data['cubiculo_actual'] );

            $('#dir_ip').val( data['dir_ip'] );
            $('#dir_mac').val( data['dir_mac'] );
            $('#punto_de_red').val( data['punto_de_red'] );

            $('#activo_equipo_retirar').val( data['activo_equipo_retirar'] );
            $('#activo_monitor_retirar').val( data['activo_monitor_retirar'] );
            $('#seleccionar_proceso').val( data['id_pro'] );
            $('#id_pro').val( data['id_pro'] );
            $('#proceso_equipo_retirar').val( data['proceso_equipo_retirar'] );

            $('#responsable').val( data['responsable'] );
            $('#email_nuevo_responsable').val( data['email_nuevo_responsable'] );
            $('#usuario').val( data['usuario'] );
            $('#email_nuevo_usuario').val( data['email_nuevo_usuario'] );
            $('#nuevo_ext_tel').val( data['nuevo_ext_tel'] );


            $('#bloque').val( data['bloque'] );
            $('#piso').val( data['piso'] );
            $('#cubiculo').val( data['cubiculo'] );

            $('#nuevo_dir_ip').val( data['nuevo_dir_ip'] );
            $('#nuevo_dir_mac').val( data['nuevo_dir_mac'] );
            $('#nuevo_punto_de_red').val( data['nuevo_punto_de_red'] );

            $('#ot_sigma').val( data['ot_sigma'] );
            $('#activo_equipo_soporte').val( data['activo_equipo_soporte'] );
            $('#observaciones').val( data['observaciones'] );
            $('#f_ult_actualizacion').val( data['f_ult_actualizacion'] );

            $("#capa_btn_ingresar_reubicacion").css("display", "none");
            $("#capa_btn_enviar_email_equipo_reubicado").css("display", "none");
            alert("Activo encontrado en la base de datos de reubicaciones....")

            estado = $('#id_est').val();

            $('#res').html("---- Consulta de activo exitosa. ---- ");
            $('#res').css('color','yellow');

              if(estado==6){
                $("#capa_btn_guardar_enviar_email_equipo_reubicado").css("display", "none");
                $("#capa_btn_enviar_email_equipo_reubicado").css("display", "none");
                $("#capa_btn_guardar_reubicado").css("display", "none");
                $("#capa_btn_guardar_reubicado").css("display", "none");
                $('#capa_select_estado').children().attr('disabled', 'disabled'); // To disable
                // To enable
               // $('#capa_select_estado').children().attr('enabled', 'enabled');
              }
              if(estado==5){
                $("#capa_btn_guardar_enviar_email_equipo_reubicado").css("display", "none");
                $("#capa_btn_enviar_email_equipo_reubicado").css("display", "none");
                $("#capa_btn_guardar_reubicado").css("display", "block");
                //style.display = 'block';
              }
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el nro del activo del equipo.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Activo no encontrado.")
            $("#capa_btn_ingresar_reubicacion").css("display", "block");
            console.log('Something went wrong', status, 'Activo no encontrado.' );
          }
        });
  });

$('#btn_exportar_equipo_reubicado').click(
  function ()
  {
     if($('#activo_equipo').val()==""){
      alert("Por favor introduce el numero del activo");
      return false;
    }
    $.ajax({
          url     :"reubicacion-php_consultar_activo_reubicado_exportar.php",
          dataType:"json",
          type    :'post',
          data:{
          activo_equipo: $('#activo_equipo').val(),
          },
          success:function(data) {
        if (jQuery.isPlainObject(data)){


            $('#reu_id').val( data['reu_id'] );
            $('#seleccionar_tipo').val( data['id_tip'] );
            $('#id_tip').val( data['id_tip'] );
            $('#tipo_equipo').val( data['tipo_equipo'] );
            $('#seleccionar_marca').val( data['id_mar'] );
            $('#id_mar').val( data['id_mar'] );
            $('#marca').val( data['marca'] );
            $('#modelo_equipo').val( data['modelo_equipo'] );
            $('#activo_monitor').val( data['activo_monitor'] );
            $('#seleccionar_estado').val( data['estado_equipo'] );
            $('#id_est').val( data['estado_equipo'] );
            $('#seleccionar_prioridad').val( data['prioridad'] );
            $('#id_pri').val( data['prioridad'] );
            $('#responsable_actual').val( data['responsable_actual'] );
            $('#usuario_actual').val( data['usuario_actual'] );
            $('#bloque_actual').val( data['bloque_actual'] );
            $('#piso_actual').val( data['piso_actual'] );
            $('#cubiculo_actual').val( data['cubiculo_actual'] );

            $('#dir_ip').val( data['dir_ip'] );
            $('#dir_mac').val( data['dir_mac'] );
            $('#punto_de_red').val( data['punto_de_red'] );

            $('#activo_equipo_retirar').val( data['activo_equipo_retirar'] );
            $('#activo_monitor_retirar').val( data['activo_monitor_retirar'] );
            $('#seleccionar_proceso').val( data['id_pro'] );
            $('#proceso_equipo_retirar').val( data['proceso_equipo_retirar'] );

            $('#responsable').val( data['responsable'] );
            $('#email_nuevo_responsable').val( data['email_nuevo_responsable'] );
            $('#usuario').val( data['usuario'] );
            $('#email_nuevo_usuario').val( data['email_nuevo_usuario'] );
            $('#nuevo_ext_tel').val( data['nuevo_ext_tel'] );


            $('#bloque').val( data['bloque'] );
            $('#piso').val( data['piso'] );
            $('#cubiculo').val( data['cubiculo'] );

            $('#nuevo_dir_ip').val( data['nuevo_dir_ip'] );
            $('#nuevo_dir_mac').val( data['nuevo_dir_mac'] );
            $('#nuevo_punto_de_red').val( data['nuevo_punto_de_red'] );

            $('#ot_sigma').val( data['ot_sigma'] );
            $('#activo_equipo_soporte').val( data['activo_equipo_soporte'] );
            $('#observaciones').val( data['observaciones'] );
            $('#f_ult_actualizacion').val( data['f_ult_actualizacion'] );

            $("#capa_btn_ingresar_reubicacion").css("display", "none");
            $("#capa_btn_enviar_email_equipo_reubicado").css("display", "none");
            alert("Activo encontrado en la base de datos de reubicaciones....")

            estado = $('#id_est').val();

            $('#res').html("---- Consulta de activo exitosa. ---- ");
            $('#res').css('color','yellow');

              if(estado==6){
                $("#capa_btn_guardar_enviar_email_equipo_reubicado").css("display", "none");
                $("#capa_btn_enviar_email_equipo_reubicado").css("display", "none");
                $("#capa_btn_guardar_reubicado").css("display", "none");
                $("#capa_btn_guardar_reubicado").css("display", "none");
                $('#capa_select_estado').children().attr('disabled', 'disabled'); // To disable
                // To enable
               // $('#capa_select_estado').children().attr('enabled', 'enabled');
              }
              if(estado==5){
                $("#capa_btn_guardar_enviar_email_equipo_reubicado").css("display", "none");
                $("#capa_btn_enviar_email_equipo_reubicado").css("display", "none");
                $("#capa_btn_guardar_reubicado").css("display", "block");
                //style.display = 'block';
              }
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el nro del activo del equipo.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Activo no encontrado.")
            $("#capa_btn_ingresar_reubicacion").css("display", "block");
            console.log('Something went wrong', status, 'Activo no encontrado.' );
          }
        });
  });


$('#btningresar_reubicacion').click(
  function()
  {
    if($('#activo_equipo').val()==""){
      alert("Introduce el activo del equipo");
      return false;
    }
    else{
      var activo_equipo = $('#activo_equipo').val();
    }

    if($('#id_tip').val()==""){
      alert("Introduce el tipo de equipo");
      return false;
    }
    else{
      var id_tip = $('#id_tip').val();
    }

    if($('#id_mar').val()==""){
      alert("Introduce la marca del equipo");
      return false;
    }
    else{
      var id_mar = $('#id_mar').val();
    }

    if($('#activo_monitor').val()==""){
      alert("Introduce el activo del monitor");
      return false;
    }
    else{
      var activo_monitor = $('#activo_monitor').val();
    }

    if($('#id_pri').val()==""){
      alert("Introduce la prioridad del equipo");
      return false;
    }
    else{
      var id_pri = $('#id_pri').val();
    }

    if($('#id_pro').val()==""){
      alert("Introduce el proceso con el equipo a retirar");
      return false;
    }
    else{
      var id_pro = $('#id_pro').val();
    }

    if($('#nuevo_dir_ip').val()==""){
      alert("Introduce la dirección Ip del equipo");
      return false;
    }
    else{
      var nuevo_dir_ip = $('#nuevo_dir_ip').val();
    }

    if($('#dir_ip').val()==""){
      alert("Introduce la direccíon Ip del equipo");
      return false;
    }
    else{
      var dir_ip = $('#dir_ip').val();
    }

    if(dir_ip.indexOf(',') != -1){
      alert("No se aceptan (,). Coloca (.) para separar las ip.");
      return false;
    }
    else{
      var dir_ip = $('#dir_ip').val();
    }

    if($('#dir_mac').val()==""){
      alert("Introduce la dirección Mac del equipo");
      return false;
    }
    else{
      var dir_mac = $('#dir_mac').val();
    }

    if($('#nuevo_punto_de_red').val()==""){
      alert("Introduce el punto de red del equipo");
      return false;
    }
    else{
      var nuevo_punto_de_red = $('#nuevo_punto_de_red').val();
    }

    if($('#ot_sigma').val()==""){
      alert("Introduce el nro de la OT de sigma");
      return false;
    }
    else{
      var ot_sigma = $('#ot_sigma').val();
    }

      var id_est                  = $('#id_est').val();
      var modelo_equipo           = $('#modelo_equipo').val();
      var responsable_actual      = $('#responsable_actual').val();
      var usuario_actual          = $('#usuario_actual').val();
      var bloque_actual           = $('#bloque_actual').val();
      var piso_actual             = $('#piso_actual').val();
      var cubiculo_actual         = $('#cubiculo_actual').val();
      var activo_equipo_retirar   = $('#activo_equipo_retirar').val();
      var activo_monitor_retirar  = $('#activo_monitor_retirar').val();
      var responsable             = $('#responsable').val();
      var email_nuevo_responsable = $('#email_nuevo_responsable').val();
      var usuario                 = $('#usuario').val();
      var email_nuevo_usuario     = $('#email_nuevo_usuario').val();
      var bloque                  = $('#bloque').val();
      var piso                    = $('#piso').val();
      var cubiculo                = $('#cubiculo').val();
      var nuevo_ext_tel           = $('#nuevo_ext_tel').val();
      var activo_equipo_soporte   = $('#activo_equipo_soporte').val();
      var observaciones           = $('#observaciones').val();

      $.ajax({
      url     :"reubicacion-php_ingresar_reubicacion.php",
      dataType:"json",
      type    :'post',
      data:{
        activo_equipo:activo_equipo,
        id_tip:id_tip,
        id_mar:id_mar,
        modelo_equipo:modelo_equipo,
        activo_monitor:activo_monitor,
        id_pri:id_pri,
        id_est:id_est,
        responsable_actual:responsable_actual,
        usuario_actual:usuario_actual,
        bloque_actual:bloque_actual,
        piso_actual:piso_actual,
        cubiculo_actual:cubiculo_actual,
        activo_equipo_retirar:activo_equipo_retirar,
        activo_monitor_retirar:activo_monitor_retirar,
        id_pro:id_pro,
        responsable:responsable,
        email_nuevo_responsable:email_nuevo_responsable,
        usuario:usuario,
        email_nuevo_usuario:email_nuevo_usuario,
        bloque:bloque,
        piso:piso,
        cubiculo:cubiculo,
        nuevo_dir_ip:nuevo_dir_ip,
        dir_mac:dir_mac,
        nuevo_punto_de_red:nuevo_punto_de_red,
        nuevo_ext_tel:nuevo_ext_tel,
        ot_sigma:ot_sigma,
        activo_equipo_soporte:activo_equipo_soporte,
        observaciones:observaciones
      },
      success:function(data) {
        if(data = 1){
          $('#res').html("---- Reubicación ingresada al sistema. ----");
          $('#res').css('color','yellow');
          $("#capa_btn_ingresar_reubicacion").css("display", "none");
          alert("Orden de compra ingresada al sistema.")
        }
        else{
          $("#capa_btn_ingresar_reubicacion").css("display", "none");
          $('#res').html("Ha ocurrido un error en el ingreso de la compra.");
          $('#res').css('color','red');
        }
      },
      error:function() {
        $("#capa_btn_ingresar_reubicacion").css("display", "none");
        alert("Equipo adicionado a la base de datos de reubicaciones..")
        console.log('Something went wrong', status, 'Equipo adicionado al sistema.' );
      }
    });
  }
);

$('#btnmodificar_reubicacion').click(
  function()
  {

    if($('#dir_ip').val()==""){
      alert("Introduce la direccíon Ip del equipo");
      return false;
    }
    else{
      var dir_ip = $('#dir_ip').val();
    }

    var dir_ip = $('#dir_ip').val();
    if(dir_ip.indexOf(',') != -1){
    alert("No se aceptan (,). Coloca (.) para separar las ip.");
    return false;
    }
    else{
      var dir_ip = $('#dir_ip').val();
    }


        $.ajax({
          url     :"reubicacion-php_modificar_reubicacion.php",
          dataType:"json",
          type    :'post',
          data:{

          reu_id:                 $('#reu_id').val(),
          activo_equipo:          $('#activo_equipo').val(),
          id_tip:                 $('#id_tip').val(),
          id_mar:                 $('#id_mar').val(),
          marca:                  $('#marca').val(),
          modelo_equipo:          $('#modelo_equipo').val(),
          id_pri:                 $('#id_pri').val(),
          orden_de_compra:        $('#orden_de_compra').val(),
          serial_equipo:          $('#serial_equipo').val(),
          id_cen:                 $('#id_cen').val(),
          activo_monitor:         $('#activo_monitor').val(),
          serial_monitor:         $('#serial_monitor').val(),
          id_est:                 $('#id_est').val(),
          estado_equipo:          $('#estado_equipo').val(),
          activo_equipo_retirar:  $('#activo_equipo_retirar').val(),
          activo_monitor_retirar: $('#activo_monitor_retirar').val(),
          id_pro:                 $('#id_pro').val(),
          proceso_equipo_retirar: $('#proceso_equipo_retirar').val(),

          responsable_actual:     $('#responsable_actual').val(),
          usuario_actual:         $('#usuario_actual').val(),
          nuevo_ext_tel:          $('#nuevo_ext_tel').val(),

          bloque_actual:          $('#bloque_actual').val(),
          piso_actual:            $('#piso_actual').val(),
          cubiculo_actual:        $('#cubiculo_actual').val(),

          dir_ip:                 $('#dir_ip').val(),
          dir_mac:                $('#dir_mac').val(),
          punto_de_red:           $('#punto_de_red').val(),
          ot_sigma:               $('#ot_sigma').val(),
          activo_equipo_soporte:  $('#activo_equipo_soporte').val(),
          observaciones:          $('#observaciones').val(),

          responsable:            $('#responsable').val(),
          email_nuevo_responsable:$('#email_nuevo_responsable').val(),
          usuario:                $('#usuario').val(),
          email_nuevo_usuario:    $('#email_nuevo_usuario').val(),
          bloque:                 $('#bloque').val(),
          piso:                   $('#piso').val(),
          cubiculo:               $('#cubiculo').val(),
          nuevo_dir_ip:           $('#nuevo_dir_ip').val(),
          dir_mac:                $('#dir_mac').val(),
        },
          success:function(data) {
            if(data = 1){
              $('#res').html("Reubicación de activo modificado en el sistema.");
              $('#res').css('color','yellow');
              alert("Activo modificado en la base de datos de reubiacaciones.");
            }
            else{
              $('#res').html("Ha ocurrido un error.");
              $('#res').css('color','red');
            }
          },
          error:function() {
             alert("Activo modificado en la base de datos...");
             $('#res').html("Activo modificado en la base de datos...");
            //alert("Error el activo no puedo ser modificado en la base de datos.")
            console.log('Something went wrong', status, 'Reubicación de activo no encontrada.' );
          }
        });
  }
);


$('#btnmodificar_reubicado_enviar_email').click(
  function ()
  {
    if($('#activo_equipo').val()==""){
      alert("Por favor introduce el numero del activo");
      return false;
    }
    if($('#email_nuevo_responsable').val()==""){
      alert("Por favor introduce el email del responsable");
      return false;
    }

    if($('#email_nuevo_usuario').val()==""){
      alert("Por favor introduce el email del usuario");
      return false;
    }

    if($('#ot_sigma').val()==""){
      alert("Introduce el nro de la OT de sigma");
      return false;
    }

    if($('#nuevo_ext_tel').val()==""){
      alert("Introduce la extension telefonica del nuevo usuario");
      return false;
    }
    else{
      var nuevo_ext_tel = $('#nuevo_ext_tel').val();
    }

    if($('#id_pro').val()==""){
      alert("Introduce proceso del equipo a retirar (Baja - Reubicacion - Etc.)");
      return false;
    }
    else{
      var id_pro = $('#id_pro').val();
    }

    if($('#dir_ip').val()==""){
      alert("Introduce la direccíon Ip del equipo");
      return false;
    }
    else{
      var dir_ip = $('#dir_ip').val();
    }

    if(dir_ip.indexOf(',') != -1){
      alert("No se aceptan (,). Coloca (.) para separar las ip.");
      return false;
    }
    else{
      var dir_ip = $('#dir_ip').val();
    }
    
    if($('#punto_de_red').val()=="NO APLICA"){
      alert("Punto de red no valido, Coloca NO TIENE.");
      $("#capa_btn_guardar_enviar_email").css("display", "block");
      return false;
    }
    else{
      var punto_de_red = $('#punto_de_red').val();
    }

    if($('#punto_de_red').val()=="N/A"){
      alert("Punto de red no valido, Coloca NO TIENE.");
      $("#capa_btn_guardar_enviar_email").css("display", "block");
      return false;
    }
    else{
      var punto_de_red = $('#punto_de_red').val();
    }

    if($('#punto_de_red').val()=="N"){
      alert("Punto de red no valido, Coloca NO TIENE.");
      $("#capa_btn_guardar_enviar_email").css("display", "block");
      return false;
    }
    else{
      var punto_de_red = $('#punto_de_red').val();
    }

    if($('#punto_de_red').val()=="NA"){
      alert("Punto de red no valido, Coloca NO TIENE.");
      $("#capa_btn_guardar_enviar_email").css("display", "block");
      return false;
    }
    else{
      var punto_de_red = $('#punto_de_red').val();
    }

    if($('#punto_de_red').val()=="NO"){
      alert("Punto de red no valido, Coloca NO TIENE.");
      $("#capa_btn_guardar_enviar_email").css("display", "block");
      return false;
    }
    else{
      var punto_de_red = $('#punto_de_red').val();
    }

    if($('#punto_de_red').val()==""){
      alert("Punto de red puede estar vacio, Coloca NO TIENE.");
      $("#capa_btn_guardar_enviar_email").css("display", "block");
      return false;
    }
    else{
      var punto_de_red = $('#punto_de_red').val();
    }

    $.ajax({
          url     :"reubicacion-php_modificar_reubicacion_enviar_email.php",
          dataType:"json",
          type    :'post',
          data:{
          reu_id:                 $('#reu_id').val(),
          activo_equipo           : $('#activo_equipo').val(),
          id_tip                  : $('#id_tip').val(),
          tipo_equipo             : $('#tipo_equipo').val(),
          id_mar                  : $('#id_mar').val(),
          marca                   : $('#marca').val(),
          modelo_equipo           : $('#modelo_equipo').val(),
          activo_monitor          : $('#activo_monitor').val(),
          id_pri                  : $('#id_pri').val(),
          id_est                  : $('#id_est').val(),
          responsable_actual      : $('#responsable_actual').val(),
          usuario_actual          : $('#usuario_actual').val(),
          bloque_actual           : $('#bloque_actual').val(),
          piso_actual             : $('#piso_actual').val(),
          cubiculo_actual         : $('#cubiculo_actual').val(),
          activo_equipo_retirar   : $('#activo_equipo_retirar').val(),
          activo_monitor_retirar  : $('#activo_monitor_retirar').val(),
          id_pro                  : $('#id_pro').val(),
          proceso_equipo_retirar  : $('#proceso_equipo_retirar').val(),
          responsable             : $('#responsable').val(),
          email_nuevo_responsable : $('#email_nuevo_responsable').val(),
          usuario                 : $('#usuario').val(),
          email_nuevo_usuario     : $('#email_nuevo_usuario').val(),
          bloque                  : $('#bloque').val(),
          piso                    : $('#piso').val(),
          cubiculo                : $('#cubiculo').val(),
          dir_ip                  : $('#dir_ip').val(),
          dir_mac                 : $('#dir_mac').val(),
          punto_de_red            : $('#punto_de_red').val(),
          nuevo_dir_ip            : $('#nuevo_dir_ip').val(),
          nuevo_punto_de_red      : $('#nuevo_punto_de_red').val(),
          nuevo_ext_tel           : $('#nuevo_ext_tel').val(),
          ot_sigma                : $('#ot_sigma').val(),
          observaciones           : $('#observaciones').val(),
          },
          success:function(data){
            if(data > 1){
              $('#res').html("---- El mensaje se envio con exito al usuario. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error al enviar el mensaje, verifique su conexion a internet.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            //alert("Activo no encontrado modulo mail.")
            $("#capa_btn_guardar_enviar_email_equipo_reubicado").css("display", "none");
            alert("Activo modificado en la base de datos, se envio correo a todos los implicados.");
            $('#res').html("---- El mensaje se envio al usuario. ----");
            console.log('Something went wrong', status, 'Activo no encontrado.' );
          }
        });
  }
);


$('.consultar_reubicacion').focusout(
  function ()
  {

    $.ajax({
          url     :"reubicacion-php_consultar_activo_reubicado.php",
          dataType:"json",
          type    :'post',
          data:{
          activo_equipo: $('#activo_equipo').val(),
          },
          success:function(data) {
        if (jQuery.isPlainObject(data)){

            $('#seleccionar_tipo').val( data['id_tip'] );
            $('#id_tip').val( data['id_tip'] );
            $('#seleccionar_marca').val( data['id_mar'] );
            $('#id_mar').val( data['id_mar'] );
            $('#modelo_equipo').val( data['modelo_equipo'] );
            $('#activo_monitor').val( data['activo_monitor'] );
            $('#seleccionar_estado').val( data['estado_equipo'] );
            $('#id_est').val( data['estado_equipo'] );
            $('#seleccionar_prioridad').val( data['prioridad'] );
            $('#id_pri').val( data['prioridad'] );

            $('#responsable_actual').val( data['responsable_actual'] );
            $('#usuario_actual').val( data['usuario_actual'] );

            $('#bloque_actual').val( data['bloque_actual'] );
            $('#piso_actual').val( data['piso_actual'] );
            $('#cubiculo_actual').val( data['cubiculo_actual'] );

            $('#dir_ip').val( data['dir_ip'] );
            $('#dir_mac').val( data['dir_mac'] );
            $('#punto_de_red').val( data['punto_de_red'] );

            $('#activo_equipo_retirar').val( data['activo_equipo_retirar'] );
            $('#activo_monitor_retirar').val( data['activo_monitor_retirar'] );
            $('#seleccionar_proceso').val( data['procesos'] );

            $('#responsable').val( data['responsable'] );
            $('#email_nuevo_responsable').val( data['email_nuevo_responsable'] );
            $('#usuario').val( data['usuario'] );
            $('#email_nuevo_usuario').val( data['email_nuevo_usuario'] );
            $('#nuevo_ext_tel').val( data['nuevo_ext_tel'] );

            $('#bloque').val( data['bloque'] );
            $('#piso').val( data['piso'] );
            $('#cubiculo').val( data['cubiculo'] );

            $('#nuevo_dir_ip').val( data['nuevo_dir_ip'] );
            $('#nuevo_dir_mac').val( data['nuevo_dir_mac'] );
            $('#nuevo_punto_de_red').val( data['nuevo_punto_de_red'] );

            $('#ot_sigma').val( data['ot_sigma'] );
            $('#activo_equipo_soporte').val( data['activo_equipo_soporte'] );
            $('#observaciones').val( data['observaciones'] );
            $('#f_ult_actualizacion').val( data['f_ult_actualizacion'] );

            $("#capa_btn_ingresar_reubicacion").css("display", "none");

          //  if(data = 1){
              $('#res').html("---- Consulta de activo exitosa. ---- ");
              $('#res').css('color','yellow');
              alert("Ya este Activo lo ingresaste.")
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el nro del activo del equipo.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Activo no encontrado.")
            console.log('Something went wrong', status, 'Activo no encontrado.' );
          }
        });
  });


  //PUNTOS DE RED
  function letrasynumeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789abcdefghijklmnñopqrstuvwxyz";
    especiales = [48,49,50,51,52,53,54,55,56,57,32];

    tecla_especial = false
    for(var i in especiales){
      if(key == especiales[i]){
         tecla_especial = true;
         break;
      }
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
  }

  function letrasynumeros_sin_espacio(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789abcdefghijklmnñopqrstuvwxyz";
    especiales = [48,49,50,51,52,53,54,55,56,57];

    tecla_especial = false
    for(var i in especiales){
      if(key == especiales[i]){
         tecla_especial = true;
         break;
      }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
  }

  // DIR IP
  function solonumeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = ".";
    especiales = [48,49,50,51,52,53,54,55,56,57,188];

    tecla_especial = false
    for(var i in especiales){
      if(key == especiales[i]){
         tecla_especial = true;
         break;
      }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
  }

  // DIR MAC
  function solohexadecimal(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "0123456789abcdef-";
    especiales = [48,49,50,51,52,53,54,55,56,57];

    tecla_especial = false
    for(var i in especiales){
      if(key == especiales[i]){
         tecla_especial = true;
         break;
      }
    }

    if(letras.indexOf(tecla)==-1 && !tecla_especial)
        return false;
  }

  function limpia(){
      var val = document.getElementById("miInput").value;
      var tam = val.length;
      for(i=0;i<tam;i++){
   if(!isNaN(val[i]))
   document.getElementById("miInput").value='';
      }
  }
 });


 // $.ajax({
 //        url     :"cargar_marcas.php",
 //        dataType:"json",
 //        type    :"post",
 //        success:function(datos) {
 //          for (var i = 0; i <= datos.length - 1; i++) {
 //              $('#cbxmarca').append("<option value="+datos[i].id+">"+datos[i].marca+"</option>");
 //          };
 //        },
 //        error:function() {

 //          console.log('Something went wrong', status, err );

 //        }
 //      });

 //   $.ajax({
 //      url     :"cargar_tipo_equipos.php",
 //      dataType:"json",
 //      type    :"post",
 //      success:function(datos) {
 //        for (var i = 0; i <= datos.length - 1; i++) {
 //            $('.tipo_equipo').append("<option class='mayuscula' value="+datos[i].id+">"+datos[i].tipo+"</option>");
 //        };
 //      },
 //      error:function() {

 //        console.log('Something went wrong', status, err );

 //      }
 //    });

   // $.ajax({
   //    url     :"cargar_centro_costos.php",
   //    dataType:"json",
   //    type    :"post",
   //    success:function(datos) {
   //      for (var i = 0; i <= datos.length - 1; i++) {
   //          $('#cbxcentro_costo').append("<option class='mayuscula' value="+datos[i].id+">"+datos[i].centro+"</option>");
   //      };
   //    },
   //    error:function() {

   //      console.log('Something went wrong', status, err );

   //    }
   //  });

  // $.ajax({
  //     url     :"cargar_prioridad.php",
  //     dataType:"json",
  //     type    :"post",
  //     success:function(datos) {
  //       for (var i = 0; i <= datos.length - 1; i++) {
  //           $('.prioridad').append("<option class='mayuscula' value="+datos[i].id+">"+datos[i].prioridad+"</option>");
  //       };
  //     },
  //     error:function() {

  //       console.log('Something went wrong', status, err );

  //     }
  //   });

    // $.ajax({
    //   url     :"cargar_procesos.php",
    //   dataType:"json",
    //   type    :"post",
    //   success:function(datos) {
    //     for (var i = 1; i <= datos.length - 1; i++) {
    //         $('#cbxproceso').append("<option class='mayuscula' value="+datos[i].id+">"+datos[i].proceso+"</option>");
    //     };
    //     for (var i = 0; i <= datos.length - 1; i++) {
    //         $('.proceso').append("<option class='mayuscula' value="+datos[i].id+">"+datos[i].proceso+"</option>");
    //     };
    //   },
    //   error:function() {

    //     console.log('Something went wrong', status, err );
    //   }
    // });
