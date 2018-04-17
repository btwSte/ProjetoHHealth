<?php
  /* Autor: Stéphanie
     Data de modificação: 11/04/18
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

    
  }


?>
