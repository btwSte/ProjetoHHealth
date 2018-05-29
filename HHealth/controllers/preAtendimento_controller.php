<?php
/* Autor: Michel
   Data de modificação: 14/05/2018
   Controller: Pre Atendimento
   Obs: Controller para o envio de dados do pre atendimento para o hospital
 */

 class controllerPreAtendimento{

    function Inserir(){
      // require da funcao modulo para envio do curriculo
      require_once('modulo.php');

       $dadoPreAtendimento = new preAtendimento();

       $dadoPreAtendimento->idPreAtendimento = null;
       $dadoPreAtendimento->situacao = $_POST['txtSituacao'];
       $dadoPreAtendimento->sintomas = $_POST['txtSintomas'];

       $dadoPreAtendimento::Insert($dadoPreAtendimento);

     }

     }
 ?>
