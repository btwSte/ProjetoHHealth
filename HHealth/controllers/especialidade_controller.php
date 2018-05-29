<?php
/* Autor: Stéphanie
   Data de modificação: 27/05/18
   Controller: Especialidade
   Obs: Controller para realizar cotrole da class
 */
 class controllerEspecialidade{

   public function SelecionarEspecialidade(){

     $esp = new Especialidade();
     return $esp->SelectEspecialidade();
   }

 }


 ?>
