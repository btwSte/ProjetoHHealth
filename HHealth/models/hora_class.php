<?php
/* Autor: Stéphanie
   Data de modificação: 28/05/18
   Class: Hora
   Obs: Replica dos campos do BD com os metodos de ações do CRUD
 */


  class Hora {
    public $idHora;
    public $hora;

    // Conexão com o banco
    public function __construct() {
      require_once('bd_class.php');
    }

    public function SelectHora(){

     $sql = "SELECT * FROM tbl_hora;";

     //instancia a classe do banco
     $conex = new Mysql_db();

     //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
     $PDOconex = $conex->Conectar();

     $select = $PDOconex->query($sql);

     $list = array();

     //guarda resultado
     while ($result = $select->fetch(PDO::FETCH_ASSOC)) {

       $hora = new Hora();
       $hora->idHora = $result['idHora'];
       $hora->hora = $result['hora'];

       $list[] = $hora;
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
