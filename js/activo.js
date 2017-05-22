$('#consultar').click(
  function ()
  {
     if($('#activo_equipo').val()==""){
      alert("Por favor introduce el numero del activo");
      return false;
    }
    $.ajax({
          url     :"activo-php_consultar_activo.php",
          dataType:"json",
          type    :'post',
          data:{
          activo_equipo: $('#activo_equipo').val(),
          },
          success:function(data) {

            if ( jQuery.isEmptyObject(data) == false ){

              $('#tipo_equipo').val( data['tipo_equipo'] );
              $('#marca_equipo').val( data['marca_equipo'] );
              $('#modelo_equipo').val( data['modelo_equipo'] );
              $('#serial_equipo').val( data['serial_equipo'] );
              $('#activo_mon').val( data['activo_mon'] );
              $('#estado_equipo').val( data['estado_equipo'] );

              $('#dir_ip').val( data['dir_ip'] );
              $('#dir_mac').val( data['dir_mac'] );
              $('#punto_de_red').val( data['punto_de_red'] );
              $('#nro_cc').val( data['nro_cc'] );
              $('#punto_de_red_actual').val( data['punto_de_red_actual'] );
              $('#punto_de_voz').val( data['punto_de_voz'] );
              $('#vlan_puerto_sw').val( data['vlan_puerto_sw'] );
              $('#seleccionar_switches_puertos').val( data['bit_sw_id'] );
              $('#dir_ip_sw').val( data['dir_ip_sw'] );
              $('#puerto_sw').val( data['puerto_sw'] );
              $('#ubicacion_p_red').val( data['ubicacion_p_red'] );
              $('#f_ult_actualiza').val( data['f_ult_actualiza'] );

              $('#bloque').val( data['bloque'] );
              $('#piso').val( data['piso'] );
              $('#departamento').val( data['departamento'] );
              $('#cubiculo').val( data['cubiculo'] );

              $('#estado_puerto_sw').val( data['estado_puerto_sw'] );
              $('#estado_punto_de_red').val( data['estado_punto_de_red'] );
              $('#tipo_de_punto_de_red').val( data['tipo_de_punto_de_red'] );
              $('#color_toma').val( data['color_toma'] );
              $('#categoria_punto_de_red').val( data['categoria_punto_de_red'] );

              $('#responsable').val( data['responsable'] );
              $('#email_responsable').val( data['email_responsable'] );
              $('#usuario').val( data['usuario'] );
              $('#email_usuario').val( data['email_usuario'] );
              $('#ext_tel').val( data['ext_tel'] );
              $('#observaciones').val( data['observaciones'] );

              $('#res').html("---- Consulta de activo exitosa. ---- ");
              $('#res').css('color','yellow');
              $("#boton_ingresar_activo").css("display", "none");
              alert("Activo encontrado la base de datos de inventario, pulse aceptar para continuar.");
            }
            else{
              alert("Activo no encontrado, verifique el nro del activo del equipo.");
              console.log('Something went wrong', status, 'Activo no encontrado.' );
              $("#boton_ingresar_activo").css("display", "block");
              $('#res').html("Activo no encontrado en la base de datos, verifique el nro del activo del equipo.");
              $('#res').css('color','red');
              }
          },
              error:function() {
          }
        });
});

