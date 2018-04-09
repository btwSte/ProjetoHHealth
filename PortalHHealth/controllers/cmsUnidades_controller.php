<?php
  /* Autor: Stéphanie
     Data de modificação: 05/04/18
     Controller: Procedimentos de Exames
     Obs: Controller para realizar CRUD da pagina Unidades e verifica login
   */
  class controllerCmsUnidades{
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
        $unidadeCabecalho = new Unidades();

        // pega o conteudo
        $unidadeCabecalho->tituloFoto = $_POST['txt1'];

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

        $unidadeCabecalho->fotoCabecalho = $diretorio_completo;
        $unidadeCabecalho::Insert($unidadeCabecalho);
      }

      public function ListarCabecalho(){
        $cabecalho = new Unidades();
        return $cabecalho::SelectCabecalho();
      }

      public function ExcluirCabecalho() {
        $idCabecalho = $_GET['id'];

        $excluirCabecalho = new Unidades();

        $excluirCabecalho->id = $idCabecalho;
        $excluirCabecalho::DeleteCabecalho($excluirCabecalho);
      }

      public function BuscarCabecalho(){
        $idCabecalho = $_GET['id'];

        $cabecalho= new Unidades();

        $cabecalho->id = $idCabecalho;

        $cabecalhoResultado = $cabecalho::SelectCabecalhoById($cabecalho);

        require_once('views/cms/unidades/editarUnidades_view.php');
      }

      public function EditarCabecalho(){
        // require da funcao modulo para envio das imagens
        require_once('modulo.php');
        $idUnidadeCabecalho = $_GET['id'];

        $unidadesCabecalho = new Unidades();

        // pega o conteudo
        $unidadesCabecalho->id = $idUnidadeCabecalho;
        // pega o conteudo

        $unidadesCabecalho->tituloFoto = $_POST['txt1'];

        //inicia variaveis
        $diretorio_completo = null;
        $movUpload = false;
        $imagem_file = null;
        $fotoCabecalho = "a";

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

        $unidadesCabecalho->fotoCabecalho = $fotoCabecalho;
        Unidades::UpdateCabecalho($unidadesCabecalho);
      }

      public function AtivarCabecalho(){
        $idCabecalho = $_GET['id'];

        $ativarCabecalho = new Unidades();

        $ativarCabecalho->id = $idCabecalho;
        return $ativarCabecalho::ActivateCabecalho($ativarCabecalho);
      }

      public function DesativarCabecalho(){
        $idCabecalho = $_GET['id'];

        $desativarCabecalho = new Unidades();

        $desativarCabecalho->id = $idCabecalho;
        return $desativarCabecalho::DisableCabecalho($desativarCabecalho);
      }

      // REFERENTE AO CONTEUDO
      public function NovoConteudo(){
        // require da funcao modulo para envio das imagens
        require_once('modulo.php');

        // novo objeto
        $unidadeConteudo = new Unidades();

        // pega o conteudo
        $unidadeConteudo->endereco = $_POST['txtEnd'];
        $unidadeConteudo->email = $_POST['txtEmail'];
        $unidadeConteudo->numero = $_POST['txtNum'];

        //inicia variaveis
        $diretorio_completo = null;
        $movUpload = false;
        $imagem_file = null;

        //pega a foto
        if (!empty($_FILES['imagem_conteudo']['name'])){
          $imagem_file = true;
          $diretorio_completo = salvaImagem($_FILES['imagem_conteudo'], 'arquivos');
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

        $unidadeConteudo->fotoUnidade = $diretorio_completo;
        $unidadeConteudo::InsertConteudo($unidadeConteudo);
      }

      public function ListarConteudo(){
        $conteudo = new Unidades();
        return $conteudo::SelectConteudo();
      }

      public function ExcluirConteudo(){
        $idConteudo = $_GET['id'];

        $excluirConteudo = new Unidades();

        $excluirConteudo->id = $idConteudo;
        $excluirConteudo::DeleteConteudo($excluirConteudo);
      }

      public function BuscarConteudo(){
        $idConteudo = $_GET['id'];

        $conteudo = new Unidades();

        $conteudo->id = $idConteudo;

        $conteudoResultado = $conteudo::SelectConteudoById($conteudo);

        require_once('views/cms/unidades/editarUnidades_view.php');
      }

      public function EditarConteudo(){
        // require da funcao modulo para envio das imagens
        require_once('modulo.php');
        $idPaginaUnidade = $_GET['id'];

        $unidadesConteudo = new Unidades();

        // pega o conteudo
        $unidadesConteudo->id = $idPaginaUnidade;
        $unidadesConteudo->endereco = $_POST['txtEnd'];
        $unidadesConteudo->email = $_POST['txtEmail'];
        $unidadesConteudo->numero = $_POST['txtNum'];

        //inicia variaveis
        $diretorio_completo = null;
        $movUpload = false;
        $imagem_file = null;
        $fotoUnidade = "a";

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
          $fotoUnidade = $diretorio_completo;
        } else {
          $fotoUnidade = "vazio";
        }

        $unidadesConteudo->fotoUnidade = $fotoUnidade;
        Unidades::UpdateConteudo($unidadesConteudo);
      }

      public function AtivarConteudo(){
        $idConteudo = $_GET['id'];

        $ativarConteudo = new Unidades();

        $ativarConteudo->id = $idConteudo;
        return $ativarConteudo::ActivateConteudo($ativarConteudo);
      }

      public function DesativarConteudo(){
        $idConteudo = $_GET['id'];

        $desativarConteudo = new Unidades();

        $desativarConteudo->id = $idConteudo;
        return $desativarConteudo::DisableConteudo($desativarConteudo);
      }

  }


 ?>
