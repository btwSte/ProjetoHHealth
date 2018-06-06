<?php
  /* Autor: Stéphanie
     Data de modificação: 05/06/2018
     Class: Consulta
     Obs: Ativa consultas
   */

  class controllerConsulta {

    //FUNÇÕES REFERENTE AO CONTEUDO
    public function AtivarConsulta() {
      $idConsulta = $_GET['id'];

      $ativarConsulta = new Consulta();

      $ativarConsulta->id = $idConsulta;
      $dadosConsulta = $ativarConsulta::ActivateConsulta($ativarConsulta);

      $controller_fila = new controllerFila();
      $controller_fila::InsereFila($dadosConsulta);

    }
  }
?>
