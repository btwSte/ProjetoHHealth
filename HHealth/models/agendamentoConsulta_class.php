<?php
/*
   Autor: Michel Malaquias
   Data de modificação: 22/05/2018
   Class: AgendamentoConsulta
   Obs: Replica dos campos do BD com os metodos de ações do CRUD
*/
if (!isset($_SESSION)) {
 session_start();
}
class AgendamentoConsulta
{

  public $idPaciente;
  public $data;
  public $hora;
  public $idEspecialidade;
  public $nome;

  function __construct()
  {
    require_once('bd_class.php');
  }

  public function Insert($dadoAgendamento) {
    $sql = "INSERT INTO tbl_agenda_consulta (data , hora ,idPaciente, idEspecialidade)
    VALUES ('".$dadoAgendamento->data."',
            '".$dadoAgendamento->hora."',
              '".$dadoAgendamento->idPaciente."',
            '".$dadoAgendamento->idEspecialidade."');";

      //instancia a classe do banco
     $conex = new Mysql_db();

      //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
      $PDOconex = $conex->Conectar();
      //echo $sql;
    //executa script no banco
    if ($PDOconex->query($sql)){
      echo "<script>alert('Enviado Com Sucesso!');
            top.location.href='views/paginas_paciente/agendamentoConsulta_view.php';
            </script>";
    }
    else
    echo "<script>
          alert('Erro no envio.');
          </script>";


    //Chama função que encerra conexao no banco
    $conex->Desconectar();
  }

  public function Select(){
    $sql ="SELECT tbl_agenda_consulta.*,
	tbl_paciente.nome,
    tbl_especialidade.especialidade
    FROM tbl_agenda_consulta
	INNER JOIN tbl_paciente
    ON tbl_paciente.idPaciente = tbl_agenda_consulta.idPaciente
    INNER JOIN tbl_especialidade
    ON tbl_especialidade.idEspecialidade = tbl_agenda_consulta.idEspecialidade
    WHERE tbl_agenda_consulta.idPaciente =".$_SESSION['LogCod'];

    //instancia a classe do banco
    $conex = new Mysql_db();

    //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
    $PDOconex = $conex->Conectar();

    $select = $PDOconex->query($sql);

    //inicia contador em 0
    $cont = 0;

    //Guarda resultado
    while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
      # code...
       $info_Consulta[] = new agendamentoConsulta();


       $info_Consulta[$cont]->idAgendaConsulta = $result['idAgendaConsulta'];
       $info_Consulta[$cont]->data  = $result['data'];
       $info_Consulta[$cont]->hora = $result['hora'];
       $info_Consulta[$cont]->idPaciente = $result['idPaciente'];
       $info_Consulta[$cont]->idEspecialidade = $result['idEspecialidade'];
       $info_Consulta[$cont]->nome = $result['nome'];
       $info_Consulta[$cont]->especialidade = $result['especialidade'];



       //incrementa o contador
       $cont += 1;

    }
    //Chama função que encerra conexao no banco
    $conex->Desconectar();

    if (isset($info_Consulta)) {
        return $info_Consulta;
    }
  }

  public function Excluir($info_Consulta){
    $sql = "DELETE FROM tbl_agenda_consulta WHERE idAgendaConsulta= $info_Consulta->idAgendaConsulta;";

    //instancia a classe do banco
    $conex = new Mysql_db();

    //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
    $PDOconex = $conex->Conectar();

    $select = $PDOconex->query($sql);
    echo "<script>alert('Consulta apagada com Sucesso');
          top.location.href='views/paginas_paciente/agendamentoConsulta_view.php';
          </script>";
  }


}

 ?>
