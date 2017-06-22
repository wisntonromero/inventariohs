<?php
include_once("config.php");
//include_once("sesion.php");

?>
<!doctype html>
<html class="no-js" lang="en">
  <head>
      <meta charset="utf-8" />
    
      <title>Inicio</title>
      <LINK rel="SHORTCUT ICON" href="images/icons/uninorte.ico" />
     
      <!-- <Link href="css/estilo_maestro.css" type="text/css" rel="stylesheet">  -->
    


  </head>



  <body>



              <?php
                include_once("templates/menu.php");
              ?>


        <div class="row">

          <div class="columns large-12">

            <form method="post" action="">


                
                <div class="orbit" role="region" aria-label="Favorite Space Pictures" data-orbit data-auto-play="true">
                 
                  <li class="orbit-slide">
                    <img class="orbit-image" src="images/orbit/01.jpg" alt="Space" data-timer-delay="1000">
                  <!--   <figcaption class="orbit-caption">Space, the final frontier.</figcaption> -->
                  </li>
                  
                  <li class="orbit-slide">
                    <img class="orbit-image" src="images/orbit/02.jpg" alt="Space" data-timer-delay="1000">
                   <!--  <figcaption class="orbit-caption">Encapsulating</figcaption> -->
                  </li>
                  
                  <li class="orbit-slide">
                    <img class="orbit-image" src="images/orbit/03.jpg" alt="Space" data-timer-delay="1000">
                   <!--  <figcaption class="orbit-caption">Outta This World</figcaption> -->
                  </li>

                  <li class="orbit-slide">
                    <img class="orbit-image" src="images/orbit/04.jpg" alt="Space" data-timer-delay="1000">
                   <!--  <figcaption class="orbit-caption">Lets Rocket!</figcaption> -->
                  </li>

                  <li class="orbit-slide is-active">
                    <img class="orbit-image" src="images/orbit/05.jpg" alt="Space" data-timer-delay="1000">
                   <!--  <figcaption class="orbit-caption">Outta This World</figcaption> -->
                  </li>     
                
                </div>

           </form>
          </div>
        </div>

          <script src="js/vendor/jquery.js"></script>
          <script src="js/foundation.min.js"></script>
          <script src="js/usuario.js"></script>

          <script>
            $(document).foundation();
          </script>
  </body>


</html>