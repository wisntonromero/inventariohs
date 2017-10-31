//  *************************************************************************  SCRIP DE JAVA ***************************************************** -->
  $(document).ready(function(){
            function confirmar()
            {
             confirmar=confirm("Activo no existe. ¿Deseas ingresar un nuevo activo al sistema?");
            if (confirmar){
             // si pulsamos en aceptar
                alert('Elegiste adicinonar un nuevo activo, pulsa Aceptar para continuar.');
            }else{
            // si pulsamos en cancelar
            alert('Por favor verifica la informacion y vuelve a intentarlo.');
            document.location.href ="ingresar_activo.php";
           }
        }

        function confirmar_punto_de_red()
        {
             confirmar=confirm("Punto de red no existe. ¿Deseas ingresar un nuevo punto de red al sistema?");
            if (confirmar)
            {
             // si pulsamos en aceptar
              alert('Elegiste adicinonar un nuevo punt de red al sistema, pulsa Aceptar para continuar.');
              document.location.href ="ingresar_puntos_de_red.php";
            }else
            {
              // si pulsamos en cancelar
              alert('Por favor verifica la informacion y vuelve a intentarlo.');
              document.location.href ="ingresar_activo.php";
            }
        }

        function limpiar_forma()
        {
            location.href='ingresar_activo.php';
        }

        function myFunction()
        {
            alert("$dir_ip");
        }

        function revisar_ip_duplicada()
        {
            $.post('comprobar_ip.php',
              {
                dir_ip: $('#dir_ip').val(),
                activo_equipo: $('#activo_equipo').val()
              },
        
              function (data){
                if (data != 'no'){
                  alert(data);
                }
              }
            );
        }
        
          $("#wrapper").mouseenter(function(evento){
            $("#mensaje").css("display", "block");
            alert("hola");
          });
          $("#wrapper").mouseleave(function(evento){
            $("#mensaje").css("display", "none");
          });
        })

//  ********************************************************************** FIN SCRIPT DE JAVA **************************************************** -->
