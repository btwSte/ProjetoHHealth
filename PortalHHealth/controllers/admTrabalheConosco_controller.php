<?php
/* Autor: Bruno correia
   Data de criação: 18/04/18
   Controller: trabalhe conosco
   Obs: Controller para realizar a visalização e exclusão dos envios de formulario trabalhe conosco do site
 */
 class controllerCurriculo{
     function Logar(){
       $Login = new Login();

       $Login->cpf = $_POST['cpf'];
       $Login->senha = $_POST['senha'];

       Login::Logar($Login);
     }

     public function selectCurriculo(){
       $info_Curriculo = new TrabalheConosco();
       return $info_Curriculo::Select();
     }

     public function ExcluirCurriculo(){
       $info_Curriculo = new TrabalheConosco();

       $info_Curriculo->idCurriculo = $_GET['id'];

       return $info_Curriculo::Excluir($info_Curriculo);

     }

     public function selectCurriculoByID(){
       $info_Curriculo = new TrabalheConosco();
       $info_Curriculo->idCurriculo = $_POST['id'];
       return $info_Curriculo::SelectByID($info_Curriculo);
     }

  }
 ?>
