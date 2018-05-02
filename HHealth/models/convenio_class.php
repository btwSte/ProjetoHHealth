<?php
/* Autor: Stéphanie
   Data de modificação: 01/05/18
   Class: Convenio
   Obs: Class para realizar select
 */

 class Convenio {
   public $idConvenio;
   public $nome;
   public $ativo;

   // Conexão com o banco
   public function __construct() {
     require_once('bd_class.php');
   }

    public function SelectConvenioAtivo(){
     $sql = "SELECT * FROM tbl_convenio WHERE ativo = 1;";

     //instancia a classe do banco
     $conex = new Mysql_db();

     //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
     $PDOconex = $conex->Conectar();

     $select = $PDOconex->query($sql);


     //inicia contador em 0
     $cont = 0;

     //guarda resultado
     while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
       $listConvenio[] = new Convenio();

       $listConvenio[$cont]->idConvenio = $result['idConvenio'];
       $listConvenio[$cont]->nome = $result['nome'];
       $listConvenio[$cont]->ativo = $result['ativo'];

       //incrementa o contador
       $cont += 1;
      }

       //Chama função que encerra conexao no banco
       $conex->Desconectar();

       if (isset($listConvenio)) {
        return $listConvenio;
      }

    }
  }
?>
