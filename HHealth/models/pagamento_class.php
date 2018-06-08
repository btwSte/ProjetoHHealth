<?php
/* Autor: Michel
   Data de modificação: 22/05/2018
   Class: Forma de Pagamento
   Obs: Class para realizar select da tabela de forma de pagamento
 */

 class Pagamento {
   public $idPagamento;
   public $idAgendaConsulta;
   public $status;
   public $idCompra;

   // Conexão com o banco
   public function __construct() {
     require_once('bd_class.php');
   }

    public function InsertPagamento($pagamento){
      $sql = "INSERT INTO tbl_pagamento (idAgendaConsulta, status, idCompra)
            VALUES ('".$pagamento->idAgendaConsulta."',
                    '".$pagamento->status."',
                    '".$pagamento->idCompra."');";

       //instancia a classe do banco
       $conex = new Mysql_db();

       //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
       $PDOconex = $conex->Conectar();

       $select = $PDOconex->query($sql);

       //executa script no banco
       if ($PDOconex->query($sql))
        echo "Sucesso no cadastro";
       else
        echo "Erro no cadastro";

       //Chama função que encerra conexao no banco
       $conex->Desconectar();

    }
  }
?>
