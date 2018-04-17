<?php
/* Autor: Bruno
   Data de modificação: 16/04/18
   Controller: trabalhe Conosco
   Obs: Controller para o envio de dados pessoasi para o Trabalhe conosco
 */

 class controllerTrabalheConosco{

    function InserirTrabalheConosco(){
      // require da funcao modulo para envio do curriculo
      require_once('modulo.php');

       $dadoCurriculo = new TrabaConosco();

       $dadoCurriculo->idCurriculo = null;
       $dadoCurriculo->nome = $_POST['txtNome'];
       $dadoCurriculo->telefone = $_POST['txtTelefone'];
       $dadoCurriculo->celular = $_POST['txtCelular'];
       $dadoCurriculo->email = $_POST['txtEmail'];
       $dadoCurriculo->profissao = $_POST['txtProfissao'];


       //pega a Curriculo
       if (!empty($_FILES['Doc_curriculo']['name'])){
         $imagem_file = true;
         $diretorio_completo = salvaCurriculo($_FILES['Doc_curriculo'], 'arquivos');
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

       $dadoCurriculo->curriculo = $diretorio_completo;
       $dadoCurriculo::Insert($dadoCurriculo);

     }

     }
 ?>
