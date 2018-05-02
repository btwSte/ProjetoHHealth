<?php
/* Autor: Stéphanie
   Data de modificação: 01/05/18
   Controller: Estado Civil
   Obs: Controller para realizar cotrole da class Estado civil
 */

 class controllerEstadoCivil{

   public function Selecionar(){
    $civil = new EstadoCivil();
    return $civil::SelectEstadoCivil();
   }
 }

 ?>