$('#consultar2').click(
  function ()
  {
     if($('#activo_equipo').val()==""){
      alert("Por favor introduce el numero del activo");
      return false;
    }
    $.ajax({
          url     :"activo-php_consultar_activo2.php",
          dataType:"json",
          type    :'post',
          data:{
          activo_equipo: $('#activo_equipo').val(),
          },
        success:function(data){
          if ( jQuery.isEmptyObject(data) == false )
          {
            $('#tipo_equipo').val( data['tipo_equipo'] );
            $('#marca_equipo').val( data['marca_equipo'] );
            $('#modelo_equipo').val( data['modelo_equipo'] );
            $('#activo_mon').val( data['activo_mon'] );
            $('#estado_equipo').val( data['estado_equipo'] );

            $('#dir_ip').val( data['dir_ip'] );
            $('#dir_mac').val( data['dir_mac'] );
            $('#punto_de_red').val( data['punto_de_red'] );
            $('#punto_de_voz').val( data['punto_de_voz'] );
            $('#vlan_puerto_sw').val( data['vlan_puerto_sw'] );
            $('#dir_ip_sw').val( data['dir_ip_sw'] );
            $('#puerto_sw').val( data['puerto_sw'] );
            $('#ubicacion_p_red').val( data['ubicacion_p_red'] );
            $('#f_ult_actualiza').val( data['f_ult_actualiza'] );

            $('#bloque').val( data['bloque'] );
            $('#piso').val( data['piso'] );
            $('#departamento').val( data['departamento'] );
            $('#cubiculo').val( data['cubiculo'] );
            $('#responsable').val( data['responsable'] );
            $('#usuario').val( data['usuario'] );
            $('#ext_tel').val( data['ext_tel'] );
            $('#observaciones').val( data['observaciones'] );

            $('#res').html("---- Consulta de activo exitosa. ---- ");
            $('#res').css('color','yellow');
            $("#boton_ingresar_activo").css("display", "none");
          }
          else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el nro del activo del equipo.");
              $('#res').css('color','red');
              alert("Activo no encontrado.")
              console.log('Something went wrong', status, 'Activo no encontrado.' );
              $("#boton_ingresar_activo").css("display", "block");
          }
        },
          error:function() {
          }
  });
});


$('#consultar_retirar').click(
  function ()
  {
     if($('#activo_equipo_retirar').val()==""){
      alert("Por favor introduce el numero del activo");
      return false;
    }
    $.ajax({
          url     :"activo-php_consultar_activo.php",
          dataType:"json",
          type    :'post',
          data:{
          activo_equipo: $('#activo_equipo_retirar').val(),
          },
          success:function(data) {
            if ( jQuery.isEmptyObject(data) == false ){
              $('#tipo_equipo').val( data['tipo_equipo'] );
              $('#marca_equipo').val( data['marca_equipo'] );
              //$('#modelo_equipo').val( data['modelo_equipo'] );
              $('#activo_monitor_retirar').val( data['activo_mon'] );
              $('#estado_equipo').val( data['estado_equipo'] );

              $('#nuevo_dir_ip').val( data['dir_ip'] );
              $('#nuevo_dir_mac').val( data['dir_mac'] );
              $('#nuevo_punto_de_red').val( data['punto_de_red'] );
              $('#punto_de_voz').val( data['punto_de_voz'] );
              $('#vlan_puerto_sw').val( data['vlan_puerto_sw'] );
              $('#dir_ip_sw').val( data['dir_ip_sw'] );
              $('#puerto_sw').val( data['puerto_sw'] );
              $('#ubicacion_p_red').val( data['ubicacion_p_red'] );
              $('#f_ult_actualiza').val( data['f_ult_actualiza'] );

              $('#nuevo_bloque').val( data['bloque'] );
              $('#nuevo_piso').val( data['piso'] );
              $('#nuevo_departamento').val( data['departamento'] );
              $('#nuevo_cubiculo').val( data['cubiculo'] );
              $('#nuevo_responsable').val( data['responsable'] );
              $('#nuevo_usuario').val( data['usuario'] );
              $('#nuevo_ext_tel').val( data['ext_tel'] );
              $('#nuevo_observaciones').val( data['observaciones'] );
              $('#res').html("---- Consulta de activo exitosa. ---- ");
              $('#res').css('color','yellow');

            }
            else{
              alert("Activo no encontrado.")
              console.log('Something went wrong', status, 'Activo no encontrado.' );
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el nro del activo del equipo.");
              $('#res').css('color','red');
            }
          },
          error:function() {
          }
        });
  });



