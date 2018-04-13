<?php
/* Autor: Vinicius
   Data de criação: 010/04/18
   Controller: Contato
   Obs: Controller para realizar CRUD da pagina Informacoes e verifica login
 */
 class controllerContato{
     function Logar(){
       $Login = new Login();

       $Login->cpf = $_POST['cpf'];
       $Login->senha = $_POST['senha'];

       Login::Logar($Login);
     }

     public function selectContato(){
       $info_Contato = new Contato();
       return $info_Contato::Select();
     }

     public function ExcluirContato(){
       $info_Contato = new Contato();

       $info_Contato->idDadoContato = $_GET['id'];



       return $info_Contato::Excluir($info_Contato);

     }
     public function selectContatoByID(){
       $info_Contato = new Contato();
       $info_Contato->idDadoContato = $_POST['id'];
       return $info_Contato::SelectByID($info_Contato);
     }

  }
 ?>
