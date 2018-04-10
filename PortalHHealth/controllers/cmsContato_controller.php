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
  }
 ?>