$('#ingresar_activo_nuevo').click(
  function()
  {
    if($('#activo_equipo').val()==""){
      alert("Introduce el numero del activo");
      return false;
    }
    else{
      var activo_equipo = $('#activo_equipo').val();
    }
    if($('#tipo_equipo').val()==""){
      alert("Introduce tipo de equipo");
      return false;
    }
    else{
      var tipo_equipo = $('#tipo_equipo').val();
    }
    if($('#marca_equipo').val()==""){
      alert("Introduce marca de equipo");
      return false;
    }
    else{
      var marca_equipo = $('#marca_equipo').val();
    }
    if($('#modelo_equipo').val()==""){
      alert("Introduce modelo de equipo");
      return false;
    }
    else{
      var modelo_equipo = $('#modelo_equipo').val();
    }
    if($('#activo_mon').val()==""){
      alert("Introduce activo monitor");
      return false;
    }
    else{
      var activo_mon = $('#activo_mon').val();
    }
    if($('#estado_equipo').val()==""){
      alert("Introduce estado del equipo");
      return false;
    }
    else{
      var estado_equipo = $('#estado_equipo').val();
    }
    if($('#dir_ip').val()==""){
      alert("Introduce dirección ip del equipo");
      return false;
    }
    else{
      var dir_ip = $('#dir_ip').val();
    }
    if($('#dir_mac').val()==""){
      alert("Introduce dirección mac del equipo");
      return false;
    }
    else{
      var dir_mac = $('#dir_mac').val();
    }
    if($('#punto_de_red').val()==""){
      alert("Introduce punto de red del equipo");
      return false;
    }
    else{
      var punto_de_red = $('#punto_de_red').val();
    }
    if($('#punto_de_voz').val()==""){
      alert("Introduce punto de voz del cubiculo");
      return false;
    }
    else{
      var punto_de_voz = $('#punto_de_voz').val();
    }
   /* if($('#f_ult_actualiza').val()==""){
      alert("Introduce fecha de actualizacion");
      return false;
    }
    else{
      var f_ult_actualiza = $('#f_ult_actualiza').val();
    }*/
    if($('#departamento').val()==""){
      alert("Introduce departamento al pertenece usuario");
      return false;
    }
    else{
      var departamento = $('#departamento').val();
    }
    if($('#responsable').val()==""){
      alert("Introduce nombre del responsable del equipo");
      return false;
    }
    else{
      var responsable = $('#responsable').val();
    }
    if($('#email_responsable').val()==""){
      alert("Introduce email del responsable del equipo");
      return false;
    }
    else{
      var email_responsable = $('#email_responsable').val();
    }
    if($('#usuario').val()==""){
      alert("Introduce nombre del usuario del equipo");
      return false;
    }
    else{
      var usuario = $('#usuario').val();
    }
    if($('#email_usuario').val()==""){
      alert("Introduce email del usuario del equipo");
      return false;
    }
    else{
      var email_usuario = $('#email_usuario').val();
    }
    if($('#ext_tel').val()==""){
      alert("Introduce ext telefonica del usuario.");
      return false;
    }
    else{
      var ext_tel = $('#ext_tel').val();
    }
    if($('#observaciones').val()==""){
      alert("Introduce observaciones si las tiene");
      return false;
    }
    else{
      var observaciones = $('#observaciones').val();
    }
    var f_ult_actualiza = $('#f_ult_actualiza').val();

        $.ajax({
          url     :"activo-php_ingresar_activo.php",
          dataType:"json",
          type    :'post',
          data:{
            activo_equipo:activo_equipo,
            tipo_equipo:tipo_equipo,
            marca_equipo:marca_equipo,
            modelo_equipo:modelo_equipo,
            activo_mon:activo_mon,
            estado_equipo:estado_equipo,
            dir_ip:dir_ip,
            dir_mac:dir_mac,
            punto_de_red:punto_de_red,
            punto_de_voz:punto_de_voz,
            f_ult_actualiza:f_ult_actualiza,
            departamento:departamento,
            responsable:responsable,
            email_responsable:email_responsable,
            usuario:usuario,
            email_usuario:email_usuario,
            ext_tel:ext_tel,
            observaciones:observaciones
          },
          success:function(data) {
            if(data = 1){
              $('#res').html("---- Activo ingresado al sistema. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en el ingreso del activo.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Activo no encontrado.")
            console.log('Something went wrong', status, 'Activo no encontrado.' );
          }
        });
  }
);

$('#exportar_activo_reubicado').click(
  function()
  {
    if($('#activo_equipo').val()==""){
      alert("Introduce el numero del activo");
      return false;
    }
    else{
      var activo_equipo = $('#activo_equipo').val();
    }
    if($('#tipo_equipo').val()==""){
      alert("Introduce tipo de equipo");
      return false;
    }
    else{
      var tipo_equipo = $('#tipo_equipo').val();
    }
    if($('#marca').val()==""){
      alert("Introduce marca de equipo");
      return false;
    }
    else{
      var marca = $('#marca').val();
    }
    if($('#modelo_equipo').val()==""){
      alert("Introduce modelo de equipo");
      return false;
    }
    else{
      var modelo_equipo = $('#modelo_equipo').val();
    }
    if($('#activo_monitor').val()==""){
      alert("Introduce activo monitor");
      return false;
    }
    else{
      var activo_monitor = $('#activo_monitor').val();
    }
    /*if($('#estado_equipo').val()==""){
      alert("Introduce estado del equipo");
      return false;
    }
    else{
      var estado_equipo = $('#estado_equipo').val();
    }*/
    if($('#dir_ip').val()==""){
      alert("Introduce dirección ip del equipo");
      return false;
    }
    else{
      var dir_ip = $('#dir_ip').val();
    }
    if($('#dir_mac').val()==""){
      alert("Introduce dirección mac del equipo");
      return false;
    }
    else{
      var dir_mac = $('#dir_mac').val();
    }
    if($('#punto_de_red').val()==""){
      alert("Introduce punto de red del equipo");
      return false;
    }
    else{
      var punto_de_red = $('#punto_de_red').val();
    }
    /*if($('#punto_de_voz').val()==""){
      alert("Introduce punto de voz del cubiculo");
      return false;
    }
    else{
      var punto_de_voz = $('#punto_de_voz').val();
    }*/
   /* if($('#f_ult_actualiza').val()==""){
      alert("Introduce fecha de actualizacion");
      return false;
    }
    else{
      var f_ult_actualiza = $('#f_ult_actualiza').val();
    }*/
   /* if($('#departamento').val()==""){
      alert("Introduce departamento al pertenece usuario");
      return false;
    }
    else{
      var departamento = $('#departamento').val();
    }*/
    if($('#nuevo_responsable').val()==""){
      alert("Introduce nombre del responsable del equipo");
      return false;
    }
    else{
      var nuevo_responsable = $('#nuevo_responsable').val();
    }
    if($('#email_nuevo_responsable').val()==""){
      alert("Introduce email del responsable del equipo");
      return false;
    }
    else{
      var email_nuevo_responsable = $('#email_nuevo_responsable').val();
    }
    if($('#nuevo_usuario').val()==""){
      alert("Introduce nombre del usuario del equipo");
      return false;
    }
    else{
      var nuevo_usuario = $('#nuevo_usuario').val();
    }
    if($('#email_nuevo_usuario').val()==""){
      alert("Introduce email del usuario del equipo");
      return false;
    }
    else{
      var email_nuevo_usuario = $('#email_nuevo_usuario').val();
    }
        var nuevo_ext_tel = $('#nuevo_ext_tel').val();
        var observaciones = $('#observaciones').val();

        $.ajax({
          url     :"activo-php_exportar_activo.php",
          dataType:"json",
          type    :'post',
          data:{
            activo_equipo:activo_equipo,
            tipo_equipo:tipo_equipo,
            marca:marca,
            modelo_equipo:modelo_equipo,
            activo_monitor:activo_monitor,
            dir_ip:dir_ip,
            dir_mac:dir_mac,
            punto_de_red:punto_de_red,
            nuevo_responsable:nuevo_responsable,
            email_nuevo_responsable:email_nuevo_responsable,
            nuevo_usuario:nuevo_usuario,
            email_nuevo_usuario:email_nuevo_usuario,
            nuevo_ext_tel:nuevo_ext_tel,
            observaciones:observaciones
          },
          success:function(data) {
            if(data = 1){
              $('#res').html("---- Activo ingresado al sistema. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en el ingreso del activo.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Activo no encontrado.")
            console.log('Something went wrong', status, 'Activo no encontrado.' );
          }
        });
  }
);

$('#modificar_activo').click(
  function()
  {

        $.ajax({
          url     :"activo-php_modificar_activo.php",
          dataType:"json",
          type    :'post',
          data:{
            activo_equipo:$('#activo_equipo').val(),
            tipo_equipo:$('#tipo_equipo').val(),
            marca_equipo:$('#marca_equipo').val(),
            modelo_equipo:$('#modelo_equipo').val(),
            activo_mon:$('#activo_mon').val(),
            estado_equipo:$('#estado_equipo').val(),
            dir_ip:$('#dir_ip').val(),
            dir_mac:$('#dir_mac').val(),
            punto_de_red:$('#punto_de_red').val(),
            punto_de_voz:$('#punto_de_voz').val(),
            f_ult_actualiza:$('#f_ult_actualiza').val(),
            departamento:$('#departamento').val(),
            responsable:$('#responsable').val(),
            email_responsable:$('#email_responsable').val(),
            usuario:$('#usuario').val(),
            email_usuario:$('#email_usuario').val(),
            ext_tel:$('#ext_tel').val(),
            observaciones:$('#observaciones').val()
          },
          success:function(data) {
            if(data = 1){
              $('#res').html("Activo modificado en el sistema.");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Activo no encontrado.")
            console.log('Something went wrong', status, 'Activo no encontrado.' );
          }
        });
  }
);


$('#enviar_mail_equipo_nuevo').click(
  function ()
  {
     if($('#activo_equipo').val()==""){
      alert("Por favor introduce el numero del activo");
      return false;
    }
    $.ajax({
                  url     :"activo-php_enviar_mail_equipo_nuevo.php",
                  dataType:"json",
                  type    :'post',
                  data:{
                  activo_equipo:$('#activo_equipo').val(),
                  tipo_equipo:$('#tipo_equipo').val(),
                  marca_equipo:$('#marca_equipo').val(),
                  modelo_equipo:$('#modelo_equipo').val(),
                  activo_mon:$('#activo_mon').val(),
                  estado_equipo:$('#estado_equipo').val(),
                  dir_ip:$('#dir_ip').val(),
                  dir_mac:$('#dir_mac').val(),
                  punto_de_red:$('#punto_de_red').val(),
                  bloque:$('#bloque').val(),
                  piso:$('#piso').val(),
                  cubiculo:$('#cubiculo').val(),
                  dir_ip_sw:$('#dir_ip_sw').val(),
                  puerto_sw:$('#puerto_sw').val(),
                  vlan_puerto_sw:$('#vlan_puerto_sw').val(),
                  f_ult_actualiza:$('#f_ult_actualiza').val(),
                  departamento:$('#departamento').val(),
                  responsable:$('#responsable').val(),
                  usuario:$('#usuario').val(),
                  ext_tel:$('#ext_tel').val(),
                  observaciones:$('#observaciones').val()
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
                    $('#res').html("---- El mensaje se envio al usuario, pero con algun error. ----");
                    console.log('Something went wrong', status, 'Activo no encontrado.' );
                  }
                });
  }
);

$('#enviar_mail_a_mi').click(
  function ()
  {
     if($('#activo_equipo').val()==""){
      alert("Por favor introduce el numero del activo");
      return false;
    }
    $.ajax({
                  url     :"activo-php_enviar_mail_a_mi.php",
                  dataType:"json",
                  type    :'post',
                  data:{
                  activo_equipo:$('#activo_equipo').val(),
                  tipo_equipo:$('#tipo_equipo').val(),
                  marca_equipo:$('#marca_equipo').val(),
                  modelo_equipo:$('#modelo_equipo').val(),
                  activo_mon:$('#activo_mon').val(),
                  estado_equipo:$('#estado_equipo').val(),
                  dir_ip:$('#dir_ip').val(),
                  dir_mac:$('#dir_mac').val(),
                  punto_de_red:$('#punto_de_red').val(),
                  bloque:$('#bloque').val(),
                  piso:$('#piso').val(),
                  cubiculo:$('#cubiculo').val(),
                  dir_ip_sw:$('#dir_ip_sw').val(),
                  puerto_sw:$('#puerto_sw').val(),
                  vlan_puerto_sw:$('#vlan_puerto_sw').val(),
                  f_ult_actualiza:$('#f_ult_actualiza').val(),
                  departamento:$('#departamento').val(),
                  responsable:$('#responsable').val(),
                  usuario:$('#usuario').val(),
                  ext_tel:$('#ext_tel').val(),
                  observaciones:$('#observaciones').val()
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
                    $('#res').html("---- El mensaje se envio al usuario, pero con algun error. ----");
                    console.log('Something went wrong', status, 'Activo no encontrado.' );
                  }
                });
  }
);

$('#enviar_mail_almacen').click(
  function ()
  {
     if($('#activo_equipo').val()==""){
      alert("Por favor introduce el numero del activo");
      return false;
    }
    $.ajax({
                  url     :"activo-php_enviar_mail_almacen.php",
                  dataType:"json",
                  type    :'post',
                  data:{
                  activo_equipo:$('#activo_equipo').val(),
                  tipo_equipo:$('#tipo_equipo').val(),
                  activo_mon:$('#activo_mon').val(),
                  bloque:$('#bloque').val(),
                  piso:$('#piso').val(),
                  cubiculo:$('#cubiculo').val(),
                  departamento:$('#departamento').val(),
                  usuario:$('#usuario').val(),
                  email_usuario:$('#email_usuario').val(),
                  responsable:$('#responsable').val(),
                  email_responsable:$('#email_responsable').val()
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
                    $('#res').html("---- El mensaje se envio al usuario, pero con algun error. ----");
                    console.log('Something went wrong', status, 'Activo no encontrado.' );
                  }
                });
  }
);

$('#enviar_email_inconsistencia_almacen').click(
  function ()
  {
     if($('#activo_equipo').val()==""){
      alert("Por favor introduce el numero del activo");
      return false;
    }
    $.ajax({
                  url     :"activo-php_enviar_mail_inconsistencia_almacen.php",
                  dataType:"json",
                  type    :'post',
                  data:{
                  activo_equipo:$('#activo_equipo').val(),
                  tipo_equipo:$('#tipo_equipo').val(),
                  activo_mon:$('#activo_mon').val(),
                  bloque:$('#bloque').val(),
                  piso:$('#piso').val(),
                  cubiculo:$('#cubiculo').val(),
                  departamento:$('#departamento').val(),
                  usuario:$('#usuario').val(),
                  email_usuario:$('#email_usuario').val(),
                  responsable:$('#responsable').val(),
                  email_responsable:$('#email_responsable').val()
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
                    $('#res').html("---- El mensaje se envio al usuario, pero con algun error. ----");
                    console.log('Something went wrong', status, 'Activo no encontrado.' );
                  }
                });
  }
);

$('#enviar_mail_equipo_reubicado').click(
  function ()
  {
     if($('#activo_equipo').val()==""){
      alert("Por favor introduce el numero del activo");
      return false;
    }
    $.ajax({
                  url     :"activo-php_enviar_mail_equipo_reubicado.php",
                  dataType:"json",
                  type    :'post',
                  data:{
                  activo_equipo:$('#activo_equipo').val(),
                  tipo_equipo:$('#tipo_equipo').val(),
                  marca_equipo:$('#marca_equipo').val(),
                  modelo_equipo:$('#modelo_equipo').val(),
                  activo_mon:$('#activo_mon').val(),
                  estado_equipo:$('#estado_equipo').val(),
                  dir_ip:$('#dir_ip').val(),
                  dir_mac:$('#dir_mac').val(),
                  punto_de_red:$('#punto_de_red').val(),
                  bloque:$('#bloque').val(),
                  piso:$('#piso').val(),
                  cubiculo:$('#cubiculo').val(),
                  dir_ip_sw:$('#dir_ip_sw').val(),
                  puerto_sw:$('#puerto_sw').val(),
                  vlan_puerto_sw:$('#vlan_puerto_sw').val(),
                  f_ult_actualiza:$('#f_ult_actualiza').val(),
                  departamento:$('#departamento').val(),
                  responsable:$('#responsable').val(),
                  usuario:$('#usuario').val(),
                  ext_tel:$('#ext_tel').val(),
                  observaciones:$('#observaciones').val()
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
                    $('#res').html("---- El mensaje se envio al usuario, pero con algun error. ----");
                    console.log('Something went wrong', status, 'Activo no encontrado.' );
                  }
                });
  }
);

$('#enviar_mail_quitar_reserva_ip').click(
  function ()
  {
     if($('#activo_equipo').val()==""){
      alert("Por favor introduce el numero del activo");
      return false;
    }
    $.ajax({
                  url     :"activo-php_enviar_mail_quitar_reserva_ip.php",
                  dataType:"json",
                  type    :'post',
                  data:{
                  activo_equipo:$('#activo_equipo').val(),
                  tipo_equipo:$('#tipo_equipo').val(),
                  marca_equipo:$('#marca_equipo').val(),
                  modelo_equipo:$('#modelo_equipo').val(),
                  activo_mon:$('#activo_mon').val(),
                  estado_equipo:$('#estado_equipo').val(),
                  dir_ip:$('#dir_ip').val(),
                  dir_mac:$('#dir_mac').val(),
                  punto_de_red:$('#punto_de_red').val(),
                  bloque:$('#bloque').val(),
                  piso:$('#piso').val(),
                  cubiculo:$('#cubiculo').val(),
                  dir_ip_sw:$('#dir_ip_sw').val(),
                  puerto_sw:$('#puerto_sw').val(),
                  vlan_puerto_sw:$('#vlan_puerto_sw').val(),
                  f_ult_actualiza:$('#f_ult_actualiza').val(),
                  departamento:$('#departamento').val(),
                  responsable:$('#responsable').val(),
                  usuario:$('#usuario').val(),
                  ext_tel:$('#ext_tel').val(),
                  observaciones:$('#observaciones').val()
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
                    $('#res').html("---- El mensaje se envio al usuario, pero con algun error. ----");
                    console.log('Something went wrong', status, 'Activo no encontrado.' );
                  }
                });
  }
);

$('#dir_mac').focusout(
  function(){
  if ($("#dir_mac").val().length ==12) {
    var mensaje = $("#dir_mac").val();
    var porcion = mensaje.substring(2, 0);     // porcion = "mac "
    var porcion2 = mensaje.substring(4, 2);     // porcion = "mac "
    var porcion3 = mensaje.substring(6, 4);     // porcion = "mac "
    var porcion4 = mensaje.substring(8, 6);     // porcion = "mac "
    var porcion5 = mensaje.substring(10, 8);     // porcion = "mac "
    var porcion6 = mensaje.substring(12, 10);     // porcion = "mac "
    /*$("#dir_mac").val(porcion+"-"+porcion2+"-"+porcion3+"-"+porcion4+"-"+porcion5+"-"+porcion6); */

    mac=(porcion+"-"+porcion2+"-"+porcion3+"-"+porcion4+"-"+porcion5+"-"+porcion6);
    $("#dir_mac").val(mac);
    //alert(mac);
  }else if  ($("#dir_mac").val().length <17){
    alert("La mac tiene menos de 17 caracteres");
    $("#dir_mac").focus();
  }

  $.ajax({
          url     :"activo-php_consultar_mac.php",
          dataType:"json",
          type    :'post',
          data:{
          dir_mac: $('#dir_mac').val(),
          activo_equipo: $('#activo_equipo').val(),
          },
          success:function(data) {
          alert('Mac repetida con el activo: '+ data['activo_equipo']+' Tipo de equipo:  '+ data['tipo_equipo'] +' Estado del equipo:  '+ data['estado_equipo'] );
          $("#dir_mac").focus();
              $('#res').html("---- Mac repetida. ----");
              $('#res').css('color','yellow');
          },
  });
});

$('#dir_ip').focusout(
  function(){
  $.ajax({
          url     :"activo-php_consultar_ip.php",
          dataType:"json",
          type    :'post',
          data:{
          dir_ip: $('#dir_ip').val(),
          activo_equipo: $('#activo_equipo').val(),
          },
          success:function(data) {
          alert('Ip repetida con el activo: '+ data['activo_equipo']+' Tipo de equipo:  '+ data['tipo_equipo'] +' Estado del equipo:  '+ data['estado_equipo'] );
          $("#dir_ip").focus();
              $('#res').html("---- Ip repetida. ----");
              $('#res').css('color','yellow');
          },
  });
});
