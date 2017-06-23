<?php
include_once("config.php");
include_once("sesion.php");
include_once("menu.php");
?>

<body>
    <div id ="block"></div>
    <div class="container">
        <div id="popupbox"></div>
        <div id="content">
            <?php include_once ($view->contentTemplate); // incluyo el template que corresponda ?>
        </div>
    </div>
    <form method="post" action="soporte-php_enviar_sql_completo_excel.php">
        <div class="row">
          <div class="columns large-4">
            <input type="submit" name="excel" id="excel" value="Generar Excel" class="button">
          </div>
        </div>
    </form>
</body>
</html>