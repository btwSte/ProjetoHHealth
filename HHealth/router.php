
<?php

    require_once('controllers/' . $controller . '_controller.php');



    switch($controller) {
        case 'home':
            $controller = new HomeController();
            break;
        case 'Contato':
          require_once('controllers/contato_controller.php');
          require_once('models/contato.php');
          $contato = new controllerCmsAmbientes();
          $contato::InserirContato();
          break;

    }




    // chamar a ação
    $controller->{ $acao }();



 ?>
