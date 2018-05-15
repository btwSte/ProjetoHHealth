
<?php
if(isset($_GET['controller'])){
  $controller = $_GET['controller'];
  $modo = $_GET['modo'];
  // $cms = $_GET['cms'];

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
        require_once('models/informacoes_cabecalho_class.php');
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
        require_once('models/procedimentos_cabecalho_class.php');
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
        require_once('models/ambientes_cabecalho_class.php');
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
        require_once('models/sobre_cabecalho_class.php');
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
        require_once('models/unidade_cabecalho_class.php');
        require_once('models_views/unidade_e_endereco_class.php');
        require_once('models/bd_class.php');
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
            $controller_endereco = new controllerCmsEndereco();
            $retorno = $controller_endereco::Editar();

            if ($retorno = 1) {
              $controller_unidades = new controllerCmsUnidades();
              $controller_unidades::EditarConteudo();
            } else {
              echo "Erro ao atualizar endereco";
            }
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
        require_once('models/contato_cabecalho_class.php');
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

      case 'Curriculo':
        require_once('controllers/admTrabalheConosco_controller.php');
        require_once('models/trabalheconosco_class.php');
        require_once('models/trabalheconosco_cabecalho_class.php');
        switch ($modo) {
          case 'Selecionar':
            $controller_curriculo = new controllerCurriculo();
            $controller_curriculo::selectCurriculo();
            break;

          case 'excluirCurriculo':
            $controller_curriculo = new controllerCurriculo();
            $controller_curriculo::ExcluirCurriculo();
            break;
          case 'SelecionarEspecifico':
            $controller_curriculo = new controllerCurriculo();
            $controller_curriculo::selectCurriculoByID();
            break;
        }
        break;

      case 'Convenio':
        require_once('controllers/cmsConvenio_controller.php');
        require_once('models/convenio_class.php');
        require_once('models/convenio_cabecalho_class.php');
        switch ($modo){
          //REFENTE AO CABEÇALHO DE CONVÊNIO
          case 'novocabecalho':
            $controller_convenio = new controllerCmsConvenio();
            $controller_convenio::NovoCabecalho();
            break;

          case 'excluircabecalho':
            $controller_convenio = new controllerCmsConvenio();
            $controller_convenio::ExcluirCabecalho();
            break;

          case 'editarcabecalho':
            $controller_convenio = new controllerCmsConvenio();
            $controller_convenio::EditarCabecalho();
            break;

          case 'buscarcabecalho':
            $controller_convenio = new controllerCmsConvenio();
            $controller_convenio::BuscarCabecalho();
            break;

          case 'ativarcabecalho':
            $controller_convenio = new controllerCmsConvenio();
            $controller_convenio::AtivarCabecalho();
            break;

          case 'desativarcabecalho':
            $controller_convenio = new controllerCmsConvenio();
            $controller_convenio::DesativarCabecalho();
            break;

          //REFENTE AO CONTEUDO DE CONVÊNIOS
          case 'novoconteudo':
            $controller_convenio = new controllerCmsConvenio();
            $controller_convenio::NovoConteudo();
            break;

          case 'excluirconteudo':
            $controller_convenio = new controllerCmsConvenio();
            $controller_convenio::ExcluirConteudo();
            break;

          case 'editarconteudo':
            $controller_convenio = new controllerCmsConvenio();
            $controller_convenio::EditarConteudo();
            break;

          case 'buscarconteudo':
            $controller_convenio = new controllerCmsConvenio();
            $controller_convenio::BuscarConteudo();
            break;

          case 'ativarconteudo':
            $controller_convenio = new controllerCmsConvenio();
            $controller_convenio::AtivarConteudo();
            break;

          case 'desativarconteudo':
            $controller_convenio = new controllerCmsConvenio();
            $controller_convenio::DesativarConteudo();
            break;

          //REFENTE AO CONTEUDO DE CONVÊNIO
            case 'novoconteudo':
              $controller_sobre = new controllerCmsConvenio();
              $controller_sobre::NovoConteudo();
              break;

            case 'excluirconteudo':
              $controller_sobre = new controllerCmsConvenio();
              $controller_sobre::ExcluirConteudo();
              break;

            case 'editarconteudo':
              $controller_sobre = new controllerCmsConvenio();
              $controller_sobre::EditarConteudo();
              break;

            case 'buscarconteudo':
              $controller_sobre = new controllerCmsConvenio();
              $controller_sobre::BuscarConteudo();
              break;

            case 'ativarconteudo':
              $controller_sobre = new controllerCmsConvenio();
              $controller_sobre::AtivarConteudo();
              break;

            case 'desativarconteudo':
              $controller_sobre = new controllerCmsConvenio();
              $controller_sobre::DesativarConteudo();
              break;
          }
          break;

      case 'Medicamento':
        require_once('controllers/cmsMedicamento_controller.php');
        require_once('models/medicamento_class.php');
        switch ($modo){
        //REFENTE AO CABEÇALHO DE PROCEDIMENTOS
          case 'novomedicamento':
            $controller_medicamento = new controllerCmsMedicamento();
            $controller_medicamento::Novo();
            break;
          case 'excluirmedicamento':
            $controller_medicamento = new controllerCmsMedicamento();
            $controller_medicamento::Excluir();
            break;

          case 'editarmedicamento':
            $controller_medicamento = new controllerCmsMedicamento();
            $controller_medicamento::Editar();
            break;

          case 'buscarmedicamento':
            $controller_medicamento = new controllerCmsMedicamento();
            $controller_medicamento::Buscar();
            break;

        }
        break;

      case 'Medico':
        require_once('controllers/AdmMedico_controller.php');
        require_once('models/Medico_class.php');
        require_once('controllers/cmsEndereco_controller.php');
        require_once('models/endereco_class.php');
        switch ($modo){
        //REFENTE AO CABEÇALHO DE PROCEDIMENTOS
          case 'novomedico':
            $controller_endereco = new controllerCmsEndereco();
            $controller_endereco::NovoEnderecoMedico();

            $controller_Medico = new controllerCmsMedico();
            $controller_Medico::Novo();
            break;
          // case 'excluirmedico':
          //   $controller_Medico = new controllerCmsMedico();
          //   $controller_Medico::Excluir();
          //   break;
          //
          // case 'editarmedico':
          //   $controller_Medico = new controllerCmsMedico();
          //   $controller_Medico::Editar();
          //   break;
          //
          // case 'buscarmedico':
          //   $controller_Medico = new controllerCmsMedico();
          //   $controller_Medico::Buscar();
          //   break;

        }
        break;

      case 'cmsHome':
        require_once('controllers/cmsHome_controller.php');
        require_once('models/home_class.php');
        switch ($modo) {
          case 'novoconteudo':
            $controller_home = new controllerCmsHome();
            $controller_home::NovoConteudoHome();
            break;

          case 'buscarhome':
            $controller_home = new controllerCmsHome();
            $controller_home::BuscarConteudo();
            break;

          case 'excluirhome':
            $controller_home = new controllerCmsHome();
            $controller_home::ExcluirHome();
            break;

          case 'editarconteudo':
            $controller_home = new controllerCmsHome();
            $controller_home::Atualizar();
            break;
    }

    case 'Plano':
       require_once('controllers/cmsPlano_controller.php');
       require_once('models/plano_class.php');
       switch ($modo){
       //REFENTE AO PLANO
         case 'novoconteudo':
           $controller_plano = new controllerCmsPlano();
           $controller_plano::Novo();
           break;
         case 'excluirconteudo':
           $controller_plano = new controllerCmsPlano();
           $controller_plano::ExcluirConteudo();
           break;

         case 'editarconteudo':
           $controller_plano = new controllerCmsPlano();
           $controller_plano::Editar();
           break;

         case 'buscarconteudo':
           $controller_plano = new controllerCmsPlano();
           $controller_plano::Buscar();
           break;
       }

    case 'Especialidade':
     require_once('controllers/cmsEspecialidade_controller.php');
     require_once('models/especialidade_class.php');
     switch ($modo){
     //REFENTE AO PLANO
       case 'novaespecialidade':
         $controller_especialidade = new controllerCmsEspecialidade();
         $controller_especialidade::Novo();
         break;
       case 'excluirespecialidade':
         $controller_especialidade = new controllerCmsEspecialidade();
         $controller_especialidade::ExcluirConteudo();
         break;

       case 'editarespecialidade':
         $controller_especialidade = new controllerCmsEspecialidade();
         $controller_especialidade::Editar();
         break;

       case 'buscarespecialidade':
         $controller_especialidade = new controllerCmsEspecialidade();
         $controller_especialidade::Buscar();
         break;

       }


    break;
  }

}

 ?>
