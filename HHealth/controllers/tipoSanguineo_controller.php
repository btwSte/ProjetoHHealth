<?php
/* Autor: Stéphanie
   Data de modificação: 01/05/18
   Controller: Tipo Sanguineo
   Obs: Controller para realizar cotrole da class Tipo Sanguineo
 */

 class controllerTipoSanguineo{

   public function SelecionarTipoSanguineo(){
    $tipoSanguineo = new TipoSanguineo();
    return $tipoSanguineo::SelectTipoSanguineo();
   }
 }

 ?>
