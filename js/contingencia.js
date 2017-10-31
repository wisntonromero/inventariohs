$('#consultar_soporte').click(
  function ()
  {
     if($('#activo_equipo').val()==""){
      alert("Por favor introduce el numero del activo");
      return false;
    }
    $.ajax({
          url     :"soporte-php_consultar_activo_soporte.php",
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

              $('#dir_mac').val( data['dir_mac'] );
              $('#responsable').val( data['responsable'] );
              $('#email_responsable').val( data['email_responsable'] );
              $('#usuario').val( data['usuario'] );
              $('#email_usuario').val( data['email_usuario'] );
              $('#ext_tel').val( data['ext_tel'] );
              $('#f_compra').val( data['f_compra'] );
              $('#bodega_actual').val( data['bodega_actual'] );
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

$('#ingresar_activo_nuevo_soporte_a_bodega').click(
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
    if($('#serial_equipo').val()==""){
      alert("Introduce modelo de equipo");
      return false;
    }
    else{
      var serial_equipo = $('#serial_equipo').val();
    }
    if($('#f_compra').val()==""){
      alert("Introduce fecha de compra del equipo.");
      return false;
    }
    else{
      var f_compra = $('#f_compra').val();
    }
    if($('#estado_equipo').val()==""){
      alert("Introduce estado del equipo");
      return false;
    }
    else{
      var estado_equipo = $('#estado_equipo').val();
    }
    if($('#dir_mac').val()==""){
      alert("Introduce dirección mac del equipo");
      return false;
    }
    else{
      var dir_mac = $('#dir_mac').val();
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
    if($('#bodega_actual').val()==""){
      alert("Introduce la bodega donde se encuentra el equipo (Micros o Sonda)");
      return false;
    }
    else{
      var bodega_actual = $('#bodega_actual').val();
    }
    if($('#observaciones').val()==""){
      alert("Introduce observaciones si las tiene");
      return false;
    }
    else{
      var observaciones = $('#observaciones').val();
    }

        $.ajax({
          url     :"soporte-php_ingresar_activo_soporte_a_bodega.php",
          dataType:"json",
          type    :'post',
          data:{
            activo_equipo:activo_equipo,
            tipo_equipo:tipo_equipo,
            marca_equipo:marca_equipo,
            modelo_equipo:modelo_equipo,
            serial_equipo:serial_equipo,
            estado_equipo:estado_equipo,
            dir_mac:dir_mac,
            responsable:responsable,
            email_responsable:email_responsable,
            usuario:usuario,
            email_usuario:email_usuario,
            ext_tel:ext_tel,
            f_compra:f_compra,
            bodega_actual:bodega_actual,
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
            alert("Activo de soporte ingresado a bodega.")
            $('#res').html("---- Activo de soporte ingresado a bodega. ----");
            $('#res').css('color','yellow');
            console.log('Something went wrong', status, 'Activo no encontrado.' );
          }
        });
  }
);

$('#modificar_activo_soporte').click(
  function()
  {

        $.ajax({
          url     :"soporte-php_modificar_activo_soporte.php",
          dataType:"json",
          type    :'post',
          data:{
            activo_equipo:$('#activo_equipo').val(),
            tipo_equipo:$('#tipo_equipo').val(),
            marca_equipo:$('#marca_equipo').val(),
            modelo_equipo:$('#modelo_equipo').val(),
            serial_equipo:$('#serial_equipo').val(),
            estado_equipo:$('#estado_equipo').val(),
            dir_mac:$('#dir_mac').val(),
            responsable:$('#responsable').val(),
            email_responsable:$('#email_responsable').val(),
            usuario:$('#usuario').val(),
            email_usuario:$('#email_usuario').val(),
            ext_tel:$('#ext_tel').val(),
            f_compra:$('#f_compra').val(),
            bodega_actual:$('#bodega_actual').val(),
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

// **************************************   MODULO DE PRESTAMO DE EQUIPOS DE SOPORTE ***************************************************

$('#seleccionar_equipo_soporte').change(
  function ()
  {
    $.ajax({
          url     :"soporte-php_seleccionar_soporte.php",
          dataType:"json",
          type    :'post',
          data:{
          id: $('#seleccionar_equipo_soporte').val(),
          },
      success:function (data) {

        $('#activo_equipo').val( data['activo_equipo'] );
        $('#tipo_equipo').val( data['tipo_equipo'] );
        $('#marca_equipo').val( data['marca_equipo'] );
        $('#modelo_equipo').val( data['modelo_equipo'] );
        $('#serial_equipo').val( data['serial_equipo'] );
        $('#f_compra').val( data['f_compra'] );
        $('#bodega_actual').val( data['bodega_actual'] );

        if(data = 1){
              $('#res').html("---- Consulta exitosa. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el correo del cliente.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Correo de cliente no encontrado.")
            console.log('Something went wrong', status, 'Correo de cliente no encontrado.' );
          }
        });
  });


/********************************************   MODULO DE CONTINGECIA DE SWITCH   ******************************************************************/

$('#contingencia_ingresar_prestamo_switch_contingencia').click(
  function()
  {
    if($('#f_prestamo').val()==""){
      alert("Introduce la fecha de entrega del prestamo del equipo de soporte.");
      return false;
    }
    else{
      var f_prestamo = $('#f_prestamo').val();
    }


    if($('#f_limite').val()==""){
      alert("Introduce la fecha limite de entrega del equipo de soporte.");
      return false;
    }
    else{
      var f_limite = $('#f_limite').val();
    }


    if($('#activo_danado').val()==""){
      alert("Introduce el nro del activo dañado.");
      return false;
    }
    else{
      var activo_danado = $('#activo_danado').val();
    }


    if($('#ot_sigma').val()==""){
      alert("Introduce el ot sigma.");
      return false;
    }
    else{
      var ot_sigma = $('#ot_sigma').val();
    }


    if($('#bloque').val()==""){
      alert("Introduce el bloque donde se encuentra el usuario.");
      return false;
    }
    else{
      var bloque = $('#bloque').val();
    }


    if($('#piso').val()==""){
      alert("Introduce el piso donde se encuentra el usuario.");
      return false;
    }
    else{
      var piso = $('#piso').val();
    }


    if($('#cubiculo').val()==""){
      alert("Introduce el cubiculo donde se encuentra el usuario.");
      return false;
    }
    else{
      var cubiculo = $('#cubiculo').val();
    }


    if($('#departamento').val()==""){
      alert("Introduce el departamento al que pertenece el usuario.");
      return false;
    }
    else{
      var departamento = $('#departamento').val();
    }


    if($('#usuario_equipo').val()==""){
      alert("Introduce el nombre del usuario al que se le realiza el prestamo del equipo.");
      return false;
    }
    else{
      var usuario_equipo = $('#usuario_equipo').val();
    }


    if($('#email_usuario').val()==""){
      alert("Introduce el email del usuario al que se le realiza el prestamo del equipo.");
      return false;
    }
    else{
      var email_usuario = $('#email_usuario').val();
    }


    if($('#ext_tel').val()==""){
      alert("Introduce el email del usuario al que se le realiza el prestamo del equipo.");
      return false;
    }
    else{
      var ext_tel = $('#ext_tel').val();
    }


    if($('#usuario_tecnico').val()==""){
      alert("Introduce nombre del tecnico que atiende el servicio.");
      return false;
    }
    else{
      var usuario_tecnico = $('#usuario_tecnico').val();
    }

    if($('#email_usuario_tecnico').val()==""){
      alert("Introduce nombre del tecnico que atiende el servicio.");
      return false;
    }
    else{
      var email_usuario_tecnico = $('#email_usuario_tecnico').val();
    }
      var activo_equipo = $('#activo_equipo').val();
      var tipo_equipo   = $('#tipo_equipo').val();
      var marca_equipo  = $('#marca_equipo').val();
      var modelo_equipo = $('#modelo_equipo').val();
      var serial_equipo = $('#serial_equipo').val();
      var observaciones = $('#observaciones').val();
      var usuario_que_presta_soporte = $('#usuario_que_presta_soporte').val();

        $.ajax({
          url     :"contingencia-php_ingresar_prestamo_switch_contingencia.php",
          dataType:"json",
          type    :'post',
          data:{
            activo_equipo:activo_equipo,
            tipo_equipo:tipo_equipo,
            marca_equipo:marca_equipo,
            modelo_equipo:modelo_equipo,
            serial_equipo:serial_equipo,
            activo_danado:activo_danado,
            f_prestamo:f_prestamo,
            f_limite:f_limite,
            ot_sigma:ot_sigma,
            usuario_equipo:usuario_equipo,
            email_usuario:email_usuario,
            bloque:bloque,
            piso:piso,
            cubiculo:cubiculo,
            departamento:departamento,
            ext_tel:ext_tel,
            usuario_tecnico:usuario_tecnico,
            email_usuario_tecnico:email_usuario_tecnico,
            usuario_que_presta_soporte:usuario_que_presta_soporte,
            observaciones:observaciones
          },
          success:function(data){
            if(data = 1){
              $('#res').html("---- Prestamo de equipo de soporte ingresado al sistema. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en el ingreso del prestamo del equipo de soporte.");
              $('#res').css('color','red');
            }
          },
          error:function(){
            alert("---- Prestamo de equipo de soporte ingresado al sistema. ----")
            console.log('Something went wrong', status, 'Consola Soporte no encontrado.......' );
          }
        });
  }
);


$('#soporte_ingresar_prestamo_equipo_soporte').click(
  function()
  {
    if($('#f_prestamo').val()==""){
      alert("Introduce la fecha de entrega del prestamo del equipo de soporte.");
      return false;
    }
    else{
      var f_prestamo = $('#f_prestamo').val();
    }


    if($('#f_limite').val()==""){
      alert("Introduce la fecha limite de entrega del equipo de soporte.");
      return false;
    }
    else{
      var f_limite = $('#f_limite').val();
    }


    if($('#activo_danado').val()==""){
      alert("Introduce el nro del activo dañado.");
      return false;
    }
    else{
      var activo_danado = $('#activo_danado').val();
    }


    if($('#ot_sigma').val()==""){
      alert("Introduce el ot sigma.");
      return false;
    }
    else{
      var ot_sigma = $('#ot_sigma').val();
    }


    if($('#bloque').val()==""){
      alert("Introduce el bloque donde se encuentra el usuario.");
      return false;
    }
    else{
      var bloque = $('#bloque').val();
    }


    if($('#piso').val()==""){
      alert("Introduce el piso donde se encuentra el usuario.");
      return false;
    }
    else{
      var piso = $('#piso').val();
    }


    if($('#cubiculo').val()==""){
      alert("Introduce el cubiculo donde se encuentra el usuario.");
      return false;
    }
    else{
      var cubiculo = $('#cubiculo').val();
    }


    if($('#departamento').val()==""){
      alert("Introduce el departamento al que pertenece el usuario.");
      return false;
    }
    else{
      var departamento = $('#departamento').val();
    }


    if($('#usuario_equipo').val()==""){
      alert("Introduce el nombre del usuario al que se le realiza el prestamo del equipo.");
      return false;
    }
    else{
      var usuario_equipo = $('#usuario_equipo').val();
    }


    if($('#email_usuario').val()==""){
      alert("Introduce el email del usuario al que se le realiza el prestamo del equipo.");
      return false;
    }
    else{
      var email_usuario = $('#email_usuario').val();
    }


    if($('#ext_tel').val()==""){
      alert("Introduce el email del usuario al que se le realiza el prestamo del equipo.");
      return false;
    }
    else{
      var ext_tel = $('#ext_tel').val();
    }


    if($('#usuario_tecnico').val()==""){
      alert("Introduce nombre del tecnico que atiende el servicio.");
      return false;
    }
    else{
      var usuario_tecnico = $('#usuario_tecnico').val();
    }

    if($('#email_usuario_tecnico').val()==""){
      alert("Introduce nombre del tecnico que atiende el servicio.");
      return false;
    }
    else{
      var email_usuario_tecnico = $('#email_usuario_tecnico').val();
    }
      var activo_equipo = $('#activo_equipo').val();
      var tipo_equipo   = $('#tipo_equipo').val();
      var marca_equipo  = $('#marca_equipo').val();
      var modelo_equipo = $('#modelo_equipo').val();
      var serial_equipo = $('#serial_equipo').val();
      var observaciones = $('#observaciones').val();
      var usuario_que_presta_soporte = $('#usuario_que_presta_soporte').val();

        $.ajax({
          url     :"soporte-php_ingresar_prestamo_equipo_soporte.php",
          dataType:"json",
          type    :'post',
          data:{
            activo_equipo:activo_equipo,
            tipo_equipo:tipo_equipo,
            marca_equipo:marca_equipo,
            modelo_equipo:modelo_equipo,
            serial_equipo:serial_equipo,
            activo_danado:activo_danado,
            f_prestamo:f_prestamo,
            f_limite:f_limite,
            ot_sigma:ot_sigma,
            usuario_equipo:usuario_equipo,
            email_usuario:email_usuario,
            bloque:bloque,
            piso:piso,
            cubiculo:cubiculo,
            departamento:departamento,
            ext_tel:ext_tel,
            usuario_tecnico:usuario_tecnico,
            email_usuario_tecnico:email_usuario_tecnico,
            usuario_que_presta_soporte:usuario_que_presta_soporte,
            observaciones:observaciones
          },
          success:function(data){
            if(data = 1){
              $('#res').html("---- Prestamo de equipo de soporte ingresado al sistema. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en el ingreso del prestamo del equipo de soporte.");
              $('#res').css('color','red');
            }
          },
          error:function(){
            alert("---- Prestamo de equipo de soporte ingresado al sistema. ----")
            console.log('Something went wrong', status, 'Consola Soporte no encontrado.......' );
          }
        });
  }
);




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




