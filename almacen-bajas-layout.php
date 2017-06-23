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
    
</body>
