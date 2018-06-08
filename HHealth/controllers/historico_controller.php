<?php
/* Autor: Michel
   Data de modificação: 07/06/2018
   Controller: Historico
   Obs: Controller para realizar cotrole da class Historico
 */

 class controllerHistorico{

   public function SelecionarHistorico(){
    $historico = new Historico();
    return $historico::SelectHistorico();
   }
 }

 ?>
