<?php
  /* Autor: João Victor
     Data de modificação: 17/05/2018
     Controller: Convênio
     Obs: Controller para realizar CRUD de Cargos
   */

  class controllerCmsCargo{
    function Logar(){
      $Login = new Login();

      $Login->cpf = $_POST['cpf'];
      $Login->senha = $_POST['senha'];

      Login::Logar($Login);
    }

      ////////////////////////// FUNÇÕES REFERENTE AO CONTEUDO DE CONVÊNIO //////////////////////////
      public function Novo(){
        require_once('modulo.php');
        $informacaoConteudo = new Cargo();

        $informacaoConteudo->cargo = $_POST['txtNomeCargo'];

        $informacaoConteudo::InsertConteudo($informacaoConteudo);
      }

      public function SelecionarConteudo(){
        $conteudo = new Cargo();
        return $conteudo::SelectConteudo();
      }

      public function ExcluirConteudo() {
        $idConteudo = $_GET['id'];

        $excluirConteudo = new Cargo();

        $excluirConteudo->id = $idConteudo;
        $excluirConteudo::DeleteConteudo($excluirConteudo);
      }
    }
?>
