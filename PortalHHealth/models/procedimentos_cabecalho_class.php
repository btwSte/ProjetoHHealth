<?php
 /* Autor: Bruno
    Data de modificação: 18/04/18
    Class: Trabalhe conosco
    Obs: Replica dos campos do BD com os metodos de ações do CRUD
  */

  require_once("../../../variaveis.php");

 class ProcedimentoCabecalho{
   public $idProcedimentoCabecalho;
   public $fotoCabecalho;
   public $tituloFoto;
   public $tituloCabecalho;
   public $ativo;

   // Conexão com o banco
   public function __construct() {
     require_once('bd_class.php');
   }

 }
 ?>
