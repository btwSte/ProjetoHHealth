<?php
/* Autor: Michel Malaquias
   Data de modificação: 22/05/2018
   Controller: Marcação de Consulta
   Obs: Controller para o envio de dados para o realizamnto da marcação de consulta
 */
 if (!isset($_SESSION)) {
	session_start();
}

class controllerAgendamentoConsulta{
    // $id =  ($_SESSION['LogCod']);


    function InserirAgendamentoConsulta(){


       $dadoAgendamento = new AgendamentoConsulta();

       $dadoAgendamento->idPaciente = $_SESSION['LogCod'];
       $dadoAgendamento->data = $_POST['sltData'];
       $dadoAgendamento->hora = $_POST['sltHora'];
       $dadoAgendamento->idEspecialidade = $_POST['sltEspecialida'];

       $dadoAgendamento::Insert($dadoAgendamento);

     }


     public function selectConsulta(){
       $info_Consulta = new agendamentoConsulta();
       return $info_Consulta::Select();
     }

     public function ExcluirConsulta(){
       $info_Consulta = new agendamentoConsulta();

       $info_Consulta->idAgendaConsulta = $_GET['id'];

       return $info_Consulta::Excluir($info_Consulta);

     }

}
 ?>
