<?php
/* Autor: Michel
   Data de modificação: 22/05/2018
   Controller: Forma de Pagamento
   Obs: Controller para realizar cotrole da class da forma de pagamento
 */

 class controllerFormaPagamento{

   public function Selecionar(){
    $pagamento = new FormaPagamento();
    return $pagamento::SelectFormaPagamento();
   }
 }

 ?>
