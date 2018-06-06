<?php
  /* Autor: Stéphanie
     Data de modificação: 05/06/2018
     Class: Consulta
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */

  class Consulta {
    public $idAgendaConsulta;
    public $ativo;
    public $data;
    public $hora;
    public $idPaciente;
    public $idEspecialidade;

    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    //FUNÇÕES REFERENTE AO CONTEUDO
    public function ActivateConsulta($ativarConsulta) {
      $sql = "UPDATE tbl_agenda_consulta SET ativo= 1
      WHERE idAgendaConsulta=".$ativarConsulta->id;

      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)) {
        // header('location:'.$voltaUm.'views/atendimento/atendimento_view.php');
        // echo "foi";
        $select = "SELECT * FROM tbl_agenda_consulta WHERE ativo = 1";

        $select = $PDOconex->query($select);

        if($result = $select->fetch(PDO::FETCH_ASSOC)){
          $filaResultado = new controllerConsulta();

          $filaResultado->idAgendaConsulta = $result['idAgendaConsulta'];
          $filaResultado->data = $result['data'];
          $filaResultado->ativo = $result['ativo'];
          $filaResultado->hora = $result['hora'];
          $filaResultado->idPaciente = $result['idPaciente'];
          $filaResultado->idEspecialidade = $result['idEspecialidade'];

        } else {
          echo "Nada encontrado";
        }
      } else {
        echo "erro";
      }

      if (isset($filaResultado)) {
        return $filaResultado;
      }

      $conex->Desconectar();
    }

  }
?>
