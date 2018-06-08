
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

        case 'agendamentoConsulta':
          require_once('controllers/agendamentoConsulta_controller.php');
          require_once('models/agendamentoConsulta_class.php');
//          require_once('controllers/pagamento_controller.php');
//          require_once('models/pagamento_class.php');
//
//          $controller_pagamento = new controllerCmsPagamento();
//          $controller_pagamento::Novo();

            $controller_agendamentoConsulta = new controllerAgendamentoConsulta();
            $controller_agendamentoConsulta::selectConsulta();

            switch ($modo) {
              case 'excluirConsulta':
                $controller_agendamentoConsulta = new controllerAgendamentoConsulta();
                $controller_agendamentoConsulta::ExcluirConsulta();
                break;

              case 'NovaConsulta':
                $controller_agendamentoConsulta = new controllerAgendamentoConsulta();
                $controller_agendamentoConsulta::InserirAgendamentoConsulta();
                break;

              case 'cartao':
                if(isset($_SESSION['Login'])){

                    require_once('models/transacao_class.php');
                    require_once('controllers/transacao_controller.php');

                  // echo('aaaaee');
                    $transacao = new TransacaoController();
                    $transacao::cartaoDeCredito();

                  }

              break;
            }


            case 'preatendimento':
              require_once('controllers/preAtendimento_controller.php');
              require_once('models/preAtendimento_class.php');
              switch ($modo) {
                case 'novo':
                  $controller = new controllerPreAtendimento();
                  $controller::Inserir();
                  break;
                }
                break;

            case 'pagamento':
              session_start();
                switch ($modo) {
                  case 'salvar':
                  if (isset($_SESSION['idConsulta'])) {
                    require_once('controllers/pagamento_controller.php');
                    require_once('models/pagamento_class.php');

                    $transacao = new controllerPagamento();
                    $transacao::InserirPagamento();
                  }
                  break;
                }



          break;
      }
}



 ?>
