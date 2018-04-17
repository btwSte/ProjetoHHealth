
<?php
if(isset($_GET['controller'])){
    $controller = $_GET['controller'];
    //$modo = $_GET['modo'];

    switch($controller){
      case 'home':
          $controller = new HomeController();
          break;
      case 'Contato':
          require_once('controllers/contato_controller.php');
          require_once('models/contato.php');
          $contato = new controllerCmsAmbientes();
          $contato::InserirContato();
          break;

      case 'trabalheConosco':
          require_once('controllers/trabalheConosco_controller.php');
          require_once('models/trabalheConosco_class.php');
          $trab_conosco= new controllerTrabalheConosco();
          $trab_conosco::InserirTrabalheConosco();
          break;

      }
}



 ?>
