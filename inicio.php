<?php
  include_once("config.php");
  include_once("sesion.php");
  include_once("menu.php");
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
  <div class="row">
    <address> Km.5 Vía Puerto Colombia - Tel. (57) (5) 3509509 - Área Metropolitana de Barranquilla, Colombia © Universidad del Norte </address>
  </div>
  
  <script src="js/vendor/jquery.js"></script>
  <script src="js/foundation.min.js"></script>
  <script src="js/usuario.js"></script>

  <script>
    $(document).foundation();
  </script>  