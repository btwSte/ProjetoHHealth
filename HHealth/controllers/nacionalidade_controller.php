<?php
/* Autor: Stéphanie
   Data de modificação: 01/05/18
   Controller: Nacionalidade
   Obs: Controller para realizar cotrole da class Nacionalidade
 */

 class controllerNacionalidade{

   public function SelecionarNacionalidade(){
    $nacionalidade = new Nacionalidade();
    return $nacionalidade::SelectNacionalidade();
   }
 }

 ?>
