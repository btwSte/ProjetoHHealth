<?php
/* Autor: Stéphanie
   Data de modificação: 28/05/18
   Controller: Hora
   Obs: Controller para realizar cotrole da class
 */
 class controllerHora{

   public function SelecionarHora(){

     $hora = new Hora();
     return $hora->SelectHora();
   }

 }


 ?>
