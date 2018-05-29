<?php
/* Autor: Michel
   Data de modificação: 22/05/2018
   Class: Forma de Pagamento
   Obs: Class para realizar select da tabela de forma de pagamento
 */

 class FormaPagamento {
   public $idPagamento;
   public $formaPagamento;

   // Conexão com o banco
   public function __construct() {
     require_once('bd_class.php');
   }

    public function SelectFormaPagamento(){
     $sql = "SELECT * FROM tbl_pagamento;";

     //instancia a classe do banco
     $conex = new Mysql_db();

     //chama o metodo para conectar no BD e guarda o resultado da funcao em uma variavel local($PDOconex)
     $PDOconex = $conex->Conectar();

     $select = $PDOconex->query($sql);


     //inicia contador em 0
     $cont = 0;

     //guarda resultado
     while ($result = $select->fetch(PDO::FETCH_ASSOC)) {
       $listPagamento[] = new FormaPagamento();

       $listPagamento[$cont]->$idPagamento = $result['idPagamento'];
       $listPagamento[$cont]->$formaPagamento = $result['formaPagamento'];


       //incrementa o contador
       $cont += 1;
      }

       //Chama função que encerra conexao no banco
       $conex->Desconectar();

       if (isset($listPagamento)) {
        return $listPagamento;
      }

    }
  }
?>
