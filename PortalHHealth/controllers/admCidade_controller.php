<?php
/* Autor: Stéphanie
   Data de modificação: 17/05/18
   Controller: Cidade
   Obs: Controller para realizar cotrole da class Cidade
 */


 class controllerCidade{

   public function Selecionar(){

     $cidade = new Cidade();
     return $cidade->Select();
   }

 }

 ?>
