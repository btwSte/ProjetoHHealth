<?php
/* Autor: Michel
   Data de modificação: 07/06/2018
   Class: Historico
   Obs: Class para realizar select
 */

 class Historico {
    public $idResConsulta;
    public $idPaciente;
    public $idMedico;
    public $Relatorio;
    public $idConsulta;

   // Conexão com o banco
   public function __construct() {
     require_once('bd_class.php');
   }

    public function SelectHistorico(){
     $sql = "SELECT * FROM tbl_resulado_consulta;";

     //instancia a classe do banco
     $conex = new Mysql_db();

     //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
     $PDOconex = $conex->Conectar();

     $select = $PDOconex->query($sql);


     //inicia contador em 0
     $cont = 0;

     //guarda resultado
     while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
       $listHistorico[] = new Historico();

        $listHistorico[$cont]->idResConsulta = $result['idResConsulta'];
        $listHistorico[$cont]->idPaciente = $result['idPaciente'];
        $listHistorico[$cont]->idMedico = $result['idMedico'];
        $listHistorico[$cont]->Relatorio = $result['Relatorio'];
        $listHistorico[$cont]->idConsulta = $result['idConsulta'];


       //incrementa o contador
       $cont += 1;
      }

       //Chama função que encerra conexao no banco
       $conex->Desconectar();

       if (isset($listHistorico)) {
        return $listHistorico;
      }

    }
  }
?>
