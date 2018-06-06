<?php
  /* Autor: Stéphanie
     Data de modificação: 05/06/2018
     Class: Fila de atendimento
     Obs: Replica dos campos do BD com os metodos de ações do CRUD
   */

  class Fila {
    public $idAgendaConsulta;
    public $status;
    public $data;
    public $hora;
    public $idPaciente;
    public $idEspecialidade;

    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    //FUNÇÕES REFERENTE AO CONTEUDO
    public function InsertFila($filaDados){
      //Recebe 0 para indicar que esta esperando ser chamado
      $status = "0";

      // Insert no banco
      $sql = "INSERT INTO tbl_fila (idAgendaConsulta, data, hora, idPaciente, idEspecialidade, status)
         VALUES ('".$filaDados->idAgendaConsulta."',
                '".$filaDados->data."',
                '".$filaDados->hora."',
                 '".$filaDados->idPaciente."',
                 '".$filaDados->idEspecialidade."',
                 '".$status."')";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      if ($PDOconex->query($sql)){
        echo "<script>alert('Enviado para fila de atendimento.');
               top.location.href='views/atendimento/atendimento_view.php';
               </script>";
          // header('location:'.$voltaUm.'views/atendimento/atendimento_view.php');
          // echo "funcionou";
        } else {
          echo "Erro no cadastro";
          // echo $sql;
        }


      $conex->Desconectar();

    }

    public function SelectFila(){
      $sql = "SELECT tbl_fila.*,
              tbl_paciente.nome,
              tbl_especialidade.especialidade
              FROM tbl_fila
              INNER JOIN tbl_paciente
              ON tbl_paciente.idPaciente = tbl_fila.idPaciente
              INNER JOIN tbl_especialidade
              ON tbl_especialidade.idEspecialidade = tbl_fila.idEspecialidade
              WHERE tbl_fila.status = 0;";

      //instancia a classe do banco
      $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      $select = $PDOconex->query($sql);

      //inicia contador em 0
      $cont = 0;

      //guarda resultado
      while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
        $list[] = new Fila();

        $list[$cont]->idFila = $result['idFila'];
        $list[$cont]->data = $result['data'];
        $list[$cont]->hora = $result['hora'];
        $list[$cont]->idPaciente = $result['idPaciente'];
        $list[$cont]->idEspecialidade = $result['idEspecialidade'];
        $list[$cont]->nome = $result['nome'];
        $list[$cont]->especialidade = $result['especialidade'];

        //incrementa o contador
        $cont += 1;
      }

      $conex->Desconectar();

      if (isset($list)) {
       return $list;
      }
    }

    public function StartFila($iniciaFila){
      //update status da consulta
      $update = "UPDATE tbl_fila SET status = 1 WHERE idFila=".$iniciaFila->id;

      //instancia a classe do banco
      $conex = new Mysql_db();
      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      //executa script no banco
      if ($PDOconex->query($update))
        header('location:'.$voltaUm.'views/administrativo/medico/atendimento_view.php');
      else
        echo "Erro no update";
        echo $sql;

      //Chama função que encerra conexao no banco
      $conex->Desconectar();
    }

    public function SelectStartFila(){
      $sql = " SELECT tbl_fila.*,
              tbl_paciente.nome,
              tbl_especialidade.especialidade,
              tbl_status.status
              FROM tbl_fila
              INNER JOIN tbl_paciente
              ON tbl_paciente.idPaciente = tbl_fila.idPaciente
              INNER JOIN tbl_especialidade
              ON tbl_especialidade.idEspecialidade = tbl_fila.idEspecialidade
              INNER JOIN tbl_status
              ON tbl_status.idStatus = tbl_fila.status
              WHERE tbl_fila.status > 0";

      $conex = new Mysql_db();

      $PDOconex = $conex->Conectar();
      $select = $PDOconex->query($sql);

      //inicia contador em 0
      $contIni = 0;

      //guarda resultado
      while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
        $listIniciada[] = new Fila();

        $listIniciada[$contIni]->idFila = $result['idFila'];
        $listIniciada[$contIni]->data = $result['data'];
        $listIniciada[$contIni]->hora = $result['hora'];
        $listIniciada[$contIni]->idPaciente = $result['idPaciente'];
        $listIniciada[$contIni]->idEspecialidade = $result['idEspecialidade'];
        $listIniciada[$contIni]->nome = $result['nome'];
        $listIniciada[$contIni]->especialidade = $result['especialidade'];
        $listIniciada[$contIni]->status = $result['status'];


        //incrementa o contador
        $contIni += 1;
      }

      $conex->Desconectar();

      if (isset($listIniciada)) {
       return $listIniciada;
      }
    }

    public function FinishFila($finalizaFila){
      //update status da consulta
      $update = "UPDATE tbl_fila SET status = 3 WHERE idFila=".$finalizaFila->id;

      //instancia a classe do banco
      $conex = new Mysql_db();
      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      //executa script no banco
      if ($PDOconex->query($update))
        header('location:'.$voltaUm.'views/administrativo/medico/atendimento_view.php');
      else
        echo "Erro no update";
        echo $sql;

      //Chama função que encerra conexao no banco
      $conex->Desconectar();
    }

    public function ReturnFila($andamentoFila){
      //update status da consulta
      $update = "UPDATE tbl_fila SET status = 2 WHERE idFila=".$andamentoFila->id;

      //instancia a classe do banco
      $conex = new Mysql_db();
      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();

      //executa script no banco
      if ($PDOconex->query($update))
        header('location:'.$voltaUm.'views/administrativo/medico/atendimento_view.php');
      else
        echo "Erro no update";
        echo $sql;

      //Chama função que encerra conexao no banco
      $conex->Desconectar();
    }
  }
?>
