<?php
/* Autor: Stéphanie
   Data de modificação: 27/05/18
   Class: Especialidade
   Obs: Replica dos campos do BD com os metodos de ações do CRUD
 */


  class Especialidade {
    public $idEspecialidade;
    public $especialidade;

    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    public function SelectEspecialidade(){

     $sql = "SELECT * FROM tbl_especialidade;";

     //instancia a classe do banco
     $conex = new Mysql_db();

     //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
     $PDOconex = $conex->Conectar();

     $select = $PDOconex->query($sql);

     $list = array();

     //guarda resultado
     while ($result = $select->fetch(PDO::FETCH_ASSOC)) {

       $esp= new Especialidade();
       $esp->idEspecialidade = $result['idEspecialidade'];
       $esp->especialidade = $result['especialidade'];

       $list[] = $esp;
       //incrementa o contador
      }

       //Chama função que encerra conexao no banco
       $conex->Desconectar();

       if (isset($list)) {
        return $list;
      }


    }

}
?>
