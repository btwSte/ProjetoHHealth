<?php
/* Autor: Stéphanie
   Data de modificação: 01/05/18
   Class: Login
   Obs: Class para login
 */
 
class LoginController{

  public function Logar(){
    $verifica = new Login();

    $verifica->cpf = $_POST['cpf'];
    $verifica->senha = $_POST['senha'];

    $verifica::VerificaLogin($verifica);
  }
}

 ?>
