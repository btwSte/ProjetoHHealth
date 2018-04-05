
<?php

    require_once('controllers/' . $controller . '_controller.php');



    switch($controller) {
        case 'home':
            $controller = new HomeController();
            break;
        case 'cmsmochila':
          $controller = new CmsMochilaController();
          break;

    }




    // chamar a ação
    $controller->{ $acao }();



 ?>
