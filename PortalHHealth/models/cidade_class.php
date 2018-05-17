<?php
/* Autor: Stéphanie
   Data de modificação: 17/05/18
   Class: Cidade
   Obs: Class para realizar select
 */

 class Cidade {
   public $idCidade;
   public $nomeCidade;
   public $idEstado;

   // Conexão com o banco
   public function __construct() {
     require_once('bd_class.php');
   }

    public function Select(){

     $sql = "SELECT * FROM tbl_cidade;";

     //instancia a classe do banco
     $conex = new Mysql_db();

     //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
     $PDOconex = $conex->Conectar();

     $select = $PDOconex->query($sql);

     $list = array();

     //guarda resultado
     while ($result = $select->fetch(PDO::FETCH_ASSOC)) {

       $cidade = new Cidade();
       $cidade->idCidade = $result['idCidade'];
       $cidade->nomeCidade = $result['nomeCidade'];
       $cidade->idEstado = $result['idEstado'];

       $list[] = $cidade;
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
