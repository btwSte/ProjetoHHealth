<?php
/* Autor: Stéphanie
   Data de modificação: 01/05/18
   Class: Estado Civil
   Obs: Class para realizar select
 */

 class EstadoCivil {
   public $idEstadoCivil;
   public $estado;

   // Conexão com o banco
   public function __construct() {
     require_once('bd_class.php');
   }

    public function SelectEstadoCivil(){
     $sql = "SELECT * FROM tbl_estado_civil;";

     //instancia a classe do banco
     $conex = new Mysql_db();

     //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
     $PDOconex = $conex->Conectar();

     $select = $PDOconex->query($sql);


     //inicia contador em 0
     $cont = 0;

     //guarda resultado
     while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
       $listEstadoCivil[] = new EstadoCivil();

       $listEstadoCivil[$cont]->idEstadoCivil = $result['idEstadoCivil'];
       $listEstadoCivil[$cont]->estado = $result['estado'];


       //incrementa o contador
       $cont += 1;
      }

       //Chama função que encerra conexao no banco
       $conex->Desconectar();

       if (isset($listEstadoCivil)) {
        return $listEstadoCivil;
      }

    }
  }
?>
