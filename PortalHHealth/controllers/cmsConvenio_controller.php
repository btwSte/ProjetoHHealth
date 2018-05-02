<?php
  /* Autor: João Victor
     Data de modificação: 05/04/18
     Controller: Convênio
     Obs: Controller para realizar CRUD da pagina Procedimento de Exames e verifica login
   */

  class controllerCmsConvenio{
    function Logar(){
      $Login = new Login();

      $Login->cpf = $_POST['cpf'];
      $Login->senha = $_POST['senha'];

      Login::Logar($Login);
    }

    // FUNÇÕES REFENTE AO CABEÇALHO
      public function NovoCabecalho(){
        // require da funcao modulo para envio das imagens
        require_once('modulo.php');

        // novo objeto
        $convenioCabecalho = new ConvenioCabecalho();

        // pega o conteudo
        $convenioCabecalho->tituloPagina = $_POST['txtTituloImagem'];

        //inicia variaveis
        $diretorio_completo = null;
        $movUpload = false;
        $imagem_file = null;

        //pega a foto
        if (!empty($_FILES['imagem_cabecalho']['name'])){
          $imagem_file = true;
          $diretorio_completo = salvaImagem($_FILES['imagem_cabecalho'], 'arquivos');
          if ($diretorio_completo == 'Erro'){
            echo "<script>
                    alert('arquivo nao movido');
                    window.history.go(-1);
                  </script>";
                  $movUpload = false;
          } else {
            $movUpload = true;
          }
        }else {
            $imagem_file = false;
          }

          $convenioCabecalho->fotoPrincipal = $diretorio_completo;
          $convenioCabecalho::Insert($convenioCabecalho);
      }

      public function SelecionarCabecalhoAtivo(){
        $cabecalho = new ConvenioCabecalho();
        return $cabecalho::SelectCabecalhoAtivo();
      }

      //FUNÇÕES REFERENTE AO CONTEUDO DE CONVÊNIO
      public function NovoConteudo(){
        require_once('modulo.php');
        $informacaoConteudo = new Convenio();

        $informacaoConteudo->nome = $_POST['txtNomeConvenio'];

        $informacaoConteudo::InsertConteudo($informacaoConteudo);
      }

      public function SelecionarConteudoAtivo(){
        $conteudo = new Convenio();
        return $conteudo::SelectConteudoAtivo();
      }
    }
?>
