<?php
/* Autor: Stéphanie
   Data de modificação: 01/05/18
   Class: Nacionalidade
   Obs: Class para realizar select
 */

 class Nacionalidade {
   public $idNacionalidade;
   public $nacionalidade;

   // Conexão com o banco
   public function __construct() {
     require_once('bd_class.php');
   }

    public function SelectNacionalidade(){
     $sql = "SELECT * FROM tbl_nacionalidade;";

     //instancia a classe do banco
     $conex = new Mysql_db();

     //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
     $PDOconex = $conex->Conectar();

     $select = $PDOconex->query($sql);


     //inicia contador em 0
     $cont = 0;

     //guarda resultado
     while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
       $listNacionalidade[] = new Nacionalidade();

       $listNacionalidade[$cont]->idNacionalidade = $result['idNacionalidade'];
       $listNacionalidade[$cont]->nacionalidade = $result['nacionalidade'];


       //incrementa o contador
       $cont += 1;
      }

       //Chama função que encerra conexao no banco
       $conex->Desconectar();

       if (isset($listNacionalidade)) {
        return $listNacionalidade;
      }

    }
  }
?>
