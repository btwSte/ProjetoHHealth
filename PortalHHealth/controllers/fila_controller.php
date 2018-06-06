<?php
  /* Autor: Stéphanie
     Data de modificação: 05/06/2018
     Controller: Fila de Atendimento
     Obs: Controller para realizar CRUD da pagina Unidades e verifica login
   */

  class controllerFila{

    public function InsereFila($dadosConsulta){
      // novo objeto
      $filaDados = new Fila();

      //pega conteudo
      $filaDados->idAgendaConsulta = $dadosConsulta->idAgendaConsulta;
      $filaDados->data = $dadosConsulta->data;
      $filaDados->hora = $dadosConsulta->hora;
      $filaDados->idPaciente = $dadosConsulta->idPaciente;
      $filaDados->idEspecialidade = $dadosConsulta->idEspecialidade;

      //envia para a class
      $filaDados::InsertFila($filaDados);
    }

    public function SelecionaFila(){
      $selecionaFila = new Fila();
      return $selecionaFila::SelectFila();
    }

    public function IniciaFila(){
      //pega id
      $idFila = $_GET['id'];

      //novo objeto
      $iniciaFila = new Fila();

      //manda id pra start
      $iniciaFila->id = $idFila;
      return $iniciaFila::StartFila($iniciaFila);
    }

    public function SelecionaFilaIniciada(){
      $selecionaFila = new Fila();
      return $selecionaFila::SelectStartFila();
    }

    public function FinalizaFila(){
      //pega id
      $idFila = $_GET['id'];

      $finalizaFila = new Fila();

      $finalizaFila->id = $idFila;
      return $finalizaFila::FinishFila($finalizaFila);
    }

    public function RetornoFila(){
      //pega id
      $idFila = $_GET['id'];

      $retornoFila = new Fila();

      $retornoFila->id = $idFila;
      return $retornoFila::ReturnFila($retornoFila);
    }
  }
?>
