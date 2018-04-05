<?php
  /* Autor: Stéphanie
     Data de modificação: 01/04/18
     Controller: Procedimentos de Exames
     Obs: Controller para realizar CRUD da pagina Procedimento de Exames e verifica login
   */

  class controllerCmsProcedimentos{
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
        $procedimentoCabecalho = new Procedimentos();

        // pega o conteudo
        $procedimentoCabecalho->tituloFoto = $_POST['txt1'];
        $procedimentoCabecalho->tituloCabecalho = $_POST['txtTitulo_conteudo'];

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
        } else {
          $imagem_file = false;
        }

        $procedimentoCabecalho->fotoCabecalho = $diretorio_completo;
        $procedimentoCabecalho::Insert($procedimentoCabecalho);
      }

      public function ListarCabecalho(){
        $cabecalho = new Procedimentos();
        return $cabecalho::SelectCabecalho();
      }

      public function ExcluirCabecalho() {
        $idCabecalho = $_GET['id'];

        $excluirCabecalho = new Procedimentos();

        $excluirCabecalho->id = $idCabecalho;
        $excluirCabecalho::DeleteCabecalho($excluirCabecalho);
      }

      public function BuscarCabecalho(){
        $idCabecalho = $_GET['id'];

        $cabecalho= new Procedimentos();

        $cabecalho->id = $idCabecalho;

        $cabecalhoResultado = $cabecalho::SelectCabecalhoById($cabecalho);

        require_once('views/cms/editarProcedimentos_view.php');
      }

      public function EditarCabecalho(){
        // require da funcao modulo para envio das imagens
        require_once('modulo.php');
        $idProcedimentoCabecalho = $_GET['id'];

        $procedimentoCabecalho = new Procedimentos();

        // pega o conteudo
        $procedimentoCabecalho->id = $idProcedimentoCabecalho;
        // pega o conteudo

        $procedimentoCabecalho->tituloFoto = $_POST['txt1'];
        $procedimentoCabecalho->tituloCabecalho = $_POST['txtTitulo_conteudo'];

        //inicia variaveis
        $diretorio_completo = null;
        $movUpload = false;
        $imagem_file = null;
        $foto = "a";

        //Pega foto
        if (!empty($_FILES['imagem_cabecalho']['name'])){
         $imagem_file = true;
         $diretorio_completo = salvaImagem($_FILES['imagem_cabecalho'],'arquivos');

          if ($diretorio_completo == "Erro"){
             echo "<script>
                 alert('arquivo nao movido');
                 window.history.go(-1);
                 </script>";
               $MovUpload=false;
          } else {
            $MovUpload=true;
          }
        } else {
         $imagem_file = false;
        }

        if ($imagem_file == true && $MovUpload == true) {
          $fotoCabecalho = $diretorio_completo;
        } else {
          $fotoCabecalho = "vazio";
        }

        $procedimentoCabecalho->fotoCabecalho = $fotoCabecalho;
        Procedimentos::UpdateCabecalho($procedimentoCabecalho);
      }

      public function AtivarCabecalho(){
        $idCabecalho = $_GET['id'];

        $ativarCabecalho = new Procedimentos();

        $ativarCabecalho->id = $idCabecalho;
        return $ativarCabecalho::ActivateCabecalho($ativarCabecalho);
      }

      public function DesativarCabecalho(){
        $idCabecalho = $_GET['id'];

        $desativarCabecalho = new Procedimentos();

        $desativarCabecalho->id = $idCabecalho;
        return $desativarCabecalho::DisableCabecalho($desativarCabecalho);
      }

    //FUNÇÕES REFERENTE AO CONTEUDO
      public function NovoConteudo(){
        require_once('modulo.php');
        $procedimentoConteudo = new Procedimentos();

        $procedimentoConteudo->textoProcedimento = $_POST['txtConteudo'];

        //inicia variaveis
        $diretorio_completo = null;
        $movUpload = false;
        $imagem_file = null;

        //pega a foto
        if (!empty($_FILES['imagem_conteudo']['name'])) {
          $imagem_file = true;
          $diretorio_completo = salvaImagem($_FILES['imagem_conteudo'], 'arquivos');

          if ($diretorio_completo == 'Erro') {
            echo "<script>
                    alert('arquivo nao movido');
                    window.history.go(-1);
                  </script>";
            $movUpload = false;
          } else {
            $movUpload = true;
          }
        } else {
          $imagem_file = false;
        }

        $procedimentoConteudo->fotoProcedimento = $diretorio_completo;
        $procedimentoConteudo::InsertConteudo($procedimentoConteudo);
      }

      public function ListarConteudo(){
        $conteudo = new Procedimentos();
        return $conteudo::SelectConteudo();
      }

      public function ExcluirConteudo() {
        $idConteudo = $_GET['id'];

        $excluirConteudo = new Procedimentos();

        $excluirConteudo->id = $idConteudo;
        $excluirConteudo::DeleteConteudo($excluirConteudo);
      }

      public function BuscarConteudo(){
        $idConteudo = $_GET['id'];

        $conteudo = new Procedimentos();

        $conteudo->id = $idConteudo;

        $conteudoResultado = $conteudo::SelectConteudoById($conteudo);

        require_once('views/cms/editarProcedimentos_view.php');
      }

      public function EditarConteudo(){
        // require da funcao modulo para envio das imagens
        require_once('modulo.php');
        $idPaginaProcedimento = $_GET['id'];

        $procedimentoConteudo = new Procedimentos();

        // pega o conteudo
        $procedimentoConteudo->id = $idPaginaProcedimento;
        $procedimentoConteudo->textoProcedimento = $_POST['txtConteudo'];

        //inicia variaveis
        $diretorio_completo = null;
        $movUpload = false;
        $imagem_file = null;
        $fotoProcedimento = "a";

        //Pega foto
        if (!empty($_FILES['imagem_conteudo']['name'])){
         $imagem_file = true;
         $diretorio_completo = salvaImagem($_FILES['imagem_conteudo'],'arquivos');

          if ($diretorio_completo == "Erro"){
             echo "<script>
                 alert('arquivo nao movido');
                 window.history.go(-1);
                 </script>";
               $MovUpload = false;
          } else {
            $MovUpload = true;
          }
        } else {
         $imagem_file = false;
        }

        if ($imagem_file == true && $MovUpload == true) {
          $fotoProcedimento = $diretorio_completo;
        } else {
          $fotoProcedimento = "vazio";
        }

        $procedimentoConteudo->fotoProcedimento = $fotoProcedimento;
        Procedimentos::UpdateConteudo($procedimentoConteudo);
      }

      public function AtivarConteudo(){
        $idConteudo = $_GET['id'];

        $ativarConteudo = new Procedimentos();

        $ativarConteudo->id = $idConteudo;
        return $ativarConteudo::ActivateConteudo($ativarConteudo);
      }

      public function DesativarConteudo(){
        $idConteudo = $_GET['id'];

        $desativarConteudo = new Procedimentos();

        $desativarConteudo->id = $idConteudo;
        return $desativarConteudo::DisableConteudo($desativarConteudo);
      }

  }
 ?>