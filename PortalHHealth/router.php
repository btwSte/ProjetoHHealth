
<?php
if(isset($_GET['controller'])){
  $controller = $_GET['controller'];
  $modo = $_GET['modo'];

  switch($controller){
      case 'cmsmochila':
          require_once('controllers/cmsInformacoes_controller.php');
          require_once('models/Login.php');
          switch ($modo)
          {
              case 'logar':
                  $controll_contato = new controllerCmsInformacoes();

                  //$controll_contato->Novo();
                  $controll_contato::Logar();
                  break;

          }
          break;

      case 'cmsInformacoes':
        require_once('controllers/cmsInformacoes_controller.php');
        require_once('models/informacoes_class.php');
        switch ($modo) {
        //REFENTE AO CABEÇALHO DE INFORMAÇOES
          case 'novocabecalho':
            $controller_procedimentos = new controllerCmsInformacoes();
            $controller_procedimentos::NovoCabecalho();
            break;

          case 'excluircabecalho':
            $controller_procedimentos = new controllerCmsInformacoes();
            $controller_procedimentos::ExcluirCabecalho();
            break;

          case 'editarcabecalho':
            $controller_procedimentos = new controllerCmsInformacoes();
            $controller_procedimentos::EditarCabecalho();
          break;

          case 'buscarcabecalho':
            $controller_procedimentos = new controllerCmsInformacoes();
            $controller_procedimentos::BuscarCabecalho();
            break;

          case 'buscarcabecalho':
            $controller_procedimentos = new controllerCmsInformacoes();
            $controller_procedimentos::BuscarCabecalho();
            break;

          case 'ativarcabecalho':
            $controller_procedimentos = new controllerCmsInformacoes();
            $controller_procedimentos::AtivarCabecalho();
            break;

          case 'desativarcabecalho':
            $controller_procedimentos = new controllerCmsInformacoes();
            $controller_procedimentos::DesativarCabecalho();
            break;

        //REFENTE AO CONTEUDO DE INFORMAÇOES
          case 'novoconteudo':
            $controller_procedimentos = new controllerCmsInformacoes();
            $controller_procedimentos::NovoConteudo();
            break;

          case 'excluirconteudo':
            $controller_procedimentos = new controllerCmsInformacoes();
            $controller_procedimentos::ExcluirConteudo();
            break;
          case 'editarconteudo':
            $controller_procedimentos = new controllerCmsInformacoes();
            $controller_procedimentos::EditarConteudo();
            break;

          case 'buscarconteudo':
            $controller_procedimentos = new controllerCmsInformacoes();
            $controller_procedimentos::BuscarConteudo();
            break;

          case 'ativarconteudo':
            $controller_procedimentos = new controllerCmsInformacoes();
            $controller_procedimentos::AtivarConteudo();
            break;

          case 'desativarconteudo':
            $controller_procedimentos = new controllerCmsInformacoes();
            $controller_procedimentos::DesativarConteudo();
            break;

        }
        break;

      case 'cmsProcedimentos':
        require_once('controllers/cmsProcedimentos_controller.php');
        require_once('models/procedimentos_class.php');
        switch ($modo){
        //REFENTE AO CABEÇALHO DE PROCEDIMENTOS
          case 'novocabecalho':
            $controller_procedimentos = new controllerCmsProcedimentos();
            $controller_procedimentos::NovoCabecalho();
            break;

          case 'excluircabecalho':
            $controller_procedimentos = new controllerCmsProcedimentos();
            $controller_procedimentos::ExcluirCabecalho();
            break;

          case 'editarcabecalho':
            $controller_procedimentos = new controllerCmsProcedimentos();
            $controller_procedimentos::EditarCabecalho();
            break;

          case 'buscarcabecalho':
            $controller_procedimentos = new controllerCmsProcedimentos();
            $controller_procedimentos::BuscarCabecalho();
            break;

          case 'ativarcabecalho':
            $controller_procedimentos = new controllerCmsProcedimentos();
            $controller_procedimentos::AtivarCabecalho();
            break;

          case 'desativarcabecalho':
            $controller_procedimentos = new controllerCmsProcedimentos();
            $controller_procedimentos::DesativarCabecalho();
            break;

        //REFENTE AO CONTEUDO DE PROCEDIMENTOS
          case 'novoconteudo':
            $controller_procedimentos = new controllerCmsProcedimentos();
            $controller_procedimentos::NovoConteudo();
            break;

          case 'excluirconteudo':
            $controller_procedimentos = new controllerCmsProcedimentos();
            $controller_procedimentos::ExcluirConteudo();
            break;

          case 'editarconteudo':
            $controller_procedimentos = new controllerCmsProcedimentos();
            $controller_procedimentos::EditarConteudo();
            break;

          case 'buscarconteudo':
            $controller_procedimentos = new controllerCmsProcedimentos();
            $controller_procedimentos::BuscarConteudo();
            break;

          case 'ativarconteudo':
            $controller_procedimentos = new controllerCmsProcedimentos();
            $controller_procedimentos::AtivarConteudo();
            break;

          case 'desativarconteudo':
            $controller_procedimentos = new controllerCmsProcedimentos();
            $controller_procedimentos::DesativarConteudo();
            break;

        }
        break;

      case 'cmsAmbiente':
        require_once('controllers/cmsAmbientes_controller.php');
        require_once('models/ambientes_class.php');
          switch ($modo) {
            //REFENTE AO CABEÇALHO DE PROCEDIMENTOS
              case 'novocabecalho':
                $controller_procedimentos = new controllerCmsAmbientes();
                $controller_procedimentos::NovoCabecalho();
                break;

              case 'excluircabecalho':
                $controller_procedimentos = new controllerCmsAmbientes();
                $controller_procedimentos::ExcluirCabecalho();
                break;

              case 'editarcabecalho':
                $controller_procedimentos = new controllerCmsAmbientes();
                $controller_procedimentos::EditarCabecalho();
                break;

              case 'buscarcabecalho':
                $controller_procedimentos = new controllerCmsAmbientes();
                $controller_procedimentos::BuscarCabecalho();
                break;

              case 'ativarcabecalho':
                $controller_procedimentos = new controllerCmsAmbientes();
                $controller_procedimentos::AtivarCabecalho();
                break;

              case 'desativarcabecalho':
                $controller_procedimentos = new controllerCmsAmbientes();
                $controller_procedimentos::DesativarCabecalho();
                break;

                //REFENTE AO CONTEUDO DOS AMBIENTES

              case 'novoconteudo':
                $controller_procedimentos = new controllerCmsAmbientes();
                $controller_procedimentos::NovoConteudo();
                break;

              case 'excluirconteudo':
                $controller_procedimentos = new controllerCmsAmbientes();
                $controller_procedimentos::ExcluirConteudo();
                break;

              case 'editarconteudo':
                $controller_procedimentos = new controllerCmsAmbientes();
                $controller_procedimentos::EditarConteudo();
                break;

              case 'buscarconteudo':
                $controller_procedimentos = new controllerCmsAmbientes();
                $controller_procedimentos::BuscarConteudo();
                break;

              case 'ativarconteudo':
                $controller_procedimentos = new controllerCmsAmbientes();
                $controller_procedimentos::AtivarConteudo();
                break;

              case 'desativarconteudo':
                $controller_procedimentos = new controllerCmsAmbientes();
                $controller_procedimentos::DesativarConteudo();
                break;
          }
          break;

      case 'cmsSobre':
        require_once('controllers/cmsSobre_controller.php');
        require_once('models/sobre_class.php');
        switch ($modo) {
        //REFENTE AO CABEÇALHO DE PROCEDIMENTOS
          case 'novocabecalho':
            $controller_sobre = new controllerCmsSobre();
            $controller_sobre::NovoCabecalho();
            break;

          case 'excluircabecalho':
            $controller_sobre = new controllerCmsSobre();
            $controller_sobre::ExcluirCabecalho();
            break;

          case 'editarcabecalho':
            $controller_sobre = new controllerCmsSobre();
            $controller_sobre::EditarCabecalho();
            break;

          case 'buscarcabecalho':
            $controller_sobre = new controllerCmsSobre();
            $controller_sobre::BuscarCabecalho();
            break;

          case 'ativarcabecalho':
            $controller_sobre = new controllerCmsSobre();
            $controller_sobre::AtivarCabecalho();
            break;

          case 'desativarcabecalho':
            $controller_sobre = new controllerCmsSobre();
            $controller_sobre::DesativarCabecalho();
            break;

        //REFENTE AO CONTEUDO DE PROCEDIMENTOS
          case 'novoconteudo':
            $controller_sobre = new controllerCmsSobre();
            $controller_sobre::NovoConteudo();
            break;

          case 'excluirconteudo':
            $controller_sobre = new controllerCmsSobre();
            $controller_sobre::ExcluirConteudo();
            break;

          case 'editarconteudo':
            $controller_sobre = new controllerCmsSobre();
            $controller_sobre::EditarConteudo();
            break;

          case 'buscarconteudo':
            $controller_sobre = new controllerCmsSobre();
            $controller_sobre::BuscarConteudo();
            break;

          case 'ativarconteudo':
            $controller_sobre = new controllerCmsSobre();
            $controller_sobre::AtivarConteudo();
            break;

          case 'desativarconteudo':
            $controller_sobre = new controllerCmsSobre();
            $controller_sobre::DesativarConteudo();
            break;

        }
        break;

      case 'cmsUnidades':
        require_once('controllers/cmsUnidades_controller.php');
        require_once('models/unidades_class.php');
        require_once('controllers/cmsEndereco_controller.php');
        require_once('models/endereco_class.php');
        switch ($modo) {
        //REFENTE AO CABEÇALHO DE UNIDADES
          case 'novocabecalho':
            $controller_unidades = new controllerCmsUnidades();
            $controller_unidades::NovoCabecalho();
            break;

          case 'excluircabecalho':
            $controller_unidades = new controllerCmsUnidades();
            $controller_unidades::ExcluirCabecalho();
            break;

          case 'editarcabecalho':
            $controller_unidades = new controllerCmsUnidades();
            $controller_unidades::EditarCabecalho();
            break;

          case 'buscarcabecalho':
            $controller_unidades = new controllerCmsUnidades();
            $controller_unidades::BuscarCabecalho();
            break;

          case 'ativarcabecalho':
            $controller_unidades = new controllerCmsUnidades();
            $controller_unidades::AtivarCabecalho();
            break;

          case 'desativarcabecalho':
            $controller_unidades = new controllerCmsUnidades();
            $controller_unidades::DesativarCabecalho();
            break;

        //REFENTE AO CONTEUDO DE UNIDADES
          case 'novoconteudo':
            $controller_endereco = new controllerCmsEndereco();
            $controller_endereco::Novo();

            $controller_unidades = new controllerCmsUnidades();
            $controller_unidades::NovoConteudo();
            break;

          case 'excluirconteudo':
            $controller_unidades = new controllerCmsUnidades();
            $retorno = $controller_unidades::ExcluirConteudo();

            if ($retorno == 1) {
              $controller_endereco = new controllerCmsEndereco();
              $controller_endereco::Excluir();
            } else {
              echo "erro excluir unidade";
            }
            break;

          case 'editarconteudo':
            $controller_unidades = new controllerCmsUnidades();
            $controller_unidades::EditarConteudo();
            break;

          case 'buscarconteudo':
            $controller_unidades = new controllerCmsUnidades();
            $controller_unidades::BuscarConteudo();
            break;

          case 'ativarconteudo':
            $controller_unidades = new controllerCmsUnidades();
            $controller_unidades::AtivarConteudo();
            break;

          case 'desativarconteudo':
            $controller_unidades = new controllerCmsUnidades();
            $controller_unidades::DesativarConteudo();
            break;
        }
        break;

      case 'Contato':
        require_once('controllers/cmsContato_controller.php');
        require_once('models/contato_class.php');
        switch ($modo) {
        //REFENTE AO CABEÇALHO DE PROCEDIMENTOS
          case 'Selecionar':
            $controller_contatos = new controllerContato();
            $controller_contatos::selectContato();
            break;

          case 'excluirContato':
            $controller_contatos = new controllerContato();
            $controller_contatos::ExcluirContato();
            break;
          case 'SelecionarEspecifico':
            $controller_contatos = new controllerContato();
            $controller_contatos::selectContato();
            break;
        }
        break;
  }

}

 ?>
