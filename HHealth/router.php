
<?php
if(isset($_GET['controller'])){
    $controller = $_GET['controller'];
    $modo = $_GET['modo'];

    switch($controller){
      case 'loginPaciente':
      require_once('controllers/login_controller.php');
      require_once('models/login_class.php');
        switch ($modo) {
          case 'logar':
            $controll_paciente = new LoginController();
            $controll_paciente::Logar();
            break;
          break;
        }
        break;

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
          $trab_conosco = new controllerTrabalheConosco();
          $trab_conosco::InserirTrabalheConosco();
          break;

      case 'paciente':
          require_once('controllers/cadastroPaciente_controller.php');
          require_once('models/cadPaciente_class.php');
          require_once('controllers/cmsEndereco_controller.php');
          require_once('models/endereco_class.php');
          $controller_endereco = new controllerCmsEndereco();
          $controller_endereco::Novo();

          $controller_paciente = new controllerCadPaciente();
          $controller_paciente::InserirPaciente();
          break;

      }
}



 ?>
