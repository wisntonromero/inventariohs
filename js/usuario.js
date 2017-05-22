$('#consultar_usuario').click(
  function ()
  {
     if($('#usuario').val()==""){
      alert("Por favor introduce el usuario");
      return false;
    }
    $.ajax({
          url     :"usuario-php_consultar_usuario.php",
          dataType:"json",
          type    :'post',
          data:{ 
          usuario: $('#usuario').val(),
          },
        success:function (data) {
        

        if ( jQuery.isEmptyObject(data) == false ){
              $('#contrasena').val( data['contrasena'] );
              $('#nivel').val( data['nivel'] );
              $('#nombre').val( data['nombre'] );
              $('#correo').val( data['correo'] );
              $('#empresa').val( data['empresa'] );
              $('#departamento').val( data['departamento'] );
              $('#cargo').val( data['cargo'] );
              $('#ext_tel').val( data['ext_tel'] );
              $('#ubicacion_foto').val( data['ubicacion_foto'] );
              $('#res').html("---- Consulta exitosa. Usuario encontrado. ----");
              $('#res').css('color','yellow');
              alert("Usuario encontrado la base de datos de inventario, pulse aceptar para continuar.");
            }
            else{
              $('#res').html("Ha ocurrido un error en la Consulta, verifique el usuario");
              $('#res').css('color','red');
              alert("Usuario NO encontrado la base de datos de inventario, por favor verifique la información digitada.");

            }
          },
          error:function() {
            alert("Usuario no encontrado.")
            console.log('Something went wrong', status, 'Usuario no encontrado.' ); 
          }
        });
  });


$('#ingresar_usuario').click(
  function()
  {
    if($('#usuario').val()==""){
      alert("Introduce tu usuario para ingresar al sistema");
      $("#usuario").focus();
      return false;
    }
    else{
      var usuario = $('#usuario').val();
    }
    
    if($('#contrasena').val()==""){
      alert("Introduce la contraseña");
      $("#contrasena").focus();
      return false;
    }
    else{
      var contrasena = $('#contrasena').val();
    }
    
    if($('#nivel').val()==""){
      alert("Introduce nivel del usuario");
      $("#nivel").focus();
      return false;
    }
    else{
      var nivel = $('#nivel').val();
    }
    
    if($('#nombre').val()==""){
      alert("Introduce nombre del usuario");
      $("#nombre").focus();
      return false;
    }
    else{
      var nombre = $('#nombre').val();
    }

    if($('#correo').val()==""){
      alert("Introduce correo del usuario");
      $("#correo").focus();
      return false;
    }
    else{
      var correo = $('#correo').val();
    }
    
    if($('#departamento').val()==""){
      alert("Introduce departamento al que pertenece el usuario");
      $("#departamento").focus();
      return false;
    }
    else{
      var departamento = $('#departamento').val();
    }
    if($('#cargo').val()==""){
      alert("Introduce el cargo del usuario");
      $("#cargo").focus();
      return false;
    }
    else{
      var cargo = $('#cargo').val();
    }

    if($('#ext_tel').val()==""){
      alert("Introduce ext telefonica del usuario");
      $("#ext_tel").focus(); 
      return false;
    }
    else{
      var ext_tel = $('#ext_tel').val();
    }

    if($('#ubicacion_foto').val()==""){
      alert("Introduce ubicacion de la foto si la tiene");
      $("#ubicacion_foto").focus();
      return false;
    }
    else{
      var ubicacion_foto = $('#ubicacion_foto').val();
    }

        $.ajax({
          url     :"usuario-php_ingresar_usuario.php",
          dataType:"json",
          type    :'post',
          data:{ 
            usuario:usuario,
            contrasena:contrasena,
            nivel:nivel,
            nombre:nombre,
            correo:correo,
            departamento:departamento,
            cargo:cargo,
            ext_tel:ext_tel,
            ubicacion_foto:ubicacion_foto 
          },
          success:function(data) { 
            if(data = 1){
              $('#res').html("---- Usuario ingresado al sistema. ----");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error en el ingreso del Usuario.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Usuario no encontrado.")
            console.log('Something went wrong', status, 'Usuario no encontrado.' ); 
          }
        });
  }
);



$('#modificar_usuario').click(
  function()
  { 

        $.ajax({
          url     :"usuario-php_modificar_usuario.php",
          dataType:"json",
          type    :'post',
          data:{ 
            usuario:$('#usuario').val(),
            contrasena:$('#contrasena').val(),
            nivel:$('#nivel').val(),
            nombre:$('#nombre').val(),
            correo:$('#correo').val(),
            departamento:$('#departamento').val(),
            cargo:$('#cargo').val(),
            cliente:$('#cliente').val(),
            ext_tel:$('#ext_tel').val(),
            ubicacion_foto:$('#ubicacion_foto').val()
          },
          success:function(data) { 
            if(data = 1){
              $('#res').html("Usuario modificado en el sistema.");
              $('#res').css('color','yellow');
            }
            else{
              $('#res').html("Ha ocurrido un error.");
              $('#res').css('color','red');
            }
          },
          error:function() {
            alert("Usuario no encontrado.")
            console.log('Something went wrong', status, 'Usuario no encontrado.' ); 
          }
        });
  }
);
