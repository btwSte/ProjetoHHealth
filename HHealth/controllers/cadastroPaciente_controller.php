<?php
/* Autor: Bruno
   Data de modificação: 01/05/18
   Controller: Paciente
   Obs: Controller para o cadastro de paciente
 */

 class controllerCadPaciente{

    function InserirPaciente($idEndereco){

      // require da funcao modulo para envio o cadastro do pacinte
      require_once('modulo.php');

       $dadoPaciente = new Paciente();

       // pega dados da view
       $dadoPaciente->idPaciente = null;
       $dadoPaciente->nome = $_POST['txtNome'];
       $dadoPaciente->dtNasc = $_POST['txtDtnasc'];
       $dadoPaciente->idEstadoCivil = $_POST['sltEstadoCivil'];
       $dadoPaciente->sexo = $_POST['sltSexo'];
       $dadoPaciente->nacionalidade = $_POST['sltNacionalidade'];
       $dadoPaciente->idTipoSanguineo = $_POST['sltTipoSanguineo'];
       $dadoPaciente->rg = $_POST['txtRg'];
       $dadoPaciente->cpf = $_POST['txtCpf'];
       $dadoPaciente->telResidencial = $_POST['txtTelefone'];
       $dadoPaciente->celular = $_POST['txtCelular'];
       $dadoPaciente->email = $_POST['txtEmail'];
       $dadoPaciente->senha = $_POST['txtSenha'];
       $dadoPaciente->idEndereco = $idEndereco->idEndereco;
       $dadoPaciente->idConvenio = $_POST['sltConvenio'];

       //inicia variaveis das imagens
       $diretorio_imagem_rg = null;
       $diretorio_imagem_cpf = null;
       $diretorio_imagem_cartConvenio = null;
       $diretorio_foto_paciente = null;
       $movUpload = false;
       $imagem_file = null;


       //pega foto do rg
       if (!empty($_FILES['imagem_rg']['name'])){
         $imagem_file = true;
         $diretorio_imagem_rg = salvaImagem($_FILES['imagem_rg'], 'arquivos');
         if ($diretorio_imagem_rg == 'Erro'){
           // echo "<script>
           //         alert('arquivo nao movido');
           //         window.history.go(-1);
           //       </script>";
                 $movUpload = false;
         } else {
           $movUpload = true;
         }
       } else {
         $imagem_file = false;
       }

       //pega foto do cpf
       if (!empty($_FILES['imagem_cpf']['name'])){
         $imagem_file = true;
         $diretorio_imagem_cpf = salvaImagem($_FILES['imagem_cpf'], 'arquivos');
         if ($diretorio_imagem_cpf == 'Erro'){
           // echo "<script>
           //         alert('arquivo nao movido');
           //         window.history.go(-1);
           //       </script>";
                 $movUpload = false;
         } else {
           $movUpload = true;
         }
       } else {
         $imagem_file = false;
       }


       //pega foto do cartao de convenio
       if (!empty($_FILES['imagem_cartConvenio']['name'])){
         $imagem_file = true;
         $diretorio_imagem_cartConvenio = salvaImagem($_FILES['imagem_cartConvenio'], 'arquivos');
         if ($diretorio_imagem_cartConvenio == 'Erro'){
           // echo "<script>
           //         alert('arquivo nao movido');
           //         window.history.go(-1);
           //       </script>";
                 $movUpload = false;
         } else {
           $movUpload = true;
         }
       } else {
         $imagem_file = false;
       }

       //pega foto do paciente
       if (!empty($_FILES['foto_paciente']['name'])){
         $imagem_file = true;
         $diretorio_foto_paciente = salvaImagem($_FILES['foto_paciente'], 'arquivos');
         if ($diretorio_foto_paciente == 'Erro'){
           // echo "<script>
           //         alert('arquivo nao movido');
           //         window.history.go(-1);
           //       </script>";
                 $movUpload = false;
         } else {
           $movUpload = true;
         }
       } else {
         $imagem_file = false;
       }

      // guarda os dados
      $dadoPaciente->fotoRg = $diretorio_imagem_rg;
      $dadoPaciente->fotoCpf = $diretorio_imagem_cpf;
      $dadoPaciente->fotoConvenio = $diretorio_imagem_cartConvenio;
      $dadoPaciente->fotoPaciente = $diretorio_foto_paciente;

      // chama a funcao de inserir
      $dadoPaciente::InsertPaciente($dadoPaciente);

     }

     }
 ?>
