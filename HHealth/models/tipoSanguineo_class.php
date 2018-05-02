<?php
/* Autor: Stéphanie
   Data de modificação: 01/05/18
   Class: Tipo Sanguineo
   Obs: Class para realizar select
 */

 class TipoSanguineo {
   public $idTipoSanguineo;
   public $tipo;

   // Conexão com o banco
   public function __construct() {
     require_once('bd_class.php');
   }

    public function SelectTipoSanguineo(){
     $sql = "SELECT * FROM tbl_tipo_sanguineo;";

     //instancia a classe do banco
     $conex = new Mysql_db();

     //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
     $PDOconex = $conex->Conectar();

     $select = $PDOconex->query($sql);


     //inicia contador em 0
     $cont = 0;

     //guarda resultado
     while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
       $listTipoSanguineo[] = new TipoSanguineo();

       $listTipoSanguineo[$cont]->idTipoSanguineo = $result['idTipoSanguineo'];
       $listTipoSanguineo[$cont]->tipo = $result['tipo'];


       //incrementa o contador
       $cont += 1;
      }

       //Chama função que encerra conexao no banco
       $conex->Desconectar();

       if (isset($listTipoSanguineo)) {
        return $listTipoSanguineo;
      }

    }
  }
?>
