<?php
  /* Autor: Bruno
     Data de modificação: 02/05/18
     Controller: Medicos
     Obs: Controller para realizar CRUD de Medios
   */

  class controllerCmsMedico{

      public function Novo($idEndereco){
        // require da funcao modulo para envio das imagens
        require_once('modulo.php');

        // novo objeto
        $medico = new Medico();

        // pega o conteudo
        $medico->nome = $_POST['txtNome'];
        // $medico->telefone = $_POST['numTelefone'];
        // $medico->celular = $_POST['numCelular'];
        $medico->dtAdmissao = $_POST['dtAdmissao'];
        $medico->rg = $_POST['numRg'];
        $medico->cpf = $_POST['numCpf'];
        $medico->crm = $_POST['numCrm'];
        $medico->dtNasc = $_POST['numDtnasc'];
        // $medico->email = $_POST['txtEmail'];
        $medico->idEndereco = $idEndereco->idEndereco;


        //inicia variaveis
        $diretorio_fotoCRM = null;
        $diretorio_fotomedico = null;
        $movUpload = false;
        $imagem_file = null;


        //pega a foto da crm
        // if (!empty($_FILES['fotoCRM']['name'])){
        //   $imagem_file = true;
        //   $diretorio_fotoCRM = salvaImagem($_FILES['fotoCRM'], 'arquivos');
        //   if ($diretorio_fotoCRM == 'Erro'){
        //     // echo "<script>
        //     //         alert('arquivo nao movido');
        //     //         window.history.go(-1);
        //     //       </script>";
        //           $movUpload = false;
        //   } else {
        //     $movUpload = true;
        //   }
        // } else {
        //   $imagem_file = false;
        // }

        //pega a foto do medico
        // if (!empty($_FILES['fotoMedico']['name'])){
        //   $imagem_file = true;
        //   $diretorio_fotomedico = salvaImagem($_FILES['fotoMedico'], 'arquivos');
        //   if ($diretorio_fotomedico == 'Erro'){
        //     // echo "<script>
        //     //         alert('arquivo nao movido');
        //     //         window.history.go(-1);
        //     //       </script>";
        //           $movUpload = false;
        //   } else {
        //     $movUpload = true;
        //   }
        // } else {
        //   $imagem_file = false;
        // }
        //
        // //variavel de insert recebendo o caminho das imagens
        // $medico->fotoCrm = $diretorio_fotoCRM;
        // $medico->fotoMedico = $diretorio_fotomedico;
        //chama funcao de inserir
        $medico::Insert($medico);
      }

      public function SelecionaMedico(){
        $info_medico = new Medico();
        return $info_medico::SelectMedico();
      }

  }
 ?>
