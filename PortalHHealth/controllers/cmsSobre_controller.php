<?php
  /* Autor: Stéphanie
     Data de modificação: 05/04/18
     Controller: Procedimentos de Exames
     Obs: Controller para realizar CRUD da pagina Sobre e verifica login
   */

  class controllerCmsSobre{
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
        $sobreCabecalho = new Sobre();

        // pega o conteudo
        $sobreCabecalho->tituloFoto = $_POST['txt1'];
        $sobreCabecalho->tituloPagina = $_POST['txtTitulo_conteudo'];

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

        $sobreCabecalho->fotoCabecalho = $diretorio_completo;
        $sobreCabecalho::Insert($sobreCabecalho);
      }

      public function ListarCabecalho(){
        $cabecalho = new Sobre();
        return $cabecalho::SelectCabecalho();
      }

      public function ExcluirCabecalho() {
        $idCabecalho = $_GET['id'];

        $excluirCabecalho = new Sobre();

        $excluirCabecalho->id = $idCabecalho;
        $excluirCabecalho::DeleteCabecalho($excluirCabecalho);
      }

      public function BuscarCabecalho(){
        $idCabecalho = $_GET['id'];

        $cabecalho= new Sobre();

        $cabecalho->id = $idCabecalho;

        $cabecalhoResultado = $cabecalho::SelectCabecalhoById($cabecalho);

        require_once('views/cms/sobre/editarSobre_view.php');
      }

      public function EditarCabecalho(){
        // require da funcao modulo para envio das imagens
        require_once('modulo.php');
        $idSobreCabecalho = $_GET['id'];

        $sobreCabecalho = new Sobre();

        // pega o conteudo
        $sobreCabecalho->id = $idSobreCabecalho;
        // pega o conteudo

        $sobreCabecalho->tituloFoto = $_POST['txt1'];
        $sobreCabecalho->tituloPagina = $_POST['txtTitulo_conteudo'];

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

        $sobreCabecalho->fotoCabecalho = $fotoCabecalho;
        Sobre::UpdateCabecalho($sobreCabecalho);
      }

      public function AtivarCabecalho(){
        $idCabecalho = $_GET['id'];

        $ativarCabecalho = new Sobre();

        $ativarCabecalho->id = $idCabecalho;
        return $ativarCabecalho::ActivateCabecalho($ativarCabecalho);
      }

      public function DesativarCabecalho(){
        $idCabecalho = $_GET['id'];

        $desativarCabecalho = new Sobre();

        $desativarCabecalho->id = $idCabecalho;
        return $desativarCabecalho::DisableCabecalho($desativarCabecalho);
      }

    //FUNÇÕES REFERENTE AO CONTEUDO
      public function NovoConteudo(){
        require_once('modulo.php');
        $sobreConteudo = new Sobre();

        $sobreConteudo->textoSobre = $_POST['txtConteudo'];

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

        $sobreConteudo->fotoSobre = $diretorio_completo;
        $sobreConteudo::InsertConteudo($sobreConteudo);
      }

      public function ListarConteudo(){
        $conteudo = new Sobre();
        return $conteudo::SelectConteudo();
      }

      public function ExcluirConteudo(){
        $idConteudo = $_GET['id'];

        $excluirConteudo = new Sobre();

        $excluirConteudo->id = $idConteudo;
        $excluirConteudo::DeleteConteudo($excluirConteudo);
      }

      public function BuscarConteudo(){
        $idConteudo = $_GET['id'];

        $conteudo = new Sobre();

        $conteudo->id = $idConteudo;

        $conteudoResultado = $conteudo::SelectConteudoById($conteudo);

        require_once('views/cms/sobre/editarSobre_view.php');
      }

      public function EditarConteudo(){
        // require da funcao modulo para envio das imagens
        require_once('modulo.php');
        $idPaginaSobre = $_GET['id'];

        $sobreConteudo = new Sobre();

        // pega o conteudo
        $sobreConteudo->id = $idPaginaSobre;
        $sobreConteudo->textoSobre = $_POST['txtConteudo'];

        //inicia variaveis
        $diretorio_completo = null;
        $movUpload = false;
        $imagem_file = null;
        $fotoSobre = "a";

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
          $fotoSobre = $diretorio_completo;
        } else {
          $fotoSobre = "vazio";
        }

        $sobreConteudo->fotoSobre = $fotoSobre;
        Sobre::UpdateConteudo($sobreConteudo);
      }

      public function AtivarConteudo(){
        $idConteudo = $_GET['id'];

        $ativarConteudo = new Sobre();

        $ativarConteudo->id = $idConteudo;
        return $ativarConteudo::ActivateConteudo($ativarConteudo);
      }

      public function DesativarConteudo(){
        $idConteudo = $_GET['id'];

        $desativarConteudo = new Sobre();

        $desativarConteudo->id = $idConteudo;
        return $desativarConteudo::DisableConteudo($desativarConteudo);
      }

  }
 ?>
