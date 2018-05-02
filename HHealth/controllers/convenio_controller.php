<?php
/* Autor: Stéphanie
   Data de modificação: 01/05/18
   Controller: Convênio
   Obs: Controller para realizar cotrole da class Convênio
 */

 class controllerConvenio{

   public function SelecionarConvenioAtivo(){
    $convenio = new Convenio();
    return $convenio::SelectConvenioAtivo();
   }
 }

 ?>
