<?php
/* Autor: Vinicius
   Data de modificação: 06/04/18
   Controller: Contato
   Obs: Controller para realizar a inserçao de uma sugestao ou critica do usuario
 */

 class controllerCmsAmbientes{

    function InserirContato(){
       $dadoContato = new Contato();

       $dadoContato->idDadoContato = null;
       $dadoContato->nome = $_POST['txtNome'];
       $dadoContato->telefone = $_POST['txtTelefone'];
       $dadoContato->celular = $_POST['txtCelular'];
       $dadoContato->email = $_POST['txtEmail'];
       $dadoContato->sugestaoOUcritica = $_POST['cs'];
       $dadoContato->texto = $_POST['sugestaocritica'];

       $dadoContato::Insert($dadoContato);
       header('location:views/paginas/contato_view.php');
     }

     }
 ?>
