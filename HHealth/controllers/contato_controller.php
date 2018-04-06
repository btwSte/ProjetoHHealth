<?php
/* Autor: Vinicius
   Data de modificação: 06/04/18
   Controller: Contato
   Obs: Controller para realizar a inserçao de uma sugestao ou critica do usuario
 */

 class controllerCmsAmbientes{
     public function InserirContato{
       $idDadoContato = null;
       $nome = $_POST['txtNome'];
       $telefone = $_POST['txtTelefone'];
       $celular = $_POST['txtCelular'];
       $email = $_POST['txtEmail'];
       $sugestao_critica = $_POST['rdo'];
       $texto = $_POST['sugestaocritica'];
     }
     }
 ?>
